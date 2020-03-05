<?php

namespace Crud\Controller;
use Crud\Model\Usuarios;
use Crud\Core\Helper;

class UsuariosController extends Helper
{

    public $cfg = [];

    public function __construct()
    {
        if (!file_exists(CONFIG_FILE)) {
            header('location: ' . URL . 'admin/instalar');
        }
      
        if ($this->tabelaExiste('usuarios') === false) {
            header('location: ' . URL . 'admin/instalar');
        }

        $this->cfg = include(CONFIG_FILE);
    }

    public function index()
    {
        $usuarios = new Usuarios();
        $retorno = $usuarios->listar();

        if (!isset($_SESSION["logado"]) || isset($_SESSION['role']) && $_SESSION['role'] !== 'admin') {
            require APP . 'view/_inc/cabecalho.php';
            require APP . 'view/usuarios/index.php';
            require APP . 'view/_inc/rodape.php';
        } elseif (isset($_SESSION["logado"]) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            require APP . 'view/_admin/cabecalho.php';
            require APP . 'view/admin/usuarios.php';
            require APP . 'view/_admin/rodape.php';
        } else {
            header('location: ' . URL);
        }
    }

    public function perfil() 
    {
        if (isset($_SESSION["logado"]) && isset($_SESSION["id"])) {
            $Usuarios = new Usuarios();
            $usuario = $Usuarios->usuario($_SESSION["id"]);
            require APP . 'view/_inc/cabecalho.php';
            require APP . 'view/usuarios/perfil.php';
            require APP . 'view/_inc/rodape.php'; 
        } else {
            header('location: ' . URL);
        }
    }

    public function confirma($hash = false)
    {
        if (!isset($_SESSION["logado"])) {
            if ($hash !== false) {
                $Usuarios = new Usuarios();
                $retorno = $Usuarios->confirma(trim($hash));
            } else if (isset($_POST['hash']) && !empty($_POST['hash'])) {
                $Usuarios = new Usuarios();
                $retorno = $Usuarios->confirma(trim($_POST['hash']));
            } else if (isset($_POST["cadastrar"]) && isset($_POST["apelido"]) && isset($_POST["senha"]) && isset($_POST["email"]) && !empty($_POST["apelido"]) && !empty($_POST["senha"]) && !empty($_POST["email"])) {
                $Usuarios = new Usuarios();
                $retorno = $Usuarios->cadastro(trim($_POST["nome"]),trim($_POST["apelido"]),trim($_POST["senha"]),trim($_POST["email"]));
            }
            require APP . 'view/_inc/cabecalho.php';
            require APP . 'view/usuarios/confirma.php';
            require APP . 'view/_inc/rodape.php';
        } else {
            header('location: ' . URL);
        }
    }

    public function senha()
    {
        if (!isset($_SESSION["logado"])) {
            if (isset($_POST["email"]) && !empty($_POST['email'])) {
                $Usuarios = new Usuarios();
                $retorno = $Usuarios->senha(trim($_POST['email']));
            }
            require APP . 'view/_inc/cabecalho.php';
            require APP . 'view/usuarios/senha.php';
            require APP . 'view/_inc/rodape.php';
        } else {
            header('location: ' . URL);
        }
    }

    public function login() 
    {
        if (!isset($_SESSION["logado"])) {
            if (isset($_POST["logar"]) 
                && isset($_POST["apelido"]) 
                && isset($_POST["senha"]) 
                && !empty($_POST["apelido"]) 
                && !empty($_POST["senha"])) {
                $Usuarios = new Usuarios();
                $retorno = $Usuarios->login($_POST["apelido"],$_POST["senha"]);
            }
            require APP . 'view/_inc/cabecalho.php';
            require APP . 'view/paginas/index.php';
            require APP . 'view/_inc/rodape.php';
        } else {
            header('location: ' . URL);
        }    
    }    

    public function cadastro() 
    {
        if (!isset($_SESSION["logado"])) {
            if (isset($_POST["cadastrar"]) 
                && isset($_POST["nome"])
                && isset($_POST["apelido"]) 
                && isset($_POST["senha"]) 
                && isset($_POST["email"]) 
                && !empty($_POST["nome"])
                && !empty($_POST["apelido"]) 
                && !empty($_POST["senha"]) 
                && !empty($_POST["email"])) {
                $Usuarios = new Usuarios();
                $retorno = $Usuarios->cadastro(trim($_POST["nome"]),trim($_POST["apelido"]),trim($_POST["senha"]),trim($_POST["email"]));
            }
            require APP . 'view/_inc/cabecalho.php';
            require APP . 'view/usuarios/cadastro.php';
            require APP . 'view/_inc/rodape.php';
        } else {
            header('location: ' . URL);
        }
    }

    public function editar() 
    {
        if (isset($_SESSION["logado"]) 
            && isset($_POST["editar"]) 
            && isset($_POST["id"]) 
            && isset($_POST["nome"])
            && isset($_POST["apelido"]) 
            && isset($_POST["email"]) 
            && isset($_POST["role"]) 
            && isset($_POST["validado"]) 
            && !empty($_POST["nome"])
            && !empty($_POST["apelido"]) 
            && !empty($_POST["email"]) 
            && !empty($_POST["role"]) 
            && !empty($_POST["validado"])) {

            $Usuarios = new Usuarios();
            
            if (isset($_POST["senha"]) && !empty($_POST["senha"])) {
                $senha = trim($_POST["senha"]);
            }

            $retorno = $Usuarios->editar(trim($_POST["id"]),trim($_POST["nome"]),trim($_POST["apelido"]),trim($_POST["email"]),trim($_POST["role"]),$_POST["validado"],$senha = false);
            $usuario = $Usuarios->usuario($_SESSION["id"]);

            if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin") {
                require APP . 'view/_adm/cabecalho.php';
                require APP . 'view/admin/editar.php';
                require APP . 'view/_adm/rodape.php';
            } else {
                require APP . 'view/_inc/cabecalho.php';
                require APP . 'view/usuarios/editar.php';
                require APP . 'view/_inc/rodape.php';
            }
        } else {
            header('location: ' . URL);
        }
    }

    public function buscar() 
    {
        if (isset($_SESSION["logado"])) {
            if (isset($_POST["buscar"]) && isset($_POST["termo"]) && !empty($_POST["termo"])) {
                $Usuarios = new Usuarios();
                $retorno = $Usuarios->busca(trim($_POST["termo"]));
            }
            require APP . 'view/_inc/cabecalho.php';
            require APP . 'view/usuarios/index.php';
            require APP . 'view/_inc/rodape.php';
        } else {
            header('location: ' . URL);
        }
    }

    public function apagar($id) 
    {
        if (isset($id)) {
            $Usuarios = new Usuarios();
            $msg = $Usuarios->apagar($id);
            require APP . 'view/_inc/cabecalho.php';
            require APP . 'view/usuarios/index.php';
            require APP . 'view/_inc/rodape.php';
        } else {
            header('location: ' . URL);
        }
    }

    public function sair() 
    {
        if (isset($_SESSION["logado"])) {
            $Usuarios = new Usuarios();
            $retorno = $Usuarios->sair();
        } else {
            $retorno = json_encode(array("tipo"=>"alert-danger","msg"=>"Usuário não logado."));
        }
        require APP . 'view/_inc/cabecalho.php';
        require APP . 'view/paginas/index.php';
        require APP . 'view/_inc/rodape.php'; 
    }

}
