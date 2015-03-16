<?php

use yii\db\Schema;
use yii\db\Migration;

class m150315_205005_add_sample_tenants extends Migration
{
    const TENANT_TABLE_NAME = '{{%tenant}}';

    public function safeUp()
    {
        $this->insert(self::TENANT_TABLE_NAME, [
            'id' => 1,
            'subdomain' => 'sample',
        ]);
        $this->insert(self::TENANT_TABLE_NAME, [
            'id' => 2,
            'subdomain' => 'sample2',
        ]);
    }
    
    public function safeDown()
    {
        $this->delete(self::TENANT_TABLE_NAME, ['id' => 1]);
        $this->delete(self::TENANT_TABLE_NAME, ['id' => 2]);
    }
}
