<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class BuecherUploadForm extends Buecher
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $path;
    public $thumbpath;
    public $smallpath;
    public $filepath;

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

    public function uploadIn($path) {
        if ($this->validate()) {
            $this->imageFile->saveAs($path . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    function createthumb($strGeometry = "100x220"){
        $strDst = strtolower($this->thumbpath);
        $strSrc = strtolower($this->filepath);

        $intWDst = substr($strGeometry,0, strpos($strGeometry,'x'));
        $intHDst = substr($strGeometry, strpos($strGeometry,'x')+1);

        list($intWSrc, $intHSrc, $type) = getimagesize($strSrc);     // create new dimensions, keeping aspect ratio
        $ratio = $intWSrc/$intHSrc;
        // Wenn Verh�ltnis von gew�nschten Ma�en gr��er als das Verh�ltnis vom Originalbild dann wird Breite angepasst ansonsten H�he
        if ($intWDst/$intHDst > $ratio) {$intWDst = floor($intHDst*$ratio);} else {$intHDst = floor($intWDst/$ratio);}

        switch ($type)
          {case 1:   //   gif -> jpg
             $imgSrc = imagecreatefromgif($strSrc);
             break;
           case 2:   //   jpeg -> jpg
             $imgSrc = imagecreatefromjpeg($strSrc);
             break;
           case 3:  //   png -> jpg
             $imgSrc = imagecreatefrompng($strSrc);
             break;
          }
        $imgDst = imagecreatetruecolor($intWDst, $intHDst);  //  resample

        imagecopyresampled($imgDst, $imgSrc, 0, 0, 0, 0, $intWDst, $intHDst, $intWSrc, $intHSrc);

        imagepng($imgDst, $strDst);    //  save new image
        if (file_exists($strDst)) {
            return True;
        }
        else {
            return false;
        }


    }

    function createSmallPng($strGeometry="700x800") {
        $strDst = strtolower($this->smallpath);
        $strSrc = strtolower($this->filepath);

        $intWDst = substr($strGeometry,0, strpos($strGeometry,'x'));
        $intHDst = substr($strGeometry, strpos($strGeometry,'x')+1);

        list($intWSrc, $intHSrc, $type) = getimagesize($strSrc);     // create new dimensions, keeping aspect ratio
        $ratio = $intWSrc/$intHSrc;
        // Wenn Verh�ltnis von gew�nschten Ma�en gr��er als das Verh�ltnis vom Originalbild dann wird Breite angepasst ansonsten H�he
        if ($intWDst/$intHDst > $ratio) {$intWDst = floor($intHDst*$ratio);} else {$intHDst = floor($intWDst/$ratio);}

        switch ($type)
          {case 1:   //   gif -> jpg
             $imgSrc = imagecreatefromgif($strSrc);
             break;
           case 2:   //   jpeg -> jpg
             $imgSrc = imagecreatefromjpeg($strSrc);
             break;
           case 3:  //   png -> jpg
             $imgSrc = imagecreatefrompng($strSrc);
             break;
          }
        $imgDst = imagecreatetruecolor($intWDst, $intHDst);  //  resample

        imagecopyresampled($imgDst, $imgSrc, 0, 0, 0, 0, $intWDst, $intHDst, $intWSrc, $intHSrc);

        imagejpeg($imgDst, $strDst);    //  save new image
        if (file_exists($strDst)) {
            return True;
        }
        else {
            return false;
        }
    }
}
