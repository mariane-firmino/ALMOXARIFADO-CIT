<?php

class Usuarios extends Controller
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
    }

    public function cadastrar()
    {
        
        $dados = [
            'titulo' => 'Cadastro',
            'descricao' => 'Página de cadastro de usuários'
        ];
        


        $this->view('usuarios/cadastrar', $dados);
    }


    public function cadCoordenador()
  {
    $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (isset($formulario)) :
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'siap' => trim($formulario['siap']),
                'setor' => trim($formulario['setor']),
                'celular' => trim($formulario['celular']),
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha']),
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['nome'])) :
                    $dados['nome_erro'] = 'Preencha o campo nome';
                endif;

                if (empty($formulario['email'])) :
                    $dados['email_erro'] = 'Preencha o campo e-mail';
                endif;

                  if (empty($formulario['siap'])) :
                    $dados['siap_erro'] = 'Preencha o campo SIAP';
                endif;
                  if (empty($formulario['setor'])) :
                    $dados['setor_erro'] = 'Preencha o campo setor';
                endif;

                 if (empty($formulario['celular'])) :
                    $dados['celular_erro'] = 'Preencha o campo celular';
                endif;

                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;

                if (empty($formulario['confirma_senha'])) :
                    $dados['confirma_senha_erro'] = 'Confirme a Senha';
                endif;
            else :
                if (Checa::checarNome($formulario['nome'])) :
                    $dados['nome_erro'] = 'O nome informado é invalido';
                elseif (Checa::checarEmail($formulario['email'])) :
                    $dados['email_erro'] = 'O e-mail informado é invalido';

                elseif ($this->usuarioModel->checarEmail($formulario['email'])) :
                    $dados['email_erro'] = 'O e-mail informado já está cadastrado';
                elseif (strlen($formulario['senha']) < 6) :
                    $dados['senha_erro'] = 'A senha deve ter no minimo 6 caracteres';
                elseif ($formulario['senha'] != $formulario['confirma_senha']) :
                    $dados['confirma_senha_erro'] = 'As senhas são diferentes';
                else :
                    $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                    if ($this->usuarioModel->armazenar($dados)) :
                        Sessao::mensagem('usuario', 'Cadastro realizado com sucesso');
                        URL::redirecionar('usuarios/login');
                    else :
                        die("Erro ao armazenar usuario no banco de dados");
                    endif;

                endif;

            endif;
        else :
            $dados = [
                'nome' => '',
                'email' => '',
                'siap' => '',
                'setor' => '',
                'celular' => '',
                'senha' => '',
                'confirma_senha' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'siap_erro' => '',
                'setor_erro' => '',
                'celular_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => '',
            ];

        endif;
    $this->view('usuarios/cadCoordenador', $dados);
  }
  public function cadServidor()
  {
    $dados = [
      'titulo' => 'Cadastro',
      'descricao' => 'Página de cadastro de usuários'
    ];
    $this->view('usuarios/cadServidor', $dados);
  }
  public function cadEstagiario()
  {
    $dados = [
      'titulo' => 'Cadastro',
      'descricao' => 'Página de cadastro de usuários'
    ];
    $this->view('usuarios/cadEstagiario', $dados);
  }

    public function login()
    {

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (isset($formulario)) :
            $dados = [
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['email'])) :
                    $dados['email_erro'] = 'Preencha o campo e-mail';
                endif;

                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;

            else :
                if (Checa::checarEmail($formulario['email'])) :
                    $dados['email_erro'] = 'O e-mail informado é invalido';
                else :

                    $usuario = $this->usuarioModel->checarLogin($formulario['email'], $formulario['senha']);

                    if ($usuario):
                        $this->criarSessaoUsuario($usuario);
                    else:
                        Sessao::mensagem('usuario', 'Usuario ou senha invalidos', 'alert alert-danger');
                    endif;

                endif;

            endif;
        else :
            $dados = [
                'email' => '',
                'senha' => '',
                'email_erro' => '',
                'senha_erro' => ''
            ];

        endif;


        $this->view('usuarios/login', $dados);
    }

    private function criarSessaoUsuario($usuario)
    {
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['usuario_nome'] = $usuario->nome;
        $_SESSION['usuario_email'] = $usuario->email;

        URL::redirecionar('posts');
    }


    public function sair()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);

        session_destroy();

        URL::redirecionar('usuarios/login');
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
}
