<link rel="stylesheet" href="assets/navbarCss.css?v=1.0">

<nav class="landscape-navbar">
    <div id="links">
        <a href="?">Home</a>
        <a href="?at=categories"><?= t('categories') ?></a>
        <a href="?at=cart">Cart</a>
    </div>
    <div id="auth">
        <?php if (isset($_SESSION["user"])): ?>
            <div class="user">
                <span class="usertag">User</span>
                <ul class="userpopup">
                    <li>My Account</li>
                    <li><a href="?at=orders">My Orders</a></li>
                    <li><a href="?at=signout"><?= t('logout') ?></a></li>
                </ul>
            </div>
        <?php else: ?>
            <a href="?at=signin"><?= t('login') ?></a>
            <a href="?at=signup"><?= t('register') ?></a>
        <?php endif; ?>
    </div>
</nav>

<div class="portrait-navbar">
    <nav id="menu">
        <div id="links">
            <a href="?">Home</a>
            <a href="?at=categories"><?= t('categories') ?></a>
            <a href="?at=cart">Cart</a>
        </div>
        <div id="auth">
            <?php if (isset($_SESSION["user"])): ?>
                <a href="?at=signout">
                    <img src="assets/icons/log-out.svg" alt="<?= t('logout') ?>">
                </a>
            <?php else: ?>
                <a href="?at=signin">
                    <img src="assets/icons/log-in.svg" alt="<?= t('login') ?>">
                </a>
                <a href="?at=signup">
                    <img src="assets/icons/register.svg" alt="<?= t('register') ?>">
                </a>
            <?php endif; ?>
            <span>Carrito</span>
        </div>
    </nav>

    <button id="toggle-menu">
        <img src="assets/icons/menu.svg" alt="menu">
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const user = document.querySelector('.landscape-navbar .user');
        if (user) {
            user.addEventListener('click', () => {
                user.classList.toggle('active');
            });
        }

        const portrait = document.querySelector('.portrait-navbar');
        const toggle = portrait.querySelector('#toggle-menu');
        const menu = portrait.querySelector('#menu');

        toggle.addEventListener('click', () => {
            menu.classList.toggle('open');
        });
    });
</script>
