<?php
/**
 * Site-wide configuration shared by every page.
 * Keeping content here (not hard-coded in markup) lets PHP render the page from data.
 */

declare(strict_types=1);

date_default_timezone_set('Asia/Karachi');

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

/**
 * Format an amount in Pakistani rupees, e.g. 1970 -> "Rs 1,970".
 */
function pkr(int $amount): string
{
    return 'Rs ' . number_format($amount);
}

/**
 * Start the PHP session with safer cookie settings (used for the thank-you message only).
 */
function start_session(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }
    session_set_cookie_params([
        'httponly' => true,   // not readable by JavaScript
        'samesite' => 'Lax',  // not sent on cross-site POSTs
        'secure'   => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    ]);
    session_start();
}
