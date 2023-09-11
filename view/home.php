<main>
  <div class="flex flex-col container p-10 items-center md:flex-row w-full mt-3">
    <div class="grow flex flex-col justify-between leading-normal self-start">
      <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
          <li class="mr-2">
            <a href="http://ev.jikan.eva/" class="inline-block p-2 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-gray-100 dark:border-blue-500">Details</a>
          </li>
          <li class="mr-2">
            <a href="?v=characters" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Characters & Staff</a>
          </li>
          <li class="mr-2">
            <a href="?v=videos" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Videos</a>
          </li>
          <li class="mr-2">
            <a href="?v=episodes" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Episodes</a>
          </li>
        </ul>
      </div>
      <nav class="flex my-3">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="#" class="inline-flex items-center text-sm font-medium dark:text-sky-50 dark:hover:underline hover:underline-offset-2">
              Top
            </a>
          </li>
          <li>
            <div class="flex items-center">
              >
              <a href="#" class="ml-2 text-sm font-medium dark:text-sky-50 dark:hover:underline hover:underline-offset-2">Anime</a>
            </div>
          </li>
          <li>
            <div class="flex items-center">
              >
              <span class="ml-2 text-sm font-medium text-gray-500 dark:text-sky-50 w-10/12 dark:hover:underline hover:underline-offset-2 cursor-pointer truncate"><?= $anim->getTitle() ?></span>
            </div>
          </li>
        </ol>
      </nav>
      <div class="flex space-x-3">
        <div class="w-full grow flex flex-col space-y-2">
          <div class="flex p-[10px] border dark:bg-[#181818] dark:border-[#272727]">
            <div class="max-w-fit text-center">
              <div class="relative before:content-[attr(data-title)] before:px-2 before:py-0.5 before:text-xs before:text-white before:dark:bg-[#2551a2] before:rounded-sm before:uppercase after:-mt-3 after:font-light  after:content-[attr(data-user)] after:text-xs after:text-white" data-title="score" data-user="<?= number_format($anim->getScoredBy()); ?> users" title="indicates a weighted score. Please note that 'Not yet aired' titles are excluded.">
                <div class="text-3xl dark:text-white font-bold leading-[0.8] mt-3"><?= $anim->getScore() ?></div>
              </div>
            </div>
            <div class="flex ml-5 flex-col relative before:h-full before:absolute dark:before:bg-[#252525] before:w-0.5">
              <div class="text-white tracking-tight pl-5 mt-1 flex space-x-7">
                <span class="text-lg" title="based on the top anime page. Please note that 'Not yet aired' and 'R18+' titles are excluded.">Ranked <strong>#<?= $anim->getRank(); ?></strong></span>
                <span class="text-lg">Popularity <strong>#<?= $anim->getPopularity() ?></strong></span>
                <span class="text-lg">Members <strong><?= number_format($anim->getMembers()) ?></strong></span>
              </div>
              <div class="flex space-x-2 text-xs ml-5 mt-auto">
                <?php if (!empty($anim->getPremiered())) : ?>
                  <span class="hover:underline hover:underline-offset-2 capitalize "><a href="https://myanimelist.net/anime/season/1995/fall"><?= $anim->getPremiered(); ?></a></span>
                  <span class="h-full w-0.5 bg-[#252525] mx-5"></span>
                <?php endif; ?>
                <span class="hover:underline hover:underline-offset-2 capitalize "><a href="https://myanimelist.net/topanime.php?type=<?= $anim->getType(); ?>"><?= $anim->getType(); ?></a></span>
                <span class="h-full w-0.5 bg-[#252525] mx-5"></span>
                <?php foreach ($anim->getStudios() as $index => $studio) : ?>
                  <span class="hover:underline hover:underline-offset-2">
                    <a href="<?= $studio->getUrl(); ?>" title="<?= $studio->getName(); ?>"><?= $studio->getName(); ?></a>
                  </span>

                  <?php if ($index < count($anim->getStudios()) - 1) : ?>
                    ,
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="flex px-[10px] py-[0.25rem] border dark:bg-[#181818] dark:border-[#272727] text-xs text-white">
            <select id="" class="inline-block rounded p-[4px] w-[100px] bg-[#353535]">
              <option value="1">Watching</option>
              <option selected="selected" value="2">Completed</option>
              <option value="3">On-Hold</option>
              <option value="4">Dropped</option>
              <option value="6">Plan to Watch</option>
            </select>
          </div>
          <p class="inline-block text-[10px] text-red-500 dark:text-red-400">* Your list is public by default.</p>
        </div>
        <?php if (!empty($anim->getTrailer()->getEmbedUrl())) : ?>
          <div>
            <a href="<?= $anim->getTrailer()->getEmbedUrl(); ?>" rel="gallery" class="h-[133px] w-[200px] group inline-flex items-end shadow-xl relative rounded hover:brightness-125 duration-150 bg-[url('<?= $anim->getTrailer()->getImages()->getSmallImageUrl(); ?>')] bg-cover bg-center inline-block bg-no-repeat">
              <div class="absolute inset-0 bg-gradient-to-t dark:from-black rounded">
                <span class="h-full group-hover:scale-110 transition-scale grid place-items-center"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                    <path d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                  </svg></span>
              </div>
            </a>
            <div class="flex justify-between items-center">
              <span class="dark:text-gray-300 text-gray-800">Trailer</span><small><a href="" class="hover:underline hover:underline hover:underline-offset-2">More videos</a></small>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <hr class="h-px my-4 max-w-screen-xl mx-auto bg-gray-200 border-0 dark:bg-gray-700">
  <!-- 
      another section
    -->
  <section class="container p-10">
    <img src="<?= $anim->getImages()->getWebp()->getLargeImageUrl() ?>" alt="" class="object-cover w-full h-96 md:h-auto md:w-48 float-left mr-4">
    <div class="mb-3">
      <h4 class="text-xl font-bold dark:text-white mb-1">Synopsis</h4>
      <p class="text-gray-500 text-sm dark:text-gray-400">
        <?= $anim->getSynopsis(); ?>
      </p>
    </div>
    <div>
      <h4 class="text-xl font-bold dark:text-white mb-3">Background</h4>
      <?php if ($anim->getBackground()) : ?>
        <p class="text-gray-500 text-sm dark:text-gray-400">
          <?= $anim->getBackground() ?>
        </p>
      <?php else : ?>
        <span class="mt-2 border-l-2 pl-2 border-gray-500 text-sm text-slate-700 dark:text-slate-400">
        No background information has been added to this title. Help improve our database by adding background information <a href="#" class="underline decoration-sky-500/60 underline-offset-4 hover:decoration-blue-600 hover:decoration-2">here</a>.
        </span>
      <?php endif; ?>
    </div>
  </section>
</main>