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
                'matricula' => NULL,
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha']),
                'funcao' => 1,
                'setor' => trim($formulario['setor']),
                'turma' => NULL,
                'celular' => trim($formulario['celular'])

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
                        URL::redirecionar('usuarios/home');
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
                'senha' => '',
                'confirma_senha' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'siap_erro' => '',
                'setor_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => '',

            ];

        endif;
        $this->view('usuarios/cadCoordenador', $dados);
    } // fim do método cadCoordenador

    public function cadServidor()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (isset($formulario)) :
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'siap' => trim($formulario['siap']),
                'matricula' => NULL,
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha']),
                'funcao' => 2,
                'setor' => trim($formulario['setor']),
                'turma' => NULL,
                'celular' => trim($formulario['celular'])

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

                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;

                if (empty($formulario['confirma_senha'])) :
                    $dados['confirma_senha_erro'] = 'Confirme a Senha';
                endif;
                if (empty($formulario['funcao'])) :
                    $dados['funcao_erro'] = 'Preencha o campo função';
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
                        URL::redirecionar('paginas/home');
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
                'senha' => '',
                'confirma_senha' => '',
                'funcao' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'siap_erro' => '',
                'setor_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => '',
                'funcao_erro' => '',

            ];

        endif;
        $this->view('usuarios/cadServidor', $dados);
    } // fim do método cadServidor

    public function cadEstagiario()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if (isset($formulario)) :
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'siap' => NULL,
                'setor' => NULL,
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha']),
                'funcao' => 3,
                'curso' => trim($formulario['curso']),
                'ano' => trim($formulario['ano']),
                'celular' => trim($formulario['celular']),
                'matricula' => trim($formulario['matricula']),
                'turma' => null,
            ];

            if ($dados['curso'] == 'Técnico em Informática' && $dados['ano'] == 1) {
                $dados['turma'] = 1;
            } elseif ($dados['curso'] == 'Técnico em Informática' && $dados['ano'] == 2) {
                $dados['turma'] = 2;
            } elseif ($dados['curso'] == 'Técnico em Informática' && $dados['ano'] == 3) {
                $dados['turma'] = 3;
            } elseif ($dados['curso'] == 'Técnico em Biotecnologia' && $dados['ano'] == 1) {
                $dados['turma'] = 4;
            } elseif ($dados['curso'] == 'Técnico em Biotecnologia' && $dados['ano'] == 2) {
                $dados['turma'] = 5;
            } elseif ($dados['curso'] == 'Técnico em Biotecnologia' && $dados['ano'] == 3) {
                $dados['turma'] = 6;
            } else {
                $dados['turma'] = null;
            }

            if (in_array("", $formulario)) :

                if (empty($formulario['nome'])) :
                    $dados['nome_erro'] = 'Preencha o campo nome';
                endif;

                if (empty($formulario['email'])) :
                    $dados['email_erro'] = 'Preencha o campo e-mail';
                endif;

                if (empty($formulario['matricula'])) :
                    $dados['matricula_erro'] = 'Preencha o campo Matrícula';
                endif;
                if (empty($formulario['curso'])) :
                    $dados['curso_erro'] = 'Preencha o campo curso';
                endif;
                if (empty($formulario['ano'])) :
                    $dados['ano_erro'] = 'Preencha o campo ano';
                endif;

                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;

                if (empty($formulario['confirma_senha'])) :
                    $dados['confirma_senha_erro'] = 'Confirme a Senha';
                endif;
                if (empty($formulario['funcao'])) :
                    $dados['funcao_erro'] = 'Preencha o campo função';
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
                        URL::redirecionar('paginas/home');
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
                'curso' => '',
                'ano' => '',
                'senha' => '',
                'confirma_senha' => '',
                'funcao' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'siap_erro' => '',
                'curso_erro' => '',
                'ano_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => '',
                'funcao_erro' => '',

            ];

        endif;
        $this->view('usuarios/cadEstagiario', $dados);
    } // fim do método cadEstagiario

    public function loginUser()
    {
        /*echo "loginUser";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";*/

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
                    echo "email invalido";
                else :

                    $usuario = $this->usuarioModel->checarLogin($formulario['email'], $formulario['senha']);
            
                    if ($usuario):
                        $this->criarSessaoUsuario($usuario);
                        echo "usuario criado<br>";
                        echo "<pre>";
                        var_dump($usuario);
                        echo "</pre>";
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

        // $this->view('pagina/home', $dados);
    }

    private function criarSessaoUsuario($usuario)
    {
        $_SESSION['usuario_id'] = $usuario->usua_id;
        $_SESSION['usuario_nome'] = $usuario->usua_nome;
        $_SESSION['usuario_email'] = $usuario->usua_email;
        $_SESSION['usuario_funcao'] = $usuario->func_id;

        URL::redirecionar('paginas/home');
        /*if($usuario->func_id == 1){
            URL::redirecionar('paginas/inicioCoor');
        }elseif($usuario->func_id == 2){
            URL::redirecionar('paginas/inicioServ');
        }elseif($usuario->func_id == 3){
            URL::redirecionar('paginas/inicioEstag');
        }else{
            URL::redirecionar('paginas/inicio'); 
        }*/
    }


    public function sair()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);

        session_destroy();

        URL::redirecionar('usuarios/login');
    }



    public function login()
    {
        $dados = [
            'titulo' => 'Login',
            'descricao' => 'Página de login'
        ];
        $this->view('usuarios/login', $dados);
    }

    public function esqueciSenha()
    {
        $dados = [
            'titulo' => 'Esqueci minha senha',
            'descricao' => 'Página para recuperação de senha'
        ];
        $this->view('usuarios/esqueciSenha', $dados);
    }
    public function alterarSenha()
    {
        $dados = [
            'titulo' => 'Alterar Senha',
            'descricao' => 'Página para alteração de senha'
        ];
        $this->view('usuarios/alterarSenha', $dados);
    }
}
