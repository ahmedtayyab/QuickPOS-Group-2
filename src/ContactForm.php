<?php
/**
 * Contact-form state for the page (POS2-21, POS2-20).
 * Pure functions, so they can be tested without a browser or a web server.
 */

declare(strict_types=1);

require_once __DIR__ . '/ContactValidator.php';

final class ContactForm
{
    /** Plan ids used in pricing CTA links (?plan=...) => display name. */
    public const PLANS = [
        'basic'      => 'Basic',
        'pro'        => 'Pro',
        'enterprise' => 'Enterprise',
    ];

    /**
     * Empty form state, with the message pre-filled when a known plan was chosen (POS2-20).
     *
     * @param array<string, mixed> $query Usually $_GET.
     * @return array{data: array{name: string, email: string, message: string}, errors: array<string, string>, plan: ?string}
     */
    public static function initial(array $query): array
    {
        $plan = self::plan($query['plan'] ?? null);
        $message = $plan === null ? '' : 'Hi, I am interested in the QuickPOS ' . self::PLANS[$plan] . ' plan. ';

        return [
            'data'   => ['name' => '', 'email' => '', 'message' => $message],
            'errors' => [],
            'plan'   => $plan,
        ];
    }

    /**
     * Validate a POST submission. 'ok' is true when it can be accepted.
     *
     * @param array<string, mixed> $post Usually $_POST.
     * @return array{ok: bool, data: array{name: string, email: string, message: string}, errors: array<string, string>, plan: ?string}
     */
    public static function submit(array $post): array
    {
        $result = ContactValidator::validate($post);

        return [
            'ok'     => $result['errors'] === [],
            'data'   => $result['data'],
            'errors' => $result['errors'],
            'plan'   => self::plan($post['plan'] ?? null),
        ];
    }

    /** Return the plan id only if it is one of ours; anything else is ignored. */
    public static function plan(mixed $value): ?string
    {
        return is_string($value) && array_key_exists($value, self::PLANS) ? $value : null;
    }
}
