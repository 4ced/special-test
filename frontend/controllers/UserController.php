<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use common\models\UserUploadForm;
use common\models\Relation;
use common\models\Profilbilder;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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

    // Status
    // 0 	Pending
    // 1 	Accepted
    // 2 	Declined
    // 3 	Blocked

    //! Man muss noch Constanten erstellen

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMe() {
      $thisuser = \Yii::$app->user->identity->id;
      $dataProvider = new ActiveDataProvider([
          'query' => User::find()->where('id = :id', ['id' => $thisuser]),
      ]);
      $model = $this->findModel($thisuser);

      return $this->render('me', [
          'dataProvider' => $dataProvider,
          'model' => $model,
      ]);
    }

    public function actionUpdateme($id) {
        $thisuser = \Yii::$app->user->identity->id;
        // $path = realpath(Yii::$app->params['uploadOrdner']) . "/";
        $path = realpath(dirname(__FILE__) . "/../../uploads/profile/");
        // $dataProvider = new ActiveDataProvider([
        //     'query' => UserUploadForm::find()->where('id = :id', ['id' => $thisuser]),
        //     // 'query' => User::find()->where('id = :id', ['id' => $thisuser]),
        // ]);
        //
        // return $this->render('updateme', [
        //     'dataProvider' => $dataProvider,

        $model = $this->findModel($thisuser);
        // $modelForm =  new UserUploadForm();
        // $modelForm =  UserUploadForm::find()->where('id = :id', ['id' => $thisuser]);

        if ($model->load(Yii::$app->request->post())) {
          $up = UploadedFile::getInstance($model, 'imageFile');
          // var_dump($_POST);
          // exit;
          $model->ort = $_POST ["User"]['ort'];
          $model->email = $_POST ["User"]['email'];
          $model->public_status = $_POST ["User"]['public_status'];

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // $modelForm->imageFile = UploadedFile::getInstance($modelForm, 'imageFile');
            if(!empty($up)) {
              $model->imageFile = $up->name;
              // $path = realpath('@web/images/profile/');
              // var_dump($path);
              // exit;
              $path = realpath(dirname(__FILE__) . "/../../frontend/web/images/profile");
              $filename = $id . "." . strtolower($up->extension);
              $filepath = $path. "/" .$filename;
              $up->saveAs($filepath);
            }
            $model->save();

            return $this->redirect(['me']);

            // if ($modelForm->upload()) {
            //     // file is uploaded successfully
            //     // return;
            //     if($model->save()) {
            //         return $this->redirect(['view', 'id' => $model->id]);
            //     }
            // } else {
            //     // return $this->redirect(['view', 'id' => $model->id]);
            // }
        } else {
            return $this->render('updateme', [
                'model' => $model,
                // 'modelForm' => $modelForm,
            ]);
        }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } else {
            // return $this->render('update', [
            //     'model' => $model,
            //     'modelForm' => $modelForm,
            // ]);
        // }
    }

    /**
     * See all other User
     * @return mixed
     */
    public function actionSeeme()
    {
        $thisuser = \Yii::$app->user->identity->id;
        $dataProvider = new ActiveDataProvider([
            // 'query' => UserUploadForm::find()->where('id = :id', ['id' => $thisuser]),
            'query' => User::find()->where('id = :id', ['id' => $thisuser]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * See all other User
     * @return mixed
     */
    public function actionSeeusers()
    {
        $thisuser = \Yii::$app->user->identity->id;
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where('id != :id', ['id' => $thisuser]),
        ]);

        return $this->render('users', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * See all other User, Who didnt block U.
     * @return mixed
     */
    public function actionSeeusersblock()
    {
        $thisuser = \Yii::$app->user->identity->id;
        // Alle Relationen hohlen, in denen der User enthalten ist und geblocket ist
        $relations = Relation::find()->where('(user_id_big = :id or user_id = :id) and status = :status', ['id' => $thisuser, 'status' => 3])->asArray()->all();
        // var_dump($relations);
        //  exit;
        //ein Array aller User
        $aryUserIds = array();
        if (!empty($relations)) {
            foreach ($relations as $key => $relation) {
                // var_dump($relation);
                if ($relation["user_id_big"] = $thisuser) {
                    array_push($aryUserIds, $relation["user_id"]);
                } else {
                    array_push($aryUserIds, $relation["user_id_big"]);
                }
            }
            // var_dump($aryUserIds);
            //  exit;
        }
        if (empty($aryUserIds)) {
            $dataProvider = new ActiveDataProvider([
                'query' => User::find()->where('id != :id', ['id' => $thisuser]),
            ]);
        } else {
            $dataProvider = new ActiveDataProvider([
                'query' => User::find()->where('id != :id and id != thisId', ['id' => $aryUserIds,'thisId' =>$thisuser]),
            ]);
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Lists all psiible User friend models.
     * @return mixed
     */
    public function actionSeefriends()
    {
      //Relations wo User enthalten ist und Status 2 haben
      $thisuser = \Yii::$app->user->identity->id;
      // Alle Relationen hohlen, in denen der User enthalten ist und geblocket ist
      $relations = Relation::find()->where('(user_id_big = :id or user_id = :id) and status = :status', ['id' => $thisuser, 'status' => 1])->asArray()->all();
    //   $relations = Relation::find();
    //   var_dump($relations);
    //   exit;
      //ein Array aller User

      if (!empty($relations)) {
          $aryUserIds = array();
          foreach ($relations as $key => $relation) {
              // var_dump($relation);
              if ($relation["user_id_big"] = $thisuser) {
                  array_push($aryUserIds, $relation["user_id"]);
              } else {
                  array_push($aryUserIds, $relation["user_id_big"]);
              }
          }
    //   if (!empty($relations)) {
    //       $aryUserIds = array();
    //       foreach ($relations as $key => $relation) {
    //           if ($relation->user_id_big = $thisuser) {
    //               array_push($aryUserIds, $relation->user_id);
    //           } else {
    //               array_push($aryUserIds, $relation->user_id_big);
    //           }
    //       }
        $count = count($aryUserIds);
        if($count = 1) {
            // var_dump($aryUserIds);
            // exit;
            $aryUserIds = $aryUserIds[0];
        } else {

        }

          $dataProvider = new ActiveDataProvider([
              'query' =>  User::find()->where('id = :id', ['id' => $aryUserIds]),
          ]);

          return $this->render('friends', [
              'dataProvider' => $dataProvider,
          ]);
      } else {
        throw new NotFoundHttpException("Du hats keine Freunde, du spasst.", 1);

      }
    }

    public function actionBlockfr($id) {

    }

    public function actionAcceptfr($id) {
        $thisuser = \Yii::$app->user->identity->id;
        $relations = Relation::find()->where('(user_id_big = :id or user_id = :id) and (user_id_big = :thisId or user_id = :thisId) and status = :status and user_id_action != :thisId', ['id' => $id, 'thisId' => $thisuser, 'status' => 0])->one();
        // $relations = Relation::find()->where('user_id_big = :id or user_id = :id and user_id_big = :thisId or user_id = :thisId and status = :status and user_id_action != :id', ['id' => $id, 'thisId' => $thisuser, 'status' => 0])->all();
        // var_dump($relations);
        // exit;
        $relations->status = 1;
        // $relations[0]->status = 1;
        if ($relations->save()) {
        // if ($relations[0]->save()) {
            return $this->redirect(['seefriends']);
        }
        // if (!empty($relations)) {
        //     foreach ($relations as $key => $relation) {
        //         $relation->status = 2;
        //         // $relation["status"] = 2;
        //     }
        // }
    }

    public function actionDeclinefr($id) {
        $thisuser = \Yii::$app->user->identity->id;
        $relations = Relation::find()->where('(user_id_big = :id or user_id = :id) and (user_id_big = :thisId or user_id = :thisId) and status = :status and user_id_action != :id', ['id' => $id, 'thisId' => $thisuser, 'status' => 0])->all();
        if (!empty($relations)) {
            foreach ($relations as $key => $relation) {
                $relation["status"] = 2;
            }
        }
        // if() {
        //
        // }
    }

    public function actionSeefriendrequests() {
        //Relations wo User enthalten ist und Status 2 haben
        $thisuser = \Yii::$app->user->identity->id;
        // Alle Relationen hohlen, in denen der User enthalten ist und geblocket ist
        $relations = Relation::find()->where('(user_id_big = :id or user_id = :id) and status = :status and user_id_action != :id', ['id' => $thisuser, 'status' => 0])->asArray()->all();
        // var_dump($relations);
        // exit;
        //ein Array aller User
        if (!empty($relations)) {
            $aryUserIds = array();
            foreach ($relations as $key => $relation) {
                // var_dump($relation);
                if ($relation["user_id_big"] = $thisuser) {
                    array_push($aryUserIds, $relation["user_id"]);
                } else {
                    array_push($aryUserIds, $relation["user_id_big"]);
                }
            }
            // var_dump($aryUserIds);
            // exit;
            $count = count($aryUserIds);
            if($count = 1) {
                // var_dump($aryUserIds);
                // exit;
                $aryUserIds = $aryUserIds[0];
            } else {

            }

            $dataProvider = new ActiveDataProvider([
                'query' =>  User::find()->where('id = :id', ['id' => $aryUserIds]),
            ]);
            //
            return $this->render('friendsrequest', [
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionAddfriend($id) {
      $relationModel = new Relation();
      $thisuser = \Yii::$app->user->identity->id;
      if ( $id < $thisuser) {
        $userBig = $thisuser;
        $userSmall = $id;
      } else {
        $userBig = $id;
        $userSmall = $thisuser;
      }
    //   $relationModel->
      $relationModel->user_id_big = $userBig;
      $relationModel->user_id = $userSmall;
      $relationModel->user_id_action = $thisuser;
      $relationModel->status = 0;
    //   $relationModel->save();
      if ($relationModel->save()) {
          return $this->redirect(['seefriends']);
      }
    }

    // public function actionSeeFriendRequest() {
    //     //ALle Realtions des USers hohlen die Pending sind und er nicht die Aktion ausgelöst hat
    //   Relation::find()->where('user_id_big = :id or user_id = :id and status = :status and user_id_action != :id', ['id' => $thisuser, 'status' => 0])->all();
    //   $dataProvider = new ActiveDataProvider([
    //       'query' => User::find(),
    //   ]);
    // }



    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
