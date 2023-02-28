@extends('main') @section('content')
<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 bg-gray">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full object-cover" src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" />
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Jese Leos</a>
                            <p class="text-base font-light text-gray-500 dark:text-gray-400">
                                {{ $post->title }}
                            </p>
                            <p class="text-base font-light text-gray-500 dark:text-gray-400">
                                Category: {{ $post->category->name }}
                            </p>
                            <p class="text-base font-light text-gray-500 dark:text-gray-400">
                                <span>{{ date('d.m.Y', strtotime($post->date)) }}</span>
                            </p>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    {{ $post->title }}
                </h1>
            </header>
            <p class="lead">{{ $post->content }}</p>

            <section class="not-format">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">
                        Discussion ({{count($post->comments)}})
                    </h2>
                </div>
                @auth
                <form method="POST" action="{{ route('comments.store', $post->id) }}" class="mb-6">
                    @csrf
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="5" class="px-0 w-full text-sm text-gray-900 focus:outline-none border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Write a comment..." name="comment"></textarea>
                    </div>
                    @error('comment')
                    <div class="text-red-500 mb-1">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        Post comment
                    </button>
                </form>
                @endauth

                <article class="py-4 px-1 mb-5 text-base bg-white rounded-lg dark:bg-gray-900">
                    @foreach($post->comments as $comment)
                    <div class="border-b py-2">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 font-semibold text-gray-900 dark:text-white">
                                    {{ $comment->user->name }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Posted at:
                                    {{ date('H:i d.m.Y', strtotime($comment->created_at)) }}
                                </p>
                            </div>
                        </footer>
                        <p>
                            {{ $comment->comment }}
                        </p>
                    </div>
                    @endforeach
                </article>
            </section>
        </article>
    </div>
</main>
@endsection('content')