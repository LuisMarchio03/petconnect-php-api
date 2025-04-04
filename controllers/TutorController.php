<?php
require_once __DIR__ . '/../models/Tutor.php';

class TutorController {
    private $tutor;

    public function __construct($db) {
        $this->tutor = new Tutor($db);
    }

    public function create($data) {
        return $this->tutor->create($data);
    }

    public function read($id) {
        return $this->tutor->read($id);
    }

    public function update($id, $data) {
        return $this->tutor->update($id, $data);
    }

    public function delete($id) {
        return $this->tutor->delete($id);
    }
    
    public function readAll() {
        return $this->tutor->readAll();
    }
}
?>
