<?php

namespace humanized\iconhelper\models\icons;

use Yii;

/**
 * This is the model class for table "icon_framework".
 *
 * @property string $id
 * @property string $name
 * @property string $url
 *
 * @property IconRegister[] $iconRegisters
 */
class IconFramework extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icon_framework';
    }

    public static function getSelectData()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 250],
            [['url'], 'string', 'max' => 2083],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'url' => Yii::t('app', 'Url'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIconRegisters()
    {
        return $this->hasMany(IconRegister::className(), ['framework_id' => 'id']);
    }

}
