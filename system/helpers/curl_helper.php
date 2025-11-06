<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
defined('BASEPATH') OR exit('No direct script access allowed');

function fetchData($requestUrl,  $paramData='', $method='GET', $headerUse='N')
{
    if ($method == 'GET') $requestUrl .= "?" . $paramData;
    $request = curl_init();
    curl_setopt($request, CURLOPT_URL, $requestUrl);
    curl_setopt($request, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($request, CURLOPT_TIMEOUT, 10);
    curl_setopt($request, CURLOPT_CONNECTTIMEOUT, 10);
    if ($method == 'POST' || $method == 'PUT') {
        if ($method == 'POST') curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_POSTFIELDS, $paramData);
    }


    if ($headerUse == 'Y') {
        curl_setopt($request, CURLOPT_HTTPHEADER, array('content-Type: application/json', 'Authorization:' . API_TOKEN_SET));
    }
    echo 1;exit;
    curl_setopt($request, CURLOPT_HEADER, 0);//헤더를 포함한다.
    $data = curl_exec($request);
    $returnData['data'] = $data;
    $returnData['curl_error_code'] = curl_errno($request);

    curl_close($request);

    return $returnData;
}

function fetch_url($theurl) { 
    $url_parsed = parse_url($theurl); 
    $host = $url_parsed["host"]; 
    $port = $url_parsed["port"]; 
    if($port==0) $port = 80; 
    $the_path = $url_parsed["path"]; 

    if(empty($the_path)) $the_path = "/"; 
    if(empty($host)) return false; 

    if($url_parsed["query"] != "") $the_path .= "?".$url_parsed["query"]; 

    $out = "GET ".$the_path." HTTP/1.0\r\nHost: ".$host."\r\n\r\nUser-Agent: Mozilla/4.0 \r\n"; 

    $fp = fsockopen($host, $port, $errno, $errstr, 30); 

    usleep(50); 

    if($fp) { 
        socket_set_timeout($fp, 30); 
        fwrite($fp, $out); 
        $body = false; 
        while(!feof($fp)) { 
        $buffer = fgets($fp, 128); 
        if($body) $content .= $buffer; 
        if($buffer=="\r\n") $body = true; 
    } 
        fclose($fp); 
    }else { 
        return false; 
    } 
    return $content; 
} 

function write_file2($file, $data, $mode = "w") 
{ 

    $fh = fopen($file, $mode); 


    if ($fh or $mode == 'w') { 

        @ignore_user_abort(true); 
        @flock($fh, LOCK_EX); 
        @fwrite($fh, $data); 

        @flock($fh, LOCK_UN); 

        @fclose($fh); 
        @ignore_user_abort(false); 

    } 
} 