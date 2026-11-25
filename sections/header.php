<?php
/** Epic POS2-2 · Navigation & Header — sticky header, section links and Sign Up CTA. */
?>
<header class="site-header" id="top">
    <div class="container site-header__inner">
        <a class="brand" href="#top" aria-label="QuickPOS home">
            <img class="brand__mark" src="assets/img/logo-mark.svg" alt="" width="32" height="32">
            <span class="brand__name">Quick<span>POS</span></span>
        </a>

        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav">
            <span class="nav-toggle__bars" aria-hidden="true"></span>
            <span class="visually-hidden">Open menu</span>
        </button>

        <nav class="site-nav" id="site-nav" aria-label="Main">
            <ul class="site-nav__list">
                <?php foreach (NAV_LINKS as $label => $href): ?>
                    <li><a class="site-nav__link" href="<?= e($href) ?>"><?= e($label) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <a class="btn btn--primary site-nav__cta" href="#pricing">Sign Up</a>
        </nav>
    </div>
</header>
