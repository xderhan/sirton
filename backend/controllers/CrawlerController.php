<?php
namespace backend\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\widgets\ActiveForm;
use common\models\CrawlerForm;
use Goutte\Client;


class CrawlerController extends Controller
{

    protected $form = null;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'crawl'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'crawl' => ['post'],
                ],
            ],
        ];
    }

    protected function getCrawlerForm()
    {
        if ($this->form == null) {
            $this->form = new CrawlerForm();
        }

        return $this->form;
    }

    public function actionIndex()
    {
        $model = $this->getCrawlerForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $link = $model->link;
            $params = $model->params;

            $client = new Client();
            $crawler = $client->request('GET', $link);

            $paramsArray = explode("\n", $params);
            $paramsData = [];
            foreach ($paramsArray as $p) {
                $paramsData[$p] = $crawler->filter($p);
            }

            if (Yii::$app->request->isPjax) {
                return $this->renderPartial('result', ['data' => $paramsData]);
            } else {
                return $this->render('result', ['data' => $paramsData]);
            }
        } else {
            if (Yii::$app->request->isPjax) {
                return $this->renderPartial('index', [
                    'model' => $model,
                ]);
            } else {
                return $this->render('index', [
                    'model' => $model,
                ]);
            }
        }
    }

}
