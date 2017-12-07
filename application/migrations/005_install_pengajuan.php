<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_Pengajuan extends CI_Migration {

		public function up()
        {
                $this->dbforge->add_field(array(
                        'id_pengajuan' => array(
                                'type' => 'INT',
                                'constraint' => '20',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'id_person' => array(
                                'type' => 'INT',
                                'constraint' => '20',
                                'unsigned' => TRUE
                        ),
                        'jenis_pengajuan' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        'nik' => array(
                                'type' => 'int',
                                'constraint' => '20',
                                'unsigned' => TRUE
                        ),
                        'tgl_pengajuan' => array(
                                'type' => 'DATE',
                                'null'=>TRUE
                        ),
                        'tgl_jadi' => array(
                                'type' => 'DATE',
                                'null'=>TRUE
                        )
                ));
                $this->dbforge->add_key('id_pengajuan', TRUE);
                $this->dbforge->create_table('pengajuan');
        }

        public function down()
        {
                $this->dbforge->drop_table('pengajuan');
        }

}