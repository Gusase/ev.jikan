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
    <li class="mr-2">
      <a href="?mal=<?= $anim->getMalId(); ?>&v=pics" class="inline-block p-2 <?= (isset($active) && $active == 'pics') ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-gray-100 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'; ?>">Pictures</a>
    </li>
    <li class="mr-2">
      <a href="?mal=<?= $anim->getMalId(); ?>&v=news" class="inline-block p-2 <?= (isset($active) && $active == 'news') ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-gray-100 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'; ?>">News</a>
    </li>
    <li class="mr-2">
      <a href="?mal=<?= $anim->getMalId(); ?>&v=userrecs" class="inline-block p-2 <?= (isset($active) && $active == 'userrecs') ? 'text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-gray-100 dark:border-blue-500' : 'border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'; ?>">Recommendations</a>
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
    <li class="inline-flex items-center before:content-['>'] before:mr-2 before:mb-px">
      <div class="flex items-center">
        <a href="http://ev.jikan.eva/view/anime.php" class="ml-2 text-sm font-medium dark:text-sky-50 dark:hover:underline hover:underline-offset-2">Anime</a>
      </div>
    </li>
    <li class="inline-flex items-center before:content-['>'] before:mr-2 before:mb-px">
      <div>
        <span class="ml-2 text-sm leading-6 font-medium text-gray-500 dark:text-sky-50 w-10/12 dark:hover:underline hover:underline-offset-2 cursor-pointer"><?php echo (strlen($anim->getTitles()[0]->getTitle()) < 33) ? $anim->getTitle() : substr_replace($anim->getTitle(),'...',30) ?></span>
      </div>
    </li>
    <?php if(!empty($page['title'])) :?>
    <li class="inline-flex items-center before:content-['>'] before:mr-2 before:mb-px">
      <div class="flex items-center">
        <span class="ml-2 text-sm font-medium dark:text-sky-50 dark:hover:underline hover:underline-offset-2"> <?= mb_substr($page['title'],2) ?> </span>
      </div>
    </li>
    <?php endif; ?>
    <li>
  </ol>
</nav>