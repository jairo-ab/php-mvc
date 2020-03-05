<?php

namespace Crud\Controller;

class PaginasController 
{

    public $cfg = [];

    public function __construct()
    {
        if (file_exists(CONFIG_FILE)) {
            $this->cfg = include(CONFIG_FILE);
        } else {
            header('location: ' . URL . 'admin/instalar');
        }        
    }

    public function index() 
    {
        require APP . 'view/_inc/cabecalho.php';
        require APP . 'view/paginas/index.php';
        require APP . 'view/_inc/rodape.php';
    }

    public function sobre() 
    {
        require APP . 'view/_inc/cabecalho.php';
        require APP . 'view/paginas/sobre.php';
        require APP . 'view/_inc/rodape.php';
    }

    public function ajuda() 
    {
        require APP . 'view/_inc/cabecalho.php';
        require APP . 'view/paginas/ajuda.php';
        require APP . 'view/_inc/rodape.php';
    }

    public function creditos() 
    {
        require APP . 'view/_inc/cabecalho.php';
        require APP . 'view/paginas/creditos.php';
        require APP . 'view/_inc/rodape.php';
    }

    public function erro() 
    {
        require APP . 'view/_inc/cabecalho.php';
        require APP . 'view/paginas/erro.php';
        require APP . 'view/_inc/rodape.php';
    }
}