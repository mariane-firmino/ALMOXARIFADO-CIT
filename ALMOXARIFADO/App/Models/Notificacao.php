<?php

class Notificacao
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listarNotificacoes($usuario, $funcao, $pesquisa = '', $data = '', $status = '')
    {
        $sql = "SELECT *
        FROM notificacao
        WHERE (usua_id = :usuario OR func_id = :funcao)";

        if (!empty($pesquisa)) {
            $sql .= "AND (noti_titulo LIKE :pesquisa OR noti_mensagem LIKE :pesquisa)";
        }

        if (!empty($data)) {
            $sql .= "AND DATE(noti_data)=:data";
        }

        if (!empty($status)) {
            $sql .= "AND noti_status = :status";
        }


        $sql .= "ORDER BY noti_data DESC";


        $this->db->query($sql);
        $this->db->bind(':usuario', $usuario);
        $this->db->bind(':funcao', $funcao);


        if (!empty($pesquisa)) {
            $this->db->bind(
                ':pesquisa',
                "%$pesquisa%"
            );
        }


        if (!empty($data)) {
            $this->db->bind(
                ':data',
                $data
            );
        }

        if (!empty($status)) {
            $this->db->bind(
                ':status',
                $status
            );
        }

        return $this->db->resultados();
    }



    public function marcarLida($id)
    {

        $this->db->query("UPDATE notificacao
        SET noti_status='Lida'
        WHERE noti_id=:id");

        $this->db->bind(':id', $id);
        return $this->db->executa();
    }

    public function excluir($id)
    {
        $this->db->query("DELETE FROM notificacao WHERE noti_id=:id");
        $this->db->bind(':id', $id);

        return $this->db->executa();
    }

    public function criarNotificacao($titulo, $mensagem, $funcao)
    {
        $this->db->query("INSERT INTO notificacao(noti_titulo, noti_mensagem, noti_status, func_id) VALUES(:titulo,:mensagem,'Não lida',:funcao)");

        $this->db->bind(':titulo', $titulo);
        $this->db->bind(':mensagem', $mensagem);
        $this->db->bind(':funcao', $funcao);

        return $this->db->executa();
    }
    // 2. NOVA FUNÇÃO: Notificação específica para um USUÁRIO (Pessoa)
    public function criarNotificacaoPorUsuario($titulo, $mensagem, $usuarioId)
    {
        $this->db->query("INSERT INTO notificacao (noti_titulo, noti_mensagem, noti_status, usua_id, func_id) VALUES (:titulo, :mensagem, 'Não lida', :usuario, NULL)");

        $this->db->bind(':titulo', $titulo);
        $this->db->bind(':mensagem', $mensagem);
        $this->db->bind(':usuario', $usuarioId);
    }

    public function contarNaoLidas($usuario)
    {
        $this->db->query("SELECT COUNT(*) AS total FROM notificacao WHERE usua_id = :usuario AND noti_status = 'Não lida'");

        $this->db->bind(':usuario', $usuario);

        return $this->db->resultado()->total;
    }
}
