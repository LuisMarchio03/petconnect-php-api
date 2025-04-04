<?php
class Resgate {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO resgate (foto, telefone, data_resgate, endereco, observacao, fk_id_denuncia, acompanhamento_policial, fk_situacao_resgate, fk_id_animal) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['foto'], $data['telefone'], $data['data_resgate'], $data['endereco'],
            $data['observacao'], $data['fk_id_denuncia'], $data['acompanhamento_policial'],
            $data['fk_situacao_resgate'], $data['fk_id_animal']
        ]);
    }

    public function read($id) {
        $sql = "SELECT * FROM resgate WHERE id_resgate = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll() {
        $sql = "SELECT * FROM resgate";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE resgate SET foto = ?, telefone = ?, data_resgate = ?, endereco = ?, observacao = ?, fk_id_denuncia = ?, acompanhamento_policial = ?, fk_situacao_resgate = ?, fk_id_animal = ? WHERE id_resgate = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['foto'], $data['telefone'], $data['data_resgate'], $data['endereco'],
            $data['observacao'], $data['fk_id_denuncia'], $data['acompanhamento_policial'],
            $data['fk_situacao_resgate'], $data['fk_id_animal'], $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM resgate WHERE id_resgate = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>