<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;

class ImageUrl
{
    public static function resolve(?string $value, ?string $fallback = null): ?string
    {
        $value = trim((string) $value);

        if ($value === '') {
            return $fallback === null ? null : self::resolve($fallback);
        }

        if (
            preg_match('#^(?:https?:)?//#i', $value) === 1
            || str_starts_with(strtolower($value), 'data:image/')
        ) {
            return $value;
        }

        $path = str_replace('\\', '/', $value);
        $path = preg_replace('#/+#', '/', $path) ?? $path;
        $path = preg_replace('#^(?:\./)+#', '', $path) ?? $path;
        $path = ltrim($path, '/');

        if (str_starts_with($path, 'storage/app/public/')) {
            return asset('storage/' . substr($path, strlen('storage/app/public/')));
        }

        if (str_starts_with($path, 'public/storage/')) {
            return asset(substr($path, strlen('public/')));
        }

        if (str_starts_with($path, 'storage/')) {
            return asset($path);
        }

        if (str_starts_with($path, 'public/')) {
            return asset(substr($path, strlen('public/')));
        }

        if (is_file(public_path($path))) {
            return asset($path);
        }

        foreach ([
            'assets/images/' . basename($path),
            'assets/images/tech-development/' . basename($path),
        ] as $publicCandidate) {
            if (is_file(public_path($publicCandidate))) {
                return asset($publicCandidate);
            }
        }

        if (str_starts_with($path, 'assets/') || str_starts_with($path, 'images/') || str_starts_with($path, 'img/')) {
            return asset($path);
        }

        return Storage::disk('public')->url($path);
    }
}
