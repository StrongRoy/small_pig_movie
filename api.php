<?php
header('Access-Control-Allow-Origin:http://localhost:8000');
header('Access-Control-Allow-Credentials:true');


require dirname(__FILE__) . '/predis/autoload.php';
Predis\Autoloader::register();

$GLOBALS["client"] = $client = new Predis\Client();

$module = $_GET['module'] ?: "pv";
$type = $_GET['type'] ?: "";
$ttype = $_GET['ttype'] ?: "";
$stime = $_GET['stime'] ?: 0;
$etime = $_GET['etime'] ?: 9999999999;
$keysFind = $module . $type . $ttype . "*";

if ($_GET['datashow'] == "1") {
    $response_arr = array();

    /* total pv */
    $response = $client->executeRaw(array("KEYS", "pv_day*"));
    foreach ($response as $rep) {
        $ret_pv_size = $client->get('pv_size');
        $ret = $client->executeRaw(array("ZRANGE", $rep, 0, -1, "WITHSCORES"));

        $pv_size = sizeof($ret);
        $client->set('pv_size', $pv_size);
        $response_arr[0] = $pv_size;
        $response_arr[1] = ( ($pv_size-$ret_pv_size) / $pv_size ) * 100;
    }

    /* total uv */
    $response = $client->executeRaw(array("KEYS", "uv_day*"));
    foreach ($response as $rep) {
        $ret_uv_size = $client->get('uv_size');
        $uv_size = sizeof($ret);
        $client->set('uv_size', $uv_size);

        $ret = $client->executeRaw(array("ZRANGE", $rep, 0, -1, "WITHSCORES"));
        $response_arr[2] = sizeof($ret);
        $response_arr[3] =  ( ($uv_size-$ret_uv_size) / $uv_size ) * 100;
    }

    echo json_encode($response_arr);


} elseif ($_GET['datashow'] == "2") {
    $response = $client->executeRaw(array("KEYS", "pv_movie_day*"));
    if (!$response) {
        echo json_encode(array());
        exit();
    }
    $db = DB::getInstance()->getConn();
    $key = current($response);
    $response = $client->executeRaw(array("ZREVRANGE", $key, 0, -1, "WITHSCORES"));
    $items = array();
    $item = array();
    $i = 1;
    foreach ($response as $k => $v) {
        if ($k % 2 == 0) {
            $r = $db->query("SELECT title FROM gx_video WHERE id=$v");
            $d = $r->fetch_array(MYSQLI_ASSOC);
            $item = array("title" => $d['title'], "id" => $v);
        } else {
            $item["pv"] = intval($v);
            $item["index"] = $i++;
            $items[] = $item;
        }
        if (count($items) >= 100) break;
    }
    echo json_encode($items);

} else {
    $response = $client->executeRaw(array("KEYS", $keysFind));
    if (is_array($response) && count($response) != 0) {
        $arr = array();
        foreach ($response as $v) {
            $time = substr($v, -10);
            if (substr($v, 0, 8) == 'uv_hpll') {
                continue;
            }
            if ($time >= $stime && $time <= $etime) {
                $arr[] = $v;
            }
        }
        sort($arr);
        $arr = doSum($arr);
        $arr = doSort($arr);
        echo json_encode($arr);
    } else {
        echo json_encode($response);
    }
}

function doSum($arr)
{
    if ($_GET['do'] != "sum") {
        return $arr;
    }
    $repArr = array();
    foreach ($arr as $rv) {
        $rep = $GLOBALS["client"]->executeRaw(array("ZRANGE", $rv, 0, -1, "WITHSCORES"));
        $c = 0;
        foreach ($rep as $k => $r) {
            if ($k % 2 != 0) {
                $c = $c + $r;
            }
            $repArr[$rv] = $c;
        }
    }
    return $repArr;

}

function doSort($arr)
{
    if ($_GET['do'] != "sort" && $_GET['do'] != "rsort") {
        return $arr;
    }
    $repArr = $sort = array();
    foreach ($arr as $rv) {
        $rep = $GLOBALS["client"]->executeRaw(array("ZRANGE", $rv, 0, -1, "WITHSCORES"));
        $c = 0;
        foreach ($rep as $k => $r) {
            if ($k % 2 != 0) {
                $c = $c + $r;
            }
            $sort[$c] = $rv;
        }
        if ($_GET['do'] != "sort") ksort($sort);
        if ($_GET['do'] != "rsort") krsort($rsort);
        foreach ($sort as $k => $v) {
            $repArr[$v] = $k;
        }
        return $repArr;
    }
}


class DB
{
    private static $_instance;
    private $db;

    private function __construct()
    {
        $this->db = new mysqli("127.0.0.1", "root", "wanglq1299", "gxcms", "8889");

    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof DB)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __clone()
    {

    }

    public function getConn()
    {
        return $this->db;
    }
}
