<main>
  <div class="flex flex-col container p-10 items-center md:flex-row w-full mt-3">
    <div class="grow flex flex-col w-full md:w-auto justify-between leading-normal self-start">
      <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
          <li class="mr-2">
            <a href="http://ev.jikan.eva/" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Details</a>
          </li>
          <li class="mr-2">
            <a href="?v=characters" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Characters & Staff</a>
          </li>
          <li class="mr-2">
            <a href="?v=videos" class="inline-block p-2 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-gray-100 dark:border-blue-500">Videos</a>
          </li>
          <li class="mr-2">
            <a href="?v=episodes" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Episodes</a>
          </li>
        </ul>
      </div>
      <nav class="flex my-3">
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
          <li>
            <div class="flex items-center">
              >
              <span class="ml-2 text-sm font-medium text-gray-500 dark:text-sky-50 w-10/12 dark:hover:underline hover:underline-offset-2 cursor-pointer truncate"><?= $anim->getTitle() ?></span>
            </div>
          </li>
          <li>
            <div class="flex items-center">
              >
              <span class="ml-2 text-sm font-medium dark:text-sky-50 dark:hover:underline hover:underline-offset-2"> Videos </span>
            </div>
          </li>
          <li>
        </ol>
      </nav>
      <div>
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white my-2">episodes</h4>
        <?php if (count($videos->getEpisodes()) > 0) : ?>
          <div class="grid grid-cols-1 md:grid-cols-4 gap-x-4 gap-y-6">
            <?php foreach ($videos->getEpisodes() as $preview) : ?>
              <div>
                <a href="<?= $preview->getUrl() ?>" rel="gallery" class="h-40 w-full group inline-flex items-end shadow-xl relative rounded hover:brightness-125 duration-150 bg-[url('<?= $preview->getImages()->getJpg()->getImageUrl() ?>')] bg-cover bg-center inline-block bg-no-repeat">
                  <div class="absolute inset-0 bg-gradient-to-t dark:from-black rounded">
                    <span class="h-full group-hover:scale-110 transition-scale grid place-items-center"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                        <path d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                      </svg></span>
                  </div>
                </a>
                <div class="flex justify-between items-center">
                  <span class="dark:text-gray-300 text-gray-800"><?= $preview->getTitle() ?></span>
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
                  <span class="dark:text-gray-200 text-gray-800"><?= $mv->getMeta()->getAuthor() ?></span>
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