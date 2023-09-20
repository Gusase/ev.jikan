<?php $stats = $jikan->getAnimeStats((new \Jikan\Request\Anime\AnimeStatsRequest($id)));
$active = 'stats' ?>

<main>
  <div class="flex flex-col container p-10 items-center md:flex-row w-full mt-3">
    <div class="grow flex flex-col w-full md:w-auto leading-normal">
      <?php include_once '../../components/subnav.php' ?>
      <div>
        <h4 class="text-xl mb-3 font-bold my-2 capitalize dark:text-white">Summary Stats</h4>
        <div class="space-y-2">
          <p class="text-gray-500 dark:text-gray-400"><span class="font-medium text-gray-900 dark:text-white">Watching: </span> <?= number_format($stats->getWatching()) ?></p>
          <p class="text-gray-500 dark:text-gray-400"><span class="font-medium text-gray-900 dark:text-white">Completed: </span> <?= number_format($stats->getCompleted()) ?></p>
          <p class="text-gray-500 dark:text-gray-400"><span class="font-medium text-gray-900 dark:text-white">On-Hold: </span> <?= number_format($stats->getOnHold()) ?></p>
          <p class="text-gray-500 dark:text-gray-400"><span class="font-medium text-gray-900 dark:text-white">Dropped: </span> <?= number_format($stats->getDropped()) ?></p>
          <p class="text-gray-500 dark:text-gray-400"><span class="font-medium text-gray-900 dark:text-white">Plan to Watch: </span> <?= number_format($stats->getPlanToWatch()) ?></p>
          <p class="text-gray-500 dark:text-gray-400"><span class="font-medium text-gray-900 dark:text-white">Total: </span> <?= number_format($stats->getTotal()) ?></p>
        </div>
      </div>
      <div class="mt-3">
        <h4 class="text-xl mb-3 font-bold my-2 capitalize dark:text-white">Score Stats</h4>
        <?php foreach (array_reverse($stats->getScores()) as $statistic) : ?>
          <?php if (!empty($statistic->getVotes())) : ?>
            <div class="flex mb-3 items-center">
              <div class="text-base font-semibold mr-1 w-5 text-gray-900 dark:text-white">
                <?= $statistic->getScore(); ?>
              </div>
              <div class="bg-indigo-600 h-4 dark:bg-indigo-500 text-xs font-medium text-blue-100 text-center py-0.5 mr-3 leading-none" style="width: <?= $statistic->getPercentage(); ?>%"></div>
              <div class="text-base font-medium"><span class="dark:text-white"><?= $statistic->getPercentage(); ?>%</span> <small>(<?= $statistic->getVotes() ?> votes)</small></div>
            </div>
          <?php endif ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</main>