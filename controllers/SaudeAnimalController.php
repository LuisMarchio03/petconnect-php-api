
<?php
require_once __DIR__ . '/../models/SaudeAnimal.php';

class SaudeAnimalController {
    private $saudeAnimal;

    public function __construct($db) {
        $this->saudeAnimal = new SaudeAnimal($db);
    }

    public function create($data) {
        return $this->saudeAnimal->create($data);
    }

    public function read($id) {
        return $this->saudeAnimal->read($id);
    }

    public function update($id, $data) {
        return $this->saudeAnimal->update($id, $data);
    }

    public function delete($id) {
        return $this->saudeAnimal->delete($id);
    }
    
    public function readAll() {
        return $this->saudeAnimal->readAll();
    }
}
?>