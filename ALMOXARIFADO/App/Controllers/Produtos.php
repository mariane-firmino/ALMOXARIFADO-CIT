<?php

class Produtos extends Controller
{
    private $produtoModel;
    private $notificacaoModel;

    public function __construct()
    {
        $this->produtoModel = $this->model('Produto');
        $this->notificacaoModel = $this->model('Notificacao');
    }

    // página inicial de consultar produtos
    public function consultarProduto()
    {
        $limite = 10;
        $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $inicio = ($paginaAtual - 1) * $limite;


        $filtros = [
            'pesquisa' => $_GET['pesquisa'] ?? '',
            'categoria' => $_GET['categoria'] ?? '',
            'status' => $_GET['status'] ?? ''
        ];


        $dados = [
            'produtos' => $this->produtoModel->buscarProdutos(
                $filtros,
                $inicio,
                $limite
            ),

            'totalProdutosTabela' => $this->produtoModel->totalProdutosFiltrados($filtros),

            'paginaAtual' => $paginaAtual,
            'limite' => $limite,
            'filtros' => $filtros,

            'categorias' => $this->produtoModel->listarCategorias(),
            'totalProdutos' => $this->produtoModel->totalProdutos(),
            'estoqueDisponivel' => $this->produtoModel->estoqueDisponivel(),
            'estoqueBaixo' => $this->produtoModel->estoqueBaixo(),
            'semEstoque' => $this->produtoModel->semEstoque()

        ];

        $this->view('produtos/consultarProduto', $dados);
    }

    // página que extende de consultar produto, estoque e controlar produto
    // precisa arrumar
    public function detalharProduto($id)
    {
        $produto = $this->produtoModel->buscarProdutoPorId($id);

        $dados = [
            'produto' => $produto
        ];

        $this->view('produtos/detalharProduto', $dados);
    }

    // aqui é onde controla os produtos
    public function controlarProduto()
    {
        $limite = 8;
        $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $inicio = ($paginaAtual - 1) * $limite;


        $filtros = [
            'pesquisa' => $_GET['pesquisa'] ?? '',
            'categoria' => $_GET['categoria'] ?? '',
            'status' => $_GET['status'] ?? ''
        ];


        $dados = [
            'produtos' => $this->produtoModel->buscarProdutos(
                $filtros,
                $inicio,
                $limite
            ),

            'totalProdutosTabela' => $this->produtoModel->totalProdutosFiltrados($filtros),

            'paginaAtual' => $paginaAtual,
            'limite' => $limite,
            'filtros' => $filtros,

            'categorias' => $this->produtoModel->listarCategorias(),
            'totalProdutos' => $this->produtoModel->totalProdutos(),
            'estoqueDisponivel' => $this->produtoModel->estoqueDisponivel(),
            'estoqueBaixo' => $this->produtoModel->estoqueBaixo(),
            'semEstoque' => $this->produtoModel->semEstoque()

        ];


        $this->view(
            'produtos/controlarProduto',
            $dados
        );
    }

    public function estoque()
    {
        $limite = 5;
        $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $inicio = ($paginaAtual - 1) * $limite;


        $filtros = [
            'pesquisa' => $_GET['pesquisa'] ?? '',
            'categoria' => $_GET['categoria'] ?? '',
            'status' => $_GET['status'] ?? ''
        ];


        $dados = [
            'produtos' => $this->produtoModel->buscarProdutos(
                $filtros,
                $inicio,
                $limite
            ),

            'totalProdutosTabela' => $this->produtoModel->totalProdutosFiltrados($filtros),

            'paginaAtual' => $paginaAtual,
            'limite' => $limite,
            'filtros' => $filtros,

            'categorias' => $this->produtoModel->listarCategorias(),
            'totalProdutos' => $this->produtoModel->totalProdutos(),
            'estoqueDisponivel' => $this->produtoModel->estoqueDisponivel(),
            'estoqueBaixo' => $this->produtoModel->estoqueBaixo(),
            'semEstoque' => $this->produtoModel->semEstoque()

        ];


        $this->view('produtos/estoque', $dados);
    }

    // cadastrar produto - só mostra informações, não salva
    public function cadastrarProduto()
    {
        $dados = [
            'titulo' => 'Cadastrar Produto',
            'descricao' => 'Página para cadastrar produtos'
        ];

        // Instanciar o modelo de categoria
        $categoriaModel = $this->model('Categoria');
        $dados['categorias'] = $categoriaModel->listarCategorias();
        // Instanciar o modelo de localização
        $localizacaoModel = $this->model('Localizacao');
        $dados['localizacoes'] = $localizacaoModel->listarLocalizacoes();

        $this->view('produtos/cadastrarProduto', $dados);
    }

