<?php

use Jikan\Request\Anime\AnimeCharactersAndStaffRequest;

$charactersAndStaff = $jikan->getAnimeCharactersAndStaff(
  (new AnimeCharactersAndStaffRequest($id))
);
$more = 5 ;
$active = 'characters'; ?>

<main>
  <div class="flex flex-col container p-10 items-center md:flex-row w-full mt-3">
    <div class="grow flex flex-col w-full md:w-auto justify-between leading-normal self-start">
      <?php include_once '../../components/subnav.php' ?>
      <div>
        <h4 class="text-xl mb-3 font-bold dark:text-white my-2">Characters & Voice Actors</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
          <?php foreach ($charactersAndStaff->getCharacters() as $char) : ?>
            <div class="max-w-full flex flex-col md:flex-row items-start bg-[#181818] hover:bg-[#232226] text-white rounded">
              <img src="<?= $char->getCharacter()->getImages()->getWebp()->getImageUrl(); ?>" class="object-cover shadow-[7px_10px_25px_-9px_rgba(0,0,0,0.8)] w-24 h-full" alt="">
              <div class="min-w-0 p-3">
                <div class="flex flex-col text-center md:text-left">
                  <a href=""><?= $char->getCharacter()->getName() ?></a>
                  <p class="text-sm mt-2"><?= $char->getRole(); ?></p>
                  <p class="text-sm text-gray-500"><?= $char->getFavorites(); ?></p>
                </div>
              </div>
              <div class="flex self-end -space-x-4 pb-3 pr-3" style="margin-inline-start: auto">
                <?php foreach ($char->getVoiceActors() as $indexVC => $item) : ?>
                  <?php if ($item->getLanguage() == 'Japanese') : ?>
                    <div>
                      <div id="tooltip-#<?= $indexVC ?>" role="tooltip" class="absolute z-10 invisible inline-block opacity-0 tooltip transition-opacity bg-gray-100 text-gray-800 text-xs font-medium mr-1 px-2 py-1 rounded border border-gray-700 dark:bg-[#181818] shadow-lg dark:text-gray-300 duration-150">
                        <?= $item->getPerson()->getName() . ' (' . $item->getLanguage() . ')' ?>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                      </div>
                      <img data-tooltip-target="tooltip-#<?= $indexVC ?>" class="cursor-pointer w-10 h-10 border-2 border-white object-cover rounded-full dark:border-gray-800" src="<?= $item->getPerson()->getImages()->getJpg()->getImageUrl() ?>" alt="">
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
          <?php foreach ($charactersAndStaff->getStaff() as $indexStaff => $staff) : ?>
            <div class="max-w-full flex flex-col md:flex-row items-start bg-[#181818] hover:bg-[#232226] group text-white rounded">
              <img src="<?= $staff->getPerson()->getImages()->getJpg()->getImageUrl() ?>" class="object-cover shadow-[7px_10px_25px_-9px_rgba(0,0,0,0.8)] w-24 h-full" alt="">
              <div class="min-w-0 p-3">
                <div class="flex flex-col text-center md:text-left">
                  <a href=""><?= $staff->getPerson()->getName() ?></a>
                  <div class="flex mt-2 flex-wrap gap-y-2">
                    <?php foreach ($staff->getPositions() as $indexPosition => $position) : ?>
                      <?= ($indexPosition < $more) ? "<span class='bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2 py-0.5 rounded border border-gray-700 dark:bg-[#202020] dark:group-hover:bg-[#181818] dark:text-gray-300'>$position</span>" : ''; ?>
                    <?php endforeach; ?>
                    <?php
                    $n = count($staff->getPositions()) - $more; // Menghitung jumlah posisi yang tersisa
                    if ($n > 0) :
                    ?>
                      <span class="text-gray-800 text-xs font-medium cursor-pointer hover:underline dark:text-gray-300 mt-1" data-tooltip-trigger="click" data-tooltip-target="staff-#<?= $indexStaff ?>">+<?= $n ?> more</span>
                      <div id="staff-#<?= $indexStaff ?>" role="tooltip" class="absolute z-10 invisible inline-block opacity-0 transition-opacity duration-150 tooltip">
                        <?php foreach (array_slice($staff->getPositions(), $more) as $morePosition) : ?>
                          <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-1 px-2 py-1 rounded border border-gray-700 dark:bg-[#181818] shadow-lg dark:text-gray-300"><?= $morePosition; ?></span>
                        <?php endforeach; ?>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                      </div>
                    <?php endif; ?>
                  </div>
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