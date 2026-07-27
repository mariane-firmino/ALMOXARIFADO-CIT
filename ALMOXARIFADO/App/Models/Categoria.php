<?php
class Categoria
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listarCategorias()
    {
        $this->db->query("SELECT * FROM categoria ORDER BY cate_nome");
        return $this->db->resultados();
    }
}