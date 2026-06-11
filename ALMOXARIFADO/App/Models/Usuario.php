<?php

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checarEmail($email)
    {
        $this->db->query("SELECT email FROM usuarios WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) :
            return true;
        else :
            return false;
        endif;
    }

    public function armazenar($dados)
    {
        $this->db->query("INSERT INTO usuario(usua_nome, usua_siap, usua_email, usua_senha) VALUES (:nome, :siap, :email, :senha)");

        $this->db->bind("usua_nome", $dados['nome']);
        $this->db->bind("usua_siap", $dados['siap']);
        $this->db->bind("usua_email", $dados['email']);
        $this->db->bind("usua_celular", $dados['celular']);
        $this->db->bind("usua_senha", $dados['senha']);

        if ($this->db->executa()) :
            return true;
        else :
            return false;
        endif;
    }

    public function checarLogin($email, $senha)
    {
        $this->db->query("SELECT * FROM usuarios WHERE email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) : 
            $resultado = $this->db->resultado();
            if(password_verify($senha, $resultado->senha)): 
                return $resultado;
            else:
                return false;
            endif;
        else :
            return false;
        endif;
    }


    public function lerUsuarioPorId($id){
        $this->db->query("SELECT * FROM usuarios WHERE id = :id");
        $this->db->bind('id', $id);

        return $this->db->resultado();
    }

}