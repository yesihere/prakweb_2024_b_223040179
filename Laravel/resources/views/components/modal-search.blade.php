<!-- Search button -->
<div x-data="{ searchOpen: false }">
    <!-- Button -->
    <button
        class="flex items-center justify-center w-8 h-8 rounded-full hover:bg-gray-100 lg:hover:bg-gray-200 dark:hover:bg-gray-700/50 dark:lg:hover:bg-gray-800"
        :class="{ 'bg-gray-200 dark:bg-gray-800': searchOpen }"
        @click.prevent="searchOpen = true;if (searchOpen) $nextTick(()=>{$refs.searchInput.focus()});"
        aria-controls="search-modal">
        <span class="sr-only">Search</span>
        <svg class="fill-current text-gray-500/80 dark:text-gray-400/80" width="16" height="16" viewBox="0 0 16 16"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7ZM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5Z" />
            <path d="m13.314 11.9 2.393 2.393a.999.999 0 1 1-1.414 1.414L11.9 13.314a8.019 8.019 0 0 0 1.414-1.414Z" />
        </svg>
    </button>
    <!-- Modal backdrop -->
    <div class="fixed inset-0 z-50 transition-opacity bg-gray-900 bg-opacity-30" x-show="searchOpen"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-out duration-100"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" aria-hidden="true" x-cloak></div>
    <!-- Modal dialog -->
    <div id="search-modal"
        class="fixed inset-0 z-50 flex items-start justify-center px-4 mb-4 overflow-hidden top-20 sm:px-6"
        role="dialog" aria-modal="true" x-show="searchOpen" x-transition:enter="transition ease-in-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4" x-cloak>
        <div class="w-full max-w-2xl max-h-full overflow-auto bg-white border border-transparent rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700/60"
            @click.outside="searchOpen = false" @keydown.escape.window="searchOpen = false">
            <!-- Search form -->
            <form class="border-b border-gray-200 dark:border-gray-700/60">
                <div class="relative">
                    <label for="modal-search" class="sr-only">Search</label>
                    <input id="modal-search"
                        class="w-full py-3 pl-10 pr-4 placeholder-gray-400 bg-white border-0 appearance-none dark:text-gray-300 dark:bg-gray-800 focus:ring-transparent dark:placeholder-gray-500"
                        type="search" placeholder="Search Your Article…" name="search" x-ref="searchInput" />
                    <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                        <svg class="ml-4 mr-2 text-gray-400 fill-current shrink-0 dark:text-gray-500 group-hover:text-gray-500 dark:group-hover:text-gray-400"
                            width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7ZM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5Z" />
                            <path
                                d="m13.314 11.9 2.393 2.393a.999.999 0 1 1-1.414 1.414L11.9 13.314a8.019 8.019 0 0 0 1.414-1.414Z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
