<?php

/*
 retourne les pages d'un article au bon format selon le type
 */

 field::$methods['citationPages'] = function ($field) {
   $text = $field->html();
    if(preg_match_all("/(\d+)-(\d+)/", $text, $matches)){
      $text = $matches[1][0] . "–" . $matches[2][0];
    }
    return $text;
 };
