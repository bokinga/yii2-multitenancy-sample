<?php

use yii\db\Schema;
use yii\db\Migration;

class m150315_202451_create_tenant extends Migration
{
    const TENANT_TABLE_NAME = '{{%tenant}}';

    public function up()
    {
        $this->createTable(self::TENANT_TABLE_NAME, [
            'id' => 'pk',
            'subdomain' => Schema::TYPE_STRING.'(250) NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable(self::TENANT_TABLE_NAME);
    }
}
