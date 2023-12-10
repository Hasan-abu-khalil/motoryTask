<?php
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'category';
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
        <h1 class="display-4">category</h1>
    </div>

    <?php if (Yii::$app->session->hasFlash('message')): ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                <?= Yii::$app->session->getFlash('message') ?>
            </div>
        </div>

    <?php endif; ?>



    <div class="body-content">

        <div class="row">

            <div class="row">
                <span>
                    <?= Html::a('Create', ['/site/admin/create_category'], ['class' => 'btn btn-primary mb-3']) ?>
                </span>

            </div>

            <table class=" table caption-top ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">subTitle</th>

                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if (count($categories) > 0): ?>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $category->id; ?>
                                </th>
                                <td>
                                    <?php echo $category->title; ?>
                                </td>

                                <td>
                                    <?php echo $category->subtitle; ?>
                                </td>

                                <td>
                                    <span>
                                        <?= Html::a('<i class="fa fa-solid fa-pen m-2 "></i>', ['update', 'id' => $category->id], ['class', 'btn-primary']) ?>
                                    </span>

                                    <span>
                                        <?= Html::a('<i class="fa fa-solid fa-trash m-2 "></i>', ['delete', 'id' => $category->id], ['class', ' btn-danger ']) ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td>no Records Found !</td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>

    </div>
</div>