<?php
/**
 * QuickPOS landing page — entry point.
 * Each landing-page section lives in its own file under sections/ (one per Jira Epic).
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/icons.php';
require __DIR__ . '/includes/head.php';
require __DIR__ . '/sections/header.php';
?>
<main id="main">
    <?php require __DIR__ . '/sections/hero.php'; ?>
    <?php require __DIR__ . '/sections/features.php'; ?>
    <?php require __DIR__ . '/sections/pricing.php'; ?>
</main>
<?php require __DIR__ . '/sections/footer.php'; ?>
<?php require __DIR__ . '/includes/foot.php'; ?>
