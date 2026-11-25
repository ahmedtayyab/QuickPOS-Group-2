<?php
/**
 * Server-side validation for the contact form (POS2-22).
 *
 * Kept separate from the page markup so it can be tested without a browser:
 *   $result = ContactValidator::validate($_POST);
 *   $result['errors']  -> field => message (empty when the input is valid)
 *   $result['data']    -> trimmed values to redisplay or use
 */

declare(strict_types=1);

final class ContactValidator
{
    /**
     * @param array<string, mixed> $input Raw form input, usually $_POST.
     * @return array{data: array{name: string, email: string, message: string}, errors: array<string, string>}
     */
    public static function validate(array $input): array
    {
        // TODO (POS2-39): implement the validation rules. Written test-first, so
        // this stub accepts everything and the tests in tests/ fail until it is done.
        $data = [
            'name'    => (string) ($input['name'] ?? ''),
            'email'   => (string) ($input['email'] ?? ''),
            'message' => (string) ($input['message'] ?? ''),
        ];

        return ['data' => $data, 'errors' => []];
    }
}
