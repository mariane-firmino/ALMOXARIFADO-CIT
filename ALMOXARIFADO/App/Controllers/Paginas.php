<?php
class Paginas extends Controller
{
  private $notificacaoModel;
  private $solicitacaoModel;
  private $usuarioModel;
  private $produtoModel;

  public function __construct()
  {
    $this->notificacaoModel = $this->model('Notificacao');
    $this->solicitacaoModel = $this->model('Solicitacao');
    $this->usuarioModel = $this->model('Usuario');
    $this->produtoModel = $this->model('Produto');
  }

  public function index()
  {
    $dados = [
      'titulo' => 'Pagina Inicial',
      'descricao' => 'Aula de PHP'
    ];
    $this->view('usuarios/login', $dados);
  }

  public function home()
  {
    $idUsuario = $_SESSION['usuario_id'];
    $dados = [
      'titulo' => 'Home',
      'descricao' => 'Página inicial para coordenadores',
      'notificacoesNaoLidas' => $this->notificacaoModel->contarNaoLidas($idUsuario),
      'solicitacoesAprovadas' => $this->solicitacaoModel->contarSolicitacoesAprovadas(),
      'aprovadas' => $this->solicitacaoModel->contarMinhasSolicitacoesAprovadas($idUsuario),
      'pendentes' => $this->solicitacaoModel->contarMinhasSolicitacoesPendentes($idUsuario),
      'minhasNegadas' => $this->solicitacaoModel->contarMinhasSolicitacoesNegadas($idUsuario),
      'solicitacoesPendentes' => $this->solicitacaoModel->contarSolicitacoesPendentes(),
      'negadas' => $this->solicitacaoModel->contarSolicitacoesNegadas(),
      'totalPerfis' => $this->usuarioModel->totalPerfis(),
      'perfisRemovidos' => $this->usuarioModel->totalRemovidos(),
      'totalProdutos' => $this->produtoModel->totalProdutos(),
    ];
    $this->view('pagina/home', $dados);
  }

  public function sobre()
  {
    $dados = [
      'titulo' => 'Sobre nós...',
      'descricao' => 'Esta aula é sobre PHP orientado a objetos com MVC'
    ];
    $this->view('pagina/sobre', $dados);
  }

  public function perfil()
  {
    $dados = [
      'titulo' => 'Perfil do Usuário',
      'descricao' => 'Página para exibir informações do perfil do usuário'
    ];
    $this->view('pagina/perfil', $dados);
  }

  public function historico()
  {
    $dados = [
      'titulo' => 'Histórico de Solicitações',
      'descricao' => 'Página para exibir o histórico de solicitações'
    ];
    $this->view('pagina/historico', $dados);
  }


  public function sair()
  {
    session_destroy();
    $this->view('usuarios/login');
  }
} //fim da classe Paginas
