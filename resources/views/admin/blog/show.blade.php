@extends('layouts.app')

@section('content')
<article class="max-w-4xl mx-auto py-12 px-4 bg-white my-8 rounded shadow-sm">
    
    <!-- Admin Controls (Only visible to Admin) -->
    @auth
        @if(auth()->user()->is_admin)
            <div class="mb-6 flex space-x-3 bg-yellow-50 p-3 rounded border border-yellow-200">
                <span class="text-sm font-bold text-yellow-800 py-1">Admin Actions:</span>
                <a href="#" class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">Edit Post</a>
                <a href="#" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700">Delete Post</a>
            </div>
        @endif
    @endauth

    <!-- Title -->
    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">{{ $post->title }}</h1>
    
    <!-- Author Info -->
    <div class="flex items-center text-gray-600 mb-8 border-b pb-4">
        <div class="mr-4">
            <span class="font-bold text-gray-900">{{ $post->author_name }}</span>
            <span class="text-sm text-gray-500 block">{{ $post->author_designation }}</span>
        </div>
        <div class="text-sm">Published on {{ $post->published_at->format('M d, Y') }}</div>
    </div>

    <!-- Featured Image -->
    @if($post->image_path)
        <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->title }}" class="w-full rounded-lg shadow-lg mb-8">
    @endif

    <!-- Dynamic Content Blocks -->
    <div class="prose max-w-none text-gray-800">
        @foreach($post->content_blocks ?? [] as $block)
            
            @if($block['type'] === 'heading')
                <h2 class="text-3xl font-bold text-gray-900 mt-8 mb-4">{{ $block['content'] }}</h2>
                
            @elseif($block['type'] === 'subheading')
                <h3 class="text-2xl font-semibold text-gray-800 mt-6 mb-3">{{ $block['content'] }}</h3>
                
            @elseif($block['type'] === 'paragraph')
                <p class="text-lg leading-relaxed mb-4">{{ $block['content'] }}</p>
                
            @elseif($block['type'] === 'image')
                <div class="my-8 flex justify-center">
                    <img src="{{ Storage::url($block['image_path']) }}" 
                         class="rounded shadow-sm {{ $block['size'] }} {{ $block['alignment'] }}">
                </div>
            @endif
            
        @endforeach
    </div>
</article>
@endsection