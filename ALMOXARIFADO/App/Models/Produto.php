<?php
require_once '../App/Models/Notificacao.php';
class Produto
{
    private $db;
    private $notificacaoModel;

    public function __construct()
    {
        $this->db = new Database();
        $this->notificacaoModel = new Notificacao();
    }
    // verificar se o produto já existe no banco de dados
    public function verificarProduto($nome)
    {
        $this->db->query("SELECT * FROM produto WHERE prod_nome = :nome");
        $this->db->bind('nome', $nome);

        $resultado = $this->db->resultado();

        return !empty($resultado);
    }

    private function definirStatus($quantidade)
    {
        if ($quantidade == 0) {
            return "Esgotado";
        } elseif ($quantidade <= 5) {
            return "Estoque baixo";
        } else {
            return "Disponível";
        }
    }

    // responsável por cadastrar um novo produto no banco de dados
    // tá faltando cadastrar o qrcode
    public function cadastrar($dados)
    {
        $status = $this->definirStatus($dados['quantidade']);

        $this->db->query("
        INSERT INTO produto
        (
            prod_nome,
            prod_descricao,
            prod_foto,
            prod_quantidade,
            prod_status,
            loca_id,
            cate_id
        )
        VALUES
        (
            :nome,
            :descricao,
            :foto,
            :quantidade,
            :status,
            :localizacao,
            :categoria
        )
        ");

        $this->db->bind(':nome', $dados['nome']);
        $this->db->bind(':descricao', $dados['descricao']);
        $this->db->bind(':foto', $dados['foto']);
        $this->db->bind(':quantidade', $dados['quantidade']);
        $this->db->bind(':status', $status);
        $this->db->bind(':localizacao', $dados['localizacao']);
        $this->db->bind(':categoria', $dados['categoria']);

        return $this->db->executa();
    }

    // buscar produtos selecionados para realizar a solicitação
    public function buscarSelecionados($ids)
    {

        $placeholders = implode(',', array_fill(0, count($ids), '?'));


        $this->db->query("
        SELECT 
            p.prod_id,
            p.prod_nome,
            p.prod_foto,
            p.prod_quantidade,
            c.cate_nome

        FROM produto p

        INNER JOIN categoria c
        ON c.cate_id = p.cate_id

        WHERE p.prod_id IN ($placeholders)

    ");


        foreach ($ids as $index => $id) {

            $this->db->bind(
                $index + 1,
                $id
            );
        }


        return $this->db->resultados();
    }

    /// listar produtos
    public function listarProdutos()
    {
        $this->db->query("
        SELECT 
            p.*,
            c.cate_nome,
            l.loca_nome
        FROM produto p
        INNER JOIN categoria c 
            ON p.cate_id = c.cate_id
        INNER JOIN localizacao l
            ON p.loca_id = l.loca_id
        ORDER BY p.prod_id DESC
        ");

        return $this->db->resultados();
    }

    // produtos cadastrados
    public function totalProdutos()
    {
        $this->db->query("
        SELECT COUNT(*) AS total
        FROM produto
        ");

        return $this->db->resultado()->total;
    }

    // produtos disponíveis
    public function estoqueDisponivel()
    {
        $this->db->query("
        SELECT COUNT(*) AS total
        FROM produto
        WHERE prod_quantidade > 5
        ");

        return $this->db->resultado()->total;
    }

    // produtos com estoque baixo
    public function estoqueBaixo()
    {
        $this->db->query("
        SELECT COUNT(*) AS total
        FROM produto
        WHERE prod_quantidade > 0
        AND prod_quantidade <= 5
        ");

        return $this->db->resultado()->total;
    }

    // produtos esgotados
    public function semEstoque()
    {
        $this->db->query("
        SELECT COUNT(*) AS total
        FROM produto
        WHERE prod_quantidade = 0
        ");

        return $this->db->resultado()->total;
    }

    // alterar quantidade -aprovado
    public function alterarQuantidade($produto, $quantidade)
    {
        $this->db->query("
        UPDATE produto
        SET prod_quantidade = prod_quantidade + :quantidade
        WHERE prod_id = :produto
    ");

        $this->db->bind(':quantidade', $quantidade);
        $this->db->bind(':produto', $produto);

        return $this->db->executa();
    }

    // listar categorias
    public function listarCategorias()
    {

        $this->db->query("
        SELECT *
        FROM categoria
        ORDER BY cate_nome
        ");

        return $this->db->resultados();
    }

    // buscar produtos
    public function buscarProdutos($filtros, $inicio, $limite)
    {

        $sql = "SELECT 
            p.*,
            c.cate_nome
            FROM produto p
            INNER JOIN categoria c
            ON p.cate_id = c.cate_id
            WHERE 1=1
            ";


        if (!empty($filtros['pesquisa'])) {
            $sql .= " AND p.prod_nome LIKE :pesquisa ";
        }


        if (!empty($filtros['categoria'])) {
            $sql .= " AND p.cate_id = :categoria ";
        }


        if (!empty($filtros['status'])) {
            $sql .= " AND p.prod_status = :status ";
        }



        $sql .= "ORDER BY p.prod_id DESC LIMIT $inicio, $limite";


        $this->db->query($sql);



        if (!empty($filtros['pesquisa'])) {
            $this->db->bind(
                ':pesquisa',
                "%" . $filtros['pesquisa'] . "%"
            );
        }


        if (!empty($filtros['categoria'])) {
            $this->db->bind(
                ':categoria',
                $filtros['categoria']
            );
        }


        if (!empty($filtros['status'])) {
            $this->db->bind(
                ':status',
                $filtros['status']
            );
        }


        return $this->db->resultados();
    }
    public function buscarProdutoPorId($id)
    {
        $this->db->query(
            "SELECT 
            p.*,
            c.cate_nome,
            l.loca_nome

        FROM produto p

        INNER JOIN categoria c
        ON p.cate_id = c.cate_id

        INNER JOIN localizacao l
        ON p.loca_id = l.loca_id

        WHERE p.prod_id = :id"
        );


        $this->db->bind(':id', $id);


        return $this->db->resultado();
    }

    public function movimentarEstoque($produtoId, $quantidade)
    {
        // Altera a quantidade
        $this->db->query("UPDATE produto
        SET prod_quantidade = prod_quantidade + :qtd
        WHERE prod_id = :id");

        $this->db->bind(':qtd', $quantidade);
        $this->db->bind(':id', $produtoId);
        $this->db->executa();

        // Busca o produto atualizado
        $produto = $this->buscarProdutoPorId($produtoId);

        $statusAntigo = $produto->prod_status;

        // Define o novo status
        if ($produto->prod_quantidade <= 0) {

            $status = "Sem estoque";
        } elseif ($produto->prod_quantidade <= 3) {

            $status = "Estoque baixo";
        } else {

            $status = "Disponível";
        }

        // Atualiza o status
        $this->db->query("UPDATE produto
        SET prod_status = :status
        WHERE prod_id = :id");

        $this->db->bind(':status', $status);
        $this->db->bind(':id', $produtoId);
        $this->db->executa();

        // Só envia notificação se o status mudou
        if ($status != $statusAntigo) {

            if ($status == "Sem estoque") {

                $this->notificacaoModel->criarNotificacao(
                    "Produto sem estoque",
                    "O produto {$produto->prod_nome} está sem estoque.",
                    1
                );

                $this->notificacaoModel->criarNotificacao(
                    "Produto sem estoque",
                    "O produto {$produto->prod_nome} está sem estoque.",
                    2
                );
            } elseif ($status == "Estoque baixo") {

                $this->notificacaoModel->criarNotificacao(
                    "Estoque baixo",
                    "O produto {$produto->prod_nome} está com estoque baixo.",
                    1
                );

                $this->notificacaoModel->criarNotificacao(
                    "Estoque baixo",
                    "O produto {$produto->prod_nome} está com estoque baixo.",
                    2
                );
            }
        }

        return true;
    }

    // total de produtos filtrados
    public function totalProdutosFiltrados($filtros)
    {
        $sql = "SELECT COUNT(*) AS total
                FROM produto p
                WHERE 1=1
                ";

        if (!empty($filtros['pesquisa'])) {
            $sql .= " AND p.prod_nome LIKE :pesquisa ";
        }


        if (!empty($filtros['categoria'])) {
            $sql .= " AND p.cate_id = :categoria ";
        }


        if (!empty($filtros['status'])) {
            $sql .= " AND p.prod_status = :status ";
        }


        $this->db->query($sql);



        if (!empty($filtros['pesquisa'])) {
            $this->db->bind(
                ':pesquisa',
                "%" . $filtros['pesquisa'] . "%"
            );
        }


        if (!empty($filtros['categoria'])) {
            $this->db->bind(':categoria', $filtros['categoria']);
        }


        if (!empty($filtros['status'])) {
            $this->db->bind(':status', $filtros['status']);
        }


        return $this->db->resultado()->total;
    }

    // excluir produto
    public function excluirProduto($id)
    {
        $this->db->query(
            "DELETE FROM produto
            WHERE prod_id = :id"
        );

        $this->db->bind(':id', $id);

        return $this->db->executa();
    }
}
