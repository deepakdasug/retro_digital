@extends('layouts.app')
@section('content')
<div class="container py-10">
    <h1>Web Pages Management</h1>
    <a href="{{ route('admin.web-pages.create') }}" class="btn btn-primary">+ Add New Page</a>
    <hr>
    <ul>
        @foreach($pages as $page)
            <li>{{ $page->title }} ({{ $page->slug }})</li>
        @endforeach
    </ul>
</div>
@endsection