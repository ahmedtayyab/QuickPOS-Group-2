<?php
/**
 * Contact-form validation tests (POS2-25, written first for POS2-38).
 * Mandatory cases: empty name, invalid email, empty message, valid input accepted.
 */

declare(strict_types=1);

require_once __DIR__ . '/../src/ContactValidator.php';

/** A valid submission that individual tests change one field of. */
function valid_contact_input(array $overrides = []): array
{
    return array_merge([
        'name'    => 'Ayesha Khan',
        'email'   => 'ayesha@example.com',
        'message' => 'I would like a demo of QuickPOS for my bakery.',
    ], $overrides);
}

return [
    'empty name is rejected' => function (): void {
        $result = ContactValidator::validate(valid_contact_input(['name' => '']));
        assert_true(isset($result['errors']['name']), 'expected an error for an empty name');
    },
    'name of only spaces is rejected' => function (): void {
        $result = ContactValidator::validate(valid_contact_input(['name' => '   ']));
        assert_true(isset($result['errors']['name']), 'expected an error for a blank name');
    },
    'invalid email is rejected' => function (): void {
        $result = ContactValidator::validate(valid_contact_input(['email' => 'ayesha.example.com']));
        assert_true(isset($result['errors']['email']), 'expected an error for an email without @');
    },
    'email with missing domain is rejected' => function (): void {
        $result = ContactValidator::validate(valid_contact_input(['email' => 'ayesha@']));
        assert_true(isset($result['errors']['email']), 'expected an error for "ayesha@"');
    },
    'empty email is rejected' => function (): void {
        $result = ContactValidator::validate(valid_contact_input(['email' => '']));
        assert_true(isset($result['errors']['email']), 'expected an error for an empty email');
    },
    'empty message is rejected' => function (): void {
        $result = ContactValidator::validate(valid_contact_input(['message' => '']));
        assert_true(isset($result['errors']['message']), 'expected an error for an empty message');
    },
    'message longer than 2000 characters is rejected' => function (): void {
        $result = ContactValidator::validate(valid_contact_input(['message' => str_repeat('a', 2001)]));
        assert_true(isset($result['errors']['message']), 'expected an error for a 2001-character message');
    },
    'missing fields are rejected, not a PHP error' => function (): void {
        $result = ContactValidator::validate([]);
        assert_same(['name', 'email', 'message'], array_keys($result['errors']), 'errors for all three fields');
    },
    'name length counts characters, not bytes (Urdu name of 100 letters is accepted)' => function (): void {
        $result = ContactValidator::validate(valid_contact_input(['name' => str_repeat('ع', 100)]));
        assert_same([], $result['errors']);
    },
    'valid input is accepted' => function (): void {
        $result = ContactValidator::validate(valid_contact_input());
        assert_same([], $result['errors'], 'valid input should have no errors');
    },
    'accepted values are trimmed' => function (): void {
        $result = ContactValidator::validate(valid_contact_input(['name' => '  Ayesha Khan  ', 'email' => ' ayesha@example.com ']));
        assert_same([], $result['errors']);
        assert_same('Ayesha Khan', $result['data']['name']);
        assert_same('ayesha@example.com', $result['data']['email']);
    },
    'error messages are understandable sentences' => function (): void {
        $result = ContactValidator::validate([]);
        foreach ($result['errors'] as $field => $message) {
            assert_true(strlen($message) > 10 && str_ends_with($message, '.'), "message for {$field} should be a full sentence");
        }
    },
];
