<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */

$this->title = 'Update service';
?>


<style>
    @media screen and (max-width: 500px) {
        .nav {
            display: none;

        }
    }
</style>
<div class="site-index container">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Update service</h1>
    </div>

    <div class="body-content">

        <?php
        $form = ActiveForm::begin() ?>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($service, 'title') ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($service, 'price')->input('number', ['step' => '0.01', 'min' => '0']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($service, 'security')->input('number', ['min' => '0']) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($service, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'title'), ['prompt' => 'Select Category']) ?>
                </div>
            </div>
        </div>




        <div class="row">
            <div class="form-group">
                <div class="col-lg-6 d-flex">
                    <div class="col-lg-3 m-1">
                        <?= Html::submitButton('Update service', ['class' => 'btn btn-primary']) ?>
                    </div>

                    <div class="col-lg-2 m-1">
                        <?= Html::a('Go Back', yii::$app->homeUrl, ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>