<?php
/** Tests for the shared helpers in includes/config.php (POS2-26 smoke tests for CI). */

declare(strict_types=1);

require_once __DIR__ . '/../includes/config.php';

return [
    'e() escapes HTML special characters' => function (): void {
        assert_same('&lt;script&gt;alert(&quot;x&quot;)&lt;/script&gt;', e('<script>alert("x")</script>'));
    },
    'e() escapes single quotes and handles null' => function (): void {
        assert_same('O&#039;Reilly', e("O'Reilly"));
        assert_same('', e(null));
    },
    'pkr() formats rupees with thousands separators' => function (): void {
        assert_same('Rs 1,970', pkr(1970));
        assert_same('Rs 14,999', pkr(14999));
    },
    'NAV_LINKS point at the three required sections' => function (): void {
        assert_same(['Features' => '#features', 'Pricing' => '#pricing', 'Contact' => '#contact'], NAV_LINKS);
    },
];
