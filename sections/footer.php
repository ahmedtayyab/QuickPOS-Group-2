<?php
/** Epic POS2-7 · Footer — copyright, meaningful links and social placeholders (POS2-24). */

$footerLinks = [
    'Product' => [
        'Features' => '#features',
        'Pricing'  => '#pricing',
        'Contact'  => '#contact',
    ],
    'Get started' => [
        'Start free trial' => '#pricing',
        'Talk to sales'    => '?plan=enterprise#contact',
        'Back to top'      => '#top',
    ],
];

/* Placeholder profiles: QuickPOS is fictional, so these point to each platform's home page. */
$socialLinks = [
    'facebook'  => ['Facebook', 'https://www.facebook.com/'],
    'instagram' => ['Instagram', 'https://www.instagram.com/'],
    'linkedin'  => ['LinkedIn', 'https://www.linkedin.com/'],
    'youtube'   => ['YouTube', 'https://www.youtube.com/'],
];
?>
<footer class="site-footer">
    <div class="container">
        <div class="site-footer__top">
            <div class="site-footer__brand">
                <a class="brand brand--light" href="#top" aria-label="QuickPOS, back to top">
                    <img class="brand__mark" src="assets/img/logo-mark.svg" alt="" width="32" height="32">
                    <span class="brand__name">Quick<span>POS</span></span>
                </a>
                <p class="site-footer__blurb">Point of Sale software that helps shops, cafés and pharmacies sell faster and stock smarter.</p>
                <ul class="social" aria-label="QuickPOS on social media (placeholder profiles)">
                    <?php foreach ($socialLinks as $iconName => [$label, $url]): ?>
                        <li>
                            <a class="social__link" href="<?= e($url) ?>" target="_blank" rel="noopener noreferrer"
                               aria-label="<?= e($label) ?> (placeholder, opens in a new tab)">
                                <?= icon($iconName) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php foreach ($footerLinks as $heading => $links): ?>
                <nav class="site-footer__col" aria-label="<?= e($heading) ?>">
                    <h2 class="site-footer__heading"><?= e($heading) ?></h2>
                    <ul>
                        <?php foreach ($links as $label => $href): ?>
                            <li><a href="<?= e($href) ?>"><?= e($label) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            <?php endforeach; ?>
        </div>

        <div class="site-footer__bottom">
            <p>&copy; <?= date('Y') ?> QuickPOS. All rights reserved.</p>
            <p>CS4002 semester project · Group 2 · Ahmad Tayyab (22F-8817)</p>
        </div>
    </div>
</footer>
