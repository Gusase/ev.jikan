<?php
require __DIR__ . '../../vendor/autoload.php';

if (isset($_GET['q'])) {
  $id = $_GET['q'];
} else {
  header('Location: ../');
  exit;
}

$jikan = new Jikan\MyAnimeList\MalClient();

try {

  if (strlen($id) < 3 && strlen($id) >= 1) {
    throw new Exception("Must have at least 3 byte characters to search.");
  }

  if (strlen($id) > 100) {
    throw new Exception('Your search text must be no more than 100 characters in length. (' . strlen($id) . '/100)');
  }

  $anim = $jikan->getAnimeSearch(new \Jikan\Request\Search\AnimeSearchRequest($id));
  $coun = count($anim->getResults()) > 0 ? count($anim->getResults()) : null;

} catch (\Throwable $e) {
  $err = $e->getMessage();
}

?>

<?php if (!empty($err)) : ?>
  <div id="err" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-[#202020] dark:text-red-400" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Error</span>
    <div class="ml-3 text-sm font-medium">
      <?= $err; ?>
    </div>
  </div>
<?php endif; ?>

<div>
  <h4 class="text-xl mb-3 font-bold capitalize dark:text-white py-2 pl-1 sticky top-0 bg-[#121212]/85 backdrop-blur-sm z-10">Search Results</h4>

  <div class="grid grid-cols-1 gap-5 lg:gap-y-8 sm:grid-cols-2 lg:grid-cols-6">
    <?php if (!is_null($anim) && !is_null($coun)) :
      foreach ($anim->getResults() as $result) :  ?>
        <a href="http://ev.jikan.test/view/anime/?mal=<?= $result->getMalId(); ?>" class="w-full relative group overflow-hidden" title="<?= $result->getTitle() ?>">
          <img class="group-hover:scale-105 transition-transform object-cover w-[422px] h-[266px] bg-gray-900" src="<?= $result->getImages()->getWebp()->getLargeImageUrl() ?>" alt="">
          <p class="absolute bottom-2 left-1.5 font-normal z-10 text-gray-700 dark:text-gray-200 text-sm group-hover:underline group-hover:decoration-sky-500/60 underline-offset-4 group-hover:decoration-blue-600 group-hover:decoration-2"><?= $result->getTitle(); ?></p>
          <div class="bg-gradient-to-t absolute inset-0 from-black/90"></div>
        </a>
      <?php endforeach;
    else : ?>
      <div class="col-span-5 text-sm text-gray-400">No titles that matched your query were found.</div>
    <?php endif; ?>
  </div>
</div>