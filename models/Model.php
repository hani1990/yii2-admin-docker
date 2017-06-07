<?php
/**
 * Created by PhpStorm.
 * User: liuhan
 * Date: 16/10/27
 * Time: 上午11:56
 */

namespace app\models;
use yii\db\ActiveRecord;
use yii;

class Model extends ActiveRecord
{
    public static function getDb(){
        return Yii::$app->db2;
    }


}