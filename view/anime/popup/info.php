<!-- Main modal -->
<div id="infor" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full dark:bg-[#121212]/40">
  <div class="relative w-full max-w-xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-[#202020]">
      <!-- Modal header -->
      <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          Information
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="infor">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-6 space-y-9">
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Type</h4>
            <p class="text-gray-500 dark:text-gray-400">
              <?= $anim->getType(); ?>
            </p>
          </div>
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Episodes</h4>
            <p class="text-gray-500 dark:text-gray-400">
              <?= $anim->getEpisodes() ?? 'N/A'?>
            </p>
          </div>
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Status</h4>
            <p class="text-gray-500 dark:text-gray-400">
              <?= $anim->getStatus() ?? 'N/A'?>
            </p>
          </div>
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Aired</h4>
            <p class="text-gray-500 dark:text-gray-400">
              <?= $anim->getAired() ?? 'N/A'?>
            </p>
          </div>
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Premiered</h4>
            <p class="text-gray-500 dark:text-gray-400">
              <?= $anim->getPremiered() ?? 'N/A'?>
            </p>
          </div>
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Broadcast</h4>
            <p class="text-gray-500 dark:text-gray-400">
              <?= $anim->getBroadcast() ?? 'N/A'?>
            </p>
          </div>
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Producers</h4>
            <?php foreach($anim->getProducers() as $index => $producer) :?>
              <span class="hover:underline hover:underline-offset-2">
                <a href="<?= $producer->getUrl(); ?>">
                  <?= $producer->getName(); ?>
                </a>
              </span>

              <?php if($index < count($anim->getProducers()) - 1): ?>
              ,
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Studios</h4>
            <?php foreach($anim->getStudios() as $index => $studio) :?>
              <span class="hover:underline hover:underline-offset-2">
                <a href="<?= $studio->getUrl(); ?>">
                  <?= $studio->getName(); ?>
                </a>
              </span>

              <?php if($index < count($anim->getStudios()) - 1): ?>
              ,
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Source</h4>
            <p class="text-gray-500 dark:text-gray-400">
              <?= $anim->getSource() ?>
            </p>
          </div>
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Themes</h4>
            <?php foreach($anim->getThemes() as $index => $theme) :?>
              <span class="hover:underline hover:underline-offset-2">
                <a href="<?= $theme->getUrl(); ?>">
                  <?= $theme->getName(); ?>
                </a>
              </span>

              <?php if($index < count($anim->getThemes()) - 1): ?>
              ,
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Genres</h4>
            <?php foreach($anim->getGenres() as $index => $genre) :?>
              <span class="hover:underline hover:underline-offset-2">
                <a href="<?= $genre->getUrl(); ?>">
                  <?= $genre->getName(); ?>
                </a>
              </span>

              <?php if($index < count($anim->getGenres()) - 1): ?>
              ,
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Duration</h4>
            <p class="text-gray-500 dark:text-gray-400">
              <?= $anim->getDuration() ?>
            </p>
          </div>
        <div class="mb-3">
            <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Rating</h4>
            <p class="text-gray-500 dark:text-gray-400">
              <?= $anim->getRating() ?>
            </p>
          </div>
      </div>
    </div>
  </div>
</div>