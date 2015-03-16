<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%domain}}".
 *
 * @property integer $id
 * @property integer $tenant_id
 * @property integer $is_active
 * @property string $domain
 *
 * @property Tenant $tenant
 */
class Domain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%domain}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tenant_id', 'is_active', 'domain'], 'required'],
            [['tenant_id', 'is_active'], 'integer'],
            [['domain'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'tenant_id' => Yii::t('common', 'Tenant ID'),
            'is_active' => Yii::t('common', 'Is Active'),
            'domain' => Yii::t('common', 'Domain'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenant()
    {
        return $this->hasOne(Tenant::className(), ['id' => 'tenant_id']);
    }
}
