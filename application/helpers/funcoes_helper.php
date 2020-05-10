<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('getDataAtual')) {
    function getDataAtual()
    {
        return date('Y-m-d H:i:s');
    }
}

if (!function_exists('mDebug')) {

    function mDebug($valor, $arquivo = FALSE)
    {
        if ($arquivo) {
            $ci = &get_instance();
            $t  = $ci->db->last_query();
            log_message('error', $t);
        } else {
            echo "<pre>";
            print_r($valor);
            echo "</pre>";
            die();
        }
    }
}


if (!function_exists('converteData')) {

}

function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}


/**
 * Verifica se a data é valida padrão nacional;
 */
if (!function_exists('validaData')) {
    function validaData($dt)
    {
        if (empty($dt)) {
            return false;
        }

        $v = explode('/', $dt);
        $d = $v[0];
        $m = $v[1];
        $y = $v[2];
        return checkdate($m, $d, $y);
    }
}

if (!function_exists('ultimoDiaMes')) {
    function ultimoDiaMes($mes = FALSE, $ano = FALSE)
    {
        if (!$mes) {
            $mes = date('m');
        }
        $ano = !$ano ? date('Y') : $ano;
        return date("t", mktime(0, 0, 0, $mes, '01', $ano));
    }
}

if (!function_exists('dataInicial')) {
    function dataInicial()
    {
        return date('Y-m-') . '01';
    }
}

if (!function_exists('dataFinal')) {
    function dataFinal()
    {
        return date('Y-m-') . ultimoDiaMes(date('m'));
    }
}

if (!function_exists('getColor')) {
    function getColor($num)
    {
        $hash = md5('color' . $num);
        return array(
            hexdec(substr($hash, 0, 2)),  //r
            hexdec(substr($hash, 2, 2)),  //g
            hexdec(substr($hash, 4, 2))
        ); //b
    }
}

if (!function_exists('random_color')) {
    function random_color()
    {
        $letters = '0123456789ABCDEF';
        $color = '#';
        for ($i = 0; $i < 6; $i++) {
            $index  = rand(0, 15);
            $color .= $letters[$index];
        }
        return $color;
    }
}

if (!function_exists('clienteLogado')) {

    function clienteLogado($redirecionaLogin = TRUE)
    {
        $ci     = &get_instance();
        $metodo = $ci->router->fetch_class();

        if (isset($_SESSION['id']) /*&& $_SESSION['dono_sessao'] == md5(getDonoSessao())*/) {
            return TRUE;
        } elseif ($metodo == 'logar') {
            return TRUE;
        } else {
            if ($redirecionaLogin) {
                $ci->session->set_flashdata('msg', 'Sua sessão expirou!');
                redirect('login');
            }
            return FALSE;
        }
    }
}

if (!function_exists('getDonoSessao')) {
    function getDonoSessao()
    {
        return $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'];
    }
}

if (!function_exists('geraCripto')) {

    function geraCripto($texto)
    {
        $ci   = &get_instance();
        $item = $ci->encryption->encrypt(SALT . $texto);
        if ($texto) {
            return strtr($item, array('+' => '.', '=' => '-', '/' => '~'));
        } else {
            return '';
        }
    }
}

if (!function_exists('recuperaCripto')) {

    function recuperaCripto($texto)
    {
        $ci    = &get_instance();
        $item  = strtr($texto, array('.' => '+', '-' => '=', '~' => '/'));
        return strtr($ci->encryption->decrypt($item), array(SALT => ''));
    }
}

if (!function_exists('dinheiroBanco')) {

    function dinheiroBanco($valor)
    {
        $valor  = strtr($valor, array('.' => ''));
        $valor  = strtr($valor, array(',' => '.'));
        return $valor;
    }
}

if (!function_exists('dinheiro')) {

    function dinheiro($valor)
    {
        return number_format($valor, 2, ',', '.');
    }
}

