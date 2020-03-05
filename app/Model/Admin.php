<?php

namespace Crud\Model;

use Crud\Core\Model;

class Admin extends Model
{

    public function usuarios()
    {
        try {
            $query = $this->db->prepare("SELECT id,nome,apelido,email,role,acesso,cadastro,validado FROM usuarios");
            $query->execute();
            return $query->fetchAll();   
        } catch (\PDOException $e) {
            unset($e);
        }
    }

    public function criarConfig($arquivo,$params)
    {
        $str = file_get_contents($arquivo . '.sample');

        foreach($params as $chave => $valor){
            $str = str_replace("[[". strtoupper($chave) ."]]",$valor,$str);
        }

        file_put_contents($arquivo, $str);

        if (file_exists($arquivo)) {
            require $arquivo;
            return "Arquivo de configuração criado com sucesso em: " . $arquivo;
        } else {
            return "Erro na criação do arquivo de configuração em: " . $arquivo;
        }
    }

    public function instalarBanco($tabela = 'usuarios')
    {
        $this->db->exec("DROP TABLE IF EXISTS $tabela");

        $sql = "CREATE TABLE IF NOT EXISTS $tabela (id INTEGER PRIMARY KEY, tmphash INTEGER, nome TEXT, apelido TEXT, senha TEXT, email TEXT, role TEXT, acesso INTEGER, cadastro INTEGER, validado BOOLEAN)";

        try {
            $this->db->exec($sql);
            return "Tabela $tabela recriada com sucesso.<br />";
        } catch (\PDOException $e) {
            return "Erro ao criar tabela $tabela: " . $e->getMessage() . "<br />";
        }
    }

    public function instalar($site,$host,$usuario,$nome,$senha,$email,$email_host,$email_senha,$email_porta)
    {

        if (!isset($email_porta) || empty($email_porta)) {
            $email_porta = 587;
        }

        $configs = [
            'site'=>$site,
            'host'=>$host,
            'usuario'=>$usuario,
            'nome'=>$nome,
            'senha'=>$senha,
            'email'=>$email,
            'email_host'=>$email_host,
            'email_senha'=>$email_senha,
            'email_porta'=>$email_porta
        ];

        $return_config = $this->criarConfig(CONFIG_FILE,$configs);
        $return_tabela = $this->instalarBanco('usuarios');
        $return_tabela .= $this->instalarBanco('posts');

        if (OFFLINE === false) {
            $Usuarios = new Usuarios();
            $retorno = json_decode($Usuarios->cadastro($nome, $usuario, $senha, $email));
            $return_usuario = $retorno->msg;
        } else {
            $Usuarios = new Usuarios();
            $retorno = json_decode($Usuarios->cadastro($nome, $usuario, $senha, $email));
            $return_usuario = 'Modo offline, email não enviado.';
        }

        return "Status da config: " . $return_config . "<br />Status da tabela: " . $return_tabela . "Status do admin: " . $return_usuario;
    }

    public function reset($tabela = 'usuarios')
    {
        $sql = "DROP TABLE IF EXISTS $tabela";
        $this->db->exec($sql);
        return json_encode(array("tipo"=>"alert-info","msg"=>$this->instalarBanco()));
    }

    public static function check($tabela = 'usuarios')
    {
        $data = new Model();
        try {
            $result = $data->db->query("SELECT 1 FROM $tabela LIMIT 1");
            if ($result) {
                return true;
            }
        } catch (\PDOException $e) {
            unset($e);
            return false;
        }
        return false;
    }

    public static function total($tabela = 'usuarios') 
    {
        $data = new Model();
        try {
            $query = $data->db->prepare("SELECT * FROM {$tabela}");
            $query->execute();
            $item = $query->fetchAll(); 
            return count($item);
        } catch (\PDOException $e) {
            unset($e);
            return 0;
        }        
    }
}
