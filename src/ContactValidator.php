<?php
/**
 * Server-side validation for the contact form (POS2-22, POS2-39).
 *
 * Kept separate from the page markup so it can be tested without a browser:
 *   $result = ContactValidator::validate($_POST);
 *   $result['errors']  -> field => message (empty when the input is valid)
 *   $result['data']    -> trimmed values to redisplay or use
 *
 * The browser may also check the form, but only these server-side rules are trusted,
 * because anyone can send a POST request without using the page.
 */

declare(strict_types=1);

final class ContactValidator
{
    public const NAME_MAX = 100;
    public const MESSAGE_MAX = 2000;

    /**
     * @param array<string, mixed> $input Raw form input, usually $_POST.
     * @return array{data: array{name: string, email: string, message: string}, errors: array<string, string>}
     */
    public static function validate(array $input): array
    {
        $data = [
            'name'    => self::clean($input['name'] ?? ''),
            'email'   => self::clean($input['email'] ?? ''),
            'message' => self::clean($input['message'] ?? ''),
        ];

        $errors = [];

        if ($data['name'] === '') {
            $errors['name'] = 'Please enter your name.';
        } elseif (self::length($data['name']) > self::NAME_MAX) {
            $errors['name'] = 'Please keep your name under ' . self::NAME_MAX . ' characters.';
        }

        if ($data['email'] === '') {
            $errors['email'] = 'Please enter your email address.';
        } elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'Please enter a valid email address, like name@example.com.';
        }

        if ($data['message'] === '') {
            $errors['message'] = 'Please write a message so we know how to help.';
        } elseif (self::length($data['message']) > self::MESSAGE_MAX) {
            $errors['message'] = 'Please keep your message under ' . self::MESSAGE_MAX . ' characters.';
        }

        return ['data' => $data, 'errors' => $errors];
    }

    /**
     * Count characters (not bytes) so Urdu or accented names are measured fairly.
     * Uses PCRE, which is always built into PHP, instead of the optional mbstring extension.
     */
    private static function length(string $value): int
    {
        return (int) preg_match_all('/./su', $value);
    }

    /**
     * Convert any input to a trimmed string (arrays and other types become empty).
     * Also strips Unicode spaces such as U+00A0, which PHP's trim() leaves behind.
     */
    private static function clean(mixed $value): string
    {
        if (!is_scalar($value)) {
            return '';
        }

        $text = (string) $value;
        $trimmed = preg_replace('/^[\s\p{Z}\x{200B}\x{FEFF}]+|[\s\p{Z}\x{200B}\x{FEFF}]+$/u', '', $text);

        // preg_replace returns null for invalid UTF-8; fall back to a plain trim.
        return $trimmed ?? trim($text);
    }
}
