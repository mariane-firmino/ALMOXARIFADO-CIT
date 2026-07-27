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
        $this->db->query("INSERT INTO usuario(usua_nome, usua_email, usua_siap, usua_matricula, usua_senha, func_id, seto_id, turm_id) VALUES (:nome, :email, :siap, :matricula, :senha, :funcao, :setor, :turma)");

        $this->db->bind('nome', $dados['nome']);
        $this->db->bind('email', $dados['email']);
        $this->db->bind('siap', $dados['siap']);
        $this->db->bind('matricula', $dados['matricula']);
        $this->db->bind('senha', $dados['senha']);
        $this->db->bind('funcao', $dados['funcao']);
        $this->db->bind('setor', $dados['setor']);
        $this->db->bind('turma', $dados['turma']);

        if (!$this->db->executa()) {
            return false;
        }

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
        $this->db->query("
        SELECT
        u.*,
        t.turm_curso,
        t.turm_ano,
        te.tele_numero,
        s.seto_nome

        FROM usuario u

        LEFT JOIN turma t
        ON u.turm_id = t.turm_id

        LEFT JOIN telefone te
        ON u.usua_id = te.usua_id

        LEFT JOIN setor s
        ON u.seto_id = s.seto_id

        WHERE u.usua_email = :e
        ");

        $this->db->bind(":e", $email);

        $resultado = $this->db->resultado();

        if ($resultado) {
            if (password_verify($senha, $resultado->usua_senha)) {
                return $resultado;
            } else {
                return false;
            }
        }

        return false;
    }


    public function lerUsuarioPorId($id)
    {
        $this->db->query("SELECT * FROM usuario WHERE usua_id = :id");
        $this->db->bind('id', $id);

        return $this->db->resultado();
    }

    public function buscarPorId($id)
    {
        $this->db->query("
        SELECT
            u.*,
            s.seto_nome,
            f.func_nome,
            t.tele_numero

        FROM usuario u

        INNER JOIN funcao f
            ON f.func_id = u.func_id

        LEFT JOIN setor s
            ON s.seto_id = u.seto_id

        LEFT JOIN telefone t
            ON t.usua_id = u.usua_id

        WHERE u.usua_id = :id
        ");

        $this->db->bind(':id', $id);

        return $this->db->resultado();
    }

    public function editarPerfil($dados)
    {
        $this->db->query("
        UPDATE usuario SET
            usua_nome = :nome,
            usua_email = :email,
            usua_foto = :foto
        WHERE usua_id = :id
        ");

        $this->db->bind(':nome', $dados['usua_nome']);
        $this->db->bind(':email', $dados['usua_email']);
        $this->db->bind(':foto', $dados['usua_foto']);
        $this->db->bind(':id', $dados['usua_id']);

        $usuarioAtualizado = $this->db->executa();

        // Atualiza o telefone
        $this->db->query("
        UPDATE telefone
        SET tele_numero = :telefone
        WHERE usua_id = :id
        ");

        $this->db->bind(':telefone', $dados['telefone']);
        $this->db->bind(':id', $dados['usua_id']);

        $telefoneAtualizado = $this->db->executa();

        return $usuarioAtualizado && $telefoneAtualizado;
    }

    public function alterarSenha($id, $senha)
    {

        $this->db->query("
        UPDATE usuario
        SET usua_senha = :senha
        WHERE usua_id = :id
        ");

        $this->db->bind(':senha', $senha);
        $this->db->bind(':id', $id);

        return $this->db->executa();
    }

    // home
    public function totalPerfis()
    {
        $this->db->query(
            "SELECT COUNT(*) AS total FROM usuario"
        );
        return $this->db->resultado()->total;
    }

    // gerenciar perfis
    public function listarUsuarios(
        $pesquisa = '',
        $funcao = '',
        $inicio = 0,
        $limite = 4
    ) {
        $sql = "SELECT 
            u.*,
            f.func_nome,

            CASE

                WHEN u.usua_ultimo_login IS NULL
                THEN 'Nunca acessou'

                WHEN DATEDIFF(
                    NOW(),
                    u.usua_ultimo_login
                ) > 30
                THEN 'Inativo'

                ELSE 'Ativo'

            END AS status

        FROM usuario u

        INNER JOIN funcao f
        ON u.func_id = f.func_id

        WHERE 1=1";


        if (!empty($pesquisa)) {
            $sql .= " AND (
            u.usua_nome LIKE :pesquisa
            OR u.usua_email LIKE :pesquisa
            OR u.usua_siap LIKE :pesquisa
        )";
        }


        if (!empty($funcao)) {
            $sql .= " AND u.func_id = :funcao";
        }


        $sql .= " ORDER BY u.usua_id DESC
              LIMIT :inicio, :limite";


        $this->db->query($sql);



        if (!empty($pesquisa)) {
            $this->db->bind(':pesquisa', '%' . $pesquisa . '%');
        }


        if (!empty($funcao)) {
            $this->db->bind(':funcao', $funcao);
        }


        $this->db->bind(':inicio', $inicio);
        $this->db->bind(':limite', $limite);


        return $this->db->resultados();
    }
    public function listarCoordenadores()
    {
        $this->db->query("
        SELECT usua_id
        FROM usuario
        WHERE func_id = 1
        ");
        return $this->db->resultados();
    }
    public function listarEstagiarios()
    {

        $this->db->query("
        SELECT usua_id
        FROM usuario
        WHERE func_id = 2
        ");


        return $this->db->resultados();
    }

    public function buscarUsuarios($inicio, $limite)
    {
        $this->db->query(
            "SELECT * FROM usuarios
        LIMIT :inicio, :limite"
        );

        $this->db->bind(':inicio', $inicio);
        $this->db->bind(':limite', $limite);

        return $this->db->resultados();
    }

    public function listarFuncoes()
    {
        $this->db->query("
        SELECT *
        FROM funcao
        ORDER BY func_nome
        ");

        return $this->db->resultados();
    }

    public function totalUsuarios($pesquisa = '', $funcao = '')
    {
        $sql = "SELECT COUNT(*) AS total 
            FROM usuario u
            WHERE 1=1";


        if (!empty($pesquisa)) {
            $sql .= " AND (
            u.usua_nome LIKE :pesquisa
            OR u.usua_email LIKE :pesquisa
            OR u.usua_siap LIKE :pesquisa
        )";
        }


        if (!empty($funcao)) {
            $sql .= " AND u.func_id = :funcao";
        }


        $this->db->query($sql);


        if (!empty($pesquisa)) {
            $this->db->bind(':pesquisa', '%' . $pesquisa . '%');
        }


        if (!empty($funcao)) {
            $this->db->bind(':funcao', $funcao);
        }


        $resultado = $this->db->resultado();

        return $resultado->total;
    }

    public function atualizarUltimoLogin($id)
    {
        $this->db->query(
            "UPDATE usuario
        SET usua_ultimo_login = NOW()
        WHERE usua_id = :id"
        );

        $this->db->bind(':id', $id);

        return $this->db->executa();
    }

    public function totalAtivos()
    {
        $this->db->query(
            "SELECT COUNT(*) AS total
        FROM usuario
        WHERE usua_ultimo_login IS NOT NULL
        AND DATEDIFF(NOW(), usua_ultimo_login) <= 30"
        );

        $resultado = $this->db->resultado();

        return $resultado->total;
    }

    public function totalInativos()
    {
        $this->db->query(
            "SELECT COUNT(*) AS total
        FROM usuario
        WHERE usua_removido = 0
        AND (
            usua_ultimo_login IS NULL
            OR DATEDIFF(NOW(), usua_ultimo_login) > 30
        )"
        );

        $resultado = $this->db->resultado();

        return $resultado->total;
    }

    public function totalRemovidos()
    {
        $this->db->query(
            "SELECT COUNT(*) AS total
            FROM usuario
            WHERE usua_removido = 1"
        );

        $resultado = $this->db->resultado();

        return $resultado->total;
    }
    // daqui para cima ainda não tá completo

    // excluir usuário
    public function excluirUsuario($id)
    {
        // Exclui telefones vinculados ao usuário
        $this->db->query(
            "DELETE FROM telefone
            WHERE usua_id = :id"
        );

        $this->db->bind(':id', $id);
        $this->db->executa();

        // Depois exclui o usuário
        $this->db->query(
            "UPDATE usuario
            SET usua_removido = 1
            WHERE usua_id = :id"
        );

        $this->db->bind(':id', $id);
        return $this->db->executa();
    }
}
