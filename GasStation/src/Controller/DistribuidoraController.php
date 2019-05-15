<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DistribuidoraController
 *
 * @author Vinicus
 */
use Model\Distribuidora;
class DistribuidoraController extends Controller {
     public function listar()
    {
        $distribuidora = Distribuidora::all();
        return $this->view('grade', ['distribuidora' => $distribuidora]);
    }
 
    /**
     * Mostrar formulario para criar um novo contato
     */
    public function criar()
    {
        return $this->view('form');
    }
 
    /**
     * Mostrar formulário para editar um contato
     */
    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $distribuidora = Distribuidora::find($id);
 
        return $this->view('form', ['distribuidora' => $distribuidora]);
    }
 
    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar()
    {
        $distribuidora           = new Distribuidora;
        $distribuidora->endereco     = $this->request->endereco;
        $distribuidora->nome     = $this->request->nome;
        $distribuidora->telefone     = $this->request->telefone;
        
        if ($distribuidora->save()) {
            return $this->listar();
        }
    }
 
    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $distribuidora           = Distribuidora::find($id);
        $distribuidora->endereco     = $this->request->endereco;
        $distribuidora->nome     = $this->request->nome;
        $distribuidora->telefone     = $this->request->telefone;
        $distribuidora->save();
 
        return $this->listar();
    }
 
    /**
     * Apagar um contato conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $distribuidora = Distribuidora::destroy($id);
        return $this->listar();
    }
}
