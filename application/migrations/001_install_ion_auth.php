<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_ion_auth extends CI_Migration {

	public function up()
	{
		
		
		// Table structure for table 'groups'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '125',
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => '225',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('groups', TRUE);

		// Dumping data for table 'groups'
		$groups = array(
			array(
				'id' => '11',
				'name' => 'admin'
			),
			array(
				'id' => '1',
				'name' => 'sekertaris'
			),
			array(
				'id' => '2',
				'name' => 'seksi'
			),
			array(
				'id' => '3',
				'name' => 'kepala_seksi'
			)
		);
		$this->db->insert_batch('groups', $groups);


		// Drop table 'users' if it exists
		// $this->dbforge->drop_table('users', TRUE);

		// Table structure for table 'users'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => '16'
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '80',
			),
			'salt' => array(
				'type' => 'VARCHAR',
				'constraint' => '40'
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
			'activation_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => TRUE
			),
			'forgotten_password_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => TRUE
			),
			'forgotten_password_time' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'remember_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => TRUE
			),
			'created_on' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
			),
			'last_login' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'active' => array(
				'type' => 'TINYINT',
				'constraint' => '1',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'real_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE
			)

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users', TRUE);

		// Dumping data for table 'users'
		$data = array(
			'id' => '1',
			'ip_address' => '127.0.0.1',
			'username' => 'administrator',
			'password' => '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',
			'salt' => '',
			'email' => 'admin@admin.com',
			'activation_code' => '',
			'forgotten_password_code' => NULL,
			'created_on' => time(),
			'last_login' => time(),
			'active' => '1',
			'real_name' => 'superadmin'
		);
		$this->db->insert('users', $data);


		// Drop table 'users_groups' if it exists
		// $this->dbforge->drop_table('users_groups', TRUE);

		// Table structure for table 'users_groups'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'user_id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE
			),
			'group_id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users_groups');

		// Dumping data for table 'users_groups'
		$data = array(
			array(
				'id' => '1',
				'user_id' => '1',
				'group_id' => '11',
			)
		);
		$this->db->insert_batch('users_groups', $data);


		// Drop table 'login_attempts' if it exists
		// $this->dbforge->drop_table('login_attempts', TRUE);

		// Table structure for table 'login_attempts'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => '16'
			),
			'login' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE
			),
			'time' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('login_attempts', TRUE);

	}

	public function down()
	{
		$this->dbforge->drop_table('users', TRUE);
		$this->dbforge->drop_table('groups', TRUE);
		$this->dbforge->drop_table('users_groups', TRUE);
		$this->dbforge->drop_table('login_attempts', TRUE);
	}
}
