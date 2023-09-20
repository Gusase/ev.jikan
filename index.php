<?php
session_start();

require __DIR__ . '/vendor/autoload.php';
require_once 'utils/redirectMain.php';

use \Jikan\Helper\Constants;
use Jikan\MyAnimeList\MalClient;
use Jikan\Request\Top\TopAnimeRequest;

$jikan = new MalClient();

$topAnime = $jikan->getTopAnime(
  (new TopAnimeRequest(
    1,
    Constants::TOP_AIRING
  ))
);
// var_dump($topAnime);
// foreach ($topAnime->getResults() as $top) {
//   $topImg = $top->getImages()->getWebp()->getLargeImageUrl();
//   echo "<img src='$topImg'>";
//   echo $top->getTitle();
// }

// die;


$v = isset($_GET['v']) ? $_GET['v'] : '';
$page = redirect($v);

?>


<!-- html -->
<?php
include 'components/head.php';
include 'components/nav.php'
?>

<?php if (empty($v)) : ?>
  <div id="default-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative overflow-hidden py-52 px-16">
      <!-- Item 1 -->
      <?php foreach (array_slice($topAnime->getResults(),0,5) as $top) : ?>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <a href="view/anime/?mal=<?= $top->getMalId(); ?>" class="group">
            <img src="<?= $top->getImages()->getWebp()->getLargeImageUrl() ?>" class="bg-gray-900 bg-cover absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            <div class="bg-gradient-to-t dark:from-[#121212]/75 w-full h-full absolute top-0 left-0 z-10"></div>
            <h1 class="text-5xl font-bold dark:text-white absolute bottom-14 group-hover:underline decoration-2 decoration-blue-600 left-14 md:left-16 z-20 2xl:left-32">
              <?= $top->getTitle() ?>
            </h1>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
        </svg>
        <span class="sr-only">Previous</span>
      </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
        </svg>
        <span class="sr-only">Next</span>
      </span>
    </button>
  </div>
<?php endif; ?>

<?php if (isset($page)) : ?>

<?php include_once $page['page'];
endif ?>


<?php include 'components/foot.php' ?>