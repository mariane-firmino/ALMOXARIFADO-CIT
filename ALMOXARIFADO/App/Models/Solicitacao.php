<?php
class Solicitacao
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function criarSolicitacao($usuario)
    {
        $this->db->query("
        INSERT INTO solicitacao(
            soli_observacao,
            soli_status,
            usua_id_solicitante,
            usua_id_coord
        )
        VALUES(
            '',
            'Pendente',
            :usuario,
            NULL
        )
        ");

        $this->db->bind(':usuario', $usuario);

        $this->db->executa();

        return $this->db->ultimoIdInserido();
    }

    public function adicionarItem($solicitacao, $produto, $quantidade)
    {
        $this->db->query("
        INSERT INTO item_solicitacao(
            soli_id,
            prod_id,
            item_quantidade
        )
        VALUES(
            :solicitacao,
            :produto,
            :quantidade
        )
        ");

        $this->db->bind(':solicitacao', $solicitacao);
        $this->db->bind(':produto', $produto);
        $this->db->bind(':quantidade', $quantidade);

        return $this->db->executa();
    }

    public function listarSolicitacoes($inicio = 0, $limite = 5)
    {
        $this->db->query(
            "SELECT
            s.soli_id,
            s.soli_status,
            s.soli_data_solicitacao,
            u.usua_nome,
            u.usua_email,

            GROUP_CONCAT(
                CONCAT(
                    p.prod_nome,
                    ' (',
                    i.item_quantidade,
                    ')'
                ) SEPARATOR ', '
            ) AS produtos,

            SUM(i.item_quantidade) AS quantidade_total

        FROM solicitacao s

        INNER JOIN usuario u
            ON u.usua_id = s.usua_id_solicitante

        INNER JOIN item_solicitacao i
            ON i.soli_id = s.soli_id

        INNER JOIN produto p
            ON p.prod_id = i.prod_id

        GROUP BY s.soli_id

        ORDER BY s.soli_data_solicitacao DESC

        LIMIT :inicio, :limite
        "
        );


        $this->db->bind(':inicio', $inicio);
        $this->db->bind(':limite', $limite);


        return $this->db->resultados();
    }

    public function contarSolicitacoes()
    {
        $this->db->query(
            "SELECT COUNT(*) AS total
        FROM solicitacao"
        );

        return $this->db->resultado()->total;
    }

    // contagens para a página home
    public function contarSolicitacoesAprovadas()
    {
        $this->db->query(
            "SELECT COUNT(*) AS totalAprovado
            FROM solicitacao
            WHERE soli_status = 'Aprovada'"
        );

        return $this->db->resultado()->totalAprovado;
    }
    public function contarSolicitacoesPendentes()
    {
        $this->db->query(
            "SELECT COUNT(*) AS total
            FROM solicitacao
            WHERE soli_status = 'Pendente'"
        );

        return $this->db->resultado()->total;
    }
    public function contarSolicitacoesNegadas()
    {
        $this->db->query(
            "SELECT COUNT(*) AS total
            FROM solicitacao
            WHERE soli_status = 'Negada'"
        );

        return $this->db->resultado()->total;
    }

    public function pesquisarSolicitacoes($pesquisa)
    {
        $this->db->query(
            "SELECT
            s.soli_id,
            s.soli_status,
            s.soli_data_solicitacao,
            u.usua_nome,
            u.usua_email,
            GROUP_CONCAT(
            CONCAT(
                p.prod_nome,' (', i.item_quantidade, ')') SEPARATOR ', ') AS produtos,
            SUM(i.item_quantidade) AS quantidade_total

        FROM solicitacao s

        INNER JOIN usuario u
        ON u.usua_id = s.usua_id_solicitante

        INNER JOIN item_solicitacao i
        ON i.soli_id = s.soli_id

        INNER JOIN produto p
        ON p.prod_id = i.prod_id

        WHERE
            u.usua_nome LIKE :pesquisa
            OR u.usua_email LIKE :pesquisa
            OR p.prod_nome LIKE :pesquisa
            OR s.soli_id LIKE :pesquisa

        GROUP BY s.soli_id

        ORDER BY s.soli_data_solicitacao DESC
        "
        );

        $this->db->bind('pesquisa', "%{$pesquisa}%");

        return $this->db->resultados();
    }

    public function filtrarSolicitacoes($pesquisa = '', $status = '', $data = '')
    {
        $sql = "
        SELECT
            s.soli_id,
            s.soli_status,
            s.soli_data_solicitacao,
            u.usua_nome,
            u.usua_email,
        GROUP_CONCAT(
            CONCAT(p.prod_nome, ' (', i.item_quantidade, ')' ) SEPARATOR ', '
        ) AS produtos,
            SUM(i.item_quantidade) AS quantidade_total

        FROM solicitacao s
        INNER JOIN usuario u
        ON u.usua_id = s.usua_id_solicitante

        INNER JOIN item_solicitacao i
        ON i.soli_id = s.soli_id

        INNER JOIN produto p
        ON p.prod_id = i.prod_id

        WHERE 1=1";

        if (!empty($pesquisa)) {
            $sql .= " AND (
            u.usua_nome LIKE :pesquisa
            OR u.usua_email LIKE :pesquisa
            OR p.prod_nome LIKE :pesquisa
            OR s.soli_id LIKE :pesquisa
        )";
        }

        if (!empty($status)) {
            $sql .= " AND s.soli_status = :status";
        }

        if (!empty($data)) {
            $sql .= " AND DATE(s.soli_data_solicitacao) = :data";
        }

        $sql .= "
        GROUP BY s.soli_id
        ORDER BY s.soli_data_solicitacao DESC";

        $this->db->query($sql);

        if (!empty($pesquisa)) {
            $this->db->bind('pesquisa', "%{$pesquisa}%");
        }

        if (!empty($status)) {
            $this->db->bind('status', $status);
        }

        if (!empty($data)) {
            $this->db->bind('data', $data);
        }

        return $this->db->resultados();
    }

    // mudança de status
    public function alterarStatus($id, $status)
    {
        $this->db->query(
            "UPDATE solicitacao
        SET soli_status = :status
        WHERE soli_id = :id
        "
        );


        $this->db->bind(':status', $status);
        $this->db->bind(':id', $id);


        return $this->db->executa();
    }

    // ver solicitacao
    public function buscarSolicitacao($id)
    {
        $this->db->query("
        SELECT
            LPAD(s.soli_id, 5, '0') AS codigo,
            s.*,
            u.usua_nome,
            u.usua_email
        FROM solicitacao s
        INNER JOIN usuario u
            ON u.usua_id = s.usua_id_solicitante
        WHERE s.soli_id = :id
        ");

        $this->db->bind('id', $id);

        return $this->db->resultado();
    }

    public function buscarItensSolicitacao($id)
    {
        $this->db->query("
        SELECT
            p.prod_nome,
            i.item_quantidade
        FROM item_solicitacao i

        INNER JOIN produto p
            ON p.prod_id = i.prod_id

        WHERE i.soli_id = :id
        ");

        $this->db->bind('id', $id);

        return $this->db->resultados();
    }

    public function processarSolicitacao($dados)
    {
        $this->db->query("
        UPDATE solicitacao
        SET
            soli_status = :status,
            soli_dth_retirada = :retirada,
            soli_dth_devolucao = :devolucao,
            soli_observacao = :observacao
        WHERE soli_id = :id
        ");

        $this->db->bind('status', $dados['status']);
        $this->db->bind('retirada', $dados['retirada']);
        $this->db->bind('devolucao', $dados['devolucao']);
        $this->db->bind('observacao', $dados['observacao']);
        $this->db->bind('id', $dados['id']);

        return $this->db->executa();
    }

    // servidor
    public function buscarSolicitacaoUsuario($id, $usuario)
    {
        $this->db->query("
        SELECT
            LPAD(s.soli_id, 5, '0') AS codigo,
            s.*,
            u.usua_nome,
            u.usua_email
        FROM solicitacao s

        INNER JOIN usuario u
            ON u.usua_id = s.usua_id_solicitante

        WHERE s.soli_id = :id
        AND s.usua_id_solicitante = :usuario
        ");

        $this->db->bind('id', $id);
        $this->db->bind('usuario', $usuario);

        return $this->db->resultado();
    }

    public function listarSolicitacoesUsuario($usuario, $inicio = 0, $limite = 5)
    {
        $this->db->query("
        SELECT

            s.soli_id,
            s.soli_status,
            s.soli_data_solicitacao,

            GROUP_CONCAT(p.prod_nome SEPARATOR ', ') AS produtos,

            SUM(i.item_quantidade) AS quantidade_total

        FROM solicitacao s

        INNER JOIN item_solicitacao i
            ON i.soli_id = s.soli_id

        INNER JOIN produto p
            ON p.prod_id = i.prod_id

        WHERE s.usua_id_solicitante = :usuario

        GROUP BY s.soli_id

        ORDER BY s.soli_data_solicitacao DESC
        LIMIT :inicio, :limite
        ");

        $this->db->bind('usuario', $usuario);
        $this->db->bind('usuario', $usuario);

        $this->db->bind('inicio', $inicio);

        $this->db->bind('limite', $limite);

        return $this->db->resultados();
    }

    public function contarMinhasSolicitacoesUsuario($usuario)
    {

        $this->db->query("

        SELECT COUNT(*) AS total

        FROM solicitacao

        WHERE usua_id_solicitante = :usuario");


        $this->db->bind(
            ':usuario',
            $usuario
        );


        return $this->db->resultado()->total;
    }
    // contagem - home
    public function contarMinhasSolicitacoesAprovadas($usuario)
    {

        $this->db->query("SELECT COUNT(*) AS total
        FROM solicitacao
        WHERE usua_id_solicitante = :usuario AND soli_status = 'Aprovada'");

        $this->db->bind(
            ':usuario',
            $usuario
        );

        return $this->db->resultado()->total;
    }
    public function contarMinhasSolicitacoesPendentes($usuario)
    {

        $this->db->query("SELECT COUNT(*) AS total
        FROM solicitacao
        WHERE usua_id_solicitante = :usuario AND soli_status = 'Pendente'");

        $this->db->bind(
            ':usuario',
            $usuario
        );

        return $this->db->resultado()->total;
    }
    public function contarMinhasSolicitacoesNegadas($usuario)
    {

        $this->db->query("SELECT COUNT(*) AS total
        FROM solicitacao
        WHERE usua_id_solicitante = :usuario AND soli_status = 'Negada'");

        $this->db->bind(
            ':usuario',
            $usuario
        );

        return $this->db->resultado()->total;
    }


    public function contarMinhasSolicitacoes($usuario)
    {


        $this->db->query("

        SELECT

        SUM(soli_status='Aprovada') as aprovada,

        SUM(soli_status='Pendente') as pendente,

        SUM(soli_status='Negada') as negada,

        SUM(soli_status='Devolvido') as devolvido


        FROM solicitacao


        WHERE usua_id_solicitante = :usuario


        ");


        $this->db->bind(
            ':usuario',
            $usuario
        );



        $resultado = $this->db->resultado();



        return [

            'aprovada' => $resultado->aprovada ?? 0,

            'pendente' => $resultado->pendente ?? 0,

            'negada' => $resultado->negada ?? 0,

            'devolvido' => $resultado->devolvido ?? 0

        ];
    }

    public function filtrarMinhasSolicitacoes($usuario, $pesquisa = '', $status = '', $data = '')
    {

        $sql = "

        SELECT

        s.soli_id,
        s.soli_status,
        s.soli_data_solicitacao,

        GROUP_CONCAT(
            p.prod_nome SEPARATOR ', '
        ) AS produtos,

        SUM(i.item_quantidade) AS quantidade_total


        FROM solicitacao s


        INNER JOIN item_solicitacao i
            ON i.soli_id = s.soli_id


        INNER JOIN produto p
            ON p.prod_id = i.prod_id


        WHERE s.usua_id_solicitante = :usuario

        ";


        if (!empty($pesquisa)) {

            $sql .= "

        AND (
            p.prod_nome LIKE :pesquisa
            OR s.soli_id LIKE :pesquisa
        )

        ";
        }


        if (!empty($status)) {

            $sql .= "

        AND s.soli_status = :status

        ";
        }


        if (!empty($data)) {

            $sql .= "

        AND DATE(s.soli_data_solicitacao) = :data

        ";
        }


        $sql .= "

        GROUP BY s.soli_id

        ORDER BY s.soli_data_solicitacao DESC";


        $this->db->query($sql);



        $this->db->bind(
            ':usuario',
            $usuario
        );


        if (!empty($pesquisa)) {

            $this->db->bind(
                ':pesquisa',
                "%{$pesquisa}%"
            );
        }


        if (!empty($status)) {

            $this->db->bind(
                ':status',
                $status
            );
        }


        if (!empty($data)) {

            $this->db->bind(
                ':data',
                $data
            );
        }


        return $this->db->resultados();
    }
}
