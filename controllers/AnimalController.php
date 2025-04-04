
<?php
require_once __DIR__ . '/../models/Animal.php';

class AnimalController {
    private $animal;

    public function __construct($db) {
        $this->animal = new Animal($db);
    }

    public function create($data) {
        return $this->animal->create($data);
    }

    public function read($id) {
        return $this->animal->read($id);
    }

    public function update($id, $data) {
        return $this->animal->update($id, $data);
    }

    public function delete($id) {
        return $this->animal->delete($id);
    }
    
    public function readAll() {
        return $this->animal->readAll();
    }
}
?>