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
        $model = models\IconRegister::findOne(['name' => $input]);

        if (!isset($model) || $model->framework_id == 'bdg') {
            return Html::badge(isset($model) ? $model->icon : $input, $config);
        }
        return Html::badge(Html::icon($model->icon, $config, ($model->framework_id == 'bsg' ? 'glyphicon glyphicon-' : 'fa fa-'))) . (isset($config['label']) ? ' ' . $config['label'] : '');
    }

}
