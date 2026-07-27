<?php

class Solicitacoes extends Controller
{
    private $solicitacaoModel;
    private $notificacaoModel;
    private $produtoModel;


    public function __construct()
    {
        $this->solicitacaoModel = $this->model('Solicitacao');
        $this->notificacaoModel = $this->model('Notificacao');
        $this->produtoModel = $this->model('Produto');
    }

    public function analisarSolicitacao()
    {
        $pesquisa = trim(filter_input(INPUT_GET, 'pesquisa', FILTER_SANITIZE_SPECIAL_CHARS));
        $status   = trim(filter_input(INPUT_GET, 'status', FILTER_SANITIZE_SPECIAL_CHARS));
        $data     = trim(filter_input(INPUT_GET, 'data', FILTER_SANITIZE_SPECIAL_CHARS));


        // Paginação
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        $limite = 5;

        $inicio = ($pagina - 1) * $limite;


        if (!empty($pesquisa) || !empty($status) || !empty($data)) {

            $solicitacoes = $this->solicitacaoModel
                ->filtrarSolicitacoes($pesquisa, $status, $data);
        } else {

            $solicitacoes = $this->solicitacaoModel
                ->listarSolicitacoes($inicio, $limite);
        }


        $dados = [
            'solicitacoes' => $solicitacoes,
            'totalSolicitacoes' => $this->solicitacaoModel->contarSolicitacoes(),
            'paginaAtual' => $pagina,
            'limite' => $limite
        ];


        $this->view('solicitacoes/analisarSolicitacao', $dados);
    }

    public function verSolicitacao($id)
    {
        $solicitacao = $this->solicitacaoModel->buscarSolicitacao($id);

        $itens = $this->solicitacaoModel->buscarItensSolicitacao($id);

        $dados = [
            'solicitacao' => $solicitacao,
            'itens' => $itens
        ];

        $this->view('solicitacoes/verSolicitacao', $dados);
    }

    public function processarSolicitacao()
    {
        $dados = [
            'id' => $_POST['soli_id'],
            'status' => $_POST['acao'],
            'retirada' => $_POST['data_retirada'],
            'devolucao' => $_POST['data_devolucao'],
            'observacao' => trim($_POST['observacao'])
        ];

        $this->solicitacaoModel->processarSolicitacao($dados);

        header('Location: ' . URL . '/solicitacoes/analisarSolicitacao');
        exit;
    }

    // servidor
    public function detalharSolicitacao($id)
    {
        // Garante que a solicitação pertence ao usuário logado
        $solicitacao = $this->solicitacaoModel->buscarSolicitacaoUsuario(
            $id,
            $_SESSION['usuario_id']
        );

        // Caso a solicitação não exista ou não seja do usuário
        if (!$solicitacao) {
            header('Location: ' . URL . 'solicitacoes/solicitacaoServidor');
            exit;
        }

        $dados = [
            'titulo' => 'Detalhes da Solicitação',
            'solicitacao' => $solicitacao,
            'itens' => $this->solicitacaoModel->buscarItensSolicitacao($id)
        ];

        $this->view('solicitacoes/detalharSolicitacao', $dados);
    }

    public function solicitacaoServidor()
    {

        $usuario = $_SESSION['usuario_id'];


        $pesquisa = trim(filter_input(INPUT_GET, 'pesquisa'));
        $status = trim(filter_input(INPUT_GET, 'status'));
        $data = trim(filter_input(INPUT_GET, 'data'));


        // Paginação
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        $limite = 5;

        $inicio = ($pagina - 1) * $limite;



        if (!empty($pesquisa) || !empty($status) || !empty($data)) {


            $solicitacoes =
                $this->solicitacaoModel
                ->filtrarMinhasSolicitacoes(
                    $usuario,
                    $pesquisa,
                    $status,
                    $data,
                    $inicio,
                    $limite
                );
        } else {


            $solicitacoes =
                $this->solicitacaoModel
                ->listarSolicitacoesUsuario(
                    $usuario,
                    $inicio,
                    $limite
                );
        }



        $dados = [

            'titulo' => 'Minhas Solicitações',

            'solicitacoes' => $solicitacoes,

            'totais' => $this->solicitacaoModel
                ->contarMinhasSolicitacoes($usuario),


            'paginaAtual' => $pagina,

            'limite' => $limite,

            'totalSolicitacoes' =>
            $this->solicitacaoModel
                ->contarMinhasSolicitacoesUsuario($usuario)

        ];



        $this->view(
            "solicitacoes/solicitacaoServidor",
            $dados
        );
    }

    public function realizar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $produtos = $_POST['produtos'];
            $quantidades = $_POST['quantidade'];

            // identifica uma única solicitação
            $grupo = uniqid();

            $soli_id = $this->solicitacaoModel->criarSolicitacao(
                $_SESSION['usuario_id']
            );
            // Pega o nome do usuário logado na sessão (com fallback caso a variável mude de nome)
            $nomeSolicitante = $_SESSION['usuario_nome'] ?? $_SESSION['nome'] ?? 'Um usuário';
            $idSolicitante   = $_SESSION['usuario_id'];
            $this->notificacaoModel->criarNotificacao(
                'Nova solicitação',
                'O usuário ' . $nomeSolicitante . ' (ID: ' . $idSolicitante . ') enviou uma nova solicitação para análise.',
                1
            );

            foreach ($produtos as $produto) {

                if ($quantidades[$produto] > 0) {

                    $this->solicitacaoModel->adicionarItem(
                        $soli_id,
                        $produto,
                        $quantidades[$produto]
                    );
                }
            }

