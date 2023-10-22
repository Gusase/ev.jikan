<?php

/**
 * redirect page global
 */
function redirect(string $url): array
{
  return match ($url) {
    'search' => [
      'title' => 'Anime',
      'page' => 'view/anime.php'
    ],
    default => [
      'title' => 'Jikan',
      'page' => 'view/home.php'
    ],
  };
}
