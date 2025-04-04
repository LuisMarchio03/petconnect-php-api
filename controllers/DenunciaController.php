<?php
require_once __DIR__ . '/../models/Denuncia.php';


class DenunciaController {
    private $denuncia;

    public function __construct($db) {
        $this->denuncia = new Denuncia($db);
    }

    public function create($data) {
        return $this->denuncia->create($data);
    }

    public function read($id) {
        return $this->denuncia->read($id);
    }

    public function update($id, $data) {
        return $this->denuncia->update($id, $data);
    }

    public function delete($id) {
        return $this->denuncia->delete($id);
    }
    
    public function readAll() {
        return $this->denuncia->readAll();
    }
}
?>