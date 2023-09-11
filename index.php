<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'utils/redirect.php';

use Jikan\MyAnimeList\MalClient;
use Jikan\Request\Anime\AnimeRequest;
use Jikan\Request\Anime\AnimeEpisodesRequest;
use Jikan\Request\Anime\AnimeCharactersAndStaffRequest;
use Jikan\Request\Anime\AnimeVideosRequest;

$jikan = new MalClient();
// $indexAnime = 30;
// $indexAnime = 339;
// $indexAnime = 3786;
// $indexAnime = 53246;
$indexAnime = 51009;
// $indexAnime = 48561;

$anim = $jikan->getAnime(
  new AnimeRequest($indexAnime)
);

$episodes = $jikan->getAnimeEpisodes(
  (new AnimeEpisodesRequest($indexAnime))
);

$charactersAndStaff = $jikan->getAnimeCharactersAndStaff(
  (new AnimeCharactersAndStaffRequest($indexAnime))
);

$videos = $jikan->getAnimeVideos(
  (new AnimeVideosRequest($indexAnime))
);

// foreach ($episodes->getResults() as $eps) {
//   var_dump($eps->getUrl());
//   echo $eps->getTitleRomanji() . '(' . $eps->getTitleJapanese() . ')' . "\n";
//   $aired = $eps->getAired();

//   if ($aired !== null) {
//     $date = $aired->format('M d, Y');

//     echo 'Aired Date: ' . $date . "\n";
//   } else {
//     echo 'Aired information is not available.' . "\n";
//   }
// }
// die;

$v = isset($_GET['v']) ? $_GET['v'] : '';
$page = redirect($v);


?>

<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title><?= $anim->getTitle() ?></title>
  <style>
    @keyframes fade {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .fd {
      animation: fade .4s ease-in;
    }
  </style>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          container: {
            center: true,
          }
        }
      }
    }
  </script>
</head>

<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-[#121212] fd">

  <?php include 'components/nav.php' ?>

  <header class="bg-center py-40 px-16 bg-no-repeat bg-[url('<?= $anim->getImages()->getWebp()->getLargeImageUrl() ?>')] dark:bg-[#121212] bg-cover relative isolate">
    <h1 class="text-5xl font-bold dark:text-white absolute bottom-14 left-14 md:left-16 2xl:left-32">
      <?= $anim->getTitle() ?>
    </h1>
    <div class="bg-gradient-to-t dark:from-[#121212]/60 w-full h-full absolute top-0 left-0 -z-10"></div>
  </header>


  <?php if (isset($page)) : ?>

  <?php include_once $page['page'];
  endif ?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>