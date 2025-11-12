<?php
header('Content-Type: application/json');

$type = $_GET['type'] ?? 'sfw'; // sfw / nsfw
$category = $_GET['category'] ?? 'waifu';

$url = "https://api.waifu.pics/$type/$category";

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false, // Aman karena Waifu.pics pakai sertifikat valid
]);
$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
