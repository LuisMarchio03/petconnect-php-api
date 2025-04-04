
<?php
require_once __DIR__ . '/../models/Adocao.php';

class AdocaoController {
    private $adocao;

    public function __construct($db) {
        $this->adocao = new Adocao($db);
    }

    public function create($data) {
        return $this->adocao->create($data);
    }

    public function read($id) {
        return $this->adocao->read($id);
    }

    public function update($id, $data) {
        return $this->adocao->update($id, $data);
    }

    public function delete($id) {
        return $this->adocao->delete($id);
    }
    
    public function readAll() {
        return $this->adocao->readAll();
    }
}
?>
