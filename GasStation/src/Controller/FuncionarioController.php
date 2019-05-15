<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FuncionarioController
 *
 * @author Vinicus
 */

class FuncionarioController extends Controller{
  
    public function listar()
    {
        $funcionario = Funcionario::all();
        return $this->view('grade', ['funcionario' => $funcionario]);
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
        $funcionario = Funcionario::find($id);
 
        return $this->view('form', ['funcionario' => $funcionario]);
    }
 
    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar()
    {
        $funcionario           = new Funcionario;
        $funcionario->nome     = $this->request->nome;
        $funcionario->endereco = $this->request->endereco;
        $funcionario->telefone=$this->request->telefone;
        $funcionario->data_de_nascimento=$this->request->data_de_nascimento;
        if ($funcionario->save()) {
            return $this->listar();
        }
    }
 
    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $funcionario           = Funcionario::find($id);
        $funcionario->nome     = $this->request->nome;
        $funcionario->endereco = $this->request->endereco;
        $funcionario->telefone=$this->request->telefone;
        $funcionario->data_de_nascimento=$this->request->data_de_nascimento;
        $funcionario->save();
 
        return $this->listar();
    }
 
    /**
     * Apagar um contato conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $funcionario = Funcionario::destroy($id);
        return $this->listar();
    } 
}
