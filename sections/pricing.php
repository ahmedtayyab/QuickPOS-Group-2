<?php
/**
 * Epic POS2-5 · Pricing — Basic, Pro and Enterprise plans (POS2-19).
 * Prices are monthly in PKR; yearly billing gives two months free. No payment processing.
 */

const YEARLY_MONTHS_CHARGED = 10; // pay for 10 months, get 12

$plans = [
    [
        'id'       => 'basic',
        'name'     => 'Basic',
        'summary'  => 'For a single counter getting started.',
        'monthly'  => 2499,
        'featured' => false,
        'features' => ['1 register', 'Up to 500 products', 'Daily sales report', 'Email support'],
        'cta'      => 'Choose Basic',
    ],
    [
        'id'       => 'pro',
        'name'     => 'Pro',
        'summary'  => 'For busy shops that need stock and customer insight.',
        'monthly'  => 5999,
        'featured' => true,
        'features' => ['Up to 3 registers', 'Unlimited products', 'Inventory alerts & reorders', 'Customer loyalty points', 'Priority chat support'],
        'cta'      => 'Choose Pro',
    ],
    [
        'id'       => 'enterprise',
        'name'     => 'Enterprise',
        'summary'  => 'For chains with several branches.',
        'monthly'  => 14999,
        'featured' => false,
        'features' => ['Unlimited registers', 'Multi-branch stock transfer', 'Advanced analytics & exports', 'Accounting integrations', 'Dedicated account manager'],
        'cta'      => 'Contact Sales',
    ],
];

/** Effective monthly price when billed yearly. */
function yearly_monthly_price(int $monthly): int
{
    return (int) round($monthly * YEARLY_MONTHS_CHARGED / 12);
}
?>
<section class="section" id="pricing" aria-labelledby="pricing-title">
    <div class="container">
        <header class="section-head">
            <p class="eyebrow">Pricing</p>
            <h2 id="pricing-title">Simple plans that grow with your shop</h2>
            <p class="lead">Start with a 14-day free trial on any plan. No setup fee, cancel anytime.</p>
        </header>

        <div class="billing-toggle" role="group" aria-label="Billing period" hidden>
            <button type="button" class="billing-toggle__btn is-active" data-billing="monthly" aria-pressed="true">Monthly</button>
            <button type="button" class="billing-toggle__btn" data-billing="yearly" aria-pressed="false">
                Yearly <span class="billing-toggle__save">2 months free</span>
            </button>
        </div>

        <div class="pricing-grid" aria-live="polite">
            <?php foreach ($plans as $plan):
                $yearly = yearly_monthly_price($plan['monthly']); ?>
                <article class="plan<?= $plan['featured'] ? ' plan--featured' : '' ?>" aria-labelledby="plan-<?= e($plan['id']) ?>">
                    <?php if ($plan['featured']): ?>
                        <p class="plan__badge">Most popular</p>
                    <?php endif; ?>
                    <h3 class="plan__name" id="plan-<?= e($plan['id']) ?>"><?= e($plan['name']) ?></h3>
                    <p class="plan__summary"><?= e($plan['summary']) ?></p>
                    <p class="plan__price">
                        <span class="plan__amount"
                              data-monthly="<?= e(pkr($plan['monthly'])) ?>"
                              data-yearly="<?= e(pkr($yearly)) ?>"><?= e(pkr($plan['monthly'])) ?></span>
                        <span class="plan__period">/ month</span>
                    </p>
                    <p class="plan__billing" data-monthly="Billed monthly" data-yearly="Billed yearly: <?= e(pkr($yearly * 12)) ?>">Billed monthly</p>
                    <a class="btn <?= $plan['featured'] ? 'btn--primary' : 'btn--secondary' ?> btn--block plan__cta"
                       href="?plan=<?= e($plan['id']) ?>#contact"><?= e($plan['cta']) ?></a>
                    <ul class="plan__features">
                        <?php foreach ($plan['features'] as $feature): ?>
                            <li><?= icon('check', 'icon icon--sm') ?><?= e($feature) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            <?php endforeach; ?>
        </div>

        <p class="pricing-note">Prices in Pakistani rupees, excluding tax. QuickPOS is a fictional product, so no payment is taken on this site.</p>
    </div>
</section>
