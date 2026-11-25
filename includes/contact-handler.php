<?php
/**
 * Handles the contact form request before any HTML is sent (POS2-21, POS2-23).
 *
 * GET  -> empty form (message pre-filled when ?plan=basic|pro|enterprise)
 * POST -> server-side validation:
 *         invalid: the page is shown again with messages and the typed values
 *         valid:   Post/Redirect/Get to thank-you.php (simulated submission:
 *                  no email is sent and nothing is stored)
 *
 * Sets $contact for sections/contact.php.
 */

declare(strict_types=1);

require_once __DIR__ . '/../src/ContactForm.php';

$contact = ContactForm::initial($_GET);

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $contact = ContactForm::submit($_POST);

    if ($contact['ok']) {
        start_session();
        $_SESSION['contact_name'] = $contact['data']['name'];
        $_SESSION['contact_plan'] = $contact['plan'];
        // Explicit fragment: otherwise the browser keeps the form's #contact on the redirect
        header('Location: thank-you.php#main', true, 303);
        exit;
    }
}
