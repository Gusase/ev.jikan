<?php

function redirect($url): array
{
  switch ($url) {
    case 'search':
      return [
        'title' => 'Anime',
        'page' => 'view/anime.php'
      ];
      break;
    default:
      return [
        'title' => 'Home',
        'page' => 'view/top.php'
      ];
      break;
  }
}
