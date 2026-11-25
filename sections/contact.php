<?php
/**
 * Epic POS2-6 · Contact — form (POS2-21) with server-side error messages (POS2-40).
 * Expects $contact from includes/contact-handler.php. Every value is escaped with e().
 */

$errors = $contact['errors'];
$values = $contact['data'];
$fieldError = static function (string $field) use ($errors): string {
    return isset($errors[$field])
        ? '<p class="field__error" id="' . $field . '-error">' . e($errors[$field]) . '</p>'
        : '';
};
$invalidAttrs = static function (string $field) use ($errors): string {
    return isset($errors[$field]) ? ' aria-invalid="true" aria-describedby="' . $field . '-error"' : '';
};
?>
<section class="section section--alt" id="contact" aria-labelledby="contact-title">
    <div class="container contact">
        <div class="contact__intro">
            <p class="eyebrow">Contact</p>
            <h2 id="contact-title">Talk to the QuickPOS team</h2>
            <p class="lead">Questions about plans, hardware or moving from your current system? Send us a message and we will get back to you within one business day.</p>
            <ul class="contact__points">
                <li><?= icon('check', 'icon icon--sm') ?>Free 30-minute product demo</li>
                <li><?= icon('check', 'icon icon--sm') ?>Help importing your products and stock</li>
                <li><?= icon('check', 'icon icon--sm') ?>Support in English and Urdu</li>
            </ul>
        </div>

        <form class="contact-form" action="./#contact" method="post" novalidate>
            <?php if ($errors !== []): ?>
                <div class="form-alert" role="alert" tabindex="-1" id="form-alert">
                    <p class="form-alert__title">Please fix <?= count($errors) === 1 ? 'this problem' : 'these ' . count($errors) . ' problems' ?>:</p>
                    <ul>
                        <?php foreach ($errors as $field => $message): ?>
                            <li><a href="#contact-<?= e($field) ?>"><?= e($message) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ($contact['plan'] !== null): ?>
                <p class="contact-form__plan">Plan: <strong><?= e(ContactForm::PLANS[$contact['plan']]) ?></strong></p>
                <input type="hidden" name="plan" value="<?= e($contact['plan']) ?>">
            <?php endif; ?>

            <div class="field<?= isset($errors['name']) ? ' field--invalid' : '' ?>">
                <label for="contact-name">Name</label>
                <input id="contact-name" name="name" type="text" autocomplete="name" required
                       maxlength="<?= ContactValidator::NAME_MAX ?>" value="<?= e($values['name']) ?>"<?= $invalidAttrs('name') ?>>
                <?= $fieldError('name') ?>
            </div>

            <div class="field<?= isset($errors['email']) ? ' field--invalid' : '' ?>">
                <label for="contact-email">Email</label>
                <input id="contact-email" name="email" type="email" autocomplete="email" required
                       value="<?= e($values['email']) ?>"<?= $invalidAttrs('email') ?>>
                <?= $fieldError('email') ?>
            </div>

            <div class="field<?= isset($errors['message']) ? ' field--invalid' : '' ?>">
                <label for="contact-message">Message</label>
                <textarea id="contact-message" name="message" rows="5" required
                          maxlength="<?= ContactValidator::MESSAGE_MAX ?>"<?= $invalidAttrs('message') ?>><?= e($values['message']) ?></textarea>
                <?= $fieldError('message') ?>
            </div>

            <button class="btn btn--primary btn--lg btn--block" type="submit">Send message</button>
            <p class="contact-form__note">This is a demo: your message is checked by our PHP server but not emailed or stored.</p>
        </form>
    </div>
</section>
