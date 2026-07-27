<?php

class Notificacoes extends Controller
{

    private $notificacaoModel;

    public function __construct()
    {
        $this->notificacaoModel = $this->model('Notificacao');
    }

    public function notificacao()
    {
        $usuario = $_SESSION['usuario_id'];
        $funcao = $_SESSION['usuario_funcao'];

        $pesquisa = trim(filter_input(INPUT_GET, 'pesquisa'));
        $data = trim(filter_input(INPUT_GET, 'data'));
        $status = trim(filter_input(INPUT_GET, 'status'));


        $dados = [
            'titulo' => 'Notificações',

            'notificacoes' =>
            $this->notificacaoModel
                ->listarNotificacoes(
                    $usuario,
                    $funcao,
                    $pesquisa,
                    $data,
                    $status
                )
        ];

        $this->view(
            'notificacoes/notificacao',
            $dados
        );
    }



    public function lida($id)
    {
        $this->notificacaoModel->marcarLida($id);

        header("Location: " . URL . "/notificacoes/notificacao");
    }



    public function excluir($id)
    {
        $this->notificacaoModel->excluir($id);

        header("Location: " . URL . "/notificacoes/notificacao");
    }
}
