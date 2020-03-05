<?php

namespace Crud\Core;
use Crud\Core\Model;
use PDO;

class Helper
{
    public function tabelaExiste($tabela = 'usuarios') 
    {
        try {
            $Model = new Model();
            $resultado = $Model->db->query("SELECT 1 FROM $tabela LIMIT 1");
            return true;
        } catch (\PDOException $e) {
            unset($e);
            return false;
        }
        return $resultado !== false;
    }
}
