<?php
//========================================================//
//========SET DAS TABELAS BASICAS PARA O SISTEMA==========/
//========================================================//

//--usuarios, reset_password, categorias, subcategorias
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Tbl_posts extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'post_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),

                        'post_title' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                                'unique' => TRUE,
                        ),
                        'post_subcategory_id' => array(
                            'type' => 'INT',
                            'constraint' => '2',
                            'null' => FALSE,
                          
                    ),
                    'post_content' => array(
                        'type' => 'TEXT',
                        'null' => FALSE,
                       
                     ),
                     'post_editor_id' => array(
                        'type' => 'INT',
                        'null' => FALSE,
                       
                     ),
                     'post_coverurl' => array(
                        'type' => 'VARCHAR(100)',
                        'null' => TRUE,
                     ),

                     'date_created'=>array(
                        'type' => 'DATETIME',
                        
                     ),
                     'date_updated'=>array(
                        'type' => 'DATETIME',
                       
                     ),
                        'post_enabled' => array(
                                'type' => 'BOOL',
                                'default' => '1'
                        ),
                        
                      
                )
        
        );
                $this->dbforge->add_key('post_id', TRUE);
                $this->dbforge->create_table('tbl_posts');
        }

        public function down()
        {
                $this->dbforge->drop_table('tbl_posts');
        }
}
