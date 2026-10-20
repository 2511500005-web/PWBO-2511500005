<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/core/App.php';
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/core/JsonDb.php';
require_once __DIR__ . '/core/Flasher.php';

function e($text) {
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}
