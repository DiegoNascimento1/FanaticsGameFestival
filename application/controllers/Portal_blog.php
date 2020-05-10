<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Portal_blog extends CI_Controller {

    private $_modulo = 'Blog';
    private $_base   = 'portal/blog/';

    public function __construct() {
        parent::__construct();
        
        // $this->load->model('Banco_caixa_model', 'Model');
        // $this->load->model('Lancamento_model', 'LancamentoModel');
    }
    
    /**
	 * Método principal
	 */
    public function index($id = FALSE) {
        $dados = [
            '_modulo'      => $this->_modulo,
            '_base'        => $this->_base,
        ];
       
       
        if ($id) {
         
            echo json_encode($dados);
            exit;
        }

       

        $js['js'] = $this->load->view($this->_base . 'js/main.js', $dados, true);
        $this->load->view('include/portal/cabecalho', $dados);
        $this->load->view($this->_base . 'index', $dados);
        $this->load->view('include/portal/rodape', $js);
    }

    /**
	 * Método de gravação
	 */
    public function gravar() {
        $dados          = [];
        $id_empresa     = (int) $this->session->userdata('id_empresa');   
        $id             = FALSE;
        if ($this->input->post('uid')) {
            $id = (int) recuperaCripto($this->input->post('uid'));
        }
        $codigo_bacen               = (int) $this->input->post('nome');
        $dados['apelido']           = $this->input->post('apelido');
        $dados['vl_saldo_inicial']  = $this->input->post('saldo');
        $tipoSaldo                  = $this->input->post('tipo_saldo');
        $dados['vl_saldo_inicial']  = ($tipoSaldo == "") ? '-' . str_replace('-', '', $dados['vl_saldo_inicial']) : $dados['vl_saldo_inicial']; 
        $dados['vl_saldo_inicial']  = dinheiroBanco($dados['vl_saldo_inicial']); 
        $dados['dt_inicio']         = converteData($this->input->post('dt_inicio'));

        $banco = $this->Model->getBacenById($codigo_bacen);
        if ($banco) {
            $dados['nome'] = $banco['nome'];
            $dados['codigo_bacen'] = str_pad($this->input->post('nome'), 3, "0", STR_PAD_LEFT); 
        }

        //Validando os dados
        $this->form_validation->set_data($dados);
        $this->form_validation->set_rules('codigo_bacen', 'Banco', 'required|min_length[1]|trim');
        if ($this->form_validation->run() === false) {
            $response['status']  = false;
            $response['message'] = validation_errors();
            $response['tipo'] = "danger";
            redirect($this->_base);
            exit;
        } 

        if ($id > 0) {
            $filtro = [
                'id' => $id,
                'fk_empresa' => $id_empresa
            ];
            $response = $this->Model->Update($filtro, $dados);
        }
        else {
            $dados['fk_empresa'] = $id_empresa;  
            $response = $this->Model->Insert($dados);            
        }
        // setFlashdata($response['message'], $response['tipo']);
        redirect($this->_base);
    }

    /**
	 * Método para excluir
	 */
    public function excluir($id) {
        $response['status']  = FALSE;
        $response['troca']   = FALSE;
        $response['message'] = 'Registro não informado!';
        $response['tipo']    = 'danger';
        $id                  = (int) recuperaCripto($id);
        $tipo                = ($this->uri->segment(4) == 'a') ? 'a' : 'b';
        if ($id) {
            //Verificando se tem algum lançamento
            $total = $this->LancamentoModel->getTotalUso(["fk_banco" => $id]);
            if ($total == 0) {
                $response['message'] = "Deseja realmente excluir?";                                
            }
            else {
                $ac                  = ($total > 1) ? 's' : '';
                $total               = number_format($total, 0, '', '.');
                $response['message'] = "{$total} lançamento{$ac} ";                                
                $response['troca']   = TRUE;

                // Guardando banco atual
                $filter = ['id' => $id];
                $atual  = $this->Model->getRegistros($filter, 'dt_inicio');
                //Verificando se vai ter opção de troca
                $filter = [
                    'fk_empresa' => $this->session->userdata('id_empresa'),
                    'ativo'      => 'S',
                    'dt_inicio <=' => $atual[0]['dt_inicio']
                ];
        
                $lista = [];
                $banc  = $this->Model->getRegistros($filter, 'id, apelido, dt_inicio');
                
                for ($b=0; $b < count($banc); $b++) { 
                    // if(strtotime($banc[$b]['dt_inicio']) >= strtotime($atual[0]['dt_inicio'])){
                        $lista[$banc[$b]['id']] = $banc[$b]['apelido'];
                    // } 
                }

                $dados  = [];
                foreach ($lista as $item => $i) {
                    if ($item != $id) {
                        $v = [
                            'id' => $item,
                            'text' => $i
                        ];
                        array_push($dados, $v);
                    }
                }
                $response['dados'] = $dados;
            }
        }
        echo json_encode($response);
    }

    /**
	 * Método para alterar
	 */
    public function alterar() {
        $response['status']  = FALSE;
        $response['message'] = 'Registro não informado!';
        $response['tipo']    = 'danger';
        $id                  = (int) recuperaCripto($this->input->post('id'));
        $id_empresa          = (int) $this->session->userdata('id_empresa');   
        $id_novo             = (int) $this->input->post('migrar');   
        $tipo                = ($this->input->post('tipo_exclusao') == 'a') ? 'a' : 'b';   
        if ($id > 0) {
            $this->db->trans_begin();
            $id_novo  = ($id_novo > 0) ? $id_novo : NULL;
            $response = $this->LancamentoModel->updateFk(['fk_banco' => $id], ['fk_banco' => $id_novo]);
            if ($response['status']) {
                $response = $this->Model->delete('id', $id);
                $this->db->trans_commit();
            }
            else {
                $this->db->trans_rollback();
            }
        }
        // setFlashdata($response['message'], $response['tipo']);
        redirect($this->_base);
    }

    /**
	 * Método para ativar/desativar
	 */
    public function ativar($id) {
        $msg            = 'Erro ao gravar dados!';
        $id_empresa     = (int) $this->session->userdata('id_empresa');  
        $totalRegistros = count($this->Model->getAll());
        if ($this->_limitacao['total_centro_custo'] >= $totalRegistros) { 
            $id             = (int) recuperaCripto($id);
            if ($id) {
                $filtro = [
                    'id' => $id,
                    'fk_empresa' => $id_empresa
                ];
                //Recuperando o status atual
                if ($id) {
                    $item  = $this->Model->getById($id);
                    $ativo = ($item['ativo'] == 'S') ? 'N' : 'S';
                }
                $dados = ['ativo' => $ativo];
                $response = $this->Model->Update($filtro, $dados);    
            }
            // setFlashdata($response['message'], $response['tipo']);
            redirect($this->_base);
        }
        else {
            setFlashdata(MSG_LIMITE, 'danger');
        }
        redirect($this->_base);
    }
}