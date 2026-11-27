<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ServiceSection extends Model
{
    use HasFactory;

    protected $table = 'services_sections';   // 👈 THIS LINE

    protected $fillable = [
        'service_id',
        'section_type',
        'content',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'content'    => 'array',
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function getSrcdocAttribute(): string
    {
        $content = is_array($this->content) ? $this->content : [];
        $schema = is_array($content['schema'] ?? null) ? $content['schema'] : [];
        $values = is_array($content['values'] ?? null) ? $content['values'] : [];
        $variables = [];
        $runtimeVariables = [];

        foreach ($schema as $field) {
            $key = $field['key'] ?? '';
            if (! is_string($key) || ! preg_match('/^[a-zA-Z][a-zA-Z0-9_]{0,39}$/', $key)) {
                continue;
            }

            $value = (string) ($values[$key] ?? '');
            if (
                in_array($field['type'] ?? '', ['image', 'video'], true)
                && $value !== ''
                && ! str_starts_with($value, 'data:')
                && ! str_starts_with($value, 'http://')
                && ! str_starts_with($value, 'https://')
                && ! str_starts_with($value, '/')
            ) {
                if (str_starts_with($value, 'assets/')) {
                    $value = '/' . ltrim($value, '/');
                } else {
                    $value = Storage::disk('public')->url($value);
                }
            }
            $runtimeVariables[$key] = $value;
            $variables[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        }

        $html = preg_replace_callback(
            '/\{\{\s*([a-zA-Z][a-zA-Z0-9_]{0,39})\s*\}\}/',
            fn (array $match): string => $variables[$match[1]] ?? '',
            (string) ($content['html'] ?? '')
        );

        $runtimeData = json_encode(
            $runtimeVariables,
            JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_THROW_ON_ERROR
        );

        return '<!doctype html><html lang="en"><head><meta charset="utf-8">'
            .'<meta name="viewport" content="width=device-width, initial-scale=1">'
            .'<link rel="preconnect" href="https://fonts.googleapis.com">'
            .'<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>'
            .'<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">'
            .'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">'
            .'<style>'
            .'* { box-sizing: border-box; margin: 0; padding: 0; }'
            .'html, body { margin: 0; padding: 0; height: auto !important; min-height: 0 !important; overflow: hidden !important; background: transparent; }'
            .'body { font-family: Inter, Arial, sans-serif; -webkit-font-smoothing: antialiased; color: #1e293b; }'
            .'#custom-section-root { display: flow-root; width: 100%; margin: 0; padding: 0; height: auto; }'
            .'img { max-width: 100%; height: auto; }'
            .(string) ($content['css'] ?? '')
            .'</style><link rel="stylesheet" href="'.htmlspecialchars(asset('css/custom-section-theme.css').'?v='.filemtime(public_path('css/custom-section-theme.css')), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'">'
            .'</head><body>'
            .'<div id="custom-section-root">'
            .$html
            .'</div>'
            .'<script>window.sectionData = '.$runtimeData.';</script>'
            .'<script>'.(string) ($content['js'] ?? '').'</script>'
            .'<script>'
            .'let lastSentHeight = 0;'
            .'const syncHeight = () => {'
            .'  const root = document.getElementById("custom-section-root");'
            .'  if (!root) return;'
            .'  const h = Math.ceil(root.getBoundingClientRect().height);'
            .'  if (h > 0 && Math.abs(h - lastSentHeight) >= 2) {'
            .'    lastSentHeight = h;'
            .'    window.parent.postMessage({ type: "resize-custom-frame", height: h }, "*");'
            .'  }'
            .'};'
            .'window.addEventListener("load", syncHeight);'
            .'if (window.ResizeObserver) {'
            .'  const root = document.getElementById("custom-section-root");'
            .'  if (root) new ResizeObserver(syncHeight).observe(root);'
            .'}'
            .'setTimeout(syncHeight, 60);'
            .'setTimeout(syncHeight, 300);'
            .'</script>'
            .'</body></html>';
    }
}
