<?php
include "conexao.class.php";

class UserController {
    private $id_usuario;
    private $username;
    private $email;
    private $senha;

    public function getUsername() { return $this->username; }
    public function setUsername($username) { $this->username = $username; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getSenha() { return $this->senha; }
    public function setSenha($senha) { $this->senha = $senha; }

    public function getIdUser() { return $this->id_usuario; }
    public function setIdUser($id_usuario) { $this->id_usuario = $id_usuario; }

    public function listaUser(){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "SELECT * FROM usuarios";
        try{
            $stmt= $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo 'Erro ao listar usuario: ' . $e->getMessage();
            $result = [];
            return $result;
        }
    }

    public function checkUserExists($username, $email) {
        $database = new Conexao();
        $db = $database->getConnection();
    
        $sql = 'SELECT * FROM usuarios WHERE username = :username OR email = :email';
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $result ? true : false;
        } catch(PDOException $e) {
            echo 'Erro ao verificar usuário: '. $e->getMessage();
            return false;
        }
    }
    
    public function inserirUser() {
        $database = new Conexao();
        $db = $database->getConnection();
    
        $sql = 'INSERT INTO usuarios (username, email, senha) values (:username, :email, :senha)';
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':senha', $this->senha);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo 'Erro ao inserir usuario: '. $e->getMessage();
            return false;
        }
    }

    public function deletarUser($id_usuario){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "DELETE FROM usuarios WHERE id_usuario=:id_usuario";
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_usuario',$id_usuario);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo 'Erro ao deletar usuario: ' . $e->getMessage();
            return false;
        }
    }

    public function alterarUser(){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "UPDATE usuarios SET username=:username, email=:email, senha=:senha WHERE id_usuario=:id_usuario";
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_usuario',$this->id_usuario);
            $stmt->bindParam(':username',$this->username);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':senha',$this->senha);
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            echo 'Erro ao alterar cliente'. $e->getMessage();
            return false;
        }
    }

    public function selectUser($username, $senha){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "SELECT * FROM usuarios WHERE username=:username AND senha=:senha";
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':senha',$senha);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo 'Erro ao listar usuario: ' . $e->getMessage();
            $result = [];
            return $result;
        }
    }

    public function selectUserId($id_usuario){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "SELECT * FROM usuarios WHERE id_usuario=:id_usuario";
        try{
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id_usuario',$id_usuario);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo 'Erro ao listar usuario: ' . $e->getMessage();
            $result = [];
            return $result;
        }
    }}

?>