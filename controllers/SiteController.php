<?php

namespace app\controllers;

use app\models\Page;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @inheritdoc
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
        if(Yii::$app->request->isPost){
            $page = new Page();
            $page->long_address = $_POST['full_url'];
            $page->save();

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'res' => Yii::$app->getUrlManager()->getBaseUrl()."/".$page->short_address
            ];
        }else {
            $page = Page::findByUrl(substr(Yii::$app->request->url, 1));
            if(!empty($page)){
                $this->redirect($page->long_address);
            }

            return $this->render('index');
        }
    }
}