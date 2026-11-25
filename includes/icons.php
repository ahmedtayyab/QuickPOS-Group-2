<?php
/**
 * Inline SVG icon set (24×24, stroke-based). Inline SVG inherits currentColor,
 * needs no extra HTTP requests and stays sharp at any size.
 */

require_once __DIR__ . '/config.php';

const ICONS = [
    'inventory' => '<path d="M3.5 7.5 12 3l8.5 4.5v9L12 21l-8.5-4.5z"/><path d="M3.5 7.5 12 12l8.5-4.5M12 12v9"/><path d="m7.75 5.25 8.5 4.5"/>',
    'analytics' => '<path d="M4 20h16"/><rect x="5" y="11" width="3" height="6" rx="1"/><rect x="10.5" y="7" width="3" height="10" rx="1"/><rect x="16" y="4" width="3" height="13" rx="1"/>',
    'customers' => '<circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0"/><path d="M16 4.6a3.5 3.5 0 0 1 0 6.8M18 14.2A6.5 6.5 0 0 1 21.5 20"/>',
    'integrations' => '<path d="M9 3v4M15 3v4"/><path d="M6 7h12v3a6 6 0 0 1-12 0z"/><path d="M12 16v5"/>',
    'check' => '<path d="m5 12.5 4.5 4.5L19 7.5"/>',
];

/**
 * Render a decorative icon. Icons are aria-hidden: the text next to them carries the meaning.
 */
function icon(string $name, string $class = 'icon'): string
{
    $paths = ICONS[$name] ?? '';

    return '<svg class="' . e($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"'
        . ' stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $paths . '</svg>';
}
