<?php

namespace Crud\Model;
use Crud\Core\Model;
use Crud\Model\Email;

class Usuarios extends Model
{

    public function perfil($id) 
    {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id LIMIT 1");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch();
    }

    public function listar()
    {
        try {
            $query = $this->db->prepare("SELECT id,tmphash,nome,apelido,email,role,acesso,cadastro,validado FROM usuarios");
            $query->execute();
            return $query->fetchAll();   
        } catch (\PDOException $e) {
            //return "A tebela usuários não existe.";
            unset($e);
        }
    }

    public function todos() 
    {
        $query = $this->db->prepare("SELECT id,tmphash,nome,apelido,email,role,acesso,cadastro,validado FROM usuarios");
        $item = $query->fetchAll(); 
        return count($item);        
    }

    public function busca($termo) 
    {
        $termo = "%" . $termo . "%";
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE apelido LIKE :termo OR email LIKE :termo OR nome LIKE :termo");
        $query->bindParam(':termo', $termo);
        $query->execute();
        return $query->fetchAll();
    }

    public function usuario($id) 
    {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id LIMIT 1");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch();
    }

    public function senha($email) 
    {
        $query = $this->db->prepare("SELECT id,nome,apelido,email,tmphash FROM usuarios WHERE email = :email LIMIT 1");
        $query->bindParam(':email', $email);
        $query->execute();
        $retorno = $query->fetch();
        
        if (OFFLINE === true) {
            if ($retorno) {
                return json_encode(array("tipo"=>"alert-info","msg"=>"E-mail de cadastro: {$retorno->email}<br />Usuário: {$retorno->apelido}<br />Hash: {$retorno->tmphash}"));
            } else {
                return json_encode(array("tipo"=>"alert-danger","msg"=>"E-mail não encontrado."));
            }
        } else {
            $Email = new Email();
            $Email->enviarHash($retorno->nome, $retorno->apelido, $retorno->email, $retorno->tmphash);
            return json_encode(array("tipo"=>"alert-info","msg"=>"O código foi enviado para o e-mail <strong>{$email}</strong>"));
        }
    }

    public function hash($hash)
    {
        try {
            $query = $this->db->prepare("SELECT * FROM usuarios WHERE tmphash = :hash LIMIT 1");
            $query->bindParam(':hash', $hash);
            $query->execute();
        
            if ($query->fetch()) {
                return true;
            }
        } catch (\PDOException $e) {
            unset($e);
            return false;
        }
        return false;
    }

    public function confirma($hash)
    {
        if ($this->hash($hash)) {
            $validado = true;
            $bytes = random_bytes(5);
            $tmphash = bin2hex($bytes);
            $sql = "UPDATE usuarios SET tmphash = :hashnovo, validado = :validado WHERE tmphash = :hashantigo";
            $query = $this->db->prepare($sql);
            $query->bindParam(':hashnovo', $tmphash);
            $query->bindParam(':hashantigo', $hash);
            $query->bindParam(':validado', $validado);
            if ($query->execute()) {
                return json_encode(array("tipo"=>"alert-info","msg"=>"Usuário validado com sucesso."));
            } 
            return json_encode(array("tipo"=>"alert-danger","msg"=>"Erro ao validar o usuário."));
        } else {
            return json_encode(array("tipo"=>"alert-danger","msg"=>"Código inválido."));
        }
    }

    public function cadastro($nome, $apelido, $senha, $email) 
    {
        $enviaEmail = true;
        $validado = true;
        $bytes = random_bytes(5);
        $tmphash = bin2hex($bytes);

        if ($this->tabelaExiste() === false)
            return json_encode(array("tipo"=>"alert-danger","msg"=>"<a href=" . URL . "admin/instalar>Instale</a> o sistema primeiro"));

        if ($this->check($apelido, $email))
            return json_encode(array("tipo"=>"alert-danger","msg"=>"Já existe alguem com este apelido ou email"));

        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $acesso = time();

        if ($this->total() > 0) {
            $role = 'usuario';
        } else {
            $role = 'admin';
        }

        if (OFFLINE === false) {
            $Email = new Email();
            $enviaEmail = $Email->enviarHash($nome, $apelido, $email, $tmphash);
            $validado = false;
        }

        if ($enviaEmail !== true && OFFLINE === false) {
            return json_encode(array("tipo"=>"alert-danger","msg"=>"$enviaEmail"));
        } else {
            try {
                $sql = "INSERT INTO usuarios (tmphash, nome, apelido, senha, email, role, acesso, cadastro, validado) 
                        VALUES (:tmphash, :nome, :apelido, :senha, :email, :role, :acesso, :cadastro, :validado)";

                $query = $this->db->prepare($sql);
                $parameters = array(
                    ':tmphash' => $tmphash, 
                    ':nome' => $nome, 
                    ':apelido' => $apelido, 
                    ':senha' => $hash, 
                    ':email' => $email, 
                    ':role' => $role, 
                    ':acesso' => $acesso, 
                    ':cadastro' => $acesso, 
                    ':validado' => $validado
                );

                if ($query->execute($parameters)) {
                    return json_encode(array("tipo"=>"alert-info","msg"=>"Usuário $apelido adicionado com sucesso.<br >Confirme seu e-mail clicando no link enviado ou colando o código de confirmação aqui."));
                }
                return json_encode(array("tipo"=>"alert-danger","msg"=>"Erro ao adicionar usuário: $apelido"));
            } catch (\PDOException $e) {
                //unset($e);
                return json_encode(array("tipo"=>"alert-danger","msg"=>"Erro ao adicionar usuário ${apelido}: " . $e->getMessage()));
            } catch (\Exception $e) {
                return json_encode(array("tipo"=>"alert-danger","msg"=>"Erro ao adicionar usuário ${apelido}: " . $e->getMessage()));
            }
        }
    }

