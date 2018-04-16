<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="/public/styles/bootstrap.css" rel="stylesheet">
        <link href="/public/styles/main.css" rel="stylesheet">
        <script src="/public/scripts/jquery.js"></script>
        <script src="/public/scripts/form.js"></script>
        <script src="/public/scripts/popper.js"></script>
        <script src="/public/scripts/bootstrap.js"></script>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/">Квестра инвестра</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <?php if (isset($_SESSION['account']['id'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard/tariffs">Инвестиции</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard/referrals">Рефералы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard/history">История</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/account/profile">Профиль</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/account/logout">Выход</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/account/register">Регистрация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/account/login">Вход</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php echo $content; ?>
    </body>
</html>