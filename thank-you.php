<?php
/**
 * Thank-you page after a valid contact submission (POS2-23).
 * Reached by a 303 redirect from index.php (Post/Redirect/Get), so refreshing
 * this page never re-submits the form. The submission is simulated.
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/icons.php';
require_once __DIR__ . '/src/ContactForm.php';

start_session();
$name = $_SESSION['contact_name'] ?? null;
$plan = ContactForm::plan($_SESSION['contact_plan'] ?? null);
unset($_SESSION['contact_name'], $_SESSION['contact_plan']); // show the personal message once

$pageTitle = 'Thank you';
require __DIR__ . '/includes/head.php';
?>
<main id="main" class="thanks">
    <div class="container">
        <div class="thanks__card">
            <span class="thanks__icon" aria-hidden="true"><?= icon('check') ?></span>
            <h1><?= $name !== null ? 'Thank you, ' . e($name) . '!' : 'Thank you!' ?></h1>
            <p class="lead">
                <?php if ($name !== null): ?>
                    We have received your message<?= $plan !== null ? ' about the <strong>' . e(ContactForm::PLANS[$plan]) . '</strong> plan' : '' ?>.
                    A QuickPOS specialist will reply within one business day.
                <?php else: ?>
                    If you sent us a message, it has been received.
                <?php endif; ?>
            </p>
            <p class="thanks__note">Demo notice: this submission was simulated. No email was sent and nothing was stored.</p>
            <a class="btn btn--primary btn--lg" href="./">Back to QuickPOS</a>
        </div>
    </div>
</main>
<?php require __DIR__ . '/includes/foot.php'; ?>
