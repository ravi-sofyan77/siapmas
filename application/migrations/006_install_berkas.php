<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_berkas extends CI_Migration {

	public function up()
	{
		// Drop table 'berkas' if it exists
		// // $this->dbforge->drop_table('berkas', TRUE);
		$this->dbforge->add_field(
			array(
				'id_berkas' => array(
					'type' => 'BIGINT',
					'constraint' => '20',
					'auto_increment' =>TRUE
				),
				'nama_berkas' => array(
					'type' => 'TEXT',
					'null' => TRUE
				),
				'jenis_berkas'=>array(
					'type'=>'TEXT',
					'null'=>TRUE
				),
				'path_berkas'=>array(
					'type'=>'TEXT',
					'null'=>TRUE
				),
				'tautan_berkas'=>array(
					'type'=>'TEXT',
					'null'=>TRUE
				),
				'dibuat_pada'=>array(
					'type'=>'TIMESTAMP',
					'null'=>TRUE
				),
				'dibuat_oleh'=>array(
					'type'=>'VARCHAR',
					'constraint'=>'175',
					'null'=>TRUE
				),
				'dibuat_oleh_id'=>array(
					'type'=>'BIGINT',
					'constraint'=>'20',
					'null'=>TRUE
				)
			)
		);
		$this->dbforge->add_key('id_berkas', TRUE);
		$this->dbforge->create_table('berkas', TRUE);

	}

	public function down()
	{
		$this->dbforge->drop_table('berkas', TRUE);
	}
}
