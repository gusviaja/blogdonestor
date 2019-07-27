<?php
//========================================================//
//========SET DAS TABELAS BASICAS PARA O SISTEMA==========/
//========================================================//

//--usuarios, reset_password, categorias, subcategorias
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Tbl_user extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'user_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),

                        'user_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                                'unique' => TRUE,
                        ),

                        'user_email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                                'unique' => TRUE,
                        ),

                        'user_pass' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '300',
                                'null' => FALSE,
                        ),
                        
                        'user_level' => array(
                                'type' => 'BOOL',
                                'default' => "1"
                        ),
                        'date_created' => array(
                                'type'=>'DATETIME',
                               
                                
                        ),
                        'date_updated' => array(
                                'type'=>'DATETIME',
                               
                        ),
                        'user_enabled' => array(
                                'type'=>'BOOL',
                                'default'=>'1',
                        ),
                       //ACRESCENTAR MANUALMENTE O DEFAULT DAS TIMESTAMP, AQ DA ERRRO
                )
        
        );
                $this->dbforge->add_key('user_id', TRUE);
                $this->dbforge->create_table('tbl_user');
        }

        public function down()
        {
                $this->dbforge->drop_table('tbl_user');
        }
}
