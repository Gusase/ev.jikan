<?php

use Jikan\Request\Anime\AnimeEpisodesRequest;

$episodes = $jikan->getAnimeEpisodes(
  (new AnimeEpisodesRequest($id))
);

$active = 'episodes' ?>

<main>
  <div class="flex flex-col container p-10 items-center md:flex-row w-full mt-3">
    <div class="grow flex flex-col w-full md:w-auto justify-between leading-normal self-start">
      <?php include_once '../../components/subnav.php' ?>
      <div>
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">Episodes <span class="text-sm text-gray-300 font-medium">(<?= (!empty($episodes->getResults())) ? count($episodes->getResults()) : '0' ?>/<?= (!empty($episodes->getResults())) ? count($episodes->getResults()) : 'Unknown'?>)</span></h4>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <?php if (count($episodes->getResults()) > 0) : ?>
            <table class="w-full text-sm text-left table-auto text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-[#121212] dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3 border-b dark:border-gray-800 text-slate-400 dark:text-slate-200">
                    <svg class="w-3 h-3 ml-1.5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                    </svg>
                  </th>
                  <th scope="col" class="px-6 py-3 border-b dark:border-gray-800 text-slate-400 dark:text-slate-200">
                    Episode Title
                  </th>
                  <th scope="col" class="px-6 py-3 border-b dark:border-gray-800 text-slate-400 dark:text-slate-200">
                    Aired
                  </th>
                  <th scope="col" class="px-6 py-3 border-b dark:border-gray-800 text-slate-400 dark:text-slate-200">
                    <div class="flex items-center">
                      Poll
                      <a href="#"><svg class="w-3 h-3 ml-1.5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                        </svg></a>
                    </div>
                  </th>
                  <th scope="col" class="px-6 py-3 border-b dark:border-gray-800 text-slate-400 dark:text-slate-200">
                    <div class="flex items-center">
                      Replies
                      <a href="#"><svg class="w-3 h-3 ml-1.5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                        </svg></a>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($episodes->getResults() as $index => $eps) : ?>
                  <tr class="border-b border-[#262626] odd:bg-[#181818]">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      <?= $index + 1 ?>
                    </th>
                    <td class="px-6 py-4">
                      <div class="inline-flex flex-col space-y-1">
                        <a href="<?= $eps->getUrl() ?>" class="max-w-fit font-semibold decoration-sky-500/60 text-gray-200 hover:text-white underline-offset-4 hover:underline hover:decoration-blue-600 hover:decoration-2"><?= $eps->getTitle(); ?></a>
                        <?php if (!empty($eps->getTitleRomanji())) : ?>
                          <span class="text-sm"><?= $eps->getTitleRomanji(); ?> (<?= $eps->getTitleJapanese(); ?>)</span>
                        <?php endif; ?>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <?= (!empty($eps->getAired())) ? $eps->getAired()->format('M d, Y') : 'N/A'; ?>
                    </td>
                    <td class="px-6 py-4">
                    </td>
                    <td class="px-6 py-4 text-right">
                      <svg class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z" />
                      </svg>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else : ?>
            <span class="mt-2 border-l-2 pl-2 border-gray-500 text-sm text-slate-700 dark:text-slate-400">No episode information has been added to this title. Help improve our database by adding episode information <a href="" class="underline decoration-sky-500/60 underline-offset-4 hover:decoration-blue-600 hover:decoration-2">here</a>.</span>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>
  </div>
</main>