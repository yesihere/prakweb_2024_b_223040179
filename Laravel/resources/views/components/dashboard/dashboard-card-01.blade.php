<div class="bg-white shadow-sm dark:bg-gray-800 rounded-xl">
    <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
        <h2 class="font-semibold text-gray-800 dark:text-gray-100">My Posts</h2>
    </header>
    <div class="p-3">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <!-- Table header -->
                <thead
                    class="text-xs font-semibold text-gray-400 uppercase dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50">
                    {{ $headTitle }}
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </div>
</div>
