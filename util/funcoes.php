<?php
//função para conectar ao banco
function conectar()
{
    $host = "localhost";
    $db = "treinamento";
    $user = "root";
    $pass = "root";
    $con =    mysqli_connect($host, $user, $pass);
    if (mysqli_connect_errno($con)) {
        die('não foi possivel conectar no banco' . mysqli_connect_error());
    }
    mysqli_select_db($con, $db);
    return $con;
}

//função para desconectar do banco
function desconectar($conexao)
{
    mysqli_close($conexao);
}

//pegar pagina atual
function get_page()
{
    $page = str_replace("/Treinamentos/", "", $_SERVER["REQUEST_URI"]);
    return $page;
}

//função para verificar se o usuário está logado
function verifica_usuario_autenticado()
{
    if (!isset($_SESSION['usuario'])) {
        logout();
    }
}

//função para logout
function logout()
{
    session_destroy();
    redireciona('../index.php');
}



//Função para alerta de formulario cadastrado
function formulario_cadastrado()
{
    if (isset($_SESSION['cadastrado'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Formulário cadastrado com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['cadastrado']);
    }
}

//Função para alerta de formulario cadastrado
function formulario_excluido()
{
    if (isset($_SESSION['excluido'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Formulário excluido com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['excluido']);
    }
}
//Função para alerta de treinamento cadastrado
function treinamento_excluido()
{
    if (isset($_SESSION['excluido'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Treinamento excluído com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['excluido']);
    }
}

//Função para alerta de treinamento cadastrado
function treinamento_cadastrado()
{
    if (isset($_SESSION['cadastrado'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Treinamento cadastrado com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['cadastrado']);
    }
}

//Função para alerta de setor cadastrado
function permissao_cadastrada()
{
    if (isset($_SESSION['cadastrada'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Permissão cadastrada com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['cadastrada']);
    }
}

//Função para alerta de setor cadastrado
function permissao_excluida()
{
    if (isset($_SESSION['excluida'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Permissão excluída com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['excluida']);
    }
}
//Função para alerta de setor cadastrado
function video_cadastrado()
{
    if (isset($_SESSION['cadastrado'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Vídeo cadastrado com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['cadastrado']);
    }
}

//Função para alerta de setor cadastrado
function video_excluido()
{
    if (isset($_SESSION['excluido'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Vídeo excluído com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['excluido']);
    }
}

//Função para alerta de setor cadastrado
function setor_cadastrado()
{
    if (isset($_SESSION['cadastrado'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Setor cadastrado com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['cadastrado']);
    }
}

//Função para alerta de setor cadastrado
function setor_excluido()
{
    if (isset($_SESSION['excluido'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Setor cadastrado com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['excluido']);
    }
}

//Função para alerta de usuário cadastrado
function modulo_cadastrado()
{
    if (isset($_SESSION['cadastrado'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Módulo cadastrado com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['cadastrado']);
    }
}



//Função para alerta de exclusão de cadastro
function modulo_excluido()
{
    if (isset($_SESSION['excluido'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Módulo excluído com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['excluido']);
    }
}

//Função para alerta de alteração de cadastro
function cadastro_alterado()
{
    if (isset($_SESSION['alterado'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Usuário alterado com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['alterado']);
    }
}

//Função para alerta de exclusão de cadastro
function cadastro_excluido()
{
    if (isset($_SESSION['excluido'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Usuário excluído com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['excluido']);
    }
}


//Função para alerta de sem historico
function sem_historico()
{
    if (isset($_SESSION['sem_historico'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ops...',
                text: 'Usuário ainda não fez treinamentos!',
            })
        </script>
    <?php
        unset($_SESSION['sem_historico']);
    }
}

//Função para alerta de exclusão de cadastro
function cadastro_nao_excluido()
{
    if (isset($_SESSION['nao_excluido'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ops...',
                text: 'Usuário não pôde ser excluído!',
            })
        </script>
    <?php
        unset($_SESSION['nao_excluido']);
    }
}


//Função para alerta de usuário cadastrado
function cadastro_feito()
{
    if (isset($_SESSION['cadastrado'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Feito!',
                text: 'Usuário cadastrado com sucesso',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    <?php
        unset($_SESSION['cadastrado']);
    }
}


//Função para alerta de usuário cadastrado
function cadastro_nao_feito()
{
    if (isset($_SESSION['nao_cadastrado'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ops...',
                text: 'Usuário não pôde ser cadastrado!',
            })
        </script>
    <?php
        unset($_SESSION['nao_cadastrado']);
    }
}

//Função para alerta de usuário inválido
function usuario_invalido()
{
    if (isset($_SESSION['nao_autenticado'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ops...',
                text: 'Usuário ou senha incorretos!',
            })
        </script>
    <?php
        unset($_SESSION['nao_autenticado']);
    }
}
//Função para alerta de inputs vazios
function digite_usuarios()
{
    if (isset($_SESSION['input_vazio'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ops...',
                text: 'É necessário digitar o usuário e a senha!',
            })
        </script>
<?php
        unset($_SESSION['input_vazio']);
    }
}

//função para codificar senha
function codificasenha($senha)
{
    return md5($senha);
}

//função para redirecionamento
function redireciona($page)
{
    header("Location: " . $page);
}

//função para verificar se há usuário logado
function verifica_autenticacao()
{
    session_start();
    if (!isset($_SESSION['usuario'])) {
        redireciona("../index.php");
    }
}

function existeEmail($email, $tabela)
{
    $link = conectar();

    $sql = "SELECT * FROM {$tabela} WHERE email = {$email}";

    mysqli_query($link, $sql);
    if (mysqli_affected_rows($link) == 1) {
        desconectar($link);
        return true;
    } else {
        desconectar($link);
        return false;
    }
}

function geraTimestamp($data)
{
    $partes = explode('-', $data);
    settype($partes[0], "integer");
    settype($partes[1], "integer");
    settype($partes[2], "integer");
    return  mktime(0, 0, 0, $partes[1], $partes[2], $partes[0]);
}


function calcularData($datap)
{
    $datahoje = date("Y-m-d");

    $timeprev = geraTimestamp($datap);
    $timehoje = geraTimestamp($datahoje);
    $diferenca = $timeprev - $timehoje;
    $dias =  (int)floor($diferenca / (60 * 60 * 24));
    return $dias;
}


function calcularStatus($datap)
{

    $dias = calcularData($datap);

    if ($dias == 0)
        return "Ultimo dia";
    elseif ($dias < 0)
        return "Atrasado " . ($dias * 1) . " dias";
    else
        return "Restam " . $dias . " dias";
}



function md5_decrypt($enc_text, $password, $iv_len = 16)
{
    $enc_text = base64_decode($enc_text);
    $n = strlen($enc_text);
    $i = $iv_len;
    $plain_text = '';
    $iv = substr($password ^ substr($enc_text, 0, $iv_len), 0, 512);
    while ($i < $n) {
        $block = substr($enc_text, $i, 16);
        $plain_text .= $block ^ pack('H*', md5($iv));
        $iv = substr($block . $iv, 0, 512) ^ $password;
        $i += 16;
    }
    return preg_replace('/\x13\x00*$/', '', $plain_text);
}

function get_rnd_iv($iv_len)
{
    $iv = '';
    while ($iv_len-- > 0) {
        $iv .= chr(mt_rand() & 0xff);
    }
    return $iv;
}

function md5_encrypt($plain_text, $password, $iv_len = 16)
{
    $plain_text .= "x13";
    $n = strlen($plain_text);
    if ($n % 16) $plain_text .= str_repeat("{TEXTO}", 16 - ($n % 16));
    $i = 0;
    $enc_text = get_rnd_iv($iv_len);
    $iv = substr($password ^ $enc_text, 0, 512);
    while ($i < $n) {
        $block = substr($plain_text, $i, 16) ^ pack('H*', md5($iv));
        $enc_text .= $block;
        $iv = substr($block . $iv, 0, 512) ^ $password;
        $i += 16;
    }

    return base64_encode($enc_text);
}
