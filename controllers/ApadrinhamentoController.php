<?php
require_once __DIR__ . '/../models/Apadrinhamento.php';

class ApadrinhamentoController {
    private $apadrinhamento;

    public function __construct($db) {
        $this->apadrinhamento = new Apadrinhamento($db);
    }

    public function create($data) {
        return $this->apadrinhamento->create($data);
    }

    public function read($id) {
        return $this->apadrinhamento->read($id);
    }

    public function update($id, $data) {
        return $this->apadrinhamento->update($id, $data);
    }

    public function delete($id) {
        return $this->apadrinhamento->delete($id);
    }
    
    public function readAll() {
        return $this->apadrinhamento->readAll();
    }
}
?>