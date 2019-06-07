<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Tbluser extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),

                        'user_nome' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),

                        'user_email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE,
                        ),

                        'user_pass' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                                'null' => TRUE,
                        ),
                        
                        'user_nivel' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'default' => "1"
                        ),
                       
                ));
                $this->dbforge->add_key('user_id', TRUE);
                $this->dbforge->create_table('tbluser');
        }

        public function down()
        {
                $this->dbforge->drop_table('tbluser');
        }
}
