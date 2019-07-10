<?php
//========================================================//
//========SET DAS TABELAS BASICAS PARA O SISTEMA==========/
//========================================================//

//--usuarios, reset_password, categorias, subcategorias
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Tbl_resetpassword extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'reset_pass_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),

                        'user_email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                                'unique' => TRUE,
                        ),

                        'reset_pass_token' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '300',
                                'null' => FALSE,
                        ),
                        
                      
                        'date_expires' => array(
                                'type'=>'DATETIME',
                               
                        ),
                        
                      
                )
        
        );
                $this->dbforge->add_key('reset_pass_id', TRUE);
                $this->dbforge->create_table('tbl_reset_password');
        }

        public function down()
        {
                $this->dbforge->drop_table('tbl_reset_password');
        }
}
