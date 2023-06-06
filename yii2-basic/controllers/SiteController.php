<?php

namespace app\controllers;

use app\models\TestModel;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\ServerErrorHttpException;
use function PHPUnit\Framework\throwException;

class SiteController extends Controller
{
//    public $enableCsrfValidation = false;
//    public $layout = 'base';

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

//    public function beforeAction($action)
//    {
////        echo '<pre>';
////        var_dump($action);
////        echo '</pre>';
//        if($action->id === 'index'){
//            echo "hello";
//            //$this->layout = 'admin'; //error because the layout admin doesn't exist
//            //$this->enableCsrfValidation = false; //is not SECURE
//
//        }
//        return parent::beforeAction($action);
//    }
//
//    public function afterAction($action, $result)
//    {
//        echo '<pre>';
//        var_dump($result);
//        echo '</pre>';
//        return parent::afterAction($action, $result);
//    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
//        Yii::$app->test->hello();
//        echo'<pre>';
//        var_dump(Yii::$app->test);
//        echo '</pre>';
//        Yii::$app->componentId;
//        echo '<pre>';
//        var_dump(Yii::$app->assetManager);
//        echo '</pre>';
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
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

    public function actionTest()
    {
        $test = new TestModel();
//        $test->name = 'Max';
        $test->surname = 'Doe';
        $test->email = 'max@example.com';
        $test->myAge= 25;
        foreach ($test as $attr => $value){
            echo $test->getAttributeLabel($attr) . ' = ' . $value . '<br>';
        }

        if($test->validate()){
            echo 'OK';
        }else{
            echo '<pre>';
            var_dump($test->errors);
            echo '</pre>';
            echo 'Error';
        }

        //echo $test->getAttributeLabel('name');
    }

    public function actionRequest()
    {
//        echo $id;
//        echo isset($_GET['id']) ? $_GET['id'] : null;
//        echo Yii::$app->request->get('id');
//        $id = Yii::$app->request->get('id', 50);
//    $get = Yii::$app->request->get();

        //$post = Yii::$app->request->post();

        $put = Yii::$app->request->getBodyParams();

        echo '<pre>';
        var_dump($put);
        echo '</pre>';
    }


//    public function actionHello($message)
//    {
//        return $this->render('Hello', [
//            'msg' => $message
//        ]);
//    }

    public function actionResponse()
    {
//    return 'Hello world';
//    return Yii::$app->response->content = 'Hello from, the actionResponse' ;
//    $response =Yii::$app->response;
//    $response->statusCode = 404;
//    return $response->content = 'Response with the status code 404';

//        throw new NotFoundHttpException();

//        throw new ServerErrorHttpException();

//        Yii::$app->response->format = Response::FORMAT_JSON;
//        return [
//            'name' => 'Mark',
//            'surname' => 'Someone'
//        ];

//        return $this->redirect('about');
//        return Yii::$app->response->redirect('index', 301);
//        return Yii::$app->response->sendContentAsFile('<h1>HELLO with send content as file</h1>', 'test.txt');
//        return Yii::$app->response->sendFile('Hello with sendFile</h1>', 'test.txt');
        return Yii::$app->response->sendStreamAsFile('Hello from Stream as file', 'test.txt'); //if the content is very large

    }
}
