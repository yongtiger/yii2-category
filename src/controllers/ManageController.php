<?php ///[Yii2 category]

/**
 * Yii2 category
 *
 * @link        http://www.brainbook.cc
 * @see         https://github.com/yongtiger/yii2-category
 * @author      Tiger Yong <tigeryang.brainbook@outlook.com>
 * @copyright   Copyright (c) 2017 BrainBook.CC
 * @license     http://opensource.org/licenses/MIT
 */

namespace yongtiger\category\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yongtiger\category\Module;

/**
 * ManageController implements the CRUD actions for Category model.
 */
class ManageController extends Controller
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
public function actions()
{
    $modelClass = 'yongtiger\category\models\Category';

    return [
        'moveNode' => [
            'class' => 'voskobovich\tree\manager\actions\MoveNodeAction',
            'modelClass' => $modelClass,
        ],
        'deleteNode' => [
            'class' => 'voskobovich\tree\manager\actions\DeleteNodeAction',
            'modelClass' => $modelClass,
        ],
        'updateNode' => [
            'class' => 'voskobovich\tree\manager\actions\UpdateNodeAction',
            'modelClass' => $modelClass,
        ],
        'createNode' => [
            'class' => 'voskobovich\tree\manager\actions\CreateNodeAction',
            'modelClass' => $modelClass,
        ],
    ];
}
    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = Yii::createObject(Module::instance()->categorySearchModelClass); ///[v0.0.2 (CHG# Module config:model classes)]
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = Yii::createObject(Module::instance()->categoryModelClass); ///[v0.0.2 (CHG# Module config:model classes)]

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
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
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        ///[v0.0.2 (CHG# Module config:model classes)]
        $categoryModelClass = Module::instance()->categoryModelClass;
        if (($model = $categoryModelClass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
