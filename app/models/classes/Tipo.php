<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tipo
 *
 * @author Ewerton
 */
require_once 'db.php';
require_once '../interfaces/tipo.php';

class Tipo implements tipo{
    private $nome, $db, $table, $id;
    
    function getNome() {
        return $this->nome;
    }

    private function getTable() {
        return $this->table;
    }

    function getId() {
        return $this->id;
    }

    private function setNome($nome) {
        $this->nome = $nome;
    }

    private function setTable($table) {
        $this->table = $table;
    }

    private function setId($id) {
        $this->id = $id;
    }
        
    public function __construct($nome = '',$id = '') {
        $this->setNome($nome);
        $this->setId($id);
        $this->setTable('tipo');
        $this->db = DB::get_instance();
    }

    public function criarTipo($nome = '') {
        if($nome != NULL){
            $this->setNome($nome);
        }
        $tipo = ['nome'=>$this->getNome()];
        $this->db->insert($this->getTable(),$tipo);
        $this->setId($this->db->get_lastInsertID());        
    }

    public function editarTipo($nome = '') {
        if($nome != NULL){
            $this->setNome($nome);
        }
        $tipo = ['nome'=>$this->getNome()];
        $this->db->update($this->getTable(),$this->getId(),$tipo);
    }

    public function excluirTipo($id = '') {
        if($id != NULL){
            $this->setId($id);
        }
        $this->db->delete($this->getTable(),$this->getId());        
    }

    public function lerTipo($id = '') {
        if($id != NULL){
            $this->setId($id);
        }
        $params = [
            'conditions' => ['id = ?'],
            'bind' => [$this->get_id()],
        ];
        $dados = $this->db->findFirst($this->getTable(),$params);
        $this->setNome($dados->nome);                
    }

}
