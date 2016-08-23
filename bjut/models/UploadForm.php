<?php
namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Article;
class UploadForm extends Model{
    /**     * @var UploadedFile     */
    public $imageFile;
    public $filename;
    public $filedir;
    public function rules(){
            return [[['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'imageFile' => '上传本地图片作为封面',
        ];
    }


    public function upload($fileid){
        if ($this->validate()){
            //封面的图./uploads/admin_id/article_id.extension
            //文本内的base64图片地址格式./uploads/admin_id/article_id/img
            $articlemodel = $this->findModel($fileid);
            if($articlemodel->article_image)
            {
                return true;
            }
            if(!$this->imageFile) return true;
            $filedir = './uploads/' . \Yii::$app->user->identity->admin_id .'/';
            $filename = $fileid. '.' . $this->imageFile->extension;
            if (!is_dir($filedir)) {
                mkdir($filedir);
            }
            $this->imageFile->saveAs("$filedir"."$filename");
            $article_imageurl = "$filedir"."$filename";
            return $article_imageurl;
        } else {        
                return false;
        }    
    }


    /*传入待处理字符串，将其中的base64转化为图片，并把url嵌入，将字符串返回 */
    public function base2img($string, $article_id, $admin_id)
    {

        $pattern = '/\"data:image\/.+;base64,\S+\"/U';
        $num = preg_match_all($pattern,$string,$img_array); // $num是图片数目
        //print_r($img_array);
        $key = 1;
        $str = $string;
        $filedir = "./uploads/$admin_id/$article_id";
        if (!is_dir($filedir)) {
            mkdir($filedir);
        }
        //print_r($img_array[0]);
        foreach ($img_array[0] as $value) {
            $imglogpattern = '/\"data:image\/.+;/U';
            preg_match($imglogpattern, $value, $imglogs);
            $imglog = $imglogs[0];
            $len = strlen($imglog) + 7;
            $imglog = substr($imglog, 12, -1);
            $imgcode = substr($value, $len, -1);
            $img = base64_decode($imgcode);
            $imgurl = "$filedir$key.$imglog"; 
            $str = str_replace($value, $imgurl, $str);
            $a = file_put_contents($imgurl, $img);
            $key ++ ;
        }

        return $str;
    }


    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}