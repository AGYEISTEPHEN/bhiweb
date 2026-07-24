<?php
$root = __DIR__;
$files = [];
$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root));
foreach ($it as $file) {
    if (!$file->isFile()) continue;
    $ext = strtolower($file->getExtension());
    if (!in_array($ext, ['php','css','js','html','md'], true)) continue;
    $files[] = $file->getPathname();
}

$replacements = [
    '—' => '—',
    '–' => '–',
    '‘' => '‘',
    '’' => '’',
    '“' => '“',
    '”' => '”',
    '…' => '…',
    '•' => '•',
    '✓' => '✓',
    '→' => '→',
    '←' => '←',
    '←' => '←',
    '←' => '←',
    '"' => '"',
    '·' => '·',
    '©' => '©',
    '' => '',
];

foreach ($files as $file) {
    $content = file_get_contents($file);
    if ($content === false) continue;

    $updated = $content;
    foreach ($replacements as $from => $to) {
        $updated = str_replace($from, $to, $updated);
    }

    if ($updated !== $content) {
        file_put_contents($file, $updated);
        echo "fixed $file\n";
    }
}
