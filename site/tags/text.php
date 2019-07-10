<?php
kirbytext::$post[] = function($kirbytext, $value) {
  $snippets = array(
    '[' => '(',
    ']' => ')',
  );
  $keys     = array_keys($snippets);
  $values   = array_values($snippets);
  return str_replace($keys, $values, $value);
};


kirbytext::$tags['separateur'] = array(
  'html' => function($tag) {  
    return '<div class="article-divider"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.8 5.8"><path d="M4,5.8L6.9 2.9 4 0 3.5 0.5 5.4 2.5 0 2.5 0 3.3 5.4 3.3 3.5 5.3 z"></path><path d="M9.8,0L6.9 2.9 9.8 5.8 10.3 5.3 8.4 3.3 13.8 3.3 13.8 2.5 8.4 2.5 10.3 0.5 z"></path></svg></div>';
  }
);

kirbytext::$tags['retour'] = array(
  'html' => function($tag) {  
    return '<span class="article-return"></span>';
  }
);