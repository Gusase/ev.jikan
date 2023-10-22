<?php
/**
 * redirect an anime titl
 */
function redirect(string $url): array
{
  return match ($url) {
    'characters' => [
      'page' => 'characters.php',
      'title' => ' - Characters & Staff'
    ],
    'videos' => [
      'page' => 'videos.php',
      'title' => ' - Videos'
    ],
    'episodes' => [
      'page' => 'episodes.php',
      'title' => ' - Epsiodes'
    ],
    'stats' => [
      'page' => 'statistic.php',
      'title' => ' - Statistic'
    ],
    'pics' => [
      'page' => 'picture.php',
      'title' => ' - Pictures'
    ],
    'reviews' => [
      'page' => 'reviews.php',
      'title' => ' - Reviews'
    ],
    'news' => [
      'page' => 'news.php',
      'title' => ' - News'
    ],
    'userrecs' => [
      'page' => 'recomend.php',
      'title' => ' - Recommendations '
    ],
    default =>  [
      'page' => 'details.php',
      'title' => ''
    ],
  };
}
