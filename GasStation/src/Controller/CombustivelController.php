<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CombustivelController
 *
 * @author Vinicus
 */
use Model\Combustivel;
class CombustivelController extends Controller {
      public function listar()
    {
        $combustivel = Combustivel::all();
        return $this->view('grade', ['combustivel' => $combustivel]);
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
        $combustivel = Combustivel::find($id);
 
        return $this->view('form', ['combustivel' => $combustivel]);
    }
 
    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar()
    {
        $combustivel           = new Combustivel;
        $combustivel->nome     = $this->request->nome;
        
        
        if ($combustivel->save()) {
            return $this->listar();
        }
    }
 
    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $combustivel           = Combustivel::find($id);
        $combustivel->nome     = $this->request->nome;

        $combustivel->save();
 
        return $this->listar();
    }
 
    /**
     * Apagar um contato conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $combustivel = Combustivel::destroy($id);
        return $this->listar();
    }
}
