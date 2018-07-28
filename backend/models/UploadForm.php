<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/10/20
 * Time: 下午5:20
 */

namespace backend\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class UploadForm extends ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $uploadFile;

    public function rules()
    {
        return [
            [['uploadFile'], 'file'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
           $this->uploadFile->saveAs('uploads/' . $this->uploadFile->baseName . '.' . $this->uploadFile->extension);
            return true;
        } else {
            var_dump($this->getErrors());
            return false;
        }
    }
}