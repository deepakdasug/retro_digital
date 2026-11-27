<?php

namespace App\Support;

use App\Models\Service;

class ServiceImage
{
    /** @return array{url: string, fallback: string} */
    public static function sources(?Service $service, ?string $sectionImage = null): array
    {
        [$localImage, $stockImage] = config('service_hero_images')[$service?->slug ?? '']
            ?? ['tech-development/business-growth.webp', null];
        $fallback = asset('assets/images/' . $localImage);
        $image = trim($sectionImage ?? '') ?: trim($service?->image ?? '') ?: trim($service?->og_image ?? '');
        $isOriginalStock = $stockImage
            && parse_url($image, PHP_URL_HOST) === 'images.unsplash.com'
            && parse_url($image, PHP_URL_PATH) === '/' . $stockImage;

        return [
            'url' => $isOriginalStock ? $fallback : (ImageUrl::resolve($image) ?? $fallback),
            'fallback' => $fallback,
        ];
    }
}
