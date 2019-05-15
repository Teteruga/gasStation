<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BombaController
 *
 * @author Vinicus
 */
use Model\Bomba;
class BombaController extends Controller {
     public function listar()
    {
        $bomba = Bomba::all();
        return $this->view('grade', ['bomba' => $bomba]);
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
        $bomba = Bomba::find($id);
 
        return $this->view('form', ['bomba' => $bomba]);
    }
 
    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar()
    {
        $bomba           = new Bomba;
        $bomba->larura     = $this->request->largura;
        $bomba->numero     = $this->request->numero;
        
        if ($bomba->save()) {
            return $this->listar();
        }
    }
 
    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $bomba           = Bomba::find($id);
        $bomba->larura     = $this->request->largura;
        $bomba->numero     = $this->request->numero;

        $bomba->save();
 
        return $this->listar();
    }
 
    /**
     * Apagar um contato conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $bomba = Bomba::destroy($id);
        return $this->listar();
    }
}
