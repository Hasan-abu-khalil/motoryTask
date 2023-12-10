<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');


$this->registerCssFile(Yii::$app->request->baseUrl . '/css/main.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title>
        <?= Html::encode($this->title) ?>
    </title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    
    <nav class="nav">
        <div class="nav-left">
            <?= Html::a(' قدّر سعر سيارتك <i class="fa fa-solid fa-clipboard-list"></i> ', ['/site/index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('بيع سيارتك  <i class="fa fa-thin fa-plus"></i>', ['/site/home'], ['class' => 'btn btn-outline-primary']) ?>
            <?= Html::a(' <i class="fa fa-thin fa-globe"></i> English ', ['/site/service'], ['class' => 'english']) ?>
        </div>
        <div class="nav-right">
            <?= Html::img(Yii::getAlias('@web') . '/img/motory.PNG', ['class' => 'logo']); ?>

        </div>
    </nav>

    <nav class="navs">
        <div class="nav-left">
            <?= Html::a('<i class="fa fa-solid fa-bars"></i>', ['/site/service'], ['class' => 'bar']) ?>
            <?= Html::a('قدّر ', ['/site/index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('بيع ', ['/site/home'], ['class' => 'btn btn-outline-primary']) ?>
        </div>
        <div class="nav-right">
            <?= Html::img(Yii::getAlias('@web') . '/img/motory.PNG', ['class' => 'logo']); ?>

        </div>
    </nav>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>