if (!function_exists('fundo')) {
    function fundo()
    {
        $b = ['background_1', 'background_2', 'background_3', 'background_4', 'background_5'];
        return $b[array_rand($b, 1)];
    }
}

if (!function_exists('comboUF')) {

    function comboUF($uf = '', $obrigatorio = FALSE, $sigla = FALSE)
    {
        $mes["AC"] = "Acre";
        $mes["AL"] = "Alagoas";
        $mes["AM"] = "Amazonas";
        $mes["AP"] = "Amapá";
        $mes["BA"] = "Bahia";
        $mes["CE"] = "Ceará";
        $mes["DF"] = "Distrito Federal";
        $mes["ES"] = "Espírito Santo";
        $mes["GO"] = "Goiás";
        $mes["MA"] = "Maranhão";
        $mes["MG"] = "Minas Gerais";
        $mes["MS"] = "Mato Grosso do Sul";
        $mes["MT"] = "Mato Grosso";
        $mes["PA"] = "Pará";
        $mes["PB"] = "Paraíba";
        $mes["PE"] = "Pernambuco";
        $mes["PI"] = "Piauí";
        $mes["PR"] = "Paraná";
        $mes["RJ"] = "Rio de Janeiro";
        $mes["RN"] = "Rio Grande do Norte";
        $mes["RO"] = "Rondônia";
        $mes["RR"] = "Roraima";
        $mes["RS"] = "Rio Grande do Sul";
        $mes["SC"] = "Santa Catarina";
        $mes["SE"] = "Sergipe";
        $mes["SP"] = "São Paulo";
        $mes["TO"] = "Tocantins";
        $mes["EX"] = "Fora do Brasil";

        $combo = '';
        if (!$obrigatorio) {
            $combo .= '<option></option>';
        }
        foreach ($mes as $item => $valor) {
            $exibe = $sigla ? $item : $valor;
            if ($item == $uf) {
                $combo .= '<option value="' . $item . '" selected>' . $exibe  . '</option>';
            } else {
                $combo .= '<option value="' . $item . '">' . $exibe  . '</option>';
            }
        }
        return $combo;
    }
}

if (!function_exists('comboEstadoCivil')) {

    function comboEstadoCivil($valor = '', $obrigatorio = FALSE)
    {
        $v["C"] = "Casado(a)";
        $v["S"] = "Solteiro(a)";
        $v["V"] = "Viúvo(a)";
        $v["D"] = "Separado(a) / Divorciado(a)";

        $combo = '';
        if (!$obrigatorio) {
            $combo .= '<option></option>';
        }
        foreach ($v as $item => $dado) {
            if ($item == $valor) {
                $combo .= '<option value="' . $item . '" selected>' . $dado  . '</option>';
            } else {
                $combo .= '<option value="' . $item . '">' . $dado  . '</option>';
            }
        }
        return $combo;
    }
}

if (!function_exists('comboSexo')) {

    function comboSexo($valor = '', $obrigatorio = FALSE)
    {
        $v["M"] = "Masculino";
        $v["F"] = "Feminino";

        $combo = '';
        if (!$obrigatorio) {
            $combo .= '<option></option>';
        }
        foreach ($v as $item => $dado) {
            if ($item == $valor) {
                $combo .= '<option value="' . $item . '" selected>' . $dado  . '</option>';
            } else {
                $combo .= '<option value="' . $item . '">' . $dado  . '</option>';
            }
        }
        return $combo;
    }
}

if (!function_exists('EncryptPassw')) {
    /**
     * Esse método criptografa a senha
     * @package helpers
     * @subpackage Password Services
     * @param string $passw Senha
     * @return string
     */
    function EncryptPassw($passw)
    {
        if (is_null($passw))
            return null;

        $passw_encrypted = password_hash(SALT . $passw, PASSWORD_BCRYPT);
        if ($passw_encrypted)
            return $passw_encrypted;
        else
            return $passw;
    }
}

