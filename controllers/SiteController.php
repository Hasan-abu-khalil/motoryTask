<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Category;
use app\models\Services;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $categories = Category::find()->all();
        return $this->render('admin/category', ['categories' => $categories]);
    }




    public function actionCreate()
    {
        $category = new Category();
        $formData = Yii::$app->request->post();

        if ($category->load($formData)) {
            if ($category->save()) {
                Yii::$app->getSession()->setFlash('message', 'category published successfully');
                return $this->redirect(['index']);
            } else {
                Yii::$app->getSession()->setFlash('message', 'Failed to category.');
            }
        }

        return $this->render('admin/create_category', ['category' => $category]);
    }

    public function actionUpdate($id)
    {
        $category = Category::findOne($id);

        if ($category->load(Yii::$app->request->post()) && $category->save()) {
            Yii::$app->getSession()->setFlash('message', 'category updated successfully');
            return $this->redirect(['index', 'id' => $category->id]);
        } else {
            return $this->render('admin/update_category', ['category' => $category]);
        }
    }

    public function actionDelete($id)
    {
        $category = Category::findOne($id)->delete();

        if ($category) {
            Yii::$app->getSession()->setFlash('message', 'category Delete successfully');
            return $this->redirect(['index',]);
        }
    }




    public function actionService()
    {

        $services = Services::find()->all();

        return $this->render('admin/services', ['services' => $services]);
    }




    public function actionCreateService()
    {
        $service = new Services();
        $formData = Yii::$app->request->post();

        if ($service->load($formData)) {
            if ($service->save()) {
                Yii::$app->getSession()->setFlash('success', 'Service published successfully');
                return $this->redirect(['service']);
            } else {
                Yii::$app->getSession()->setFlash('error', 'Failed to publish service.');
            }
        }

        return $this->render('admin/create_service', ['service' => $service]);
    }

    public function actionUpdateService($id)
    {
        $service = Services::findOne($id);

        if ($service->load(Yii::$app->request->post()) && $service->save()) {
            Yii::$app->getSession()->setFlash('success', 'Service updated successfully');
            return $this->redirect(['service']);
        } else {
            return $this->render('admin/update_service', ['service' => $service]);
        }
    }

    public function actionDeleteService($id)
    {
        $service = Services::findOne($id);
        if ($service && $service->delete()) {
            Yii::$app->getSession()->setFlash('success', 'Service deleted successfully');
        } else {
            Yii::$app->getSession()->setFlash('error', 'Service not found or could not be deleted');
        }

        return $this->redirect(['service']);
    }




    public function actionHome()
    {

        $services = Services::find()->all();
        return $this->render('pages/home.php', ['services' => $services]);
    }













    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }



}
