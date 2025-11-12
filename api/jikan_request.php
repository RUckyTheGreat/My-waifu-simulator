<?php
function getAnimeFromAPI($query) {
    $url = "https://api.jikan.moe/v4/anime?q=" . urlencode($query);
    $data = file_get_contents($url);
    return json_decode($data, true);
}
?>
