<?php

declare(strict_types=1);

if (! function_exists('isoToEmoji')) {
    function isoToEmoji(string $code): string
    {
        return implode(
            '',
            array_map(
                fn (string $letter) => mb_chr(ord($letter) % 32 + 0x1F1E5),
                mb_str_split($code)
            )
        );
    }
}
