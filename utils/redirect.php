<?php
function redirect(string $url): array
{
  switch ($url) {
    case 'characters':
      return [
        'page' => 'view/characters.php'
      ];
      break;
    case 'videos':
      return [
        'page' => 'view/videos.php'
      ];
      break;
    case 'episodes':
      return [
        'page' => 'view/episodes.php'
      ];
      break;
    default:
      return [
        'page' => 'view/home.php'
      ];
      break;
  }
}
