<?php

namespace humanized\iconhelper;

use yii\base\Model;
use kartik\helpers\Html;

class IconHelper
{

    /**
     * 
     * @param type $name
     * @param array $config
     */
    public static function getIcon($input, array $config = [])
    {
        //Lookup DB Value corresponding to input
        $model = models\icons\IconRegister::findOne(['name' => $input]);

        if (!isset($model) || $model->framework_id == 'bdg') {
            return Html::badge($input, $config);
        }
        return Html::icon($icon, $config, ($model->framework_id == 'bsg' ? 'glyphicon glyphicon-' : 'fa fa-'));
    }

}
