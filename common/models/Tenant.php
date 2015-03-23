<?php

namespace common\models;

use CrazyStudio\ActsAsTenant\TenantTrait;
use Yii;

/**
 * This is the model class for table "{{%tenant}}".
 *
 * @property integer $id
 * @property string $subdomain
 *
 * @property Content[] $contents
 */
class Tenant extends \yii\db\ActiveRecord
{
    use TenantTrait;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tenant}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subdomain'], 'required'],
            [['subdomain'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'subdomain' => Yii::t('common', 'Subdomain'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContents()
    {
        return $this->hasMany(Content::className(), ['tenant_id' => 'id']);
    }
}
