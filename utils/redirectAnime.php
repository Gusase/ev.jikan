<?php
function redirect(string $url): array
{
  switch ($url) {
    case 'characters':
      return [
        'page' => 'characters.php',
        'title' => ' - Characters & Staff'
      ];
      break;
    case 'videos':
      return [
        'page' => 'videos.php',
        'title' => ' - Videos'
      ];
      break;
    case 'episodes':
      return [
        'page' => 'episodes.php',
        'title' => ' - Epsiodes'
      ];
      break;
    case 'stats':
      return [
        'page' => 'statistic.php',
        'title' => ' - Statistic'
      ];
      break;
    case 'pics':
      return [
        'page' => 'picture.php',
        'title' => ' - Pictures'
      ];
      break;
    default:
      return [
        'page' => 'details.php',
        'title' => ''
      ];
      break;
  }
}
