<?php

namespace frontend\controllers;

use Yii;
use common\models\Ort;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * OrteController implements the CRUD actions for Ort model.
 */
class OrteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
               'class' => BlameableBehavior::className(),
               'createdByAttribute' => 'user_id',
               'updatedByAttribute' => false,
               'attributes' => [
                   ActiveRecord::EVENT_BEFORE_VALIDATE => ['user_id'] // If usr_id is required
               ]
           ],
          'access' => [
              'class' => AccessControl::className(),
              // 'only' => ['login', 'logout', 'signup'],
              'rules' => [
                  [
                      'actions' => ['login', 'signup'],
                      'allow' => true,
                      // 'roles' => ['?'],
                  ],
                  [
                      'actions' => ['index', 'myindex', 'create', 'update', 'view', 'new', 'logout'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
          ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ort models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Ort::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Ort models.
     * @return mixed
     */
    public function actionMyindex()
    {

        $thisuser = \Yii::$app->user->identity->id;
        $dataProvider = new ActiveDataProvider([
            'query' => Ort::find()->where('user_id = :id', ['id' => $thisuser]),
        ]);
        $orte = Ort::find()->where('user_id = :id', ['id' => $thisuser])->asArray()->all();

        // $dataProvider = new ActiveDataProvider([
        //     'query' => Ort::find(),
        // ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'orte' => $orte,
        ]);
    }

    /**
     * Displays a single Ort model.
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
     * Creates a new Ort model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ort();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->user_id = \Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->ort_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ort model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ort_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ort model.
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
     * Finds the Ort model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ort the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ort::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
