<?php
/**
 * HTTP request helpers
 */


function tradehero_request_curl($remote_server) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $remote_server);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function tradehero_request_content($url) {
    $options = array(
        'http' => array(
            'method' => 'GET',
            'header' => 'Content-type:application/x-www-form-urlencoded',
            'timeout' => 15 * 60
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}
?>