<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$params = Yii::$app->params;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $params['siteDesc'] ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= $params['siteName'] ?> :: <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
        <?php
        NavBar::begin([
            'brandLabel' => $params['siteName'],
            'brandUrl' => Yii::$app->homeUrl,
            'innerContainerOptions' => [
                'class' => 'container-fluid'
            ],
            'options' => [
                'class' => 'navbar navbar-default',
            ],
        ]);

        if (Yii::$app->user->isGuest) {
            // Configure the menu items in params.php
            $menuItems = $params['guestMenuItems'];

            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            // Configure the menu items in params.php
            $menuItems = $params['userMenuItems'];

            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>';
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
    </div>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= $params['siteName'] ?> <?= date('Y') ?></p>

        <p class="pull-right"></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