if (!function_exists('DecryptPassw')) {
    /**
     * Esse método verifica se as senhas são iguais
     * @package helpers
     * @subpackage Password Services
     * @param string $passw Senha do usuário sem criptografia
     * @param string $passw_encrypted Senha do usuário criptografada
     * @return boolean
     */
    function DecryptPassw($passw, $passw_encrypted)
    {
        if (is_null($passw) || is_null($passw_encrypted))
            return false;

        $verify = password_verify(SALT . $passw, $passw_encrypted);
        return $verify;
    }
}

if (!function_exists('formataTelefone')) {
    function formataTelefone($telefone)
    {
        $i = strlen($telefone);
        if ($i == 14) {
            $telefone = substr($telefone, 0, 9) . '-' . substr(strtr($telefone, ['-' => '']), 9, 5);
        }

        return $telefone;
    }
}

if (!function_exists('iniciaisNome')) {
    function iniciaisNome($nome)
    {
        $t = explode(' ', $nome);
        $r = '';
        foreach ($t as $i) {
            $r .= substr($i, 0, 1);
        }

        return $r;
    }
}

if (!function_exists('msgCarregando')) {
    function msgCarregando($tipo = 1)
    {
        $msg = '';
        if ($tipo == 2) {
            $msg = '
            <div class="spiner-example">
                <div class="sk-spinner sk-spinner-rotating-plane"></div>
            </div>
            ';
        } elseif ($tipo == 3) {
            $msg = '
            <div class="sk-spinner sk-spinner-double-bounce">
                <div class="sk-double-bounce1"></div>
                <div class="sk-double-bounce2"></div>
            </div>
            ';
        } elseif ($tipo == 4) {
            $msg = '
            <div class="sk-spinner sk-spinner-wandering-cubes">
                <div class="sk-cube1"></div>
                <div class="sk-cube2"></div>
            </div>
            ';
        } elseif ($tipo == 5) {
            $msg = '
            <div class="sk-spinner sk-spinner-pulse"></div>
            ';
        } elseif ($tipo == 6) {
            $msg = '
            <div class="sk-spinner sk-spinner-chasing-dots">
                <div class="sk-dot1"></div>
                <div class="sk-dot2"></div>
            </div>
            ';
        } elseif ($tipo == 7) {
            $msg = '
            <div class="sk-spinner sk-spinner-three-bounce">
                <div class="sk-bounce1"></div>
                <div class="sk-bounce2"></div>
                <div class="sk-bounce3"></div>
            </div>
            ';
        } elseif ($tipo == 8) {
            $msg = '
            <div class="sk-spinner sk-spinner-circle">
                <div class="sk-circle1 sk-circle"></div>
                <div class="sk-circle2 sk-circle"></div>
                <div class="sk-circle3 sk-circle"></div>
                <div class="sk-circle4 sk-circle"></div>
                <div class="sk-circle5 sk-circle"></div>
                <div class="sk-circle6 sk-circle"></div>
                <div class="sk-circle7 sk-circle"></div>
                <div class="sk-circle8 sk-circle"></div>
                <div class="sk-circle9 sk-circle"></div>
                <div class="sk-circle10 sk-circle"></div>
                <div class="sk-circle11 sk-circle"></div>
                <div class="sk-circle12 sk-circle"></div>
            </div>
            ';
        } elseif ($tipo == 9) {
            $msg = '
            <div class="spiner-example">
                <div class="sk-spinner sk-spinner-cube-grid">
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                    <div class="sk-cube"></div>
                </div>
            </div>
            ';
        } elseif ($tipo == 10) {
            $msg = '
            <div class="sk-spinner sk-spinner-fading-circle">
                <div class="sk-circle1 sk-circle"></div>
                <div class="sk-circle2 sk-circle"></div>
                <div class="sk-circle3 sk-circle"></div>
                <div class="sk-circle4 sk-circle"></div>
                <div class="sk-circle5 sk-circle"></div>
                <div class="sk-circle6 sk-circle"></div>
                <div class="sk-circle7 sk-circle"></div>
                <div class="sk-circle8 sk-circle"></div>
                <div class="sk-circle9 sk-circle"></div>
                <div class="sk-circle10 sk-circle"></div>
                <div class="sk-circle11 sk-circle"></div>
                <div class="sk-circle12 sk-circle"></div>
            </div>
            ';
        } else {
            $msg = '
            <div class="sk-spinner sk-spinner-wave">
                <div class="sk-rect1"></div>
                <div class="sk-rect2"></div>
                <div class="sk-rect3"></div>
                <div class="sk-rect4"></div>
                <div class="sk-rect5"></div>
            </div>';
        }

        return $msg;
    }
}

