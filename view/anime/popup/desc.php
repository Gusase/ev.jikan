<!-- Main modal -->
<div id="desc" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full dark:bg-[#121212]/40">
  <div class="relative w-full max-w-7xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-[#202020]">
      <!-- Modal header -->
      <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          Descriptions
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="desc">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-6 space-y-9">
        <div class="mb-3">
          <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Synopsis</h4>
          <p class="text-gray-500 dark:text-gray-400">
            <?= $anim->getSynopsis(); ?>
          </p>
        </div>
        <div>
          <h4 class="text-xl font-semibold dark:text-white mb-2 before:content-['#']">&nbsp;Background</h4>
          <?php if ($anim->getBackground()) : ?>
            <p class="text-gray-500 dark:text-gray-400">
              <?= $anim->getBackground() ?>
            </p>
          <?php else : ?>
            <span class="mt-2 border-l-2 pl-2 border-gray-500 text-sm text-slate-700 dark:text-slate-300">
              No background information has been added to this title. Help improve our database by adding background information <a href="#" class="underline decoration-sky-500/60 underline-offset-4 hover:decoration-blue-600 hover:decoration-2">here</a>.
            </span>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>
</div>