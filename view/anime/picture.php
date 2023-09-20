<?php $active = 'pics'; ?>


<main>
  <div class="flex flex-col container p-10 items-center md:flex-row w-full mt-3">
    <div class="grow flex flex-col w-full md:w-auto justify-between leading-normal self-start">
      <?php include_once '../../components/subnav.php' ?>
      <div class="flex items-center my-2">
        <h4 class="text-xl mb-3 font-bold capitalize dark:text-white">Pictures</h4>
        <a href="https://myanimelist.net/dbchanges.php?aid=<?= $anim->getMalId(); ?>&t=pic" class="ml-auto text-sm underline decoration-sky-500/60 underline-offset-4 hover:decoration-blue-600 hover:decoration-2">Add a picture</a>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <?php foreach ($pics as $picture) : ?>
          <a href="<?= $picture->getWebp()->getImageUrl(); ?>" class="rounded-lg hover:brightness-105">
            <img src="<?= $picture->getWebp()->getLargeImageUrl(); ?>" class="h-auto max-w-full rounded-lg mx-auto bg-gray-900" alt="">
          </a>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</main>