{{-- resources/views/errors/500.blade.php --}}
@extends('layouts.app')

@section('title', '500 - Server Error | Retrotech Digital')
@section('description', 'An unexpected error occurred while processing your request. Please return to the homepage or contact our team.')
@section('robots', 'noindex, nofollow')

@push('styles')
    <style>
        .error-page-wrapper {
            position: relative;
            min-height: calc(100vh - 200px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5rem 1.5rem 6rem;
            background: linear-gradient(180deg, #f8faf8 0%, #f4f8f5 50%, #f8faf8 100%);
            overflow: hidden;
        }

        .error-ambient-glow {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(80px);
            opacity: 0.45;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            background: radial-gradient(circle, rgba(239, 68, 68, 0.18) 0%, transparent 70%);
            z-index: 0;
        }

        .error-card-box {
            position: relative;
            z-index: 1;
            max-width: 40rem;
            width: 100%;
            background: #ffffff;
            border: 1px solid rgba(47, 111, 70, 0.14);
            border-radius: 26px;
            padding: 3.75rem 2.5rem;
            text-align: center;
            box-shadow: 0 16px 45px rgba(21, 39, 29, 0.06);
        }

        .error-kicker-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.22);
            color: #dc2626;
            font-size: 0.75rem;
            font-weight: 750;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.35rem 0.9rem;
            border-radius: 9999px;
            margin-bottom: 1.5rem;
        }

        .error-kicker-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ef4444;
            box-shadow: 0 0 8px #ef4444;
            animation: errorPulse 2s infinite ease-in-out;
        }

        @keyframes errorPulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.3); opacity: 0.5; }
        }

        .error-num-red {
            font-family: var(--font-family, 'Inter', system-ui, sans-serif);
            font-size: clamp(5.5rem, 14vw, 8.5rem);
            font-weight: 900;
            line-height: 0.95;
            letter-spacing: -0.05em;
            color: #dc2626;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 45%, #b91c1c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0 0 0.5rem;
            text-shadow: 0 8px 30px rgba(220, 38, 38, 0.15);
        }

        .error-title {
            font-family: var(--font-family, 'Inter', system-ui, sans-serif);
            font-size: clamp(1.65rem, 3.2vw, 2.15rem);
            font-weight: 800;
            color: #15271d;
            margin: 0 0 0.85rem;
            letter-spacing: -0.025em;
            line-height: 1.2;
        }

        .error-lead {
            font-size: 0.98rem;
            color: #5d7063;
            max-width: 30rem;
            margin: 0 auto 2.5rem;
            line-height: 1.65;
        }

        .error-home-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: #2f6f46;
            border: 1px solid #2f6f46;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 0.85rem 1.85rem;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.25s ease;
            box-shadow: 0 6px 20px rgba(47, 111, 70, 0.25);
        }

        .error-home-cta:hover {
            background: #1e5a38;
            border-color: #1e5a38;
            color: #ffffff;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(30, 90, 56, 0.3);
        }

        @media (max-width: 640px) {
            .error-card-box {
                padding: 2.75rem 1.5rem;
                border-radius: 20px;
            }
        }
    </style>
@endpush

@section('content')
    <main class="error-page-wrapper">
        <div class="error-ambient-glow" aria-hidden="true"></div>

        <section class="error-card-box">
            <div class="error-kicker-badge">
                <span class="error-kicker-dot" aria-hidden="true"></span>
                <span>Server Error 500 • Internal System Exception</span>
            </div>

            <div class="error-num-red" aria-label="Error code 500">500</div>

            <h1 class="error-title">Unexpected Server Error</h1>

            <p class="error-lead">
                An internal error occurred while processing your request.
                Our engineering team has been notified.
            </p>

            <a href="{{ route('home') }}" class="error-home-cta">
                <i class="fa-solid fa-arrow-left"></i> Return to Homepage
            </a>
        </section>
    </main>
@endsection
