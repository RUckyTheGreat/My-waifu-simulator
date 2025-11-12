<?php
header('Content-Type: application/json');

$tag = isset($_GET['tag']) ? urlencode($_GET['tag']) : 'castorice';
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 15;

$url = "https://danbooru.donmai.us/posts.json?tags={$tag}&limit={$limit}";

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_CAINFO => "C:/xampp/apache/bin/curl-ca-bundle.crt",
    CURLOPT_USERAGENT => "PHP-Danbooru-Client/1.0"
]);

$response = curl_exec($ch);
$error = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response === false || $httpCode !== 200) {
    echo json_encode([
        "error" => "Gagal mengambil data dari Danbooru.",
        "curl_error" => $error,
        "http_code" => $httpCode,
        "url" => $url
    ]);
} else {
    echo $response;
}

?>
