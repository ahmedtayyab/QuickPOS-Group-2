<?php
/** Tests for contact-form state: plan pre-fill (POS2-20) and submission result (POS2-21). */

declare(strict_types=1);

require_once __DIR__ . '/../src/ContactForm.php';

return [
    'known plan in the query pre-fills the message' => function (): void {
        $state = ContactForm::initial(['plan' => 'pro']);
        assert_same('pro', $state['plan']);
        assert_true(str_contains($state['data']['message'], 'Pro plan'), 'message should mention the Pro plan');
    },
    'unknown or malicious plan values are ignored' => function (): void {
        foreach (['gold', '<script>', '', ['pro']] as $bad) {
            $state = ContactForm::initial(['plan' => $bad]);
            assert_same(null, $state['plan']);
            assert_same('', $state['data']['message']);
        }
    },
    'no plan gives an empty form' => function (): void {
        assert_same(['name' => '', 'email' => '', 'message' => ''], ContactForm::initial([])['data']);
    },
    'invalid submission is not ok and keeps typed values' => function (): void {
        $result = ContactForm::submit(['name' => 'Bilal', 'email' => 'bilal@', 'message' => 'Hello']);
        assert_same(false, $result['ok']);
        assert_same('Bilal', $result['data']['name']);
        assert_true(isset($result['errors']['email']), 'email error expected');
    },
    'valid submission is ok and keeps the chosen plan' => function (): void {
        $result = ContactForm::submit(['name' => 'Bilal', 'email' => 'bilal@example.com', 'message' => 'Hello', 'plan' => 'enterprise']);
        assert_same(true, $result['ok']);
        assert_same('enterprise', $result['plan']);
    },
];
