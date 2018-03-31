<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_departement extends CI_Migration {

	public function up()
	{
		// Drop table 'departement' if it exists
		// // $this->dbforge->drop_table('departement', TRUE);
		$this->dbforge->add_field(
			array(
				'id_departement' => array(
					'type' => 'BIGINT',
					'constraint' => '20',
					'auto_increment' =>TRUE
				),
				'departement_name' => array(
					'type'=>'VARCHAR',
					'constraint'=>'175',
					'null'=>TRUE
				),
				'description'=>array(
					'type'=>'TEXT',
					'null'=>TRUE
				),
				'status_departement'=>array(
					'type' => 'ENUM("aktif","pasif")',
					'default'=>'aktif',
					'null'=>TRUE,
				),
				'dibuat_pada'=>array(
					'type'=>'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
					'null'=>FALSE
				)
			)
		);
		$this->dbforge->add_key('id_departement', TRUE);
		$this->dbforge->create_table('departement');

	}

	public function down()
	{
		$this->dbforge->drop_table('departement', TRUE);
	}
}
