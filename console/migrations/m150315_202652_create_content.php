<?php

use yii\db\Schema;
use yii\db\Migration;

class m150315_202652_create_content extends Migration
{
    const CONTENT_TABLE_NAME = '{{%content}}';
    const TENANT_TABLE_NAME = '{{%tenant}}';

    public function safeUp()
    {
        $this->createTable(self::CONTENT_TABLE_NAME, [
            'id' => 'pk',
            'tenant_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'text' => Schema::TYPE_TEXT.' NOT NULL',
        ]);
        $this->addForeignKey('FK_content_tenant', self::CONTENT_TABLE_NAME, 'tenant_id', self::TENANT_TABLE_NAME, 'id');
    }

    public function safeDown()
    {
        $this->dropTable(self::CONTENT_TABLE_NAME);
    }
}
