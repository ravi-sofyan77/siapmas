<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_menu extends CI_Migration {

	public function up()
	{
		// Drop table 'menu' if it exists
		// // $this->dbforge->drop_table('menu', TRUE);
		$this->dbforge->add_field(
			array(
				'id_menu' => array(
					'type' => 'BIGINT',
					'constraint' => '20',
					'auto_increment' =>TRUE
				),
				'id_groups' => array(
					'type'       => 'MEDIUMINT',
					'constraint' => '8',
					'null' => TRUE
				),
				'menu'=>array(
					'type'=>'VARCHAR',
					'constraint'=>'175',
					'null'=>TRUE
				),
				'halaman'=>array(
					'type'=>'VARCHAR',
					'constraint'=>'175',
					'null'=>TRUE
				),
				'status_menu'=>array(
					'type' => 'ENUM("aktif","pasif")',
					'default'=>'aktif',
					'null'=>TRUE,
				),
				'dibuat_pada'=>array(
					'type'=>'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
					'null'=>FALSE
				),
				'user_id'=>array(
					'type'=>'BIGINT',
					'constraint'=>'20',
					'null'=>TRUE
				)
			)
		);
		$this->dbforge->add_key('id_menu', TRUE);
		$this->dbforge->create_table('menu');

	}

	public function down()
	{
		$this->dbforge->drop_table('menu', TRUE);
	}
}
