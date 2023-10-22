<?php

use Jikan\MyAnimeList\MalClient;
use Jikan\Request\Genre\AnimeGenresRequest;
use Jikan\Request\Producer\ProducersRequest;
use Jikan\Request\Seasonal\SeasonalRequest;

require __DIR__ . '../../vendor/autoload.php';
require_once '../utils/redirectMain.php';
require_once '../utils/seasonAnime.php';

$jikan = new MalClient();

$seasonLists = [
  '01' => 'WINTER',
  '02' => 'WINTER',
  '03' => 'WINTER',
  '04' => 'SPRING',
  '05' => 'SPRING',
  '06' => 'SPRING',
  '07' => 'SUMMER',
  '08' => 'SUMMER',
  '09' => 'SUMMER',
  '10' => 'FALL',
  '11' => 'FALL',
  '12' => 'FALL'
];

$season = $jikan->getSeasonal(new SeasonalRequest());
$producers = $jikan->getProducers(new ProducersRequest);
$actionAnime = $jikan->getAnimeGenres(new AnimeGenresRequest);

$producersArray = $producers->getProducers('count');

usort($producersArray, function ($a, $b) {
  return $b->getCount() - $a->getCount(); // Urutkan descending
});

$types = [
  'ova' => 'Top OVAs',
  'airing' => 'Top Airing',
  'ona' => 'Top ONAs',
  'upcoming' => 'Top Upcoming',
  'special' => 'Top Special',
  'tv' => 'Top TV Series',
  'bypopularity' => 'Most Popular',
  'movie' => 'Top Movies',
];

$page = [
  'title' => 'Search Anime'
]
?>

<!-- html -->


<?php
include '../components/head.php';
include '../components/nav.php'
?>

