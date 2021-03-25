<?php
namespace nextvikas\authenticator\migrations;

class Migration extends \yii\db\Migration
{
    const TABLE_USER = 'admin';

    public function getTableOptions()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        return $tableOptions;
    }
}
