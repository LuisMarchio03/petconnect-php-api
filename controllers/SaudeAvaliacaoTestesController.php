
<?php
require_once __DIR__ . '/../models/SaudeAvaliacaoTestes.php';

class SaudeAvaliacaoTestesController {
    private $saudeAvaliacaoTestes;

    public function __construct($db) {
        $this->saudeAvaliacaoTestes = new SaudeAvaliacaoTestes($db);
    }

    public function create($data) {
        return $this->saudeAvaliacaoTestes->create($data);
    }

    public function read($id) {
        return $this->saudeAvaliacaoTestes->read($id);
    }

    public function update($id, $data) {
        return $this->saudeAvaliacaoTestes->update($id, $data);
    }

    public function delete($id) {
        return $this->saudeAvaliacaoTestes->delete($id);
    }
    
    public function readAll() {
        return $this->saudeAvaliacaoTestes->readAll();
    }
}
?>