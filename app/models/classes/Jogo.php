<?php
/**
 * Description of Jogo
 *
 * @author Ewerton
 */
require_once 'db.php';
require_once 'Tipo.php';
require_once 'Desenvolvedora.php';
require_once '../interfaces/gameControl.php';

class Jogo implements gameControl{
    private $nome, $data, $links, $dev, $tipo;
    private $db, $id, $table;
    
    function getNome() {
        return $this->nome;
    }

    function getData() {
        return $this->data;
    }

    function getLinks() {
        return $this->links;
    }

    function getId() {
        return $this->id;
    }

    function getTable() {
        return $this->table;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setData($data) {
        $this->data = $data;
    }

    private function setId($id) {
        $this->id = $id;
    }

    private function setTable($table) {
        $this->table = $table;
    }
    
    public function __construct($dev = '', $tipo = '') {
        $this->tipo = new Tipo(NULL,$tipo);
        $this->dev = new Desenvolvedora(NULL,$dev);
        $this->db = DB::get_instance();
    }    

    public function adicionarJogo() {
        
    }

    public function editarJogo() {
        
    }

    public function excluirJogo() {
        
    }

    public function lerJogo() {
        
    }

}
