<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Prof Arquimedes
 */
interface link {
    public function criarLink($link = '');
    public function excluirLink($link = '');
    public function editarLink($link = '');
    public function lerLink($id = '');
    public function lerLinkJogo($id_jogo = '');
}
