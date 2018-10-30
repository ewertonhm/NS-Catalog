<?php
/**
 *
 * @author Ewerton
 */
interface gameControl {
    public function adicionarJogo($nome = '', $data = '', $links = []);
    public function editarJogo($nome = '', $data = '', $dev = '', $tipo = '', $links = [], $id_links = []);
    public function excluirJogo($id = '');
    public function lerJogo($id = '');
}
