<?php

$i18n = json_decode(file_get_contents(__DIR__ . '/assets/i18n.json'), true);
$fallbackLang = [
    'ca' => 'es'
];

$defaultLang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : null;
$defaultLang ??= 'en';
if (!in_array($defaultLang, $i18n['__langs__'])) $defaultLang = 'en';

function t(string $key, string|null $lang = null): string {
    global $i18n, $defaultLang;
    $lang ??= $defaultLang;

    $value = $i18n[$key][$lang];
    while ($value == null && isset($fallbackLang[$lang])) {
        $lang = $fallbackLang[$lang];
        $value = $i18n[$key][$lang];
    }

    return $value ?? $i18n[$key]['en'];
}
