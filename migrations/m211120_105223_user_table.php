<?php
use nextvikas\authenticator\migrations\Migration;


/**
 * Class m211120_105223_user_table
 *
 * @author Vikas Pandey
 * @since 1.0
 */
class m211120_105223_user_table extends Migration
{
    public function up()
    {
    	$usertable = self::TABLE_USER;
		$this->execute("ALTER TABLE `{$usertable}` DROP IF EXISTS `authenticator`;");
        $this->execute("ALTER TABLE `{$usertable}` ADD `authenticator` VARCHAR(100) NULL DEFAULT NULL;");
    }

    public function down()
    {
        
    }
}
