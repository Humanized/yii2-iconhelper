<?php

use yii\db\Migration;

class m160324_010239_icons extends Migration
{

    public function safeUp()
    {
        $this->createTable('icon_framework', [
            'id' => $this->string(10),
            'name' => $this->string(250)->notNull(),
            'url' => $this->string(2083)
        ]);
        $this->addPrimaryKey('id', 'icon_framework', 'id');
        $this->createTable('icon_register', [
            'id' => $this->primaryKey(),
            'name' => $this->string(250)->notNull()->unique(),
            'icon' => $this->string(250)->notNull(),
            'framework_id' => $this->string(10)->notNull(),
        ]);
        $this->addForeignKey('fk_icon_register_framework', 'icon_register', 'framework_id', 'icon_framework', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_icon_register_framework', 'icon_register');
        $this->dropTable('icon_framework');
        $this->dropTable('icon_register');
    }

}
