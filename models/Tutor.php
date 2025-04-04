<?php
class Tutor {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO tutor (nome, cpf, telefone, endereco) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$data['nome'], $data['cpf'], $data['telefone'], $data['endereco']]);
    }

    public function read($id) {
        $sql = "SELECT * FROM tutor WHERE id_tutor = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll() {
        $sql = "SELECT * FROM tutor";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE tutor SET nome = ?, cpf = ?, telefone = ?, endereco = ? WHERE id_tutor = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$data['nome'], $data['cpf'], $data['telefone'], $data['endereco'], $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM tutor WHERE id_tutor = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
