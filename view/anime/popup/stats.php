<!-- Main modal -->
<div id="stats" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full dark:bg-[#121212]/40">
  <div class="relative w-full max-w-xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-[#202020]">
      <!-- Modal header -->
      <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          Statistics
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="stats">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-6 space-y-9">
        <div class="mb-3">
          <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Score</h4>
          <p class="text-gray-500 dark:text-gray-400">
            <?= $anim->getScore(); ?> <small>(scored by <?= (!is_null($anim->getScoredBy())) ? number_format($anim->getScoredBy()) : '-'; ?> users)</small>
          </p>
        </div>
        <div class="mb-3">
          <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Ranked</h4>
          <p class="text-gray-500 dark:text-gray-400">
            <?= $anim->getRank() ?? 'N/A' ?>
          </p>
        </div>
        <div class="mb-3">
          <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Popularity</h4>
          <p class="text-gray-500 dark:text-gray-400">
            <?= $anim->getPopularity() ?>
          </p>
        </div>
        <div class="mb-3">
          <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Members</h4>
          <p class="text-gray-500 dark:text-gray-400">
            <?= number_format($anim->getMembers()) ?>
          </p>
        </div>
        <div class="mb-3">
          <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Favorites</h4>
          <p class="text-gray-500 dark:text-gray-400">
            <?= number_format($anim->getFavorites()) ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>