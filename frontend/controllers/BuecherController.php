<?php

namespace frontend\controllers;

use Yii;
use common\models\Buecher;
use common\models\Relation;
use common\models\Ausleihen;
use common\models\Ort;
use common\models\BuecherUploadForm;
use frontend\assets\ApiToApp;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * BuecherController implements the CRUD actions for Buecher model.
 */
class BuecherController extends Controller
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
                      'actions' => ['index', 'finalbuecher', 'miep', 'index4', 'autobuch', 'myindex', 'buecheroffriends', 'create', 'update', 'delete', 'view', 'new', 'logout'],
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

    public function actionIndex4()
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


            $count = count($aryBuecherIds);
            if($count = 1) {
                // var_dump($aryUserIds);
                // exit;
                $aryBuecherIds = $aryBuecherIds[0];
            }
            // var_dump($aryBuecherIds);
            // exit;

            $dataProvider = new ActiveDataProvider([
              'query' =>  Buecher::find()->where('user_id = :id AND buecher_id = :ids', ['id' =>\Yii::$app->user->identity->id, 'ids' => $aryBuecherIds]),
            ]);
            return $this->render('index', [
              // 'searchModel' => $searchModel,
              'dataProvider' => $dataProvider,
            ]);
        } else {
          throw new NotFoundHttpException('Keine Ausgeliehenen Bücher');
        }
        // $buecher = Buecher::find()->where('user_id = :id AND buecher_id = :ids', ['id' =>\Yii::$app->user->identity->id, 'ids' => $aryBuecherIds])->asArray()->all();


        // $searchModel = new ausleihenSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    }

    public function getOrteofUser($user_id) {
      $aryOrteIds = array();
      $orte = Ort::find()->where('user_id = :id', ['id' => $user_id])->asArray()->all();
      if (!empty($orte)) {
        $aryUserIds = array();
        foreach ($orte as $key => $ort) {
          array_push($aryUserIds, $ort["ort_id"]);
        }
        $count = count($aryUserIds);
        if($count == 1) {
          $aryOrteIds = $aryUserIds[0];
        } else {
          $aryOrteIds = $aryUserIds;
        }
      } return $aryOrteIds;
    }

    public function actionFinalbuecher() {
      $thisuser = \Yii::$app->user->identity->id;
      $allebuecher = Buecher::find()->where('user_id = :id', ['id' => $thisuser])->asArray()->all();

      $aryOrteIds = $this->getOrteofUser($thisuser);
      // $aryOrteIds = array(7, 8, 9);
      // var_dump($aryOrteIds);
      // exit;

      // // $buecher = Buecher::find()->where('user_id = :id', ['id' => $aryUserIds])->asArray()->all();
      $buecher = Buecher::find()->where(['ort_id' => $aryOrteIds])->asArray()->all();

      // $dataProvider = new ActiveDataProvider([
      //     'query' => Buecher::find()->where('user_id = :id', ['id' => $thisuser]),
      // ]);
      // var_dump($buecher);
      // exit;

      $aryGroup = [];
      foreach ($buecher as $buch) {
        $groupKey = $buch["ort_id"];
        $aryGroup[$groupKey][] = $buch;
      }
      // var_dump($aryGroup);
      // exit;
      return $this->render('finalindex', [
        // 'dataProvider' => $dataProvider,
        'allebuecher'=> $allebuecher,
        'aryGroup' => $aryGroup,
        // 'buecher' => $buecher,
      ]);


    }

    public function getAusleihenFromUser($user_id) {

    }

    public function getAbgeschlosseneAusleihenOfUser($user_id) {
      $aryAusleihenIds = array();
      $ausleihen = Ausleihen::find()->where('user_id = :id and status = :status', ['id' => $user_id, 'status' => 1])->asArray()->all();
    }
    public function getAktuelleAusleihenOfUser($user_id) {
      $aryAusleihenIds = array();
      $ausleihen = Ausleihen::find()->where('user_id = :id and status = :status', ['id' => $user_id, 'status' => 0])->asArray()->all();
    }
    public function getAusleihenOfUser($user_id) {
      $aryAusleihenIds = array(); $ausleihen = Ausleihen::find()->where('user_id = :id', ['id' => $user_id])->asArray()->all();
    }
    public function getFriendsOfUser($user_id) {
      $aryFriendIds = array();
      $relations = Relation::find()->where('(user_id_big = :id or user_id = :id) and status = :status', ['id' => $user_id, 'status' => 1])->asArray()->all();
      if (!empty($relations)) {
        $aryUserIds = array();
        foreach ($relations as $key => $relation) {
          if ($relation["user_id_big"] == $user_id) {
            array_push($aryUserIds, $relation["user_id"]);
          } else {
             array_push($aryUserIds, $relation["user_id_big"]);
           }
         }
         $count = count($aryUserIds);
         if($count = 1) {
           $aryFriendIds = $aryUserIds[0];
         } else {
           $aryFriendIds = $aryUserIds;
         }
       } return $aryFriendIds;
     }





     public function actionBuecherOrte() {
       $aryOrteIds = getOrteofUser(\Yii::$app->user->identity->id); $buecher = Buecher::find()->where('user_id = :id', ['id' => $aryUserIds])->asArray()->all();
       $aryGroup = [];
       foreach ($buecher as $buch) {
         $groupKey = $buch->ort_id;
         $aryGroup[$groupKey][] = $buch;
       }
       return $this->render('testview2', [ 'aryGroup' => $aryGroup, ]);
     }



    public function actionMiep() {
      $aryFriendIds = $this->getFriendsOfUser(\Yii::$app->user->identity->id);
      $buecher = Buecher::find()->where('user_id = :id', ['id' => $aryFriendIds])->asArray()->all();
      $aryGroup = [];
      foreach ($buecher as $buch) {
        $groupKey = $buch['user_id']; $aryGroup[$groupKey][] = $buch;
      }
      // var_dump($aryGroup);
      // exit;
      return $this->render('testview', [ 'aryGroup' => $aryGroup, ]);
    }

    public function actionBuecheroffriends() {
      $thisuser = \Yii::$app->user->identity->id;
      $relations = Relation::find()->where('(user_id_big = :id or user_id = :id) and status = :status', ['id' => $thisuser, 'status' => 1])->asArray()->all();
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

          $count = count($aryUserIds);
          if($count = 1) {
              // var_dump($aryUserIds);
              // exit;
              $aryUserIds = $aryUserIds[0];
          }


          $buecher = Buecher::find()->where('user_id = :id', ['id' =>$aryUserIds])->asArray()->all();
          var_dump($buecher);
          exit;

          $dataProvider = new ActiveDataProvider([
              'query' =>  Buecher::find()->where('user_id = :id', ['id' =>$aryUserIds]),
          ]);

          return $this->render('index', [
              'dataProvider' => $dataProvider,
          ]);
      }

    }


    /**
     * Lists all Buecher models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Buecher::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIsbn2($isbn) {
        $model = new Buecher();

        $model->titel = "autoGenerate";
        $model->$isbn = 12345678;
        // $model->user_id = \Yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->user_id = \Yii::$app->user->identity->id;
            $model->save();
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }

    public function actionAutobuch($isbn = null) {
        $model = new Buecher();
        if(!empty($isbn)) {
          $model->isbn = $isbn;
        }
        if(isset($_POST['sort'])) {
          return $this->render('create3', [
              'model' => $model,
          ]);
        }
        // if(isset($_POST['sortaccept'])) {
        //   $model->user_id = \Yii::$app->user->identity->id;
        //   $model->save();
        //   return $this->redirect(['view', 'id' => $model->buecher_id]);
        // }
        // if(isset($_POST['button1']))
        // {
        // echo "Accept code here ";
        // }
        // if(isset($_POST['button2']))
        //   {
        //   echo "Reject code here ";
        //   }
        // if(isset($_POST['stop'])) {
        //   $dataProvider = new ActiveDataProvider([
        //       'query' => Buecher::find(),
        //   ]);
        //
        //   return $this->render('index', [
        //       'dataProvider' => $dataProvider,
        //   ]);
        // }
        if(isset($_POST['go'])) {
            $thisIsbn = $_POST['Buecher']['isbn'];
            $a = Buecher::find()->where('isbn = :thisIsbn', ['thisIsbn' => $thisIsbn])->one();
            $a = null;
            if (empty($a)) {
              $aryData = ApiToApp::getBookFormISBN($_POST['Buecher']['isbn']);
              $model->titel = $aryData["values"]["title"];
              $model->isbn = $aryData["values"]["isbn"];
              $model->beschreibung = $aryData["values"]["description"];
              $model->autor = $aryData["values"]["autor"];
              $model->kategorie = $aryData["values"]["kategorie"];
              $model->seitenzahl = $aryData["values"]["seitenzahl"];
              $model->imageFile = $aryData["values"]["imagelink"];
              // return $this->render('create', [
              //     'model' => $model,
              // ]);
            } else {
              // var_dump($a->titel);
              $model->titel = $a->titel;
              $model->isbn = $a->isbn;
              $model->beschreibung = $a->beschreibung;
              $model->autor = $a->autor;
              $model->kategorie = $a->kategorie;
              $model->seitenzahl = $a->seitenzahl;
              $model->imageFile = $a->imageFile;
            }
            return $this->render('create4', [
                'model' => $model,
            ]);
          // var_dump($aryData);
        } else if (($model->load(Yii::$app->request->post()) && $model->validate())) {
            var_dump($_POST);
            // var_dump($model->imageFile);
            exit;
            $model->user_id = \Yii::$app->user->identity->id;
            $up = UploadedFile::getInstance($model, 'imageFile');
            $model->save();
            if(empty($up)) {
                // var_dump($model->imageFile);
                // exit;
                $path = realpath(dirname(__FILE__) . "/../../frontend/web/images/covers");
                $filename = $model->buecher_id;
                $filepath = $path. "/" .$filename;
                file_put_contents($filepath, file_get_contents($model->imageFile));
            } else {
                $model->imageFile = $up->name;
                $path = realpath(dirname(__FILE__) . "/../../frontend/web/images/covers");
                // $path = realpath(dirname(__FILE__) . "/../../uploads/covers/");
                $filename = $model->buecher_id . "." . strtolower($up->extension);
                $filepath = $path. "/" .$filename;
                $up->saveAs($filepath);
            }
            return $this->redirect(['view', 'id' => $model->buecher_id]);
        } else if (isset($_POST['print'])) {
            echo "print code here ";
        } else {
            return $this->render('isbn', [
                'model' => $model,
            ]);
        }
        // if(isset($_POST['print']))
        //   {
        //   echo "print code here ";
        //   }
        //
        // if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        // // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     // $model->user_id = \Yii::$app->user->identity->id;
        //     // $model->save();
        //     // return $this->redirect(['isbn2', 'isbn' => $isbn]);
        // } else {
        //     return $this->render('isbn', [
        //         'model' => $model,
        //     ]);
        // }
    }

    /**
     * Lists all Buecher models.
     * @return mixed
     */
    public function actionMyindex()
    {
        $thisuser = \Yii::$app->user->identity->id;
        $dataProvider = new ActiveDataProvider([
            'query' => Buecher::find()->where('user_id = :id', ['id' => $thisuser]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Buecher model.
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
     * Creates a new Buecher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Buecher();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->buecher_id]);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->user_id = \Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->buecher_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreate2()
    {
        var_dump("mist");
        // $model = new Buecher();
        //
        // // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        // //     return $this->redirect(['view', 'id' => $model->buecher_id]);
        // if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        // // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     $model->user_id = \Yii::$app->user->identity->id;
        //     $model->save();
        //     return $this->redirect(['view', 'id' => $model->buecher_id]);
        // } else {
        //     return $this->render('create', [
        //         'model' => $model,
        //     ]);
        // }
    }

    /**
     * Updates an existing Buecher model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // $modelForm =  new BuecherUploadForm();
        if($model->load(Yii::$app->request->post())) {
          // $model->imageFile = UploadedFile::getInstance($model, 'imageFile')['name'];
          $up = UploadedFile::getInstance($model, 'imageFile');
          if(!empty($up)) {
            $model->imageFile = $up->name;
            $path = realpath(dirname(__FILE__) . "/../../frontend/web/images/covers");
            // $path = realpath(dirname(__FILE__) . "/../../uploads/covers/");
            $filename = $id . "." . strtolower($up->extension);
            $filepath = $path. "/" .$filename;
            $up->saveAs($filepath);
          }
          // var_dump($up->name);
          // exit;
          // $model->titel = "Määää";
          // if($model->validate()) {
          //   echo "looser.. ne warte";
          //   exit;
          // }
          // if($model->save()) {
          //   echo "looser.. ne warte";
          //    exit;
          // } else {
          //   echo "looser";
          //   exit;
          // }
          // var_dump($up);
          // exit;
          $model->save();

          return $this->redirect(['view', 'id' => $model->buecher_id]);
          // echo "miep";
          // exit;
        }

        // if(isset($_POST['sort'])) {
        //   echo "miep";
        //   exit;
        // }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        // if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // $model->user_id = \Yii::$app->user->identity->id;
            // $model->save();
            return $this->redirect(['view', 'id' => $model->buecher_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Buecher model.
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
     * Finds the Buecher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Buecher the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Buecher::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
