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


if (!is_null($anim->getPremiered())) {
  $ss = explode(' ',$anim->getPremiered());
  $seasonNm = mb_strtolower($ss[0]);
  $seasonYr = intval($ss[1]);
  $season = $jikan->getSeasonal(
    new SeasonalRequest(
      $seasonYr,
      strtolower(Constants::SEASONS[array_search($seasonNm, Constants::SEASONS)])
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

    <header class="bg-center py-40 px-16 bg-no-repeat bg-[url('<?= $pics[$randm]->getWebp()->getLargeImageUrl() ?>')] dark:bg-[#121212] bg-cover relative isolate after:brightness-[.35] after:absolute after:inset-0 after:bg-#">
      <h1 class=" <?= (strlen($anim->getTitles()[0]->getTitle()) >= 60) ? 'text-4xl' : 'text-5xl' ?> font-bold dark:text-white absolute bottom-14 left-14 z-10 md:left-16 min-[3936px]:left-[31%]">
        <?= $anim->getTitles()[0]->getTitle() ?>
      </h1>
      <div class="bg-gradient-to-t from-[#181818]/70 w-full h-full absolute inset-0 -z-10"></div>
    </header>
    <img src="<?= $pics[$randm]->getWebp()->getLargeImageUrl() ?>" alt="" class="poster w-px h-px" crossorigin="anonymous">
    
    <?php if (isset($page)) : ?>

    <?php include_once $page['page'];
    endif ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.0/color-thief.umd.js"></script>
    <script type="module">
      const colorThief = new ColorThief();
      const img = document.querySelector(".poster");
      const bd = document.querySelector(".isolate");

      if (img.complete) {
        let hex = colorThief.getColor(img);
        //stackoverflow
        let hexColor = `#${hex[0].toString(16).padStart(2, '0')}${hex[1].toString(16).padStart(2, '0')}${hex[2].toString(16).padStart(2, '0')}`;

        bd.classList.remove('after:bg-#')
        bd.classList.add(`after:bg-[${hexColor}]/70`)

      } else {
        img.addEventListener("load", function() {
          let hex = colorThief.getColor(img);
          //stackoverflow
          let hexColor = `#${hex[0].toString(16).padStart(2, '0')}${hex[1].toString(16).padStart(2, '0')}${hex[2].toString(16).padStart(2, '0')}`;

          bd.classList.remove('after:bg-#')
          bd.classList.add(`after:bg-[${hexColor}]/70`)
        });
      }
    </script>

    <?php include '../../components/foot.php' ?>