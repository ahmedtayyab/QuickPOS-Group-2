<?php
/** Epic POS2-4 · Features — four feature cards with icons (POS2-18). */

$features = [
    [
        'icon'   => 'inventory',
        'title'  => 'Inventory Management',
        'text'   => 'Track stock across every shelf and branch in real time, and reorder before popular items run out.',
        'points' => ['Low-stock alerts', 'Barcode scanning'],
    ],
    [
        'icon'   => 'analytics',
        'title'  => 'Sales Analytics',
        'text'   => 'See daily takings, best sellers and peak hours on one dashboard, without exporting a single spreadsheet.',
        'points' => ['Live sales dashboard', 'Daily email summary'],
    ],
    [
        'icon'   => 'customers',
        'title'  => 'Customer Management',
        'text'   => 'Remember regulars, their purchase history and loyalty points, so every visit feels personal.',
        'points' => ['Loyalty rewards', 'Purchase history'],
    ],
    [
        'icon'   => 'integrations',
        'title'  => 'Integrations',
        'text'   => 'Connect card terminals, receipt printers, accounting tools and online stores in a few clicks.',
        'points' => ['Card & wallet payments', 'Accounting export'],
    ],
];
?>
<section class="section section--alt" id="features" aria-labelledby="features-title">
    <div class="container">
        <header class="section-head">
            <p class="eyebrow">Features</p>
            <h2 id="features-title">Everything your counter needs, nothing it doesn't</h2>
            <p class="lead">QuickPOS replaces the cash book, the stock register and the loyalty card box with one simple app.</p>
        </header>

        <ul class="feature-grid">
            <?php foreach ($features as $feature): ?>
                <li class="feature-card">
                    <span class="feature-card__icon"><?= icon($feature['icon']) ?></span>
                    <h3 class="feature-card__title"><?= e($feature['title']) ?></h3>
                    <p class="feature-card__text"><?= e($feature['text']) ?></p>
                    <ul class="feature-card__points">
                        <?php foreach ($feature['points'] as $point): ?>
                            <li><?= icon('check', 'icon icon--sm') ?><?= e($point) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
