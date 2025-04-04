<?php
class Apadrinhamento {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO apadrinhamento (fk_animal, fk_padrinho, data_apadrinhamento, valor_contribuicao) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$data['fk_animal'], $data['fk_padrinho'], $data['data_apadrinhamento'], $data['valor_contribuicao']]);
    }

    public function read($id) {
        $sql = "SELECT * FROM apadrinhamento WHERE id_apadrinhamento = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll() {
        $sql = "SELECT * FROM apadrinhamento";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE apadrinhamento SET fk_animal = ?, fk_padrinho = ?, data_apadrinhamento = ?, valor_contribuicao = ? WHERE id_apadrinhamento = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$data['fk_animal'], $data['fk_padrinho'], $data['data_apadrinhamento'], $data['valor_contribuicao'], $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM apadrinhamento WHERE id_apadrinhamento = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>