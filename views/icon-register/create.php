<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\icons\IconRegister */

$this->title = Yii::t('app', 'Create Icon Register');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Icon Registers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="icon-register-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>