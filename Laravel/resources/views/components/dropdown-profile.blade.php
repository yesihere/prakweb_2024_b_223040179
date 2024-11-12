<div class="relative inline-flex" x-data="{ open: false }">
    <button class="inline-flex items-center justify-center group" aria-haspopup="true" @click.prevent="open = !open"
        :aria-expanded="open">
        <img class="w-8 h-8 rounded-full"
            src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
            alt="{{ request()->user()->name }}">
    </button>
    <div class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 py-1.5 rounded-lg shadow-lg overflow-hidden mt-1 right-0"
        @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
        x-transition:enter="transition ease-out duration-200 transform"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" x-cloak>
        <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-gray-200 dark:border-gray-700/60">
            <div class="font-medium text-gray-800 dark:text-gray-100">{{ request()->user()->name }}</div>
            <div class="text-xs italic text-gray-500 dark:text-gray-400">Administrator</div>
        </div>
        <ul>
            <li>
                @if (request()->is('dashboard*'))
                    <a class="flex items-center px-3 py-1 text-sm font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                        href="/" @click="open = false" @focus="open = true" @focusout="open = false">Home</a>
                @else
                    <a class="flex items-center px-3 py-1 text-sm font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                        href="/dashboard/posts" @click="open = false" @focus="open = true"
                        @focusout="open = false">Dashboard</a>
                @endif
            </li>
            <li>
                <form method="POST" action="/logout" x-data>
                    @csrf

                    <button
                        class="flex items-center px-3 py-1 text-sm font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                        @click.prevent="$root.submit();" @focus="open = true" @focusout="open = false">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
