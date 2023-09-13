<?php

use Jikan\MyAnimeList\MalClient;
use Jikan\Request\Anime\AnimeRequest;

require __DIR__ . '../../../vendor/autoload.php';
require '../../utils/redirect.php';


if (isset($_GET['mal'])) {
  $id = $_GET['mal'];
} else {
  header('Location: ../');
  exit;
}

$jikan = new MalClient();

$anim = $jikan->getAnime(
  new AnimeRequest($id)
);
$active = 'home';

$v = isset($_GET['v']) ? $_GET['v'] : '';
$page = redirect($v);
?>

<!-- html -->


    <?php
    include '../../components/head.php';
    include '../../components/nav.php'
    ?>

    <header class="bg-center py-40 px-16 bg-no-repeat bg-[url('<?= $anim->getImages()->getWebp()->getLargeImageUrl() ?>')] dark:bg-[#121212] bg-cover relative isolate">
      <h1 class="text-5xl font-bold dark:text-white absolute bottom-14 left-14 md:left-16 2xl:left-32">
        <?= $anim->getTitle() ?>
      </h1>
      <div class="bg-gradient-to-t dark:from-[#121212]/70 w-full h-full absolute top-0 left-0 -z-10"></div>
    </header>

    <?php if (isset($page)) : ?>

    <?php include_once $page['page'];
    endif ?>

    

    <?php include '../../components/foot.php' ?>