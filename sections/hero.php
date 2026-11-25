<?php
/**
 * Epic POS2-3 · Hero — headline, subheading, CTAs (POS2-16) and POS dashboard mockup (POS2-17).
 * The mockup is plain HTML/CSS rendered from the sample data below, so it stays sharp at any size.
 */

$mockProducts = [
    ['name' => 'Cappuccino',     'price' => 450, 'tone' => 'brand'],
    ['name' => 'Chicken Wrap',   'price' => 690, 'tone' => 'accent'],
    ['name' => 'Iced Latte',     'price' => 520, 'tone' => 'sky'],
    ['name' => 'Blueberry Muffin', 'price' => 320, 'tone' => 'rose'],
    ['name' => 'Club Sandwich',  'price' => 780, 'tone' => 'accent'],
    ['name' => 'Mint Lemonade',  'price' => 380, 'tone' => 'brand'],
];

$mockCart = [
    ['name' => 'Cappuccino',   'qty' => 2, 'price' => 450],
    ['name' => 'Chicken Wrap', 'qty' => 1, 'price' => 690],
    ['name' => 'Mint Lemonade', 'qty' => 1, 'price' => 380],
];
$mockTotal = array_sum(array_map(fn ($item) => $item['qty'] * $item['price'], $mockCart));

$mockBars = [38, 52, 45, 70, 62, 84, 76]; // weekly sales, % of max
?>
<section class="hero" aria-labelledby="hero-title">
    <div class="container hero__inner">
        <div class="hero__copy">
            <p class="hero__badge"><span class="hero__badge-dot" aria-hidden="true"></span>Built for retail shops, cafés and pharmacies</p>
            <h1 id="hero-title">Checkout in seconds. Run your whole shop from one screen.</h1>
            <p class="lead hero__lead">
                QuickPOS brings sales, stock and customers together, so you serve faster,
                reorder before you run out and always know how your business is doing.
            </p>
            <div class="hero__actions">
                <a class="btn btn--primary btn--lg" href="#pricing">Get Started</a>
                <a class="btn btn--secondary btn--lg" href="#features">See features</a>
            </div>
            <ul class="hero__points">
                <li>No setup fee</li>
                <li>14-day free trial</li>
                <li>Works offline</li>
            </ul>
        </div>

        <div class="hero__visual">
            <figure class="mockup" role="img"
                    aria-label="QuickPOS register screen showing today's sales of Rs 84,250, a product grid and a cart ready to charge <?= e(pkr($mockTotal)) ?>">
                <div class="mockup__bar" aria-hidden="true">
                    <span class="mockup__dots"><i></i><i></i><i></i></span>
                    <span class="mockup__title">QuickPOS · Register 1</span>
                    <span class="mockup__status">Online</span>
                </div>
                <div class="mockup__body" aria-hidden="true">
                    <aside class="mockup__rail">
                        <span class="mockup__logo"><img src="assets/img/logo-mark.svg" alt="" width="24" height="24"></span>
                        <span class="mockup__icon is-active"></span>
                        <span class="mockup__icon"></span>
                        <span class="mockup__icon"></span>
                        <span class="mockup__icon"></span>
                    </aside>

                    <div class="mockup__main">
                        <div class="mockup__stats">
                            <div class="stat">
                                <span class="stat__label">Today's sales</span>
                                <strong class="stat__value">Rs 84,250</strong>
                                <span class="stat__trend">▲ 12%</span>
                            </div>
                            <div class="stat">
                                <span class="stat__label">Orders</span>
                                <strong class="stat__value">126</strong>
                                <span class="stat__trend">▲ 8%</span>
                            </div>
                            <div class="stat stat--chart">
                                <span class="stat__label">This week</span>
                                <span class="mini-bars">
                                    <?php foreach ($mockBars as $height): ?>
                                        <i style="height: <?= (int) $height ?>%"></i>
                                    <?php endforeach; ?>
                                </span>
                            </div>
                        </div>

                        <div class="mockup__search">Search products or scan barcode…</div>

                        <div class="mockup__products">
                            <?php foreach ($mockProducts as $product): ?>
                                <div class="product product--<?= e($product['tone']) ?>">
                                    <span class="product__thumb"></span>
                                    <span class="product__name"><?= e($product['name']) ?></span>
                                    <span class="product__price"><?= e(pkr($product['price'])) ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="mockup__cart">
                        <span class="cart__title">Current order <em>#1042</em></span>
                        <?php foreach ($mockCart as $item): ?>
                            <div class="cart__row">
                                <span><?= (int) $item['qty'] ?>× <?= e($item['name']) ?></span>
                                <span><?= e(pkr($item['qty'] * $item['price'])) ?></span>
                            </div>
                        <?php endforeach; ?>
                        <div class="cart__total"><span>Total</span><strong><?= e(pkr($mockTotal)) ?></strong></div>
                        <span class="cart__pay">Charge <?= e(pkr($mockTotal)) ?></span>
                    </div>
                </div>
            </figure>

            <div class="float-card float-card--stock" aria-hidden="true">
                <span class="float-card__icon">!</span>
                <span><strong>Low stock</strong>Oat milk · 4 left</span>
            </div>
            <div class="float-card float-card--sale" aria-hidden="true">
                <span class="float-card__icon float-card__icon--ok">✓</span>
                <span><strong>Payment received</strong>Card · Rs 1,970</span>
            </div>
        </div>
    </div>
</section>
