<?php
/**
 * Site-wide configuration shared by every page.
 * Keeping content here (not hard-coded in markup) lets PHP render the page from data.
 */

declare(strict_types=1);

const SITE_NAME = 'QuickPOS';
const SITE_TAGLINE = 'Point of Sale software for growing shops';

/** Main navigation: label => in-page anchor. */
const NAV_LINKS = [
    'Features' => '#features',
    'Pricing'  => '#pricing',
    'Contact'  => '#contact',
];

/**
 * Escape a value for safe output inside HTML.
 */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
