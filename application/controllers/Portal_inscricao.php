<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal_inscricao extends CI_Controller {

    private $_modulo = 'Inscricao';
    private $_base   = 'portal/inscricao/';

    public function __construct() {
        parent::__construct();
        
        
    }
    public function index(){
        $js['js'] = $this->load->view($this->_base . 'js/main.js', $dados, true);
        $this->load->view('include/portal/cabecalho', $dados);
        $this->load->view($this->_base . 'index', $dados);
        $this->load->view('include/portal/rodape', $js);
        $this->load->view('include/portal/header', $dados);
    }
    

}


        