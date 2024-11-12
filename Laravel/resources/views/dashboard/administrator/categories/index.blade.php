<x-dashboard.layout>
    <x-slot:title>Post Categories</x-slot:title>

    <div class="col-span-full">
        <a href="/dashboard/administrator/categories/create"
            class="text-white w-44 mb-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex justify-center items-center gap-2"><svg
                class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                    clip-rule="evenodd" />
            </svg>
            New Category</a>
        @if (session('success'))
            <x-alert color='green'>
                {{ session('success') }}
            </x-alert>
        @endif
        <x-dashboard.dashboard-card-01>
            <x-slot:headTitle>
                <tr>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-center">#</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-left">Category</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-center">Color</div>
                    </th>
                    <th class="p-2 whitespace-nowrap">
                        <div class="font-semibold text-center">Action</div>
                    </th>
                </tr>
            </x-slot:headTitle>
            @foreach ($categories as $category)
                <tr>
                    <td class="p-2 whitespace-nowrap">
                        <div class="font-medium text-center">{{ $loop->iteration }}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="font-medium text-left">{{ $category->name }}</div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="font-medium text-center">
                            <x-dashboard.categoryLabel :color="$category->color"></x-dashboard.categoryLabel>
                        </div>
                    </td>
                    <td class="p-2 whitespace-nowrap">
                        <div class="flex justify-center font-medium flex-nowrap">
                            <a href="/dashboard/administrator/categories/{{ $category->slug }}/edit"
                                class="focus:outline-none inline-block text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            <form action="/dashboard/administrator/categories/{{ $category->slug }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit"
                                    class="focus:outline-none inline-block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    onclick="return confirm('Are you sure to delete this post?')">
                                    <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-dashboard.dashboard-card-01>
    </div>
</x-dashboard.layout>
