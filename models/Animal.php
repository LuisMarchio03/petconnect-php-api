
<?php
class Animal {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO animal (nome, fk_especie, fk_raca, idade, sexo, fk_porte, fk_cor_predominante, descricao, fk_localizacao) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['nome'], $data['fk_especie'], $data['fk_raca'], $data['idade'], 
            $data['sexo'], $data['fk_porte'], $data['fk_cor_predominante'], $data['descricao'], $data['fk_localizacao']
        ]);
    }

    public function read($id) {
        $sql = "SELECT * FROM animal WHERE id_animal = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll() {
        $sql = "SELECT * FROM animal";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE animal SET nome = ?, fk_especie = ?, fk_raca = ?, idade = ?, sexo = ?, fk_porte = ?, fk_cor_predominante = ?, descricao = ?, fk_localizacao = ? WHERE id_animal = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['nome'], $data['fk_especie'], $data['fk_raca'], $data['idade'], 
            $data['sexo'], $data['fk_porte'], $data['fk_cor_predominante'], $data['descricao'], $data['fk_localizacao'], $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM animal WHERE id_animal = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
