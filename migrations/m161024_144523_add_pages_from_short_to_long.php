<?php

use yii\db\Migration;

class m161024_144523_add_pages_from_short_to_long extends Migration
{
    public function up()
    {
        $this->createTable('pages', [
            'id' => $this->primaryKey(),
            'short_address' => $this->string(255),
            'long_address' => $this->text(),
            'created_at' => $this->timestamp()
                ->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('pages_short_text', 'pages', 'short_address', true);
    }

    public function down()
    {
        $this->dropIndex('pages_short_text', 'pages');
        $this->dropTable('pages');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
