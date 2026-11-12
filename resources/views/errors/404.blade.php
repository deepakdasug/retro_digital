{{-- resources/views/errors/404.blade.php --}}
@extends('layouts.app')

@section('title', '404 - Page Not Found | Retrotech Digital')
@section('description', 'The page you are looking for could not be found. Search our site or jump straight to Services, Industries, Blog, or Contact.')
@section('robots', 'noindex, follow')

@push('styles')
    <style>
        .error-404 {
            max-width: 48rem;
            margin: 0 auto;
            padding: 6rem 1rem 5rem;
            text-align: center;
            font-family: 'Inter', system-ui, sans-serif;
        }
        .error-404__eyebrow {
            font-size: 0.75rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #9ca3af;
            margin: 0;
        }
        .error-404__title {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 700;
            color: #111827;
            margin: 0.75rem 0 0;
            line-height: 1.15;
        }
        .error-404__lead {
            font-size: 1.05rem;
            color: #4b5563;
            margin: 1rem auto 0;
            max-width: 36rem;
        }
        .error-404__form {
            display: flex;
            justify-content: center;
            margin: 2rem auto 0;
            max-width: 32rem;
        }
        .error-404__input {
            flex: 1;
            padding: 0.85rem 1rem;
            border: 1px solid #d1d5db;
            border-right: 0;
            border-radius: 0.375rem 0 0 0.375rem;
            font: inherit;
            outline: none;
        }
        .error-404__input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }
        .error-404__button {
            padding: 0.85rem 1.5rem;
            background: #2563eb;
            color: #fff;
            font: inherit;
            font-weight: 600;
            border: 0;
            border-radius: 0 0.375rem 0.375rem 0;
            cursor: pointer;
        }
        .error-404__button:hover { background: #1d4ed8; }
        .error-404__links-label {
            margin: 2.5rem 0 0;
            font-size: 0.85rem;
            color: #6b7280;
        }
        .error-404__links {
            list-style: none;
            padding: 0;
            margin: 0.75rem 0 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.75rem;
        }
        .error-404__links a {
            display: inline-block;
            padding: 0.55rem 1.25rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            color: #1f2937;
            text-decoration: none;
            font-size: 0.95rem;
        }
        .error-404__links a:hover {
            border-color: #2563eb;
            color: #1d4ed8;
        }
        .error-404__home {
            margin-top: 3rem;
            font-size: 0.9rem;
        }
        .error-404__home a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }
        .error-404__home a:hover { text-decoration: underline; }
        .sr-only {
            position: absolute;
            width: 1px; height: 1px;
            padding: 0; margin: -1px;
            overflow: hidden; clip: rect(0,0,0,0);
            white-space: nowrap; border: 0;
        }
    </style>
@endpush

@section('content')
    <section class="error-404">
        <p class="error-404__eyebrow">Error 404</p>

        <h1 class="error-404__title">404 - Page Not Found</h1>

        <p class="error-404__lead">
            The page you're looking for may have been moved, renamed, or never existed.
            Try searching, or jump straight to one of these pages.
        </p>

        {{-- Search bar --}}
        <form class="error-404__form" action="{{ url('/search') }}" method="GET" role="search">
            <label for="q" class="sr-only">Search the site</label>
            <input
                id="q"
                name="q"
                type="search"
                class="error-404__input"
                placeholder="Search services, industries, articles…"
                autocomplete="off"
            >
            <button type="submit" class="error-404__button">Search</button>
        </form>

        {{-- Direct links --}}
        <p class="error-404__links-label">Or go straight to:</p>
        <ul class="error-404__links">
            <li><a href="{{ url('/services') }}">Services</a></li>
            <li><a href="{{ url('/industries') }}">Industries</a></li>
            <li><a href="{{ url('/blog') }}">Blog</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>

        <p class="error-404__home">
            <a href="{{ url('/') }}">&larr; Back to the homepage</a>
        </p>
    </section>
@endsection