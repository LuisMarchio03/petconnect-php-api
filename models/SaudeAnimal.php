
<?php
class SaudeAnimal {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO saude_animal (fk_id_avaliacao, vacinacao, doente, castrado, tratamento, fk_estadia, fk_animal) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['fk_id_avaliacao'], $data['vacinacao'], $data['doente'], $data['castrado'], 
            $data['tratamento'], $data['fk_estadia'], $data['fk_animal']
        ]);
    }

    public function read($id) {
        $sql = "SELECT * FROM saude_animal WHERE id_saude_animal = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll() {
        $sql = "SELECT * FROM saude_animal";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE saude_animal SET fk_id_avaliacao = ?, vacinacao = ?, doente = ?, castrado = ?, 
                tratamento = ?, fk_estadia = ?, fk_animal = ? WHERE id_saude_animal = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['fk_id_avaliacao'], $data['vacinacao'], $data['doente'], $data['castrado'], 
            $data['tratamento'], $data['fk_estadia'], $data['fk_animal'], $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM saude_animal WHERE id_saude_animal = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>