<?php

namespace frontend\controllers;

use Yii;
use common\models\Ausleihen;
use common\models\User;
use common\models\ausleihenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AusleihenController implements the CRUD actions for Ausleihen model.
 */
class AusleihenController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Ausleihen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ausleihenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Ausleihen models.
     * @return mixed
     */
    public function actionIndex2()
    {
        $today = date("Y-m-d");
        $thisuser = \Yii::$app->user->identity->id;
        $ausleihen = Ausleihen::find()->where('leihende > :today AND user_id = :id AND status = :status', ['today' => $today, 'id' => $thisuser, 'status' => 0])->asArray()->all();
        // var_dump($ausleihen);
        // exit;
        if (!empty($ausleihen)) {
            $aryBuecherIds = array();
            foreach ($ausleihen as $key => $ausleihe) {
              // var_dump($ausleihe);
              array_push($aryBuecherIds, $ausleihe["buch_id"]);
                // if ($ausleihe["user_id_big"] = $thisuser) {
                //     array_push($aryUserIds, $relation["user_id"]);
                // } else {
                //     array_push($aryUserIds, $relation["user_id_big"]);
                // }
            }
            var_dump($aryBuecherIds);
            exit;


            $count = count($aryBuecherIds);
            if($count = 1) {
                // var_dump($aryUserIds);
                // exit;
                $aryBuecherIds = $aryBuecherIds[0];
            }

        }
        // $buecher = Buecher::find()->where('user_id = :id AND buecher_id = :ids', ['id' =>\Yii::$app->user->identity->id, 'ids' => $aryBuecherIds])->asArray()->all();

        $dataProvider = new ActiveDataProvider([
            'query' =>  Buecher::find()->where('user_id = :id AND buecher_id = :ids', ['id' =>\Yii::$app->user->identity->id, 'ids' => $aryBuecherIds]),
        ]);

        $searchModel = new ausleihenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ausleihen model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate3($buchid = null) {
      if (!empty($buchid)) {
        $model = new Ausleihen();
        $thisuser = \Yii::$app->user->identity->id;
        $list = ArrayHelper::map(User::find()->where('id != :id', ['id' => $thisuser])->all(), 'id', 'username');
        // var_dump($list);
        // exit;
        // $dataProvider = new ActiveDataProvider([
        //     'query' => User::find()->where('id != :id', ['id' => $thisuser]),
        // ]);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          // var_dump($_POST);
          $model->user_id = $thisuser;
          $model->buch_id = $buchid;
          $model->status = 0;
          $model->leihbeginn = date("Y-m-d", strtotime($model->leihbeginn));
          $model->leihende = date("Y-m-d", strtotime($model->leihende));
          $model->save();
          // var_dump($model);
          // exit;
          return $this->redirect(['view', 'id' => $model->ausleihen_id]);
        }

        return $this->render('create3', [
          'model' => $model,
          'list' => $list,
        ]);
      } else {
        // Fehler werfen
        throw new NotFoundHttpException('The requested page does not exist.');
      }
    }

    public function actionUpdate2($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->status = 1;
            $model->save();
            // var_dump()
            return $this->redirect(['view', 'id' => $model->ausleihen_id]);
        } else {
            return $this->render('update2', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Ausleihen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ausleihen();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->user_id = \Yii::$app->user->identity->id;
            $model->save();
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ausleihen_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Creates a new Ausleihen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate2()
    {
        $model = new Ausleihen();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->user_id = \Yii::$app->user->identity->id;
            $model->save();
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ausleihen_id]);
        } else {
            return $this->render('create2', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ausleihen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ausleihen_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ausleihen model.
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
     * Finds the Ausleihen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ausleihen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ausleihen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
