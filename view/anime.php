<?php

use Jikan\MyAnimeList\MalClient;
use Jikan\Request\Genre\AnimeGenresRequest;
use Jikan\Request\Producer\ProducersRequest;
use Jikan\Request\Seasonal\SeasonalRequest;

require __DIR__ . '../../vendor/autoload.php';
require_once '../utils/redirectMain.php';
require_once '../utils/seasonAnime.php';

$jikan = new MalClient();

$season = $jikan->getSeasonal(
  new SeasonalRequest()
);
$producers = $jikan->getProducers(new ProducersRequest);

// Array yang akan diurutkan
$producersArray = $producers->getProducers('count');

// Fungsi callback untuk mengurutkan berdasarkan 'count'
usort($producersArray, function ($a, $b) {
    return $b->getCount() - $a->getCount(); // Urutkan secara descending
});

$actionAnime = $jikan->getAnimeGenres((new AnimeGenresRequest));

$page = [
  'title' => 'Anime'
]
?>

<!-- html -->


<?php
include '../components/head.php';
include '../components/nav.php'
?>


<main>
  <div class="max-w-7xl mx-auto">
    <div class="relative my-8 isolate overflow-hidden bg-gray-900 px-6 pt-16 shadow-2xl sm:px-16 md:py-24 lg:flex lg:gap-x-20">
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
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search Anime</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-800 dark:bg-[#202020] dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Anime..." required>
          <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
      </form>
    </div>

    <div class="container p-10 space-y-8">
      <div>
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">Genres</h4>
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
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">Explicit Genres</h4>
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
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">Themes</h4>
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
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">Demographics</h4>
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
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">Studios</h4>
        <div class="grid grid-cols-1 gap-8 text-center lg:grid-cols-5">
          <?php foreach (array_slice($producersArray,0,51) as $producerStudio) : ?>
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
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">Anime Seasons</h4>
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


<?php include '../components/foot.php' ?>