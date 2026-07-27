<?php
class Localizacao
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listarLocalizacoes()
    {
        $this->db->query("SELECT * FROM localizacao ORDER BY loca_nome");
        return $this->db->resultados();
    }
}