<?php $active = 'videos'; ?>


<main>
  <div class="flex flex-col container p-10 items-center md:flex-row w-full mt-3">
    <div class="grow flex flex-col w-full md:w-auto leading-normal">
      <?php include_once '../../components/subnav.php' ?>
      <div>
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">episodes</h4>
        <?php if (count($videos->getEpisodes()) > 0)  : ?>
          <div class="grid grid-cols-1 md:grid-cols-4 gap-x-4 gap-y-6">
            <?php foreach (array_reverse($videos->getEpisodes()) as $index => $eps) : ?>
              <div>
                <a href="<?= $eps->getUrl() ?>" rel="gallery" class="h-40 w-full group inline-flex items-end shadow-xl relative rounded hover:brightness-125 duration-150 bg-[url('<?= $eps->getImages()->getJpg()->getImageUrl() ?>')] bg-cover bg-center inline-block bg-no-repeat">
                  <div class="absolute inset-0 bg-gradient-to-t dark:from-black rounded">
                    <span class="h-full group-hover:scale-110 transition-scale grid place-items-center"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                        <path d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                      </svg></span>
                  </div>
                </a>
                <div class="flex justify-between items-center row-reverse">
                  <span class="dark:text-gray-300 text-gray-800"><?= $eps->getTitle() ?></span>
                  <span class="text-sm">Epsiode <?= $index + 1 ?></span>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else : ?>
          <span class="mt-2 border-l-2 pl-2 border-gray-500 text-sm text-slate-700 dark:text-slate-400">No episode video has been added to this title.</span>
        <?php endif; ?>
      </div>
      <div class="mt-5">
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">music videos</h4>
        <?php if (count($videos->getMusicVideos()) > 0) : ?>
          <div class="grid grid-cols-1 md:grid-cols-4 gap-x-4 gap-y-6">
            <?php foreach ($videos->getMusicVideos() as $mv) : ?>
              <div>
                <a href="<?= $mv->getVideo()->getEmbedUrl() ?>" rel="gallery" class="h-40 w-full group inline-flex items-end shadow-xl relative rounded hover:brightness-125 duration-150 bg-[url('<?= $mv->getVideo()->getImages()->getImageUrl() ?>')] bg-cover bg-center inline-block bg-no-repeat">
                  <div class="absolute inset-0 bg-gradient-to-t dark:from-black rounded">
                    <span class="h-full group-hover:scale-110 transition-scale grid place-items-center"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                        <path d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                      </svg></span>
                  </div>
                </a>
                <div class="flex justify-between items-center row-reverse">
                  <span class="dark:text-gray-200 text-gray-800"><?= ($mv->getMeta()->getTitle()) ? $mv->getMeta()->getTitle() . ' by ': '' ?><?= $mv->getMeta()->getAuthor() ?></span>
                  <span class="text-sm"><?= $mv->getTitle() ?></span>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else : ?>
          <span class="mt-2 border-l-2 pl-2 border-gray-500 text-sm text-slate-700 dark:text-slate-400">No music video has been added to this title..</span>
        <?php endif; ?>
      </div>
      <div class="mt-5">
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">Promo videos</h4>
        <?php if (count($videos->getPromos()) > 0) : ?>
          <div class="grid grid-cols-1 md:grid-cols-4 gap-x-4 gap-y-6">
            <?php foreach ($videos->getPromos() as $promo) : ?>
              <div>
                <a href="<?= $promo->getTrailer()->getEmbedUrl() ?>" rel="gallery" class="h-40 w-full group inline-flex items-end shadow-xl relative rounded hover:brightness-125 duration-150 bg-[url('<?= $promo->getTrailer()->getImages()->getLargeImageUrl() ?>')] bg-cover bg-center inline-block bg-no-repeat">
                  <div class="absolute inset-0 bg-gradient-to-t dark:from-black rounded">
                    <span class="h-full group-hover:scale-110 transition-scale grid place-items-center"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                        <path d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                      </svg></span>
                  </div>
                </a>
                <div class="flex justify-between items-center row-reverse">
                  <span><?= $promo->getTitle() ?></span>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else : ?>
          <span class="mt-2 border-l-2 pl-2 border-gray-500 text-sm text-slate-700 dark:text-slate-400">No promotional video has been added to this title. Help improve our database by adding a promotional video <a href="#" class="underline decoration-sky-500/60 underline-offset-4 hover:decoration-blue-600 hover:decoration-2">here</a>.</span>
        <?php endif; ?>
      </div>
    </div>
  </div>
  </div>
</main>