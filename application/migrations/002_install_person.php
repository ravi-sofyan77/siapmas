<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_Person extends CI_Migration {

	public function up()
        {
                $this->dbforge->add_field(array(
                        'id_person' => array(
                                'type' => 'INT',
                                'constraint' => '20',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nama' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null'=>TRUE
                        ),
                        'nik' => array(
                                'type' => 'INT',
                                'constraint' => '20',
                                'unsigned' => TRUE
                        ),
                        'jenis_kelamin' => array(
                                'type' => 'ENUM("L","P")',
                                'null' => TRUE
                        ),
                        'lahir_tempat' => array(
                                'type' => 'TEXT',
                                'null'=>TRUE
                        ),
                        'lahir_tanggal' => array(
                                'type' => 'DATE',
                                'null'=>TRUE
                        ),
                        'agama' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                                'null'=>TRUE
                        ),
                        'goldar' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '5',
                                'null'=>TRUE
                        ),
                        'alamat' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null'=>TRUE
                        ),
                        'kewarganegaraan' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                                'null'=>TRUE
                        ),
                        'lahir_no_akte' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '125',
                                'null'=>TRUE
                        ),
                        'nama_ayah' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null'=>TRUE
                        ),
                        'nama_ibu' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null'=>TRUE
                        ),
                        'kelainan_fisik' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '5',
                                'null'=>TRUE
                        ),
                        'penyandang_cacat' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '5',
                                'null'=>TRUE
                        )
                ));
                $this->dbforge->add_key('id_person', TRUE);
                $this->dbforge->create_table('person');
        }

        public function down()
        {
                $this->dbforge->drop_table('person');
        }

}