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
        'title' => 'Jikan',
        'page' => 'view/home.php'
      ];
      break;
  }
}
