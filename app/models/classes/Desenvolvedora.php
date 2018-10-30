<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Desenvolvedora
 *
 * @author Ewerton
 */
require_once 'db.php';
require_once '../interfaces/dev.php';

class Desenvolvedora implements dev{
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
        $this->setTable('desenvolvedora');
        $this->db = DB::get_instance();
    }

    public function criarDev($nome = '') {
        if($nome != NULL){
            $this->setNome($nome);
        }
        $dev = ['nome'=>$this->getNome()];
        $this->db->insert($this->getTable(),$dev);
        $this->setId($this->db->get_lastInsertID());
    }

    public function editarDev($nome = '') {
        if($nome != NULL){
            $this->setNome($nome);
        }
        $dev = ['nome'=>$this->getNome()];
        $this->db->update($this->getTable(),$this->getId(),$dev);
    }

    public function excluirDev($id = '') {
        if($id != NULL){
            $this->setId($id);
        }
        $this->db->delete($this->getTable(),$this->getId());
    }

    public function lerDev($id = '') {
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
