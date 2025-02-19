<?php

function parse_youtube_id($url) {
    preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/]+\/[^\?]+|\S+\?v=|v\/|e\/(?:[a-z0-9\-]+)\/)([\w\-]{11}))/i', $url, $matches);
    return isset($matches[1]) ? $matches[1] : null;
}