if (!function_exists('capitalize')) {
    function capitalize($texto, $quebrar = ' ')
    {
        $p = mb_strtolower(strtolower($texto), 'UTF-8');
        $p = explode($quebrar, $p);
        $r = [];
        foreach ($p as $i) {
            array_push($r, strlen($i) > 2 ? ucwords($i) : $i);
        }
        $p = implode(' ', $r);
        $i = strpos($p, '/');
        if ($i) { //Verificando se tem /
            $p = capitalize($p, '/');
            $p = substr($p, 0, $i) . '/' . substr($p, $i + 1, strlen($p));
        }
        return $p;
    }
}

if (!function_exists('getFilename')) {
    //RETORNA A EXTENSAO DO ARQUIVO
    function getFilename($name)
    {
        $filename = explode(".", $name);
        $extensao = $filename[1];
        return $extensao;
    }
}

if (!function_exists('setFlashdata')) {
    //SETA MENSAGENS DE ALERTA
    function setFlashdata($msg, $tipo)
    {
        $mensagem = '
            <div class="alert alert-' . $tipo . '" id="msgInfo"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>' . $msg . '</div>';
        $ci = &get_instance();
        $retorno = $ci->session->set_flashdata('msg', $mensagem);
        return $retorno;
    }
}

if (!function_exists('getNumber')) {
    //RETORNA STRING SEM CARACTERES ESPECIAIS
    function getNumber($string)
    {
        $str = preg_replace('/[^\d]/', '', $string);
        return $str;
    }
}

if (!function_exists('reduceText')) {
    /*Reduz texto pra mostrar só uma parte dele*/
    function reduceText($text, $tamanho)
    {
        $ptexto = substr($text, 0, $tamanho); //guarda os primeiros 650 caracteres
        $palavras = explode(" ", $ptexto); // separa as palavras (650 caracteres)
        $palavras = array_slice($palavras, 0,  count($palavras) - 1); //separa da primeira até o total - 1    
        $ptexto = implode(" ", $palavras); //junta as palavras
        $ptexto = $ptexto . "..."; //retorna o texto com (...)
        return $ptexto;
    }
}

if (!function_exists('returnText')) {
    function returnText($string, $length)
    {
        $return =  (mb_strlen($string) > $length) ? reduceText($string, $length) : $string;
        return $return;
    }
}

/**
 * Gerar Senhas Seguras
 */
if (!function_exists('gerar_senha')) {
    function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos)
    {
        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ";
        $mi = "abcdefghijklmnopqrstuvyxwz";
        $nu = "0123456789";
        $si = "!@#$%¨&*()_+=";
        $senha = "";

        if ($maiusculas) {
            $senha .= str_shuffle($ma);
        }

        if ($minusculas) {
            $senha .= str_shuffle($mi);
        }

        if ($numeros) {
            $senha .= str_shuffle($nu);
        }

        if ($simbolos) {
            $senha .= str_shuffle($si);
        }

        return substr(str_shuffle($senha), 0, $tamanho);
    }
}

