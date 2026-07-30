<?php

class Usuarios extends Controller
{
    private $usuarioModel;
    private $notificacaoModel;

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
        $this->notificacaoModel = $this->model('Notificacao');
    }

    public function cadastrar()
    {

        $dados = [
            'titulo' => 'Cadastro',
            'descricao' => 'Página de cadastro de usuários'
        ];
        $this->view('usuarios/cadastrar', $dados);
    }

    public function login()
    {
        $dados = [
            'titulo' => 'Login',
            'descricao' => 'Página de login'
        ];
        $this->view('usuarios/login', $dados);
    }

    public function gerenciarPerfis()
    {
        $pesquisa = trim($_GET['pesquisa'] ?? '');
        $funcao = $_GET['funcao'] ?? '';
        $status = $_GET['status'] ?? '';

        $usuariosPorPagina = 4;

        // Página atual
        $paginaAtual = $_GET['pagina'] ?? 1;

        $inicio = ($paginaAtual - 1) * $usuariosPorPagina;


        // Total de usuários considerando filtros
        $totalUsuarios = $this->usuarioModel->totalUsuarios(
            $pesquisa,
            $funcao,
            $status
        );


        $totalPaginas = ceil($totalUsuarios / $usuariosPorPagina);


        // Busca usuários da página atual
        $usuarios = $this->usuarioModel->listarUsuarios(
            $pesquisa,
            $funcao,
            $inicio,
            $usuariosPorPagina
        );


        $dados = [

            'usuarios' => $usuarios,

            'funcoes' => $this->usuarioModel->listarFuncoes(),

            'total' => $totalUsuarios,

            'ativos' => $this->usuarioModel->totalAtivos(),

            'inativos' => $this->usuarioModel->totalInativos(),

            'removidos' => $this->usuarioModel->totalRemovidos(),

            'totalUsuarios' => $totalUsuarios,

            'totalPaginas' => $totalPaginas,

            'paginaAtual' => $paginaAtual,

            'usuariosPorPagina' => $usuariosPorPagina

        ];


        $this->view('usuarios/gerenciarPerfis', $dados);
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
                        $this->notificacaoModel->criarNotificacao('Novo coordenador', 'Um novo coordenador se cadastrou com sucesso.', 1);
                        
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
                        $this->notificacaoModel->criarNotificacao('Novo servidor', 'Um novo servidor se cadastrou com sucesso.', 1);
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
                        $this->notificacaoModel->criarNotificacao('Novo estagiário', 'Um novo estagiário se cadastrou com sucesso.', 1);
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
                        // Atualiza o último acesso do usuário
                        $this->usuarioModel->atualizarUltimoLogin(
                            $usuario->usua_id
                        );
                        // se tiver tudo certo vai criar a sessão
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
        $_SESSION['usuario_id'] = $usuario->usua_id;
        $_SESSION['usuario_nome'] = $usuario->usua_nome;
        $_SESSION['usuario_email'] = $usuario->usua_email;
        $_SESSION['usuario_telefone'] = $usuario->tele_numero;
        $_SESSION['usuario_siap'] = $usuario->usua_siap;
        $_SESSION['usuario_matricula'] = $usuario->usua_matricula;
        $_SESSION['usuario_ano'] = $usuario->turm_ano;
        $_SESSION['usuario_curso'] = $usuario->turm_curso;
        $_SESSION['usuario_funcao'] = $usuario->func_id;
        $_SESSION['usuario_setor'] = $usuario->seto_nome;
        $_SESSION['usuario_foto'] = $usuario->usua_foto;


        URL::redirecionar('paginas/home');
        exit;
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


    // sair
    public function sair()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);

        session_destroy();

        URL::redirecionar('usuarios/login');
    }
    // excluir perfil
    public function excluir($id)
    {
        if ($this->usuarioModel->excluirUsuario($id)) {
            $titulo = 'Usuário Excluído';
            $mensagem = 'O usuário (ID: ' . $id . ') foi excluído do sistema.';
            $funcao = 1; // ID do destinatário ou da função que recebe a notificação

            $this->notificacaoModel->criarNotificacao($titulo, $mensagem, $funcao);
            header("Location: " . URL . "/usuarios/gerenciarPerfis");
        } else {
            echo "Erro ao excluir usuário";
        }
    }

    public function editarPerfil()
    {

        $usuario = $this->usuarioModel
            ->buscarPorId($_SESSION['usuario_id']);


        $dados = [
            'usuario' => $usuario
        ];


        $this->view(
            'usuarios/editarPerfil',
            $dados
        );
    }

    public function salvarAlteracoes()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Upload da imagem
            $foto = $_FILES['foto']['name'];
            $fotoTemp = $_FILES['foto']['tmp_name'];

            $pasta = "../Public/img/usuarios/"; // aqui é onde vai ser salvo a imagem


            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }


            move_uploaded_file(
                $fotoTemp,
                $pasta . $foto
            );

            $dados = [

                'usua_id' => $_SESSION['usuario_id'],

                'usua_nome' => $_POST['nome'],

                'usua_email' => $_POST['email'],

                'usua_foto' => $foto,

                'usua_telefone' => $_POST['telefone']

            ];


            if ($this->usuarioModel->editarPerfil($dados)) {


                $_SESSION['usuario_nome'] = $dados['usua_nome'];


                header(
                    "Location: " . URL . "/paginas/perfil"
                );
            }
        }
    }

    public function salvarSenha()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header("Location: " . URL . "/usuarios/alterarSenha");
            exit;
        }

        $usuario = $this->usuarioModel->buscarPorId(
            $_SESSION['usuario_id']
        );

        if (!password_verify($_POST['senha_atual'], $usuario->usua_senha)) {

            $_SESSION['erro'] = "Senha atual incorreta.";

            header("Location: " . URL . "/usuarios/alterarSenha");
            exit;
        }

        if ($_POST['nova_senha'] != $_POST['confirmar_senha']) {

            $_SESSION['erro'] = "As senhas não coincidem.";

            header("Location: " . URL . "/usuarios/alterarSenha");
            exit;
        }

        $senha = password_hash(
            $_POST['nova_senha'],
            PASSWORD_DEFAULT
        );

        $this->usuarioModel->alterarSenha(
            $_SESSION['usuario_id'],
            $senha
        );

        $_SESSION['sucesso'] = "Senha alterada com sucesso.";

        header("Location: " . URL . "/paginas/perfil");
        exit;
    }
}
