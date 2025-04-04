
<?php
class SaudeAvaliacao {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO saude_avaliacao (fk_id_resgate, exame_clinico, exame_laboratorial, vermifugo, antipulga, data_avaliacao) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['fk_id_resgate'], $data['exame_clinico'], $data['exame_laboratorial'], 
            $data['vermifugo'], $data['antipulga'], $data['data_avaliacao']
        ]);
    }

    public function read($id) {
        $sql = "SELECT * FROM saude_avaliacao WHERE id_avaliacao = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll() {
        $sql = "SELECT * FROM saude_avaliacao";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE saude_avaliacao SET fk_id_resgate = ?, exame_clinico = ?, exame_laboratorial = ?, vermifugo = ?, antipulga = ?, data_avaliacao = ? WHERE id_avaliacao = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['fk_id_resgate'], $data['exame_clinico'], $data['exame_laboratorial'], 
            $data['vermifugo'], $data['antipulga'], $data['data_avaliacao'], $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM saude_avaliacao WHERE id_avaliacao = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
