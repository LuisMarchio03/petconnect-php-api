
<?php
class SaudeAvaliacaoTestes {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO saude_avaliacao_testes (tipo_teste, resultado, fk_id_avaliacao, data_teste) 
                VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['tipo_teste'], $data['resultado'], $data['fk_id_avaliacao'], $data['data_teste']
        ]);
    }

    public function read($id) {
        $sql = "SELECT * FROM saude_avaliacao_testes WHERE id_teste = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll() {
        $sql = "SELECT * FROM saude_avaliacao_testes";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE saude_avaliacao_testes SET tipo_teste = ?, resultado = ?, fk_id_avaliacao = ?, data_teste = ? WHERE id_teste = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['tipo_teste'], $data['resultado'], $data['fk_id_avaliacao'], $data['data_teste'], $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM saude_avaliacao_testes WHERE id_teste = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>