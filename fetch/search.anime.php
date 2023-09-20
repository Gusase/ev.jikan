<?php
require __DIR__ . '../../vendor/autoload.php';

if (isset($_GET['q'])) {
  $id = $_GET['q'];
} else {
  header('Location: ../');
  exit;
}

$jikan = new Jikan\MyAnimeList\MalClient();
$anim = null;

try {

  if (strlen($id) < 3 && strlen($id) >= 1) {
    throw new Exception("Must have at least 3 byte characters to search.");
  }

  $anim = $jikan->getAnimeSearch(new \Jikan\Request\Search\AnimeSearchRequest($id));

  var_dump(count($anim->getResults()));
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

  <?php if (!is_null($anim)) : ?>
    <?php if (!empty($anim->getResults())) {
      var_dump($anim->getResults());
    }else{
      echo 'No titles that matched your query were found.';
    } ?>
  <?php else : ?>
    No titles that matched your query were found.
  <?php endif; ?>
</div>