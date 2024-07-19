<?php
use yii\bootstrap5\Html;

$this->registerCssFile('@web/dist/static/css/main.css', ['depends' => []]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= Html::encode($this->title) ?></title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
        rel="stylesheet">

        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <header class="header">
            <div class="header__container">
                <div class="header__logo">
                <img src="/dist/images/logo.svg" alt="">
                <span>Школа котиків</span>
                </div>
                <nav class="header__nav">
                <ul class="header__nav-links">
                    <li><a href="#">Вступ</a></li>
                    <li><a href="#">Вартість</a></li>
                    <li><a href="#">Як ми вчимо</a></li>
                    <li><a href="#">Про школу</a></li>
                    <li><a href="#">Контакти</a></li>
                </ul>
                </nav>
                <div class="header__controls">
                <div class="langs">
                    <span class="lags__active">укр</span>
                    <span class="langs__arr">
                    <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1.5L6 5.5L11 1.5" stroke="#2E4054" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    </span>
                    <div class="langs__list"></div>
                </div>
                <div class="header__buttons">
                    <button class="button button__logout" type="button">Вийти</button>
                </div>
                <div class="avatar">
                    <a href="/cats">
                        <img src="/dist/images/avatar.png" alt="">
                    </a>
                </div>
                </div>
            </div>
            </header>

            <?= $content ?>

        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>