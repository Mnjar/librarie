<?php

require 'vendor/autoload.php'; // Pastikan autoload Composer aktif

use Stichoza\GoogleTranslate\GoogleTranslate;

// Path ke file bahasa Inggris
$sourcePath = __DIR__ . '/lang/en/login.php';
// Path ke file bahasa Indonesia
$targetPath = __DIR__ . '/lang/id/login.php';

// Pastikan file bahasa Inggris ada
if (!file_exists($sourcePath)) {
    die("File source ($sourcePath) tidak ditemukan.\n");
}

// Load file bahasa Inggris
$messages = include $sourcePath;

// Inisialisasi Google Translate
$tr = new GoogleTranslate('id'); // Target bahasa: Indonesia
$tr->setSource('en'); // Bahasa sumber: Inggris

// Terjemahkan setiap pesan
$translatedMessages = [];
foreach ($messages as $key => $message) {
    try {
        $translatedMessages[$key] = $tr->translate($message);
    } catch (Exception $e) {
        echo "Gagal menerjemahkan $key: " . $e->getMessage() . "\n";
        $translatedMessages[$key] = $message; // Gunakan teks asli jika gagal
    }
}

// Simpan hasil terjemahan ke file bahasa Indonesia
file_put_contents(
    $targetPath,
    "<?php\n\nreturn " . var_export($translatedMessages, true) . ";\n"
);

echo "File terjemahan berhasil disimpan di: $targetPath\n";
