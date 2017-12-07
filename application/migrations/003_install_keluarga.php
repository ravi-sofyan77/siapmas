<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_Keluarga extends CI_Migration {

	public function up()
        {
                $this->dbforge->add_field(array(
                        'id_keluarga' => array(
                                'type' => 'INT',
                                'constraint' => '20',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'no_kk' => array(
                                'type' => 'INT',
                                'constraint' => '20',
                                'unsigned' => TRUE,
                                'null'=>TRUE
                        ),
                        'alamat' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null'=>TRUE
                        ),
                        'no_rt' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                                'null'=>TRUE
                        ),
                        'no_rw' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                                'null'=>TRUE
                        ),
                        'desa' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null'=>TRUE
                        ),
                        'kelurahan' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null'=>TRUE
                        ),
                        'kecamatan' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null'=>TRUE
                        ),
                        'kabupaten' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null'=>TRUE
                        ),
                        'kota' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null'=>TRUE
                        ),
                        'kode_pos' => array(
                                'type' => 'INT',
                                'constraint' => '10',
                                'null'=>TRUE
                        ),
                        'provinsi' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null'=>TRUE
                        )
                        
                ));
                $this->dbforge->add_key('id_keluarga', TRUE);
                $this->dbforge->create_table('keluarga');
        }

        public function down()
        {
                $this->dbforge->drop_table('keluarga');
        }

}