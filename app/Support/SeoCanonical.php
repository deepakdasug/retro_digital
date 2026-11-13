<?php

namespace App\Support;

class SeoCanonical
{
    public static function resolve(?string $candidate, string $fallback, array $invalidPathPrefixes = []): string
    {
        $candidate = trim((string) $candidate);

        if ($candidate === '' || filter_var($candidate, FILTER_VALIDATE_URL) === false) {
            return $fallback;
        }

        $scheme = strtolower((string) parse_url($candidate, PHP_URL_SCHEME));
        if (! in_array($scheme, ['http', 'https'], true)
            || parse_url($candidate, PHP_URL_USER) !== null
            || parse_url($candidate, PHP_URL_PASS) !== null
            || parse_url($candidate, PHP_URL_QUERY) !== null
            || parse_url($candidate, PHP_URL_FRAGMENT) !== null) {
            return $fallback;
        }

        $host = strtolower((string) parse_url($candidate, PHP_URL_HOST));
        if (in_array($host, ['localhost', '127.0.0.1', '::1'], true)) {
            return $fallback;
        }

        $fallbackScheme = strtolower((string) parse_url($fallback, PHP_URL_SCHEME));
        $fallbackHost = strtolower((string) parse_url($fallback, PHP_URL_HOST));
        if ($fallbackScheme === 'https' && $fallbackHost === $host && $scheme !== 'https') {
            return $fallback;
        }

        $path = '/' . ltrim((string) parse_url($candidate, PHP_URL_PATH), '/');
        foreach ($invalidPathPrefixes as $prefix) {
            $prefix = '/' . trim($prefix, '/');
            if ($path === $prefix || str_starts_with($path, $prefix . '/')) {
                return $fallback;
            }
        }

        return $candidate;
    }

    public static function usesSameHost(string $url, string $reference): bool
    {
        $urlHost = strtolower((string) parse_url($url, PHP_URL_HOST));
        $referenceHost = strtolower((string) parse_url($reference, PHP_URL_HOST));
        $urlScheme = strtolower((string) parse_url($url, PHP_URL_SCHEME));
        $referenceScheme = strtolower((string) parse_url($reference, PHP_URL_SCHEME));
        $urlPort = parse_url($url, PHP_URL_PORT) ?? ($urlScheme === 'https' ? 443 : 80);
        $referencePort = parse_url($reference, PHP_URL_PORT) ?? ($referenceScheme === 'https' ? 443 : 80);

        return $urlHost !== ''
            && $urlHost === $referenceHost
            && $urlScheme === $referenceScheme
            && $urlPort === $referencePort;
    }
}
