<?php
/**
 *
 * @author Ewerton
 */
interface tipo {
    public function criarTipo($nome = '');
    public function lerTipo($id = '');
    public function editarTipo($nome = '');
    public function excluirTipo($id = '');
}
