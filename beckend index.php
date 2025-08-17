<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Token aur number frontend se lene
$token = $_GET['token'] ?? '';
$num   = $_GET['num'] ?? '';

if (!$token || !$num) {
    echo json_encode(["error" => "Missing token or number"]);
    exit;
}

// API request forward karna
$url = "https://shadowdatabase.site/api.php?token=$token&num=$num";
$response = file_get_contents($url);

if ($response === FALSE) {
    echo json_encode(["error" => "Unable to fetch data"]);
} else {
    echo $response;
}
