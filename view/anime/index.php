<?php

use Jikan\Helper\Constants;
use Jikan\MyAnimeList\MalClient;
use Jikan\Request\Anime\AnimeRequest;
use Jikan\Request\Anime\AnimeVideosRequest;
use Jikan\Request\Seasonal\SeasonalRequest;
use Jikan\Request\Anime\AnimePicturesRequest;

require __DIR__ . '../../../vendor/autoload.php';
require_once '../../utils/redirectAnime.php';


if (isset($_GET['mal'])) {
  $id = $_GET['mal'];
} else {
  header('Location: ../');
  exit;
}

$jikan = new MalClient();

$anim = $jikan->getAnime(new AnimeRequest($id));

$videos = $jikan->getAnimeVideos(new AnimeVideosRequest($id));

$pics = $jikan->getAnimePictures(new AnimePicturesRequest($id));

$randm = array_rand($pics,1);

// var_dump($anim->getRelated());
// die;

if (!is_null($anim->getPremiered())) {
  $seasonNm = mb_strtolower(explode(' ', $anim->getPremiered())[0]);
  $seasonYr = intval(explode(' ', $anim->getPremiered())[1]);
  $season = $jikan->getSeasonal(
    new SeasonalRequest(
      $seasonYr,
      Constants::SEASONS[array_search($seasonNm, Constants::SEASONS)]
    )
  );
}

$active = 'home';

$v = isset($_GET['v']) ? $_GET['v'] : '';
$page = redirect($v);
?>

<!-- html -->


    <?php
    include '../../components/head.php';
    include '../../components/nav.php'
    ?>

    <header class="bg-center py-40 px-16 bg-no-repeat bg-[url('<?= $pics[$randm]->getWebp()->getLargeImageUrl() ?>')] dark:bg-[#121212] bg-cover relative isolate">
      <h1 class="text-5xl font-bold dark:text-white absolute bottom-14 left-14 md:left-16 2xl:left-32">
        <?= $anim->getTitles()[0]->getTitle() ?>
      </h1>
      <div class="bg-gradient-to-t dark:from-[#121212]/70 w-full h-full absolute top-0 left-0 -z-10"></div>
    </header>

    <?php if (isset($page)) : ?>

    <?php include_once $page['page'];
    endif ?>

    

    <?php include '../../components/foot.php' ?>