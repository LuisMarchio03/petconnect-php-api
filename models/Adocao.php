<?php
class Adocao {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO adocao (fk_id_animal, fk_tutor) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$data['fk_id_animal'], $data['fk_tutor']]);
    }

    public function read($id) {
        $sql = "SELECT * FROM adocao WHERE id_adocao = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll() {
        $sql = "SELECT * FROM adocao";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE adocao SET fk_id_animal = ?, fk_tutor = ? WHERE id_adocao = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$data['fk_id_animal'], $data['fk_tutor'], $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM adocao WHERE id_adocao = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