    public function login($apelido, $senha) 
    {
        if (!$this->tabelaExiste()) {
            return json_encode(array("tipo"=>"alert-danger","msg"=>"A tabela de usuários não existe.<br />Crie uma conta."));
        }

        $query = $this->db->prepare("SELECT * FROM usuarios WHERE apelido = :apelido LIMIT 1");
        $query->bindParam(':apelido', $apelido);
        $query->execute();

        if ($linha = $query->fetch()) {
            if ($linha->validado) {
                if (password_verify($senha, $linha->senha)) {
                    $_SESSION['logado'] = true;
                    $_SESSION['id'] = $linha->id;
                    $_SESSION['role'] = $linha->role;
                    return json_encode(array("tipo"=>"alert-info","msg"=>"Usuário logado com sucesso."));
                } else {
                    return json_encode(array("tipo"=>"alert-danger","msg"=>"Login ou Senha inválidos."));
                }
            } else {
                return json_encode(array("tipo"=>"alert-danger","msg"=>"Usuário não verificado, <a href='" . URL . "usuarios/confirma'>confirme</a> sua conta ou <a href='" . URL . "usuarios/senha'>re-envie</a> o código de confirmação."));
            }
        } else {
            return json_encode(array("tipo"=>"alert-danger","msg"=>"O usuário $apelido não existe."));
        }
        return json_encode(array("tipo"=>"alert-danger","msg"=>"Falha no login."));
    }

    public function apagar($id) 
    {
        try {
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $query = $this->db->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();
            return json_encode(array("tipo"=>"alert-info","msg"=>"Usuário ID: $id apagado com sucesso."));
        } catch (\PDOException $e) { 
            unset($e);
            return json_encode(array("tipo"=>"alert-danger","msg"=>"Erro ao apagar o usuário ID: $id"));
        }
    }

    public function editar($id, $nome, $apelido, $email, $role, $validado, $senha) 
    {

        if ($validado === 'sim') {
            $validado = true;
        } else {
            $validado = false;
        }

        // apelido, senha, email, role, acesso, cadastro
        $sql = "UPDATE usuarios SET nome = :nome, apelido = :apelido, senha = :senha, email = :email, role = :role, validado = :validado WHERE id = :id";

        if ($senha != false)
            $sql = "UPDATE usuarios SET nome = :nome, apelido = :apelido, email = :email, role = :role, validado = :validado WHERE id = :id";

        $query = $this->db->prepare($sql);

        $query->bindParam(':id', $id);
        $query->bindParam(':nome', $nome);
        $query->bindParam(':apelido', $apelido);
        if ($senha)
            $query->bindParam(':senha', $senha);
        $query->bindParam(':email', $email);
        $query->bindParam(':role', $role);
        $query->bindParam(':validado', $validado);

        if ($query->execute()) {
            return json_encode(array("tipo"=>"alert-info","msg"=>"Usuário ID: $id editado com sucesso."));
        } 
        return json_encode(array("tipo"=>"alert-danger","msg"=>"Erro ao editar o usuário ID: $id"));
    }

    public function check($apelido, $email) 
    {
        //$apelido = "%$name%";
        try {
            $query = $this->db->prepare("SELECT * FROM usuarios WHERE apelido = :apelido OR email = :email");
            $query->bindParam(':apelido', $apelido);
            $query->bindParam(':email', $email);
            $query->execute();
        
            if ($query->fetchAll()) {
                return true;
            }
        } catch (\PDOException $e) {
            unset($e);
            return false;
        }
        return false;
    }

    public function total() 
    {
        try {
            $query = $this->db->prepare("SELECT * FROM usuarios");
            $query->execute();
            $item = $query->fetchAll(); 
            return count($item);
        } catch (\PDOException $e) {
            unset($e);
            return 0;
        }        
    }

    public function sair() 
    {
        unset($_SESSION['logado'],$_SESSION['id'],$_SESSION['role']);
        return json_encode(array("tipo"=>"alert-info","msg"=>"Deslogado com sucesso."));
    }

    private function tabelaExiste() 
    {
        try {
            $resultado = $this->db->query("SELECT 1 FROM usuarios LIMIT 1");
            return true;
        } catch (\PDOException $e) {
            unset($e);
            return false;
        }
        return $resultado !== false;
    }
    
}
