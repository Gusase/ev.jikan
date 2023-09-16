
    <main>
      <div class="flex flex-col container p-10 items-center md:flex-row w-full mt-3">
        <div class="grow flex flex-col justify-between leading-normal self-start">
          <?php include_once '../../components/subnav.php' ?>
          <div class="flex space-x-3">
            <div class="w-[225px]">
              <img src="<?= $anim->getImages()->getWebp()->getLargeImageUrl(); ?>" alt="<?= $anim->getTitle(); ?>" title="<?= $anim->getTitle(); ?>" class="max-w-full h-auto">
            </div>
            <div class="w-full grow flex flex-col space-y-2">
              <div class="flex p-[10px] border dark:bg-[#181818] dark:border-[#272727]">
                <div class="max-w-fit text-center">
                  <div class="relative before:content-[attr(data-title)] before:px-2 before:py-0.5 before:text-xs before:text-white before:dark:bg-[#2551a2] before:rounded-sm before:uppercase after:-mt-3 after:font-light  after:content-[attr(data-user)] after:text-xs after:text-white" data-title="score" data-user="<?php echo (!is_null($anim->getScoredBy())) ? number_format($anim->getScoredBy()) : '-'; ?> users" title="indicates a weighted score. Please note that 'Not yet aired' titles are excluded.">
                    <div class="text-3xl dark:text-white font-bold leading-[0.8] mt-3"><?= $anim->getScore() ?? 'N/A' ?></div>
                  </div>
                </div>
                <div class="flex ml-5 flex-col relative before:h-full before:absolute dark:before:bg-[#252525] before:w-0.5">
                  <div class="text-white tracking-tight pl-5 mt-1 flex space-x-7">
                    <span class="text-lg" title="based on the top anime page. Please note that 'Not yet aired' and 'R18+' titles are excluded.">Ranked <strong>#<?= $anim->getRank() ?? 'N/A' ?></strong></span>
                    <span class="text-lg">Popularity <strong>#<?= $anim->getPopularity() ?></strong></span>
                    <span class="text-lg">Members <strong><?= number_format($anim->getMembers()) ?></strong></span>
                  </div>
                  <div class="flex space-x-2 text-xs ml-5 mt-auto">
                    <?php if (!is_null($anim->getPremiered())) : ?>
                      <span class="hover:underline hover:underline-offset-2 capitalize "><a href="https://myanimelist.net/anime/season/<?= $season->getSeasonYear() ?>/<?= $season->getSeasonName() ?>"><?= $anim->getPremiered(); ?></a></span>
                      <span class="h-full w-0.5 bg-[#252525] mx-5"></span>
                    <?php endif; ?>
                    <span class="hover:underline hover:underline-offset-2 capitalize "><a href="https://myanimelist.net/topanime.php?type=<?= $anim->getType(); ?>"><?= $anim->getType(); ?></a></span>
                    <span class="h-full w-0.5 bg-[#252525] mx-5"></span>
                    <?php foreach ($anim->getStudios() as $index => $studio) : ?>
                      <span class="hover:underline hover:underline-offset-2">
                        <a href="<?= $studio->getUrl(); ?>" title="<?= $studio->getName(); ?>"><?= $studio->getName(); ?></a>
                      </span>

                      <?php if ($index < count($anim->getStudios()) - 1) : ?>
                        ,
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <div class="flex px-[10px] py-[0.25rem] border dark:bg-[#181818] dark:border-[#272727] text-xs text-white">
                <select id="" class="inline-block rounded p-[4px] w-[100px] bg-[#353535]">
                  <option value="1">Watching</option>
                  <option selected="selected" value="2">Completed</option>
                  <option value="3">On-Hold</option>
                  <option value="4">Dropped</option>
                  <option value="6">Plan to Watch</option>
                </select>
              </div>
              <p class="inline-block text-[10px] text-red-500 dark:text-red-400">* Your list is public by default.</p>
            </div>
            <?php if (!empty($anim->getTrailer()->getEmbedUrl())) : ?>
              <div>
                <a href="<?= $anim->getTrailer()->getEmbedUrl(); ?>" rel="gallery" class="h-[133px] w-[200px] group inline-flex items-end shadow-xl relative rounded hover:brightness-125 duration-150 bg-[url('<?= $anim->getTrailer()->getImages()->getSmallImageUrl(); ?>')] bg-cover bg-center inline-block bg-no-repeat">
                  <div class="absolute inset-0 bg-gradient-to-t dark:from-black rounded">
                    <span class="h-full group-hover:scale-110 transition-scale grid place-items-center"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 16">
                        <path d="M0 .984v14.032a1 1 0 0 0 1.506.845l12.006-7.016a.974.974 0 0 0 0-1.69L1.506.139A1 1 0 0 0 0 .984Z" />
                      </svg></span>
                  </div>
                </a>
                <div class="flex justify-between items-center">
                  <span class="dark:text-gray-300 text-gray-800">Trailer</span><small><a href="?mal=<?= $anim->getMalId(); ?>&v=videos" class="hover:underline hover:underline hover:underline-offset-2">More videos</a></small>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <hr class="h-px my-4 max-w-screen-xl mx-auto bg-gray-200 border-0 dark:bg-gray-700">
      <!-- 
          another section
        -->
      <section class="container p-10 md:grid-cols-4 grid gap-5">
        <h4 class="text-xl mb-3 font-bold dark:text-white my-2 col-span-4">More detail</h4>
          <button data-modal-target="title" data-modal-toggle="title" data-modal="t" class="bg-gray-50 dark:bg-[#181818] dark:hover:bg-[#202020] duration-150 hover:scale[0.985] border border-gray-200 dark:border-[#272727] rounded-lg py-8 px-3">
              <h5 class="text-gray-900 dark:text-white text-xl font-semibold">Alternative Titles</h5>
          </button>
          <button data-modal-target="infor" data-modal-toggle="infor" data-modal="i" class="bg-gray-50 dark:bg-[#181818] dark:hover:bg-[#202020] duration-150 hover:scale[0.985] border border-gray-200 dark:border-[#272727] rounded-lg py-8 px-3">
              <h5 class="text-gray-900 dark:text-white text-xl font-semibold">Information</h5>
          </button>
          <button data-modal-target="stats" data-modal-toggle="stats" data-modal="s" class="bg-gray-50 dark:bg-[#181818] dark:hover:bg-[#202020] duration-150 hover:scale[0.985] border border-gray-200 dark:border-[#272727] rounded-lg py-8 px-3">
              <h5 class="text-gray-900 dark:text-white text-xl font-semibold">Statistics</h5>
          </button>
          <button data-modal-target="desc" data-modal-toggle="desc" data-modal="d" class="bg-gray-50 dark:bg-[#181818] dark:hover:bg-[#202020] duration-150 hover:scale[0.985] border border-gray-200 dark:border-[#272727] rounded-lg py-8 px-3">
              <h5 class="text-gray-900 dark:text-white text-xl font-semibold">Descriptions</h5>
          </button>
          <button data-modal-target="char" data-modal-toggle="char" class="bg-gray-50 dark:bg-[#181818] dark:hover:bg-[#202020] duration-150 hover:scale[0.985] border border-gray-200 dark:border-[#272727] rounded-lg py-8 px-3">
              <h5 class="text-gray-900 dark:text-white text-xl font-semibold">Characters & Voice Actors</h5>
          </button>
          <button data-modal-target="rel" data-modal-toggle="rel" class="bg-gray-50 dark:bg-[#181818] dark:hover:bg-[#202020] duration-150 hover:scale[0.985] border border-gray-200 dark:border-[#272727] rounded-lg py-8 px-3">
              <h5 class="text-gray-900 dark:text-white text-xl font-semibold">Related Anime</h5>
          </button>
          <button data-modal-target="thems" data-modal-toggle="thems" class="bg-gray-50 dark:bg-[#181818] dark:hover:bg-[#202020] duration-150 hover:scale[0.985] border border-gray-200 dark:border-[#272727] rounded-lg py-8 px-3">
              <h5 class="text-gray-900 dark:text-white text-xl font-semibold">Themes</h5>
          </button>
          <button data-modal-target="ava" data-modal-toggle="ava" class="bg-gray-50 dark:bg-[#181818] dark:hover:bg-[#202020] duration-150 hover:scale[0.985] border border-gray-200 dark:border-[#272727] rounded-lg py-8 px-3">
              <h5 class="text-gray-900 dark:text-white text-xl font-semibold">Available At</h5>
          </button>
          <button data-modal-target="res" data-modal-toggle="res" class="bg-gray-50 dark:bg-[#181818] dark:hover:bg-[#202020] duration-150 hover:scale[0.985] border border-gray-200 dark:border-[#272727] rounded-lg py-8 px-3">
              <h5 class="text-gray-900 dark:text-white text-xl font-semibold">Resources</h5>
          </button>
          <button data-modal-target="stream" data-modal-toggle="stream" class="bg-gray-50 dark:bg-[#181818] dark:hover:bg-[#202020] duration-150 hover:scale[0.985] border border-gray-200 dark:border-[#272727] rounded-lg py-8 px-3">
              <h5 class="text-gray-900 dark:text-white text-xl font-semibold">Streaming Platforms</h5>
          </button>
        </div>
      </section>

      <!-- modal section -->
      <div id="t" style="display: none;">
        <?php require "popup/title.php"; ?>
      </div>
      <div id="i" style="display: none;">
        <?php require "popup/info.php"; ?>
      </div>
      <div id="s" style="display: none;">
        <?php require "popup/stats.php"; ?>
      </div>
      <div id="d" style="display: none;">
        <?php require "popup/desc.php"; ?>
      </div>

      <hr class="h-px my-4 max-w-screen-xl mx-auto bg-gray-200 border-0 dark:bg-gray-700">
    </main>



    <script>
      // Add a click event listener to each button
document.querySelectorAll("[data-modal-toggle]").forEach(button => {
    button.addEventListener("click", () => {
        const target = button.getAttribute("data-modal");
        
        // Hide all divs with id starting with "popup-"
        document.querySelectorAll("div[id^='popup-']").forEach(div => {
            div.style.display = "none";
        });
        
        // Show the div with the corresponding id
        document.getElementById(target).style.display = "block";
    });
});

    </script>