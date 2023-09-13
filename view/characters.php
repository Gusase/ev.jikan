<main>
  <div class="flex flex-col container p-10 items-center md:flex-row w-full mt-3">
    <div class="grow flex flex-col w-full md:w-auto justify-between leading-normal self-start">
      <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
          <li class="mr-2">
            <a href="http://ev.jikan.eva/" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Details</a>
          </li>
          <li class="mr-2">
            <a href="#" class="inline-block p-2 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-gray-100 dark:border-blue-500">Characters & Staff</a>
          </li>
          <li class="mr-2">
            <a href="#" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Videos</a>
          </li>
          <li class="mr-2">
            <a href="#" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Stats</a>
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
              <span class="ml-2 text-sm font-medium dark:text-sky-50 dark:hover:underline hover:underline-offset-2"> Characters & Staff </span>
            </div>
          </li>
          <li>
        </ol>
      </nav>
      <div>
        <h4 class="text-xl mb-3 font-bold dark:text-white my-2">Characters & Voice Actors</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
          <?php foreach ($charactersAndStaff->getCharacters() as $char) : ?>
            <div class="max-w-full flex flex-col md:flex-row items-center space-x-3 p-3 bg-gray-800/80 text-white rounded">
              <img src="<?= $char->getCharacter()->getImages()->getWebp()->getImageUrl(); ?>" class="object-cover w-24 h-24 rounded-full object-center" alt="">
              <div class="flex flex-col text-center md:text-left">
                <p><?= $char->getCharacter()->getName() ?></p>
                <p class="text-sm mt-2"><?= $char->getRole(); ?></p>
                <p class="text-sm text-gray-500"><?= $char->getFavorites(); ?></p>
              </div>
              <div class="flex self-end -space-x-4" style="margin-inline-start: auto">
                <?php foreach ($char->getVoiceActors() as $key => $item) : ?>
                  <?php if ($item->getLanguage() == 'Japanese') : ?>
                    <div>
                      <div id="tooltip-#<?= $item->getPerson()->getMalId() ?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        <?= $item->getPerson()->getName() . ' (' . $item->getLanguage() . ')' ?>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                      </div>
                      <img data-tooltip-target="tooltip-#<?= $item->getPerson()->getMalId() ?>" class="w-10 h-10 border-2 border-white object-cover rounded-full dark:border-gray-800" src="<?= $item->getPerson()->getImages()->getJpg()->getImageUrl() ?>" alt="">
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="mt-5">
        <h4 class="text-xl mb-3 font-bold dark:text-white my-2">Staff</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
          <?php foreach ($charactersAndStaff->getStaff() as $staff) : ?>
            <div class="max-w-full flex flex-col md:flex-row items-center space-x-3 p-3 bg-gray-800/80 text-white rounded">
              <img src="<?= $staff->getPerson()->getImages()->getJpg()->getImageUrl() ?>" class="object-cover w-24 h-24 rounded-full object-center" alt="">
              <div class="flex flex-col text-center md:text-left">
                <p><?= $staff->getPerson()->getName() ?></p>
                <div class="flex">
                  <?php foreach ($staff->getPositions() as $pos => $position) : ?>
                    <span class="text-sm"><?= $position ?><?php if ($pos < count($staff->getPositions()) - 1) : ?>,&nbsp;<?php endif; ?></span>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  </div>
</main>