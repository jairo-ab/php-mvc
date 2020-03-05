<?php

namespace Crud\Controller;
use Crud\Model\Admin;
use Crud\Model\Email;

class AdminController
{

    public $cfg = [];

    public function __construct()
    {
        if (file_exists(CONFIG_FILE)) {
            $this->cfg = include(CONFIG_FILE);
        } 
    }

    public function index() {
        if (Admin::check() === false) {
            header('location: ' . URL . 'admin/instalar');
        } elseif (isset($_SESSION["logado"]) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            require APP . 'view/_admin/cabecalho.php';
            require APP . 'view/admin/index.php';
            require APP . 'view/_admin/rodape.php';
        } else {
            header('location: ' . URL);
        }
    }

    public function config() {
        if (file_exists(CONFIG_FILE)) {
            $porta = (isset($_POST['email_porta']) ? $_POST['email_porta'] : 587);

            if (isset($_POST["instalar"])
            && isset($_POST["site"])
            && isset($_POST["host"])
            && isset($_POST["usuario"])
            && isset($_POST["nome"]) 
            && isset($_POST["senha"]) 
            && isset($_POST["email"])
            && isset($_POST["email_host"])
            && isset($_POST["email_senha"])    
            && !empty($_POST["site"]) 
            && !empty($_POST["host"]) 
            && !empty($_POST["usuario"]) 
            && !empty($_POST["nome"]) 
            && !empty($_POST["senha"]) 
            && !empty($_POST["email"]) 
            && !empty($_POST["email_host"]) 
            && !empty($_POST["email_senha"]))  {
                $Admin = new Admin();
                $retorno = $Admin->instalar(
                    trim($_POST["site"]),
                    trim($_POST["host"]),
                    trim($_POST["usuario"]),
                    trim($_POST["nome"]),
                    trim($_POST["senha"]),
                    trim($_POST["email"]),
                    trim($_POST["email_host"]),
                    trim($_POST["email_senha"]),
                    trim($porta)
                );
            } 
            require APP . 'view/_admin/cabecalho.php';
            require APP . 'view/admin/config.php';
            require APP . 'view/_admin/rodape.php';
        } else {
            header('location: ' . URL . 'admin/instalar');
        }   
    }

    public function instalar() {
        if (Admin::check() === false || file_exists(CONFIG_FILE . ".sample") && !file_exists(CONFIG_FILE)) {
            $porta = (isset($_POST['email_porta']) ? $_POST['email_porta'] : 587);

            if (isset($_POST["instalar"])
            && isset($_POST["site"])
            && isset($_POST["host"])
            && isset($_POST["usuario"]) 
            && isset($_POST["nome"]) 
            && isset($_POST["senha"]) 
            && isset($_POST["email"])
            && isset($_POST["email_host"])
            && isset($_POST["email_senha"])    
            && !empty($_POST["site"]) 
            && !empty($_POST["host"]) 
            && !empty($_POST["usuario"]) 
            && !empty($_POST["nome"]) 
            && !empty($_POST["senha"]) 
            && !empty($_POST["email"]) 
            && !empty($_POST["email_host"]) 
            && !empty($_POST["email_senha"]))  {
                $Admin = new Admin();
                $retorno = $Admin->instalar(
                    trim($_POST["site"]),
                    trim($_POST["host"]),
                    trim($_POST["usuario"]),
                    trim($_POST["nome"]),
                    trim($_POST["senha"]),
                    trim($_POST["email"]),
                    trim($_POST["email_host"]),
                    trim($_POST["email_senha"]),
                    trim($porta)
                );
            }
            require APP . 'view/_admin/cabecalho.php';
            require APP . 'view/admin/instalar.php';
            require APP . 'view/_admin/rodape.php';
        } else {
            header('location: ' . URL . 'admin');
        }
    }
}
