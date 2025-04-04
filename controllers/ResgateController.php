
<?php
require_once __DIR__ . '/../models/Resgate.php';

class ResgateController {
    private $resgate;

    public function __construct($db) {
        $this->resgate = new Resgate($db);
    }

    public function create($data) {
        return $this->resgate->create($data);
    }

    public function read($id) {
        return $this->resgate->read($id);
    }

    public function update($id, $data) {
        return $this->resgate->update($id, $data);
    }

    public function delete($id) {
        return $this->resgate->delete($id);
    }
    
    public function readAll() {
        return $this->resgate->readAll();
    }
}
?>
