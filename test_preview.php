<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$service = App\Models\Service::find(4);
if (!$service) {
    echo "Service 4 not found!\n";
    exit;
}

$controller = new App\Http\Controllers\Admin\ServicePageController();
$request = Illuminate\Http\Request::create('/admin/webpages/4/sections/preview/rich_text', 'GET');
$request->headers->set('Accept', 'application/json');

try {
    $response = $controller->previewSection($request, $service, 'rich_text');
    echo "Status: " . $response->getStatusCode() . "\n";
    echo "Content: " . $response->getContent() . "\n";
} catch (\Throwable $e) {
    echo "Exception: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . "\n";
}
