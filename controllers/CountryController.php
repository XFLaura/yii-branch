<?php

namespace app\controllers;

use Yii;
use app\models\Country;
use app\models\CountrySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class CountryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * redirect
     * @return \yii\web\Response
     */

    public function actionRedirect()
    {
        //return \Yii::$app->response->redirect('http://www.sina.com', 301);

        return $this->redirect('http://www.baidu.com', 301);
    }

    /**
     * send file
     * @return $this
     */

    public function actionDownload()
    {
        return \Yii::$app->response->sendFile('/usr/local/var/log/nginx/error.log');
    }

    public function actionResponse()
    {
        /**
         *  Response
         */
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'message' => 'hello world',
            'code' => 100,
        ];
    }
    /**
     * Lists all Country models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new CountrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $session = Yii::$app->session;

        $session->setFlash('postDeleted', 'You have successfully deleted your post.');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'session_body' =>Yii::$app->session->getFlash('postDeleted'),
        ]);
    }

    /**
     * Displays a single Country model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Country model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Country();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Country model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->code]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Country model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * session
     */
    public function actionSession(){
        $session = Yii::$app->session;

        /**
         * 设置一个session变量，以下用法是相同的：
         */
        $session->set('language', 'en-US');
        $session['language'] = 'en-US';
        $_SESSION['language'] = 'en-US1';

        $language = $session->get('language');
        $language = $session['language'];

        if($session->has('language')){
           // echo "has sesion";
        }

        /**
         * 如下代码不会生效
         */
//        $session['captcha']['number'] = 5;
//        $session['captcha']['lifetime'] = 3600;
//        $session['captcha'] = [
//            'number' => 5,
//            'lifetime' => 3600,
//        ];

        $session['captcha'] = [
            'number' => 5,
            'lifetime' => 3600,
        ];

        $session['captcha'] = new \ArrayObject;
        $session['captcha']['number'] = 5;
        $session['captcha']['lifetime'] = 3600;
        $session['captcha.number'] = 6;
       // var_dump( $session['captcha.number']);


        $session->setFlash('postDeleted', 'You have successfully deleted your post.');
        echo $session->getFlash('postDeleted');
        $result = $session->hasFlash('postDeleted');

        // 请求 #1
        // 在名称为"alerts"的flash信息增加数据
        $session->addFlash('alerts', 'You have successfully deleted your post.');
        $session->addFlash('alerts', 'You have successfully added a new friend.');
        $session->addFlash('alerts', 'You are promoted.');
        $alerts = $session->getFlash('alerts');
var_dump($alerts);exit;
        var_dump($alerts);exit;

    }

    /**
     * log
     */
    public function actionLog(){
        Yii::trace('start calculating average revenue');


    }

    /**
     * 发送邮件
     * 密码重置
     */
    public function actionMail(){
        $mail= Yii::$app->mailer->compose('/country/reback',['username'=>'test','time'=>time(),'token'=>'1']);
        $mail->setTo('xifei24@163.com');
        $mail->setSubject("邮件测试");
        //$mail->setHtmlBody("<br>问我我我我我");    //发布可以带html标签的文本
        $mail->setSubject("找回密码");//邮件主题标题
        if($mail->send())
            echo "success";
        else
            echo "failse";
        die();
    }



}
