<x-dashboard.layout>
    <x-slot:title>Create Category</x-slot:title>

    <div class="col-span-full">
        <a href="/dashboard/administrator/categories"
            class="text-white bg-blue-700 w-52 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex justify-center items-center gap-2">
            <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
            Back to all category
        </a>
    </div>

    <form action="/dashboard/administrator/categories" method="POST" class="col-span-5">
        @csrf

        <div class="mb-2">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Category Name</label>
            <input type="text" name="name" id="category"
                class="bg-gray-50 border @error('category') is-invalid @enderror border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Type Category Name" required="" value="{{ old('category') }}" autocomplete="off">
            @error('category')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Slug</label>
            <input type="hidden" name="slug" id="slug" value="{{ old('slug') }}">
        </div>

        <div class="flex mb-2">
            <div class="flex items-center me-4">
                <input @if (old('color') == 'blue') checked @endif id="blue-radio" type="radio" value="blue"
                    name="color"
                    class="w-4 h-4 text-blue-500 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="blue-radio" class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Blue</label>
            </div>
            <div class="flex items-center me-4">
                <input @if (old('color') == 'red') checked @endif id="red-radio" type="radio" value="red"
                    name="color"
                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="red-radio" class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Red</label>
            </div>
            <div class="flex items-center me-4">
                <input @if (old('color') == 'green') checked @endif id="green-radio" type="radio" value="green"
                    name="color"
                    class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="green-radio" class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Green</label>
            </div>
            <div class="flex items-center me-4">
                <input @if (old('color') == 'yellow') checked @endif id="yellow-radio" type="radio" value="yellow"
                    name="color"
                    class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="yellow-radio"
                    class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Yellow</label>
            </div>
            <div class="flex items-center me-4">
                <input @if (old('color') == 'indigo') checked @endif id="indigo-radio" type="radio" value="indigo"
                    name="color"
                    class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="indigo-radio"
                    class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Indigo</label>
            </div>
            <div class="flex items-center me-4">
                <input @if (old('color') == 'purple') checked @endif id="purple-radio" type="radio" value="purple"
                    name="color"
                    class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="purple-radio"
                    class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Purple</label>
            </div>
            <div class="flex items-center me-4">
                <input @if (old('color') == 'pink') checked @endif id="pink-radio" type="radio" value="pink"
                    name="color"
                    class="w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 focus:ring-pink-500 dark:focus:ring-pink-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="pink-radio" class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Pink</label>
            </div>
        </div>
        @error('color')
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror

        <button type="submit"
            class="inline-flex items-center px-5 py-2.5 mt-2 sm:mt-4 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Create category
        </button>
    </form>

    <script>
        const category = document.querySelector('#category')
        const slug = document.querySelector('#slug')

        category.addEventListener('change', () => {
            fetch('/dashboard/administrator/categories/checkSlug?category=' + category.value)
                .then(res => res.json())
                .then(data => slug.value = data.slug)
        })
    </script>
</x-dashboard.layout>
