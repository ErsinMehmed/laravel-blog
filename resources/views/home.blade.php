@extends('main') @section('content')
<div class="flex items-center flex-wrap gap-10 px-6 bg-gray-50">
    @foreach ($posts as $post)
    <div class="max-w-sm rounded overflow-hidden shadow-lg my-4 bg-white">
        <a href="{{ route('posts.show', $post->id) }}">
            <img class="w-full h-64 object-cover" src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" />
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-0.5">
                    {{ $post->title }}
                </div>
                <div class="font-semibold text-slate-500 text-sm mb-1.5">
                    {{ date('d.m.Y', strtotime($post->date)) }}
                </div>
                <p class="text-gray-700 text-base">
                    {{ $post->content }}
                </p>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection('content')