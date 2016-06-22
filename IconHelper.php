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
        $icon = NULL;
        if (!isset($model) || $model->framework_id == 'bdg') {
            $icon = isset($model) ? $model->icon : $input;
            $config['as_badge'] = TRUE;
        } else {
            $icon = Html::icon($model->icon, $config, ($model->framework_id == 'bsg' ? 'glyphicon glyphicon-' : 'fa fa-fw fa-'));
        }


        $output = $icon;
        if (isset($config['as_badge']) && $config['as_badge'] == TRUE) {
            $output = Html::badge($output, $config);
        }
        $label = (isset($config['label']) ? ' ' . $config['label'] : '');
        return $output . $label;
    }

}
