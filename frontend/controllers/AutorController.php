<?php

namespace frontend\controllers;

use Yii;
use common\models\Autor;
use common\models\autorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;

/**
 * AutorController implements the CRUD actions for Autor model.
 */
class AutorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
           //  [
           //     'class' => BlameableBehavior::className(),
           //     'createdByAttribute' => 'user_id',
           //     'updatedByAttribute' => false,
           //     'attributes' => [
           //         ActiveRecord::EVENT_BEFORE_VALIDATE => ['user_id'] // If usr_id is required
           //     ]
           // ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Autor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new autorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Autor models.
     * @return mixed
     */
    public function actionMyindex()
    {
        $searchModel = new autorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Autor model.
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
     * Creates a new Autor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Autor();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->user_id = \Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->autor_id]);
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->autor_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Autor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->autor_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Autor model.
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
     * Finds the Autor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Autor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Autor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
