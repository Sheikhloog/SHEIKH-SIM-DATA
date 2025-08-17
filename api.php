<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Input parameters
$token = $_GET['token'] ?? '';
$num   = $_GET['num'] ?? '';

if (!$token || !$num) {
    echo json_encode(["error" => "Missing token or number"]);
    exit;
}

// API URL
$url = "https://shadowdatabase.site/api.php?token=$token&num=$num";

// cURL setup
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(["error" => "Curl error: " . curl_error($ch)]);
} else {
    echo $response;
}
curl_close($ch);
