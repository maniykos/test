<?php
/**
 *  Class UrlShortenerController
 *  @author: Lezhnev (lezhnevod@gmail.com)
 *
*/
namespace frontend\controllers;

use Yii;
use frontend\models\UrlShortener;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UrlShortenerController implements the CRUD actions for UrlShortener model.
 */
class UrlShortenerController extends Controller
{
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [
                            'logout',
                            'index',
                            'create',
                            'update',
                            'view',
                            'redirect',
                            'delete',
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all UrlShortener models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UrlShortener::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UrlShortener model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UrlShortener model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UrlShortener();
        if ($model->load(Yii::$app->request->post())) {

            if (!$this->check_url($model->long_url)) {
                Yii::$app->session->setFlash('error', 'This Long Url is not active.');
            } else {

                if (!$model->short_url) {
                    $model->short_url = $this->generateText();
                }

                if ($model->save()) {
                    return $this->redirect(['index', 'id' => $model->id]);
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UrlShortener model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if (!$this->check_url($model->long_url)) {
                Yii::$app->session->setFlash('error', 'This Long Url is not active.');
            } else {

                if (!$model->short_url) {
                    $model->short_url = $this->generateText();
                }

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

        }
        return $this->render('update', [
            'model' => $model,
        ]);

    }

    /**
     * Deletes an existing UrlShortener model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UrlShortener model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UrlShortener the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UrlShortener::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     *  check for activity url
     */
    function check_url($url)
    {
        $status = get_headers($url);

        if (in_array("HTTP/1.1 200 OK", $status) or in_array("HTTP/1.0 200 OK", $status)) {

            return true;

        } else {
            return false;
        }
    }

    /**
     * generate text
     */
    function generateText()
    {
        $length = Yii::$app->params['urlShortener']['max_length'];
        $validCharacters = Yii::$app->params['urlShortener']['allowed_chars'];
        $validCharNumber = strlen($validCharacters);

        $result = "";

        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand(0, $validCharNumber - 1);
            $result .= $validCharacters[$index];
        }

        return $result;
    }

    /**
     * redirect by short url
     */
    function actionRedirect()
    {
        $model = new UrlShortener();
        $short_url = trim(Yii::$app->request->get('short'));

        $short = $model->findOne([
            'short_url' => $short_url
        ]);

        if ($short) {

            $short->count_activations++;
            $short->save();

            return $this->redirect($short->long_url);
        } else {
            Yii::$app->session->setFlash('error', 'This url is not valid');
            return $this->redirect('/');
        }
    }


}
