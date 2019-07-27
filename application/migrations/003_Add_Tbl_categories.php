<?php
//========================================================//
//========SET DAS TABELAS BASICAS PARA O SISTEMA==========/
//========================================================//

//--usuarios, reset_password, categorias, subcategorias
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Tbl_categories extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'category_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),

                        'category_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                                'unique' => TRUE,
                        ),

                        
                        'category_enabled' => array(
                                'type' => 'BOOL',
                                'default' => '1'
                        ),
                        
                      
                )
        
        );
                $this->dbforge->add_key('category_id', TRUE);
                $this->dbforge->create_table('tbl_categories');
        }

        public function down()
        {
                $this->dbforge->drop_table('tbl_caegories');
        }
}
