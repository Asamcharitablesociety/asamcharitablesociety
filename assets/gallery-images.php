<?php

header('Content-Type: application/json; charset=utf-8');

$baseDirectory = __DIR__ . '/assets/images/events/';
$baseUrl = 'assets/images/events/';

$photos = [];

if (!is_dir($baseDirectory)) {
    http_response_code(500);
    echo json_encode(['error' => 'Events folder not found']);
    exit;
}

try {
    $directory = new RecursiveDirectoryIterator(
        $baseDirectory,
        FilesystemIterator::SKIP_DOTS
    );

    $iterator = new RecursiveIteratorIterator($directory);

    foreach ($iterator as $file) {
        if (!$file->isFile()) {
            continue;
        }

        if (strtolower($file->getExtension()) !== 'jpg') {
            continue;
        }

        // Relative path, including the subfolder name.
        $relativePath = str_replace(
            DIRECTORY_SEPARATOR,
            '/',
            substr($file->getPathname(), strlen($baseDirectory))
        );

        $photos[] = [
            'url' => $baseUrl . implode(
                '/',
                array_map('rawurlencode', explode('/', $relativePath))
            ),
            'title' => pathinfo(
                $file->getFilename(),
                PATHINFO_FILENAME
            ),
            'folder' => basename($file->getPath())
        ];
    }

    usort($photos, function ($a, $b) {
        return strnatcasecmp($a['title'], $b['title']);
    });

    echo json_encode(
        $photos,
        JSON_UNESCAPED_SLASHES | JSON_INVALID_UTF8_SUBSTITUTE
    );

} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Unable to scan event photos']);
}