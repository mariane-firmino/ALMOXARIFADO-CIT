<?php
class Paginas extends Controller
{
  public function index()
  {
    $dados = [
      'titulo' => 'Pagina Inicial',
      'descricao' => 'Aula de PHP'
    ];
    $this->view('pagina/home', $dados);
  }
  public function sobre()
  {
    $dados = [
      'titulo' => 'Sobre nós...',
      'descricao' => 'Esta aula é sobre PHP 
                 orientado a objetos com MVC'
    ];
    $this->view('pagina/sobre', $dados);
  }
  public function cadastro()
  {
    $dados = [
      'titulo' => 'Cadastro',
      'descricao' => 'Página de cadastro de usuários'
    ];
    $this->view('usuario/cadastro', $dados);
  }
  public function cadCoordenador()
  {
    $dados = [
      'titulo' => 'Cadastro',
      'descricao' => 'Página de cadastro de usuários'
    ];
    $this->view('usuario/cadCoordenador', $dados);
  }
  public function cadServidor()
  {
    $dados = [
      'titulo' => 'Cadastro',
      'descricao' => 'Página de cadastro de usuários'
    ];
    $this->view('usuario/cadServidor', $dados);
  }
  public function cadEstagiario()
  {
    $dados = [
      'titulo' => 'Cadastro',
      'descricao' => 'Página de cadastro de usuários'
    ];
    $this->view('usuario/cadEstagiario', $dados);
  }

  public function esqueciSenha()
  {
    $dados = [
      'titulo' => 'Esqueci minha senha',
      'descricao' => 'Página para recuperação de senha'
    ];
    $this->view('usuario/esqueciSenha', $dados);
  }
  public function alterarSenha()
  {
    $dados = [
      'titulo' => 'Alterar Senha',
      'descricao' => 'Página para alteração de senha'
    ];
    $this->view('usuario/alterarSenha', $dados);
  }
  public function inicioCoor()
  {
    $dados = [
      'titulo' => 'Início',
      'descricao' => 'Página inicial para coordenadores'
    ];
    $this->view('pagina/inicioCoor', $dados);
  }
} //fim da classe Paginas
