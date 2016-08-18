<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Article;
use app\modules\admin\models\AdminArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use app\models\UploadForm;
use yii\web\UploadedFile;


/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    public $layout = 'adminarticle';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','delete','update'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [   
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [   
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'adminarticle';
        //以下这句是原生搜索
        //$searchModel = new AdminArticleSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        // 由于这里是作者本人的博客，所有的文章是自己的ID发表的，按照时间顺序排列
        // 使用 原生PHP操作数据库 的方式进行查询 ，使用dataProvider进行分页
        $query = Article::find()->where(['article_author_id' => Yii::$app->user->identity->admin_id]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => 3]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderby('article_id DESC')->all();

        return $this->render('index', [
             'models' => $models,
             'pages' => $pages,
        ]);


        //以下是原生模型视图交互
        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'adminarticle';
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionAjaxform()
    {
        $this->layout = 'adminajax';
        return $this->render('ajaxform');
    }

    public function actionTest()
    {
        $this->layout = 'adminajax';
        return $this->render('test');
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'adminarticleajax';

        $model = new Article();

        $filemodel = new UploadForm();

        $model->article_author_id = Yii::$app->user->identity->admin_id;

        if ($model->load(Yii::$app->request->post())) {
            //echo "开始处理";
            $model->article_content = $filemodel->base2img($model->article_content,$model->article_id,$model->article_author_id);
            if (!$model->save()) {
                echo "保存失败，图片过大";
            }

            // 图片保存。如果是POST请求
            if (Yii::$app->request->isPost) {
                $filemodel->imageFile = UploadedFile::getInstance($filemodel, 'imageFile');
                if ($imgurl = $filemodel->upload($model->article_id)) {
                    // 图片上传成功后，先把封面地址提取
                    $model->article_image = $imgurl;
                    // 图片文件上传成功后，将文本中的图片提取
                    //$model->article_content = $filemodel->base2img($model->article_content,$model->article_id,$model->article_author_id);
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->article_id]);
                    }
                    else{echo "第二次保存失败";}
                }
            }
            return $this->redirect(['view', 'id' => $model->article_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'filemodel' => $filemodel,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'adminarticleajax';
        
        $model = $this->findModel($id);

        $filemodel = new UploadForm();

        if (Yii::$app->user->identity->admin_id != $model->article_author_id) {

            throw new ForbiddenHttpException('禁止篡改别人的文章！');
        }
        
        $model->article_author_id = Yii::$app->user->identity->admin_id;

        if ($model->load(Yii::$app->request->post())&& $model->save()) {
            // 图片保存。如果是POST请求
            if (Yii::$app->request->isPost) {
                $filemodel->imageFile = UploadedFile::getInstance($filemodel, 'imageFile');

                if ($imgurl = $filemodel->upload($model->article_id)) {
                    $model->article_image = $imgurl;
                    // 图片文件上传成功后，加载文本中的base64
                    $model->article_content = $filemodel->base2img($model->article_content,$model->article_id,$model->article_author_id);
                   if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->article_id]);
                    }
                    else{echo "第二次保存失败";}
                }
            }
            return $this->redirect(['view', 'id' => $model->article_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'filemodel' => $filemodel,
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->user->identity->admin_id != $model->article_author_id) {

            throw new ForbiddenHttpException('禁止篡改别人的文章！');
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