            Sessao::mensagem(
                'solicitacao',
                'Solicitação enviada com sucesso!'
            );

            header('Location: ' . URL . '/produtos/consultarProduto');
            exit;
        }
    }

    public function controlarSolicitacao()
    {
        $pesquisa = filter_input(INPUT_GET, 'pesquisa', FILTER_SANITIZE_SPECIAL_CHARS);

        $solicitacaoModel = $this->model('Solicitacao');

        if (!empty($pesquisa)) {
            $solicitacoes = $solicitacaoModel->pesquisarSolicitacoes($pesquisa);
        } else {

            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

            $limite = 5;

            $inicio = ($pagina - 1) * $limite;


            $solicitacoes = $solicitacaoModel
                ->listarSolicitacoes($inicio, $limite);
        }

        $dados = [
            'solicitacoes' => $solicitacoes
        ];

        $this->view('solicitacoes/analisarSolicitacao', $dados);
    }

    public function listarSolicitacoes()
    {
        $solicitacao = $this->model('Solicitacao');

        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        $limite = 5;

        $inicio = ($pagina - 1) * $limite;


        $dados = [
            'solicitacoes' => $solicitacao->listarSolicitacoes($inicio, $limite),
            'totalSolicitacoes' => $solicitacao->contarSolicitacoes(),
            'paginaAtual' => $pagina,
            'limite' => $limite
        ];

        $this->view('solicitacao/listar', $dados);
    }

    // mudança de status
    public function aprovar($id)
    {
        // Busca os itens da solicitação
        $itens = $this->solicitacaoModel->buscarItensSolicitacao($id);

        foreach ($itens as $item) {

            // Busca o produto
            $produto = $this->produtoModel->buscarProdutoPorId($item->prod_id);

            // Nova quantidade
            $novaQuantidade = $produto->prod_quantidade - $item->item_quantidade;

            if ($novaQuantidade < 0) {
                $novaQuantidade = 0;
            }

            // Atualiza estoque
            $this->produtoModel->movimentarEstoque(
                $item->prod_id,
                $novaQuantidade
            );
        }

        // Aprova a solicitação
        $this->solicitacaoModel->alterarStatus(
            $id,
            'Aprovada'
        );

        // Notificação
        // Ao aprovar/negar a solicitação de uma pessoa específica
        $solicitacao = $this->solicitacaoModel->buscarSolicitacao($id);
        $nomeAprovador = $_SESSION['usuario_nome'] ?? $_SESSION['nome'] ?? 'o Coordenador';

        $this->notificacaoModel->criarNotificacaoPorUsuario(
            'Solicitação aprovada',
            'Sua solicitação nº ' . $id . ' foi aprovada por: ' . $nomeAprovador . '.',
            $solicitacao->usua_id_solicitante // ID do usuário que fez a solicitação (ex: 10)
        );

        header('Location: ' . URL . '/solicitacoes/analisarSolicitacao');
        exit;
    }

    /*public function negar($id)
    {
        $this->solicitacaoModel->alterarStatus(
            $id,
            'Negada'
        );

        // Busca os dados da solicitação para saber quem vai receber a notificação
        $solicitacao = $this->solicitacaoModel->buscarSolicitacao($id);
        var_dump($solicitacao);
        die();

        // Pega o nome do usuário logado que está negando agora
        $nomeAprovador = $_SESSION['usuario_nome'] ?? $_SESSION['nome'] ?? 'o Coordenador';

        $this->notificacaoModel->criarNotificacaoPorUsuario(
            'Solicitação negada',
            'Sua solicitação nº ' . $id . ' foi negada por: ' . $nomeAprovador . '.',
            $solicitacao->usua_id_solicitante
        );

        Sessao::mensagem(
            'solicitacao',
            'Solicitação negada!'
        );

        header('Location: ' . URL . '/solicitacoes/analisarSolicitacao');
        exit;
    }*/
    public function negar($id)
    {
        // 1. Busca os dados da solicitação PRIMEIRO
        $solicitacao = $this->solicitacaoModel->buscarSolicitacao($id);

        // 2. Altera o status
        $this->solicitacaoModel->alterarStatus($id, 'Negada');

        if ($solicitacao) {
            $nomeAprovador = $_SESSION['usuario_nome'] ?? $_SESSION['nome'] ?? 'o Coordenador';

            try {
                // 3. Tenta salvar a notificação
                $salvou = $this->notificacaoModel->criarNotificacaoPorUsuario(
                    'Solicitação negada',
                    'Sua solicitação nº ' . $id . ' foi negada por: ' . $nomeAprovador . '.',
                    $solicitacao->usua_id_solicitante
                );

                if (!$salvou) {
                    echo "<h1>O método executou, mas o banco retornou FALSE ao inserir!</h1>";
                    die();
                }
            } catch (PDOException $e) {
                // Se o banco de dados rejeitar por qualquer motivo, o erro vai aparecer aqui na tela
                echo "<h1>Erro no Banco de Dados ao salvar Notificação:</h1>";
                echo "<p>" . $e->getMessage() . "</p>";
                die();
            }
        }

        Sessao::mensagem('solicitacao', 'Solicitação negada!');
        URL::redirecionar('solicitacoes/analisarSolicitacao');
    }

    /*public function devolver()
    {
        $produtoModel = $this->model('Produto');

        $itens = $this->solicitacaoModel
            ->buscarItensSolicitacao($id);

        foreach ($itens as $item) {

            $this->produtoModel->movimentarEstoque(
                $item->prod_id,
                $item->item_quantidade
            );
        }
    }*/
}
