<?php

require_once __DIR__ . '/vendor/autoload.php';

use PrevioTest\Services\ReservationTransformer;

try {
    $transformer = new ReservationTransformer();
    $transformer->transform(__DIR__ . '/reservations.json', __DIR__ . '/tmp/reservations_transformed.json');

    echo "Transformation is successful";
} catch (\Throwable $exception) {
    echo "Error: " . $exception->getMessage();
}