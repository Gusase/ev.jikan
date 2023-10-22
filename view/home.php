<?php

use Jikan\Helper\Constants;
use Jikan\MyAnimeList\MalClient;
use Jikan\Request\Top\TopAnimeRequest;
use Jikan\Request\Seasonal\SeasonalRequest;

require __DIR__ . '../../vendor/autoload.php';

$jikan = new MalClient();

$season = $jikan->getSeasonal(
  new SeasonalRequest()
);
$seasonNow = "{$season->getSeasonName()} {$season->getSeasonYear()} Anime";

$topUpcoming = $jikan->getTopAnime(
  (new TopAnimeRequest(
    1,
    Constants::TOP_UPCOMING
  ))
);
$topAiring = $jikan->getTopAnime(
  (new TopAnimeRequest(
    1,
    Constants::TOP_AIRING
  ))
);

$active = 'home';
?>

<main>
  <div class="flex flex-col container p-10 items-center md:flex-row w-full mt-3">
    <section class="max-w-7xl mx-auto">
      <div class="relative" id="cc">
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2"><?= $seasonNow; ?></h4>
        <div class="grid grid-cols-1 gap-6 lg:gap-y-8 sm:grid-cols-2 lg:grid-cols-7 max-h-[27rem] overflow-hidden" id="seasonContent">
          <?php foreach (array_slice($season->getAnime(), 0, 19) as $seasonal) : ?>
            <a href="http://ev.jikan.test/view/anime/?mal=<?= $seasonal->getMalId(); ?>" class="group flex w-[160px] h-[220px] flex-col items-center overflow-hidden rounded-md shadow hover:bg-gray-100 dark:bg-gray-900 relative">
              <img class="group-hover:scale-105 transition-transform object-cover w-full h-full bg-gray-900" src="<?= $seasonal->getImages()->getWebp()->getLargeImageUrl() ?>" alt="">
              <p class="absolute bottom-2 left-2 font-normal z-10 text-gray-700 dark:text-gray-200 text-sm"><?= $seasonal->getTitle(); ?></p>
              <div class="bg-gradient-to-t absolute inset-0 from-black/90"></div>
            </a>
          <?php endforeach; ?>
        </div>
        <div id="moree" class="inset-x-0 bottom-0 flex justify-center bg-gradient-to-t from-white pt-32 pb-8 pointer-events-none dark:from-[#121212] z-10 absolute"><button type="button" id="more" class="relative bg-[#202020] hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 text-sm text-white font-semibold h-12 px-6 rounded-md flex items-center dark:hover:bg-[#181818] pointer-events-auto">Show more...</button></div>
      </div>

      <div class="my-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
          <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Top Upcoming Anime</button>
          </li>
          <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Top Airing Anime</button>
          </li>
          <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
          </li>
          <li role="presentation">
            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
          </li>
        </ul>
      </div>
      <div id="myTabContent">
        <div class="hidden" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="relative">
            <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">Top Upcoming Anime</h4>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-5 h-full">
              <?php foreach (array_slice($topUpcoming->getResults(), 0, 5) as $index => $top) : ?>
                <a href="http://ev.jikan.test/view/anime/?mal=<?= $top->getMalId(); ?>" class="group flex max-w-full h-auto flex-col items-center overflow-hidden rounded-md shadow hover:bg-gray-100 dark:bg-[#181818] dark:hover:bg-[#202020] relative">
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium absolute right-3 top-3 z-10 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-indigo-400 border border-indigo-400">#<?= $index + 1 ?></span>
                  <img class="group-hover:scale-105 transition-transform object-cover w-full h-full bg-gray-900" src="<?= $top->getImages()->getWebp()->getLargeImageUrl() ?>" alt="">
                  <p class="absolute bottom-2 left-2 font-normal z-10 text-gray-700 dark:text-gray-200 text-sm"><?= $top->getTitle(); ?></p>
                  <div class="bg-gradient-to-t absolute inset-0 from-black/90"></div>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="hidden" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
          <div class="relative">
            <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">Top Airing Anime</h4>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-5 ">
              <?php foreach (array_slice($topAiring->getResults(), 0, 5) as $index => $top) : ?>
                <a href="http://ev.jikan.test/view/anime/?mal=<?= $top->getMalId(); ?>" class="group flex max-w-full h-auto flex-col items-center overflow-hidden rounded-md shadow hover:bg-gray-100 dark:bg-[#181818] dark:hover:bg-[#202020] relative">
                  <span class="bg-indigo-100 text-indigo-800 text-sm font-medium absolute right-3 top-3 z-10 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-indigo-400 border border-indigo-400">#<?= $index + 1 ?></span>
                  <img class="group-hover:scale-105 transition-transform object-cover w-full h-full bg-gray-900" src="<?= $top->getImages()->getWebp()->getLargeImageUrl() ?>" alt="">
                  <p class="absolute bottom-2 left-2 font-normal z-10 text-gray-700 dark:text-gray-200 text-sm"><?= $top->getTitle(); ?></p>
                  <div class="bg-gradient-to-t absolute inset-0 from-black/90"></div>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="hidden" id="settings" role="tabpanel" aria-labelledby="settings-tab">
          <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
          <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
        </div>
      </div>

    </section>
  </div>
</main>

<script>
  const btnMore = document.getElementById('more');
  const moreWrap = document.getElementById('moree');
  const moreContent = document.getElementById('seasonContent');
  const ssa = document.getElementById('cc')
  let hFull = true;

  btnMore.addEventListener('click', () => {
    hFull = !hFull; // Membalikkan nilai hFull
    const actionText = hFull ? "Show more..." : "Show less...";
    const cssClasses = {
      add: ["max-h-[27rem]", "pt-32", "bottom-0", "pb-24"],
      remove: ["-bottom-2"]
    };

    btnMore.textContent = actionText;
    moreContent.classList.toggle('max-h-[27rem]', hFull);
    ssa.classList.toggle('pb-24');
    moreWrap.classList.toggle('pt-32', hFull);
    moreWrap.classList.toggle('bottom-0', hFull);
    moreWrap.classList.toggle('-bottom-2', !hFull);
  });
</script>