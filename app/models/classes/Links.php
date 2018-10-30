<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Links
 *
 * @author Ewerton
 */
require_once 'db.php';
require_once '../interfaces/link.php';

class Links implements link{
    private $link, $db, $table, $id, $id_jogo;
    
    function getLink() {
        return $this->link;
    }

    function getTable() {
        return $this->table;
    }

    function getId() {
        return $this->id;
    }

    function getId_jogo() {
        return $this->id_jogo;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_jogo($id_jogo) {
        $this->id_jogo = $id_jogo;
    }
    
    public function __construct() {
        ;
    }
    public function criarLink($link = '') {
        if($link != NULL){
            $this->setLink($link);
        }
        $tipo = ['link'=>$this->getLink()];
        $this->db->insert($this->getTable(),$tipo);
        $this->setId($this->db->get_lastInsertID());        
    }

    public function editarLink($link = '') {
        if($link != NULL){
            $this->setLink($link);
        }
        $tipo = ['link'=>$this->getLink()];
        $this->db->update($this->getTable(),$this->getId(),$tipo);
    }

    public function excluirLink($id = '') {
        if($id != NULL){
            $this->setId($id);
        }
        $this->db->delete($this->getTable(),$this->getId());        
    }

    public function lerLink($id = '') {
        if($id != NULL){
            $this->setId($id);
        }
        $params = [
            'conditions' => ['id = ?'],
            'bind' => [$this->get_id()]
        ];
        $dados = $this->db->findFirst($this->getTable(),$params);
        $this->setNome($dados->nome);                
    }
    
    public function LerLinkJogo($id_jogo = '') {
        if($id_jogo != NULL){
            $this->setId_jogo($id_jogo);
        }
        $params = [
            'conditions' => ['id_jogo = ?'],
            'bind' => [$this->getId()]
        ];
        $link = $this->db->findFirst($this->getTable(),$params);
        $this->setLink($link->link);
    }

}
