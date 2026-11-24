<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$sections = Illuminate\Support\Facades\DB::table('services_sections')->where('service_id', 4)->get();
foreach ($sections as $s) {
    echo "ID: {$s->id} | Type: {$s->section_type}\n";
    echo "Content: {$s->content}\n\n";
}

$service = Illuminate\Support\Facades\DB::table('services')->where('id', 4)->first();
echo "Service og_image: " . ($service->og_image ?? 'none') . "\n";
echo "Service image: " . ($service->image ?? 'none') . "\n";
