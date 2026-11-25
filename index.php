<?php
/**
 * QuickPOS landing page — entry point.
 * Each landing-page section lives in its own file under sections/ (one per Jira Epic).
 */

declare(strict_types=1);

require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/head.php';
?>
<main id="main">
    <section class="section">
        <div class="container">
            <p class="eyebrow">Coming soon</p>
            <h1>QuickPOS</h1>
            <p class="lead"><?= e(SITE_TAGLINE) ?></p>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/foot.php'; ?>
