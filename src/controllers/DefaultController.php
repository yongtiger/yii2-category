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
 * DefaultController implements the CRUD actions for Category model.
 */
class DefaultController extends Controller
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
     * @inheritdoc
     */
    public function actions()
    {
        $modelClass = Module::instance()->modelClass;
        return [
            'move' => [
                'class' => 'yongtiger\tree\actions\MoveAction',
                'modelClass' => $modelClass,
                'isMultipleTree' => true,
            ],
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $items = \yongtiger\category\models\Category::getTree([
            'map' => function ($item) {
                return [
                    'name' => $item['name'],
                    // 'sort' => $item['sort'],     ///for adjacency-list
                    // 'sort' => $item['lft'],      ///for nested-sets
                    // 'icon' => 'fa fa-cog',
                    // 'view-url' => ['category/default/view', 'id' => $item['id']],
                    // 'update-url' => ['category/default/update', 'id' => $item['id']],
                    // 'create-url' => ['category/default/create', 'id' => $item['id']],
                    // 'delete-url' => ['category/default/delete', 'id' => $item['id']],
                ];
            },
            // 'rootId' => 1,
            // 'sortOrder' => SORT_DESC,
            'itemsName' => 'nodes',
        ]);

        return $this->render('index', ['items' => $items]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = Yii::createObject(Module::instance()->modelClass); ///[v0.0.2 (CHG# Module config:model classes)]
        if ($model->load(Yii::$app->request->post())) {
            ///[parentId]
            $params = Yii::$app->getRequest()->getQueryParams();
            $model->parentId = empty($params['id']) ? 0 : (int)$params['id'];
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
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
        try {
            $this->findModel($id)->delete();
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Category model with its all children.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteAll($id)
    {
        try {
            $this->findModel($id)->deleteWithChildren();
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->redirect(['index']);
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        ///[v0.0.2 (CHG# Module config:model classes)]
        $modelClass = Module::instance()->modelClass;
        if (($model = $modelClass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