    public function salvarProduto()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Dados do formulário
            $nome = $_POST['nome'];
            $categoria = $_POST['categoria'];
            $localizacao = $_POST['localizacao'];
            $quantidade = $_POST['quantidade'];
            $descricao = $_POST['descricao'];


            // Upload da imagem
            $imagem = $_FILES['imagem']['name'];
            $imagemTemp = $_FILES['imagem']['tmp_name'];

            $pasta = "../Public/img/produtos/"; // aqui é onde vai ser salvo a imagem


            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }


            move_uploaded_file(
                $imagemTemp,
                $pasta . $imagem
            );


            $dados = [
                'nome' => $nome,
                'categoria' => $categoria,
                'localizacao' => $localizacao,
                'quantidade' => $quantidade,
                'descricao' => $descricao,
                'foto' => $imagem
            ];


            if ($this->produtoModel->cadastrar($dados)) {

                $notificacaoModel = $this->model('Notificacao');

                // Notifica coordenadores
                $notificacaoModel->criarNotificacao(
                    'Novo produto cadastrado',
                    'O produto ' . $nome . ' foi cadastrado no estoque.',
                    1
                );

                // Notifica estagiários
                $notificacaoModel->criarNotificacao(
                    'Novo produto cadastrado',
                    'O produto ' . $nome . ' foi cadastrado no estoque.',
                    2
                );

                // Verifica estoque baixo
                if ($quantidade <= 3) {

                    // Coordenadores
                    $notificacaoModel->criarNotificacao(
                        'Estoque baixo',
                        'O produto ' . $nome . ' está com estoque baixo.',
                        1
                    );

                    // Estagiários
                    $notificacaoModel->criarNotificacao(
                        'Estoque baixo',
                        'O produto ' . $nome . ' está com estoque baixo.',
                        2
                    );
                }

                $_SESSION['mensagem'] = "Produto cadastrado com sucesso!";

                URL::redirecionar('produtos/estoque');
                exit;
            } else {

                $_SESSION['mensagem'] = "Erro ao cadastrar produto.";

                URL::redirecionar('produtos/estoque');
                exit;
            }
        }
    }

    public function realizarSolicitacao()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ids = $_POST['produtos'] ?? [];


            if (empty($ids)) {
                header("Location: " . URL . "/produtos/consultarProduto");
                exit;
            }


            $produtos = $this->produtoModel->buscarSelecionados($ids);


            $dados = [
                'produtos' => $produtos
            ];


            $this->view('produtos/realizarSolicitacao', $dados);
        }
    }


    // excluir
    public function excluirProduto($id)
    {
        // 1. Busca os dados do produto ANTES de apagar (para pegar o nome)
        $produto = $this->produtoModel->buscarProdutoPorId($id); // ou $this->produtoModel->buscarPorId($id)

        if ($produto) {
            // 2. Pega o nome do usuário logado através da sessão
            // (Ajuste 'usuario_nome' para o nome da chave exata que você usou na $_SESSION no Login)
            $usuarioLogado = $_SESSION['usuario_nome'] ?? $_SESSION['nome'] ?? 'Usuário do Sistema';

            // 3. Tenta excluir o produto no banco
            if ($this->produtoModel->excluirProduto($id)) {

                // 4. Monta o texto dinâmico com o NOME do produto e QUEM apagou
                $titulo = 'Produto Excluído';
                $mensagem = 'O produto (ID: ' . $id . ') foi excluído por: ' . $usuarioLogado . '.';
                $funcao = 1; // ID do destinatário ou da função que recebe a notificação

                // 5. Salva a notificação no banco
                $this->notificacaoModel->criarNotificacao($titulo, $mensagem, $funcao);

                // 6. Alerta amigável e Redirecionamento
                Sessao::mensagem('produto', 'Produto excluído com sucesso!');
                URL::redirecionar('produtos/controlarProduto');
            } else {
                Sessao::mensagem('produto', 'Erro ao excluir o produto no banco.', 'alert alert-danger');
                URL::redirecionar('produtos/controlarProduto');
            }
        } else {
            Sessao::mensagem('produto', 'Produto não encontrado!', 'alert alert-danger');
            URL::redirecionar('produtos/controlarProduto');
        }
    }
}
