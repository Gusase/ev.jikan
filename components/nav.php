<nav class="bg-white border-gray-200 z-20 dark:border-gray-600 dark:bg-transparent">
  <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
    <a href="#" class="flex items-center">
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Jikan API</span>
    </a>
    <button data-collapse-toggle="mega-menu-full" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu-full" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
    <div id="mega-menu-full" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
      <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
        </li>
        <li>
          <button id="mega-menu-full-dropdown-button" data-collapse-toggle="mega-menu-full-dropdown" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Anime <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg></button>
        </li>
    </div>
  </div>
  <div id="mega-menu-full-dropdown" class="bg-white hidden border-gray-700 shadow-sm border-y dark:bg-[#121212]/50 backdrop-blur-sm absolute top-[64px] inset-x-0 z-20 shadow-lg">
    <div class="grid max-w-screen-xl px-4 py-5 mx-auto text-gray-900 dark:text-white sm:grid-cols-2 md:grid-cols-3 md:gap-2 md:px-6">
      <ul aria-labelledby="mega-menu-full-dropdown-button">
        <li>
          <a href="#" class="block p-3 rounded-lg hover:bg-gray-50 bg-[#161616]/70 duration-150 dark:hover:bg-[#121212]">
            <div class="font-semibold">Seasional Anime</div>
            <span class="text-sm text-gray-500 dark:text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</span>
          </a>
        </li>
      </ul>
      <ul aria-labelledby="mega-menu-full-dropdown-button">
        <li>
          <a href="#" class="block p-3 rounded-lg hover:bg-gray-50 bg-[#161616]/70 duration-150 dark:hover:bg-[#121212]">
            <div class="font-semibold">Anime Search</div>
            <span class="text-sm text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet..</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>