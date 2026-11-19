@extends('layouts.app')

@section('content')
    <main class="standalone-editor-shell">
        @yield('admin-content')
    </main>
@endsection

@push('styles')
    <style>
        .standalone-editor-shell {
            min-height: 100vh;
            background: #f7fbf7;
        }

        .scroll-progress-bar {
            display: none;
        }
    </style>
@endpush
