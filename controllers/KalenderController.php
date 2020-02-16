<?php

namespace app\controllers;

use Yii;
use app\models\Kalender;
use app\models\KalenderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * KalenderController implements the CRUD actions for Kalender model.
 */
class KalenderController extends Controller
{
    public $layout = 'backend/main';
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
     * Lists all Kalender models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KalenderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kalender model.
     * @param integer $id
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
     * Creates a new Kalender model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kalender();

        if ($model->load(Yii::$app->request->post())){
            
            $model->save();

            $kalenderId = $model->id;
            $kalenderName = $model->nama;

            $image = UploadedFile::getInstance($model, 'img');
            if ($image !== null) {
                $imageName = 'kal_img_' . $kalenderId . '_' . $kalenderName . '.' . $image->getExtension();
                $image->saveAs(Yii::getAlias('@kalenderImgPath') . '/' . $imageName);
                $model->img = $imageName;
            }

            $kalenderData = UploadedFile::getInstance($model, 'data');
            if ($kalenderData !== null ) {
                $dataName = 'kal_dat_' . $kalenderId . '_' . $kalenderName . '.' . $kalenderData->getExtension();
                $kalenderData->saveAs(Yii::getAlias('@kalenderDataPath') . '/' . $dataName);
                $model->data = $dataName;
            }
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kalender model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){

            $model->save();

            $kalenderId = $model->id;
            $kalenderName = $model->nama;

            $image = UploadedFile::getInstance($model, 'img');
            $imageName = 'kal_img_' . $kalenderId . '_' . $kalenderName . '.' . $image->getExtension();
            $image->saveAs(Yii::getAlias('@kalenderImgPath') . '/' . $imageName);
            $model->img = $imageName;

            $kalenderData = UploadedFile::getInstance($model, 'data');
            $dataName = 'kal_dat_' . $kalenderId . '_' . $kalenderName . '.' . $kalenderData->getExtension();
            $kalenderData->saveAs(Yii::getAlias('@kalenderDataPath') . '/' . $dataName);
            $model->data = $dataName;

            $model->save();
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kalender model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kalender model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kalender the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kalender::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
