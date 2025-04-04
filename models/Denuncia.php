<?php
class Denuncia {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO denuncia (foto, telefone, endereco, localizacao_maps, data_denuncia, observacao, tipo_denuncia, fk_situacao_denuncia, fk_id_animal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$data['foto'], $data['telefone'], $data['endereco'], $data['localizacao_maps'], $data['data_denuncia'], $data['observacao'], $data['tipo_denuncia'], $data['fk_situacao_denuncia'], $data['fk_id_animal']]);
    }

    public function read($id) {
        $sql = "SELECT * FROM denuncia WHERE id_denuncia = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll() {
        $sql = "SELECT * FROM denuncia";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE denuncia SET foto = ?, telefone = ?, endereco = ?, localizacao_maps = ?, data_denuncia = ?, observacao = ?, tipo_denuncia = ?, fk_situacao_denuncia = ?, fk_id_animal = ? WHERE id_denuncia = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$data['foto'], $data['telefone'], $data['endereco'], $data['localizacao_maps'], $data['data_denuncia'], $data['observacao'], $data['tipo_denuncia'], $data['fk_situacao_denuncia'], $data['fk_id_animal'], $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM denuncia WHERE id_denuncia = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>