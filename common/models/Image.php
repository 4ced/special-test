<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Image extends User
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    // public function load($data, $formName = NULL) {
    //     return parent::load($data, $formName = NULL);
    // }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
