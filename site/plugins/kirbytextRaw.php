<?php

/*
 * Add support to remove p tags from around kirby formatted text
 *
 * Author: Rob James
 * License: MIT License
 *
 */

 field::$methods['kirbytextRaw'] = field::$methods['ktr'] = function ($field) {
     $text = $field->kirbytext();
     $text = preg_replace('/\^(\w+)/','<sup>$1</sup>', $text);
     if ('<p>' === str::substr($text, 0, 3) && '</p>' === str::substr($text, -4)) {
         return str::substr($text, 3, -4);
     } else {
     }
 };

 /*
function kirbytextSans($text='') {
    $text = kirbytext::init($text, true);
    $text = preg_replace('/<p>(.*)<\/p>/', '$1', $text);
    $text = preg_replace('/\^(\w+)/g','<sup>$1</sup>', $text);
    $text = $text + "test";
    return "test";
}
*/
