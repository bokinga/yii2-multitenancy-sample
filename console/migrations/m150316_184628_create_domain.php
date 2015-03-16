<?php

use yii\db\Schema;
use yii\db\Migration;

class m150316_184628_create_domain extends Migration
{
    const DOMAIN_TABLE_NAME = '{{%domain}}';
    const TENANT_TABLE_NAME = '{{%tenant}}';

    public function safeUp()
    {
        $this->createTable(self::DOMAIN_TABLE_NAME, [
            'id' => 'pk',
            'tenant_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'is_active' => Schema::TYPE_BOOLEAN.' NOT NULL',
            'domain' => Schema::TYPE_STRING.'(250) NOT NULL',
        ]);
        $this->addForeignKey('FK_domain_tenant', self::DOMAIN_TABLE_NAME, 'tenant_id', self::TENANT_TABLE_NAME, 'id');
    }

    public function safeDown()
    {
        $this->dropTable(self::DOMAIN_TABLE_NAME);
    }
}
