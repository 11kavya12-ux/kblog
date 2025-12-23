<?php
function esc($s){ return htmlspecialchars($s, ENT_QUOTES); }
function url($p=''){ $b=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on'?'https':'http').'://'.$_SERVER['HTTP_HOST']; return rtrim($b,'/').'/'.ltrim($p,'/'); }
function create_slug($text) {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9]+/i', '-', $text);
    $text = trim($text, '-');
    return $text;
}

?>