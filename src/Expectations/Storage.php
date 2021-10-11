<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Storage;
use Pest\Expectation;
use function PHPUnit\Framework\assertTrue;

expect()->extend(
    'toExistInStorage',
    /**
     * Assert that the given file exist in storage.
     */
    function (string $disk = null): Expectation {
        $storageName = $disk ?? 'default';

        assertTrue(
            Storage::disk($disk)->exists($this->value),
            "Failed asserting that $this->value exist in '$storageName' storage"
        );

        return $this;
    }
);
