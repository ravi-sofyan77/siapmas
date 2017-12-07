<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_Kependudukan extends CI_Migration {

	public function up()
        {
                $this->dbforge->add_field(array(
                        'id_keluarga' => array(
                                'type' => 'INT',
                                'constraint' => '20',
                                'unsigned' => TRUE
                        ),
                        'id_person' => array(
                                'type' => 'INT',
                                'constraint' => '20',
                                'unsigned' => TRUE
                        ),
                        'pendidikan_terakhir' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '5',
                                'null'=>TRUE
                        ),
                        'pekerjaan' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '125',
                                'null'=>TRUE
                        ),
                        'status_pernikahan' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                                'null'=>TRUE
                        ),
                        'hub_keluarga' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                                'null'=>TRUE
                        ),
                        'kewarganegaraan' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                                'null'=>TRUE
                        ),
                        'passport_nomor' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '125',
                                'null'=>TRUE
                        ),
                        'passport_tgl_terakhir' => array(
                                'type' => 'DATE',
                                'null'=>TRUE
                        )
                ));
                $this->dbforge->create_table('kependudukan');
        }

        public function down()
        {
                $this->dbforge->drop_table('person');
        }

}