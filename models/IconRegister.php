<?php

namespace humanized\iconhelper\models;
use Yii;


/**
 * This is the model class for table "icon_register".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property string $framework_id
 *
 * @property IconFramework $framework
 */
class IconRegister extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icon_register';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'icon', 'framework_id'], 'required'],
            [['name', 'icon'], 'string', 'max' => 250],
            [['framework_id'], 'string', 'max' => 10],
            [['framework_id'], 'exist', 'skipOnError' => true, 'targetClass' => IconFramework::className(), 'targetAttribute' => ['framework_id' => 'id']],
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
            'icon' => Yii::t('app', 'Icon'),
            'framework_id' => Yii::t('app', 'Framework ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFramework()
    {
        return $this->hasOne(IconFramework::className(), ['id' => 'framework_id']);
    }



}
