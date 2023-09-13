<div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700 sticky top-0 w-full z-20 bg-[#121212]/90 backdrop-blur-sm">
  <ul class="flex flex-wrap -mb-px capitalize">
    <li class="mr-2">
      <a href="?mal=<?= $anim->getMalId(); ?>" class="inline-block p-2 <?= (isset($active) && $active == 'home') ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-gray-100 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'; ?>">Details</a>
    </li>
    <li class="mr-2">
      <a href="?mal=<?= $anim->getMalId(); ?>&v=characters" class="inline-block p-2 <?= (isset($active) && $active == 'characters') ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-gray-100 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'; ?>">Characters & Staff</a>
    </li>
    <li class="mr-2">
      <a href="?mal=<?= $anim->getMalId(); ?>&v=videos" class="inline-block p-2 <?= (isset($active) && $active == 'videos') ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-gray-100 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'; ?>">Videos</a>
    </li>
    <li class="mr-2">
      <a href="?mal=<?= $anim->getMalId(); ?>&v=episodes" class="inline-block p-2 <?= (isset($active) && $active == 'episodes') ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-gray-100 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'; ?>">Episodes</a>
    </li>
    <li class="mr-2">
      <a href="?mal=<?= $anim->getMalId(); ?>&v=stats" class="inline-block p-2 <?= (isset($active) && $active == 'stats') ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-gray-100 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'; ?>">stats</a>
    </li>
    <li class="mr-2">
      <a href="?mal=<?= $anim->getMalId(); ?>&v=reviews" class="inline-block p-2 <?= (isset($active) && $active == 'reviews') ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-gray-100 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'; ?>">reviews</a>
    </li>
  </ul>
</div>