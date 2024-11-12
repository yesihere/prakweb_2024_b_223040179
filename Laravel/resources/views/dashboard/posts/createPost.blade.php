<x-dashboard.layout>
    <x-slot:title>Create Post</x-slot:title>

    <div class="col-span-full">
        <a href="/dashboard/posts"
            class="text-white bg-blue-700 w-44 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex justify-center items-center gap-2">
            <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
            Back to all posts
        </a>
    </div>

    <form action="/dashboard/posts" method="POST" class="col-span-8" enctype="multipart/form-data">
        @csrf

        <div class="mb-2">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Title</label>
            <input type="text" name="title" id="title"
                class="bg-gray-50 border @error('title') is-invalid @enderror border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Type title" required="" value="{{ old('title') }}">
            @error('title')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Slug</label>
            <input type="text" name="slug" id="slug"
                class="bg-gray-50 border @error('slug') is-invalid @enderror border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                value="{{ old('slug') }}">
            @error('slug')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-2">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select id="category" name='category_id'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                {{-- <option selected>Choose a category</option> --}}
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>


        <div class="mb-2">

            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white " for="file_input">Upload
                file</label>
            <img src="" class="block mb-2 img-preview max-h-[800px]">
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') is-invalid @enderror"
                id="file_input" type="file" name="image" accept="image/*" onchange="previewImage()">
            @error('image')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-2">
            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
            @error('body')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
        </div>

        <button type="submit"
            class="inline-flex items-center px-5 py-2.5 mt-2 sm:mt-4 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Create Post
        </button>
    </form>

    <script>
        const title = document.querySelector('#title')
        const slug = document.querySelector('#slug')

        title.addEventListener('change', () => {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(res => res.json())
                .then(data => slug.value = data.slug)
        })

        document.addEventListener('trix-file-accept', (e) => {
            e.preventDefault()
        })
    </script>
</x-dashboard.layout>