<main>
  <div class="max-w-7xl mx-auto">
    <div class="relative my-8 isolate overflow-hidden items-center bg-gray-900 px-6 pt-16 shadow-2xl sm:px-16 md:py-24 lg:flex lg:gap-x-20">
      <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0" aria-hidden="true">
        <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
        <defs>
          <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
            <stop stop-color="#181818" />
            <stop offset="1" stop-color="rgb(30 58 138)" />
          </radialGradient>
        </defs>
      </svg>
      <form class="w-10/12 mx-auto">
        <div class="-mt-8 mb-5 text-center">
          <h1 class="text-4xl md:text-5xl font-bold capitalize dark:text-white py-2 pl-1 sticky top-0 bg-[#121212]/85 backdrop-blur-sm z-10">Anime Search</h1>
        </div>
        <label for="anime-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search Anime</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input type="search" id="anime-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-800 dark:bg-[#202020] dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Anime..." required>
          <button type="submit" class="text-white bbtn absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
        <div class="space-x-2 text-center mt-3 pt-1 border-gray-600 border-t">
          <a href="https://myanimelist.net/anime.php?letter=," class="text-sm capitalize hover:underline dark:hover:text-gray-100 underline-offset-4 hover:decoration-blue-500 hover:decoration-2 dark:text-gray-400">#</a>
          <?php foreach (range('A', 'Z') as $alpha) : ?>
            <a href="https://myanimelist.net/anime.php?letter=<?= $alpha; ?>" class="text-sm capitalize hover:underline dark:hover:text-gray-100 underline-offset-4 hover:decoration-blue-500 hover:decoration-2 dark:text-gray-400"><?= $alpha ?></a>
          <?php endforeach; ?>
        </div>
      </form>
    </div>
    <nav class="px-10 flex my-3">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <span class="inline-flex items-center text-sm font-medium dark:text-sky-50 dark:hover:underline hover:underline-offset-2">
            Top
          </span>
        </li>
        <li>
          <div class="flex items-center">
            >
            <span class="ml-2 text-sm font-medium dark:text-sky-50 dark:hover:underline hover:underline-offset-2">Anime</span>
          </div>
        </li>
      </ol>
    </nav>

    <div class="container p-10 space-y-10" id="content">
      <div>
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white py-2 pl-1 sticky top-0 bg-[#121212]/85 backdrop-blur-sm z-10">Genres</h4>
        <div class="grid grid-cols-1 gap-8 text-center lg:grid-cols-5">
          <?php foreach ($actionAnime->getGenres() as $genre) : ?>
            <a href="<?= $genre->getUrl(); ?>">
              <div class="flex flex-col items-center justify-center p-[1.77rem] cursor-pointer text-center bg-white border-b border-gray-200 rounded dark:bg-[#181818] dark:border-gray-800 dark:hover:bg-[#202020] hover:scale-[1.05] duration-100">
                <dl class="mx-auto flex max-w-xs flex-col gap-y-2">
                  <dt class="text-base leading-7 text-gray-600 dark:text-gray-400"><?= number_format($genre->getCount()) ?> Animes</dt>
                  <dt class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $genre->getName(); ?></dt>
                </dl>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <div>
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white py-2 pl-1 sticky top-0 bg-[#121212]/85 backdrop-blur-sm z-10">Explicit Genres</h4>
        <div class="grid grid-cols-1 gap-8 text-center lg:grid-cols-5">
          <?php foreach ($actionAnime->getExplicitGenres() as $explicit) : ?>
            <a href="<?= $explicit->getUrl(); ?>">
              <div class="flex flex-col items-center justify-center p-[1.77rem] cursor-pointer text-center bg-white border-b border-gray-200 rounded dark:bg-[#181818] dark:border-gray-800 dark:hover:bg-[#202020] hover:scale-[1.05] duration-100">
                <dl class="mx-auto flex max-w-xs flex-col gap-y-2">
                  <dt class="text-base leading-7 text-gray-600 dark:text-gray-400"><?= number_format($explicit->getCount()) ?> Animes</dt>
                  <dt class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $explicit->getName(); ?></dt>
                </dl>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <div>
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white py-2 pl-1 sticky top-0 bg-[#121212]/85 backdrop-blur-sm z-10">Themes</h4>
        <div class="grid grid-cols-1 gap-8 text-center lg:grid-cols-5">
          <?php foreach ($actionAnime->getThemes() as $animeTheme) : ?>
            <a href="<?= $animeTheme->getUrl(); ?>">
              <div class="flex flex-col items-center justify-center p-[1.77rem] cursor-pointer text-center bg-white border-b border-gray-200 rounded dark:bg-[#181818] dark:border-gray-800 dark:hover:bg-[#202020] hover:scale-[1.05] duration-100">
                <dl class="mx-auto flex max-w-xs flex-col gap-y-2">
                  <dt class="text-base leading-7 text-gray-600 dark:text-gray-400"><?= number_format($animeTheme->getCount()) ?> Animes</dt>
                  <dt class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $animeTheme->getName(); ?></dt>
                </dl>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <div>
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white py-2 pl-1 sticky top-0 bg-[#121212]/85 backdrop-blur-sm z-10">Demographics</h4>
        <div class="grid grid-cols-1 gap-8 text-center lg:grid-cols-5">
          <?php foreach ($actionAnime->getDemographics() as $demograph) : ?>
            <a href="<?= $demograph->getUrl(); ?>">
              <div class="flex flex-col items-center justify-center p-[1.77rem] cursor-pointer text-center bg-white border-b border-gray-200 rounded dark:bg-[#181818] dark:border-gray-800 dark:hover:bg-[#202020] hover:scale-[1.05] duration-100">
                <dl class="mx-auto flex max-w-xs flex-col gap-y-2">
                  <dt class="text-base leading-7 text-gray-600 dark:text-gray-400"><?= number_format($demograph->getCount()) ?> Animes</dt>
                  <dt class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $demograph->getName(); ?></dt>
                </dl>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <div>
        <div class="flex items-center py-2 pl-1 sticky top-0 bg-[#121212]/85 backdrop-blur-sm z-10">
          <h4 class="text-xl mb-3 font-bold capitalize dark:text-white">Studios</h4>
          <a href="https://myanimelist.net/anime/producer" class="capitalize ml-auto text-sm underline decoration-sky-500/60 underline-offset-4 hover:decoration-blue-600 hover:decoration-2">view more</a>
        </div>
        <div class="grid grid-cols-1 gap-8 text-center lg:grid-cols-5">
          <?php foreach (array_slice($producersArray, 0, 50) as $producerStudio) : ?>
            <a href="<?= $producerStudio->getUrl(); ?>" class="self-start">
              <div class="flex flex-col items-center justify-center p-[1.77rem] cursor-pointer text-center bg-white border-b border-gray-200 rounded dark:bg-[#181818] dark:border-gray-800 dark:hover:bg-[#202020] hover:scale-[1.05] duration-100">
                <dl class="mx-auto flex max-w-xs flex-col gap-y-2">
                  <dt class="text-base leading-7 text-gray-600 dark:text-gray-400"><?= number_format($producerStudio->getCount()) ?> Animes</dt>
                  <dt class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $producerStudio->getName(); ?></dt>
                </dl>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <div>
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white py-2 pl-1 sticky top-0 bg-[#121212]/85 backdrop-blur-sm z-10">Rankings</h4>
        <div class="grid grid-cols-1 gap-8 text-center lg:grid-cols-5">
          <a href="https://myanimelist.net/topanime.php" class="self-start">
            <div class="flex flex-col items-center justify-center p-[1.77rem] cursor-pointer text-center bg-white border-b border-gray-200 rounded dark:bg-[#181818] dark:border-gray-800 dark:hover:bg-[#202020] hover:scale-[1.05] duration-100">
              <dl class="mx-auto flex max-w-xs flex-col gap-y-2">
                <dt class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white">All Anime</dt>
              </dl>
            </div>
          </a>
          <?php foreach ($types as $type => $typeName) : ?>
            <a href="https://myanimelist.net/topanime.php?type=<?= $type; ?>" class="self-start">
              <div class="flex flex-col items-center justify-center p-[1.77rem] cursor-pointer text-center bg-white border-b border-gray-200 rounded dark:bg-[#181818] dark:border-gray-800 dark:hover:bg-[#202020] hover:scale-[1.05] duration-100">
                <dl class="mx-auto flex max-w-xs flex-col gap-y-2">
                  <dt class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $typeName; ?></dt>
                </dl>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <div>
        <div class="flex items-center py-2 pl-1 sticky top-0 bg-[#121212]/85 backdrop-blur-sm z-10">
          <h4 class="text-xl mb-3 font-bold capitalize dark:text-white">Anime Seasons</h4>
          <a href="https://myanimelist.net/anime/season/archive" class="ml-auto text-sm capitalize underline decoration-sky-500/60 underline-offset-4 hover:decoration-blue-600 hover:decoration-2">view more</a>
        </div>
        <div class="grid grid-cols-1 gap-8 text-center lg:grid-cols-4">
          <div class="grid gap-4">
            <a href="https://myanimelist.net/anime/season/<?= date("Y", strtotime("+ 1 year")) ?>/<?= winter() ?>">
              <div class="flex flex-col items-center justify-center p-[1.77rem] cursor-pointer text-center bg-white border-b border-gray-200 rounded dark:bg-[#181818] dark:border-gray-800 dark:hover:bg-[#202020] hover:scale-[1.05] duration-100">
                <dl class="mx-auto flex max-w-xs flex-col gap-y-2">
                  <dt class="text-base leading-7 text-gray-600 dark:text-gray-400"><?= ucfirst(winter()) ?></dt>
                  <dt class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= date("Y", strtotime("+ 1 year")) ?></dt>
                </dl>
              </div>
            </a>
            <?php for ($i = 0; $i < 5; $i++) : ?>
              <a href="https://myanimelist.net/anime/season/<?= subDate($i) ?>/<?= winter() ?>">
                <div class="flex flex-col items-center justify-center p-[1.77rem] cursor-pointer text-center bg-white border-b border-gray-200 rounded dark:bg-[#181818] dark:border-gray-800 dark:hover:bg-[#202020] hover:scale-[1.05] duration-100">
                  <dl class="mx-auto flex max-w-xs flex-col gap-y-2">
                    <dt class="text-base leading-7 text-gray-600 dark:text-gray-400"><?= ucfirst(winter()) ?></dt>
                    <dt class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= subDate($i) ?></dt>
                  </dl>
                </div>
              </a>
            <?php endfor; ?>
          </div>
          <div class="grid gap-4">
            <?php for ($i = 0; $i < 6; $i++) : ?>
              <a href="https://myanimelist.net/anime/season/<?= subDate($i) ?>/<?= fall() ?>">
                <div class="flex flex-col items-center justify-center p-[1.77rem] cursor-pointer text-center bg-white border-b border-gray-200 rounded dark:bg-[#181818] dark:border-gray-800 dark:hover:bg-[#202020] hover:scale-[1.05] duration-100">
                  <dl class="mx-auto flex max-w-xs flex-col gap-y-2">
                    <dt class="text-base leading-7 text-gray-600 dark:text-gray-400"><?= ucfirst(fall()) ?></dt>
                    <dt class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= subDate($i) ?></dt>
                  </dl>
                </div>
              </a>
            <?php endfor; ?>
          </div>
          <div class="grid gap-4">
            <?php for ($i = 0; $i < 6; $i++) : ?>
              <a href="https://myanimelist.net/anime/season/<?= subDate($i) ?>/<?= summer() ?>">
                <div class="flex flex-col items-center justify-center p-[1.77rem] cursor-pointer text-center bg-white border-b border-gray-200 rounded dark:bg-[#181818] dark:border-gray-800 dark:hover:bg-[#202020] hover:scale-[1.05] duration-100">
                  <dl class="mx-auto flex max-w-xs flex-col gap-y-2">
                    <dt class="text-base leading-7 text-gray-600 dark:text-gray-400"><?= ucfirst(summer()) ?></dt>
                    <dt class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= subDate($i) ?></dt>
                  </dl>
                </div>
              </a>
            <?php endfor; ?>
          </div>
          <div class="grid gap-4">
            <?php for ($i = 0; $i < 6; $i++) : ?>
              <a href="https://myanimelist.net/anime/season/<?= subDate($i) ?>/<?= spring() ?>">
                <div class="flex flex-col items-center justify-center p-[1.77rem] cursor-pointer text-center bg-white border-b border-gray-200 rounded dark:bg-[#181818] dark:border-gray-800 dark:hover:bg-[#202020] hover:scale-[1.05] duration-100">
                  <dl class="mx-auto flex max-w-xs flex-col gap-y-2">
                    <dt class="text-base leading-7 text-gray-600 dark:text-gray-400"><?= ucfirst(spring()) ?></dt>
                    <dt class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= subDate($i) ?></dt>
                  </dl>
                </div>
              </a>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

<script src="../view/js/ajax.js"></script>
<?php include '../components/foot.php' ?>