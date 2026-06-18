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
  public function inicioCoor()
  {
    $dados = [
      'titulo' => 'Início',
      'descricao' => 'Página inicial para coordenadores'
    ];
    $this->view('pagina/inicioCoor', $dados);
  }
} //fim da classe Paginas
