<?php
/**
 * Description of Jogo
 *
 * @author Ewerton
 */
require_once 'db.php';
require_once 'Tipo.php';
require_once 'Desenvolvedora.php';
require_once 'Links.php';
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
    function getDev() {
        return $this->dev;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setDev($dev) {
        $this->dev = $dev;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setData($data) {
        $this->data = $data;
    }
    private function setLinks($links) {
        $this->links = $links;
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
        $this->setTable('jogo');
        $this->db = DB::get_instance();
    }    

    public function adicionarJogo($nome = '', $data = '', $links = []) {
        $this->setNome($nome);
        $this->setData($data);
        $dados = [
                'nome'=>$this->getNome(),
                'data'=> $this->getData(),
                'id_dev'=>$this->getDev(),
                'id_tipo'=>$this->getTipo()
            ];
        $this->db->insert($this->getTable(),$dados);
        $this->setId($this->db->getLastInsertID());
        foreach($links as $link){
            $$linkc = new Links($this->getId());
            $linkc->criarLink($link);
        }
    }

    public function editarJogo($nome = '', $data = '', $dev = '', $tipo = '',$links = [], $id_links = []) {
        if($nome != NULL){
            $this->setNome($nome);       
        }
        if($data != NULL){
            $this->setData($data);
        }
        if($dev != NULL){
            $this->setDev($dev);
        }
        if($tipo != NULL){
            $this->setTipo($tipo);
        }    
        $jogo = [
                'nome'=>$this->getNome(),
                '$data'=>$this->getData(),
                'id_dev'=>$this->getDev(),
                'id_tipo'=>$this->getTipo()
        ];
        $this->update($this->getTable(),$jogo);
    }

    public function excluirJogo($id = '') {
        if($id != NULL){
            $this->setId($id);
        } 
        $this->db->delete($this->getTable(),$this->getId());
    }

    public function lerJogo($id = '') {
        if($id != NULL){
            $this->setId($id);
        }
        $params = [
            'conditions'=>'id = ?',
            'bind'=>$this->getId()
        ];
        $this->db->findFirst($this->getTable(),$params);
        $jogo = $this->db->get_results();
        $this->setNome($jogo->nome);
        $this->setData($jogo->data);
        $this->setDev($jogo->id_dev);
        $this->setTipo($jogo->id_tipo);
        $params = [
            'joins'=>'links',
            'bindJoins'=>'links.id_jogo = jogo.id',
            'conditions'=>'links.id_jogo = ?',
            'bind'=>$this->getId()
        ];
        $this->db->find($this->getTable(),$params);
        $this->setLinks($this->db->get_results());
    }

}
