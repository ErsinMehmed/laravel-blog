@extends('main') @section('content')
<div class="flex items-center justify-center">
    <div class="mt-5 md:mt-0 w-[40rem]">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 space-y-4 bg-white sm:p-6">
                    <h1 class="text-2xl font-semibold">Edit post</h1>
                    <div class="px-1">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Title
                        </label>
                        <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title" value="{{ $post->title }}" />
                    </div>
                    <div class="px-1">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Content
                        </label>
                        <textarea id="content" name="content" rows="3" class="block p-2.5 w-full resize-none text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{ $post->content }}</textarea>
                    </div>
                    <div class="px-1">
                        <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Select category
                        </label>
                        <select id="categories" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->
                                id == $post->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-1">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Image
                        </label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 py-2.5 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file-input" type="file" name="image" accept="image/*" />
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-semibold rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection('content')