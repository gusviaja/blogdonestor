<?php

class Migrate extends CI_Controller
{

        public function index()
        {
                $this->load->library('migration');

                if ($this->migration->current() === FALSE)
                {
                        show_error($this->migration->error_string());
                }
                else{
                        echo "Migração concluida com sucesso";
                }
        }

        public function migolds(){

                $this->load->library('migration');
                print_r($this->migration->find_migrations());
   
        }

}