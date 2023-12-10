<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;

use yii\bootstrap5\Html;


AppAsset::register($this);




$this->registerCssFile(Yii::$app->request->baseUrl . '/css/main.css');
$this->title = 'Home Page';

?>

<style>
    @media screen and (max-width: 500px) {
        .nav {
        display: none;
        
    }
    }
</style>

<div class="home-page">

    <div class="home-head">
        <p>الرئيسية\ خدمات موتري</p>
    </div>
    <div class="home-heading">
        <h1>خدمات موتري</h1>
    </div>

    <div class="content">

        <div class="content-left">
            <div>
                <p>أعلن الآن على موتري.كوم</p>
                <p>تواصل معنا من خلال: <br> support@motory.com
                </p>
                <?= Html::img(Yii::getAlias('@web') . '/img/motory2.PNG', ); ?>
            </div>

        </div>

        <div class="content-right">
            <?php foreach ($services as $service): ?>
                <div class="content-right-card">
                    <div class="content-right-card-img">
                        <?= Html::img(Yii::getAlias('@web') . '/img/icon.PNG', ); ?>
                    </div>
                    <div class="content-right-card-des">
                        <h6>
                            <?= Yii::t('app', $service->category->subtitle) ?>
                        </h6>
                        <h4>
                            <?= Yii::t('app', $service->title) ?>
                        </h4>
                        <div class="content-right-price">

                            <div class="content-right-price-div">
                                <p>
                                    <?= Yii::t('app', 'سعر الخدمة') ?>
                                </p>
                                <div class="content-right-span">
                                    <h6>ريال</h6>
                                    <h6>
                                        <?= Yii::t('app', $service->price) ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="content-right-price-div">
                                <p>
                                    <?= Yii::t('app', 'الضمان') ?>
                                </p>
                                <div class="content-right-span">
                                    <h6>سنوات</h6>
                                    <h6>
                                        <?= Yii::t('app', $service->security) ?>
                                    </h6>
                                </div>

                            </div>



                        </div>
                    </div>

                    <div class="content-button">
                        <?= Html::a(Yii::t('app', 'طلب شراء الخدمه'), ['your-controller/your-action'], ['class' => 'btn btn-outline-primary']) ?>
                    </div>


                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>