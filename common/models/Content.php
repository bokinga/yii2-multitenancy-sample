<?php

namespace common\models;

use CrazyStudio\ActsAsTenant\ActsAsTenantTrait;
use CrazyStudio\ActsAsTenant\behaviors\TenantBehavior;
use Yii;

/**
 * This is the model class for table "{{%content}}".
 *
 * @property integer $id
 * @property integer $tenant_id
 * @property string $text
 *
 * @property Tenant $tenant
 */
class Content extends \yii\db\ActiveRecord
{
    use ActsAsTenantTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string']
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
            'text' => Yii::t('common', 'Text'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenant()
    {
        return $this->hasOne(Tenant::className(), ['id' => 'tenant_id']);
    }

    public function behaviors()
    {
        return [
            TenantBehavior::className(),
        ];
    }
}
