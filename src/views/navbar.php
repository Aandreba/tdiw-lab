<nav class="landscape-navbar">
    <div id="links">
        <a href="?at=categories">
            <span class="icon-home"></span>
            <?= t('categories') ?>
        </a>
        <a href="?at=products">
            <span class="icon-box"></span>
            <?= t('products') ?>
        </a>
    </div>
    <div id="auth">
        <a href="?at=login">
            <span class="icon-login"></span>
            <?= t('login') ?>
        </a>
        <a href="?at=register">
            <span class="icon-register"></span>
            <?= t('register') ?>
        </a>
    </div>
</nav>

<nav class="portrait-navbar">
    <button id="toggle-menu">
        <img src="/assets/icons/menu.svg" alt="menu">
    </button>
</nav>
