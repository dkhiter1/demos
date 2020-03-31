<?

function dump($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

function my_crop($text, $length, $clearTags = true) {
    $text = trim($text);
    if ($clearTags === true)
        $text = strip_tags($text);
    if ($length <= 0 || strlen($text) <= $length)
        return $text;
    $out = mb_substr($text, 0, $length);
    $pos = mb_strrpos($out, ' ');
    if ($pos)
        $out = mb_substr($out, 0, $pos);
    return $out.'…';
}

?>