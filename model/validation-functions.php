<?php
/* Validate a color** @param String color* @return boolean*/
function validColor($color) {
    global $fff;
    return in_array($color, $fff->get('colors'));
}

function validString($string) {
    return $string !== "" && ctype_alpha($string);
}