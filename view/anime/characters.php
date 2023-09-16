<?php

use Jikan\Request\Anime\AnimeCharactersAndStaffRequest;

$charactersAndStaff = $jikan->getAnimeCharactersAndStaff(
  (new AnimeCharactersAndStaffRequest($id))
);

$active = 'characters'; ?>

<main>
  <div class="flex flex-col container p-10 items-center md:flex-row w-full mt-3">
    <div class="grow flex flex-col w-full md:w-auto justify-between leading-normal self-start">
      <?php include_once '../../components/subnav.php' ?>
      <div>
        <h4 class="text-xl mb-3 font-bold dark:text-white my-2">Characters & Voice Actors</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
          <?php foreach ($charactersAndStaff->getCharacters() as $char) : ?>
            <div class="max-w-full flex flex-col md:flex-row items-center space-x-3 p-3 bg-[#181818] dark:hover:bg-[#202020] text-white rounded">
              <img src="<?= $char->getCharacter()->getImages()->getWebp()->getImageUrl(); ?>" class="object-cover w-24 h-24 rounded-full object-center" alt="">
              <div class="flex flex-col text-center md:text-left">
                <a href=""><?= $char->getCharacter()->getName() ?></a>
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
            <div class="max-w-full flex flex-col md:flex-row items-center space-x-3 p-3 bg-[#181818] dark:hover:bg-[#202020] text-white rounded">
              <img src="<?= $staff->getPerson()->getImages()->getJpg()->getImageUrl() ?>" class="object-cover w-24 h-24 rounded-full object-center" alt="">
              <div class="flex flex-col text-center md:text-left">
                <a href=""><?= $staff->getPerson()->getName() ?></a>
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