@extends('main') @section('content') @guest
<div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 mx-8 mt-4" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
    </svg>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">Login to can create, edit or delete posts.</span>
    </div>
</div>
@endguest
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="px-6 py-8 mb-2.5 mx-auto lg:py-0">
        @if ($message = Session::get('success'))
        <div id="alert-3" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <div class="ml-3 font-semibold">
                {{ $message }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        @endif
        <div class="flex items-center justify-end gap-4">
            <div class="flex justify-start items-center">
                <form method="GET" action="{{ route('posts.index') }}" class="hidden lg:block lg:pl-2">
                    <label for="topbar-search" class="sr-only">Search</label>
                    <div class="relative mt-1 lg:w-96">
                        <input type="text" name="search" id="topbar-search" class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:outline-none block w-full pr-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" value="{{ request('search') }}" />
                        <button type="submit" class="flex absolute inset-y-0 right-0 items-center pr-3 cursor-pointer">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 hover:text-gray-400 active:scale-95 transition-all" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            @auth
            <button data-modal-target="postModal" data-modal-toggle="postModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-sm px-2.5 py-2.5 my-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Add new blog
            </button>
            @endauth
        </div>
        @if(!count($posts))
        <div class="text-lg font-semibold text-center mt-20">No results</div>
        @endif
        <div class="flex items-center flex-wrap gap-10">
            @foreach ($posts as $post)
            <div class="max-w-sm rounded overflow-hidden shadow-lg my-4 bg-white">
                <a href="{{ route('posts.show', $post->id) }}">
                    <img class="w-full h-64 object-cover" src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" />
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-0.5">
                            {{ $post->title }}
                        </div>
                        <div class="font-semibold text-slate-500 text-sm mb-1.5">
                            Category: {{ $post->category_name }}
                        </div>
                        <div class="font-semibold text-slate-500 text-sm mb-1.5">
                            {{ date('d.m.Y', strtotime($post->date)) }}
                        </div>
                        <p class="text-gray-700 text-base">
                            {{ $post->content }}
                        </p>
                        @auth
                        <div class="flex items-center mt-2">
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-white bg-blue-700 mr-2.5 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-sm px-6 py-2 mt-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Edit
                            </a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-semibold rounded-lg text-sm px-6 py-2 mt-4 dark:bg-red-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Delete
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="my-3 flex justify-end">{{ $posts->links() }}</div>
    </div>
</section>

<div id="postModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-[200] hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-xl md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Create post
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="postModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form class="space-y-4 md:space-y-5 pt-2" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="px-8">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Title
                    </label>
                    <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title" />
                </div>
                <div class="px-8">
                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Content
                    </label>
                    <textarea id="content" name="content" rows="3" class="block p-2.5 w-full resize-none text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                </div>
                <div class="px-8">
                    <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Select category
                    </label>
                    <select id="categories" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">
                            {{$category->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="px-8">
                    <label for="file-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Image
                    </label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 py-2.5 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file-input" type="file" name="image" accept="image/*" />
                </div>
                <div class="flex items-center justify-end px-8 py-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="postModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-semibold px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancel
                    </button>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('content')