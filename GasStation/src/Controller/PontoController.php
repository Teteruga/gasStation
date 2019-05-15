<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PontoController
 *
 * @author Vinicus
 */

use Model\Ponto;

class PontoController extends Controller {
    public function listar()
    {
        $ponto = Ponto::all();
        return $this->view('grade', ['ponto' => $ponto]);
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
        $ponto = Ponto::find($id);
 
        return $this->view('form', ['ponto' => $ponto]);
    }
 
    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar()
    {
        $ponto           = new Ponto;
        $ponto->hora_entrada     = $this->request->hora_entrada;
        $ponto->hora_saida = $this->request->hora_saida;
        $ponto->mes_referencia=$this->request->mes_referencia;
        if ($ponto->save()) {
            return $this->listar();
        }
    }
 
    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $ponto           = Ponto::find($id);
        $ponto->hora_entrada     = $this->request->hora_entrada;
        $ponto->hora_saida = $this->request->hora_saida;
        $ponto->mes_referencia=$this->request->mes_referencia;
        $ponto->save();
 
        return $this->listar();
    }
 
    /**
     * Apagar um contato conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $ponto = Ponto::destroy($id);
        return $this->listar();
    }
}
