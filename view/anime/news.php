<?php

$news = $jikan->getNewsList(new \Jikan\Request\Anime\AnimeNewsRequest($id));
// var_dump($news->getResults()[1]);
// die;
$active = 'news'; ?>


<main>
  <div class="flex flex-col container p-10 items-center md:flex-row w-full mt-3">
    <div class="grow flex flex-col w-full md:w-auto justify-between leading-normal self-start">
      <?php include_once '../../components/subnav.php' ?>
      <div class="my-2">
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white">News</h4>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <?php foreach ($news->getResults() as $topic) : ?>
            <!-- echo $topic->getTitle() . "\n";
          echo $topic->getIntro();
getDate()->format('M d ,Y g:i A')
          echo "Author: " . ; -->
            <div class="max-w-sm relative bg-white rounded-lg shadow hover:bg-gray-100 dark:bg-gray-900 group">
              <a href="https://myanimelist.net/news/<?= $topic->getMalId() ?>">
                <?php if (!is_null($topic->getImages()->getJpg()->getImageUrl())) : ?>
                  <img class="object-cover w-full h-[411px] rounded-t-lg group-hover:brightness-105" src="<?= $topic->getImages()->getJpg()->getImageUrl(); ?>" alt="<?= mb_strtolower($topic->getTitle()) ?>">
                <?php else : ?>
                  <div class="relative inline-flex items-center justify-center w-full dark:text-slate-300 select-none h-96 bg-gray-100 dark:bg-gray-900">
                    <?= $topic->getAuthorUsername(); ?> didn't provide a pict
                  </div>
                <?php endif; ?>
              </a>
              <div class="absolute px-4 bottom-4 z-10 space-y-1">
                <a href="https://myanimelist.net/news/<?= $topic->getMalId() ?>" class="leading-tight text-lg md:text-xl font-bold text-gray-900 dark:text-white hover:underline decoration-2 decoration-blue-600">
                  <?= $topic->getTitle() ?>
                </a>
                <div class="block text-base flex flex-col space-y-1 items-start dark:text-gray-400 text-gray-700">
                  <span>By&nbsp;<a href="<?= $topic->getAuthorUrl(); ?>" class="underline decoration-sky-500/60 underline-offset-4 hover:decoration-blue-600 hover:decoration-2"><?= $topic->getAuthorUsername() ?></a></span>
                  <a href="<?= $topic->getForumUrl() ?>" class="text-sm underline decoration-sky-500/60 underline-offset-4 hover:decoration-blue-600 hover:decoration-2"> Discuss (<?= $topic->getComments() ?> comments)</a>
                </div>
              </div>
              <div class="bg-gradient-to-t from-gray-50 dark:from-[#121212] w-full h-full absolute top-0 left-0 z-0"></div>
            </div>
          <?php endforeach; ?>
        </div>


      </div>
    </div>
  </div>
</main>