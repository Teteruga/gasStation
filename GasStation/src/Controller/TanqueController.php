<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tanquecontroller
 *
 * @author Vinicus
 */

use Model\Tanque;
class TanqueController extends Controller {
    public function listar()
    {
        $tanque = Tanque::all();
        return $this->view('grade', ['tanque' => $tanque]);
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
        $tanque = Tanque::find($id);
 
        return $this->view('form', ['tanque' => $tanque]);
    }
 
    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar()
    {
        $tanque           = new Tanque;
        $tanque->comprimento     = $this->request->comprimento;
        $tanque->material = $this->request->material;
        
        if ($tanque->save()) {
            return $this->listar();
        }
    }
 
    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $tanque           = Tanque::find($id);
        $tanque->comprimento     = $this->request->comprimento;
        $tanque->material = $this->request->material;
        $tanque->save();
 
        return $this->listar();
    }
 
    /**
     * Apagar um contato conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $tanque = Tanque::destroy($id);
        return $this->listar();
    }
}
   

