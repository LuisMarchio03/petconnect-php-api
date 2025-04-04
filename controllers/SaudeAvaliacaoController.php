
<?php
require_once __DIR__ . '/../models/SaudeAvaliacao.php';

class SaudeAvaliacaoController {
    private $saudeAvaliacao;

    public function __construct($db) {
        $this->saudeAvaliacao = new SaudeAvaliacao($db);
    }

    public function create($data) {
        return $this->saudeAvaliacao->create($data);
    }

    public function read($id) {
        return $this->saudeAvaliacao->read($id);
    }

    public function update($id, $data) {
        return $this->saudeAvaliacao->update($id, $data);
    }

    public function delete($id) {
        return $this->saudeAvaliacao->delete($id);
    }
    
    public function readAll() {
        return $this->saudeAvaliacao->readAll();
    }
}
?>
