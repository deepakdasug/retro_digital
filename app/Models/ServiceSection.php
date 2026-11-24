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
            ) {
                $value = Storage::disk('public')->url($value);
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

        return '<!doctype html><html><head><meta charset="utf-8"><style>'
            .(string) ($content['css'] ?? '')
            .'</style></head><body>'
            .$html
            .'<script>window.sectionData = '.$runtimeData.';</script>'
            .'<script>'.(string) ($content['js'] ?? '').'</script>'
            .'</body></html>';
    }
}