if (!function_exists('in_array_field')) {
    function in_array_field($needle, $needle_field, $haystack, $indice = false, $strict = false)
    {
        if ($strict) {
            foreach ($haystack as $item) {
                if (isset($item->$needle_field) && $item->$needle_field === $needle) {
                    return true;
                }
            }
        } else {
            foreach ($haystack as $item) {
                if (isset($item->$needle_field) && $item->$needle_field == $needle) {
                    return $indice ? $item : true;
                }
            }
        }

        return false;
    }
}

if (!function_exists('limpaMascara')) {
    function limpaMascara($valor)
    {
        $valor = trim($valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("/", "", $valor);
        return $valor;
    }
}

if (!function_exists('formatCnpjCpf')) {
    function formatCnpjCpf($value)
    {
        $cnpj_cpf = preg_replace("/\D/", '', $value);
        if (strlen($cnpj_cpf) === 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
        }
        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }
}

if (!function_exists('sanitizeString')) {
    function sanitizeString($str)
    {
        return preg_replace("/[']/ui", ' ', $str);
    }
}

if (!function_exists('redirecionaParaLogin')) {
    function redirecionaParaLogin()
    {
        $url = 'login';
        if (strpos(base_url(), 'app/')) {
            $url = 'https://.com.br/';
        }
        redirect($url);
    }
}

function Curl($url, $post_data, &$http_status, &$header = null, $tipo = 'POST')
{
    // Log::debug("Curl $url JsonData=" . $post_data);

    $ch = curl_init();
    // user credencial
    curl_setopt($ch, CURLOPT_USERPWD, "username:passwd");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);

    // post_data
    if ($tipo == 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
    }
    if ($tipo == 'PUT') {
        curl_setopt($ch, CURLOPT_PUT, true);
    }

    if ($post_data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    }
    if (!is_null($header)) {
        curl_setopt($ch, CURLOPT_HEADER, true);
    }
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', 'Authorization: Basic ' . base64_encode("teste:040e89853d4dee138ed0348c32f2838b-us17")));

    curl_setopt($ch, CURLOPT_VERBOSE, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);
    // Log::debug('Curl exec=' . $url);

    $body = null;
    // error
    if (!$response) {
        $body = curl_error($ch);
        // HostNotFound, No route to Host, etc  Network related error
        $http_status = -1;
        // Log::error("CURL Error: = " . $body);
    } else {
        //parsing http status code
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (!is_null($header)) {
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);
        } else {
            $body = $response;
        }
    }

    curl_close($ch);

    return $body;
}


function uploadImagem($file_input)
{
    $retorno = [
        'status' => false,
        'msg' => '',
        'dados' => '',
    ];

    $CI = &get_instance();

    //Destino do ficheiro
    $config['upload_path']          = './upload';
    //Tipos de ficheiros suportados. * Todos os ficheiros
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    //Tamanho máximo do ficheiro
    $config['max_size']             = 1024;
    //Largura máxima que a imagem pode ter
    $config['max_width']            = 1000;
    //Altura máxima que a imagem pode ter
    $config['max_height']           = 1000;
    //Nome do ficheiro é encriptado
    $config['encrypt_name'] = TRUE;

    // Variavel onde será guardada a informação da imagem
    $image_data = [];

    // $CI->upload->set_upload_path($config['upload_path']);
    $CI->upload->initialize($config);
    if (!$CI->upload->do_upload($file_input)) {
        $retorno['msg'] = $CI->upload->display_errors() . $config['upload_path'];
    } else {
        $image_data = $CI->upload->data();
        $config['image_library'] = 'gd2';
        $config['source_image'] = $image_data['full_path'];
        $config['maintain_ratio'] = TRUE;
        // $config['width'] = 500;
        // $config['height'] = 500;


        $CI->load->library('image_lib', $config);
        if (!$CI->image_lib->resize()) {
            $retorno['msg'] = 'Erro ao redimensionar a foto.';
        }

        /* Retorna o caminho para guardar na base de dados */
        $retorno['dados']  = $image_data['file_name'];
        $retorno['status'] = true;
    }

    return $retorno;
}

