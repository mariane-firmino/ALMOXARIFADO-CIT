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
        $this->db->query("SELECT usua_email FROM usuario WHERE usua_email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) :
            return true;
        else :
            return false;
        endif;
    }

    public function armazenar($dados)
    {
        $this->db->query("INSERT INTO usuario(usua_nome, usua_email, usua_siap, usua_senha, func_id, seto_id, turm_id) VALUES (:nome, :email, :siap, :senha, :funcao, :setor, :turma)");

        $this->db->bind('nome', $dados['nome']);
        $this->db->bind('email', $dados['email']);
        $this->db->bind('siap', $dados['siap']);
        $this->db->bind('senha', $dados['senha']);
        $this->db->bind('funcao', $dados['funcao']);
        $this->db->bind('setor', $dados['setor']);
        $this->db->bind('turma', $dados['turma']);

        if (!$this->db->executa()) {
           return false;
        }
        var_dump($dados);



        $this->db->query("INSERT INTO telefone(tele_numero, usua_id) VALUES (:celular, :id_usuario)");
        $this->db->bind("celular", $dados['celular']);
        $this->db->bind("id_usuario", $this->db->ultimoIdInserido());


        if ($this->db->executa()) :
            return true;
        else :  
            return false;
        endif;
    }

    public function checarLogin($email, $senha)
    {
        $this->db->query("SELECT * FROM usuario WHERE usua_email = :e");
        $this->db->bind(":e", $email);

        if ($this->db->resultado()) :
            $resultado = $this->db->resultado();
            if (password_verify($senha, $resultado->usua_senha)):
                return $resultado;
            else:
                return false;
            endif;
        else :
            return false;
        endif;
    }


    public function lerUsuarioPorId($id)
    {
        $this->db->query("SELECT * FROM usuario WHERE usua_id = :id");
        $this->db->bind('usua_id', $id);

        return $this->db->resultado();
    }
}
