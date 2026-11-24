<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/core/App.php';
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/core/JsonDb.php';
require_once __DIR__ . '/core/Flasher.php';
require_once __DIR__ . '/core/Model.php';
require_once __DIR__ . '/core/Schema.php';
require_once __DIR__ . '/core/Migrator.php';
require_once __DIR__ . '/core/Faker.php';
require_once __DIR__ . '/core/Factory.php';
require_once __DIR__ . '/core/Seeder.php';

function e($text) {
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}