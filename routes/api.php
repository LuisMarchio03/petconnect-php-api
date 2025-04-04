<?php
require_once __DIR__ . '/../controllers/DenunciaController.php';
require_once __DIR__ . '/../controllers/SaudeAvaliacaoController.php';
require_once __DIR__ . '/../controllers/ResgateController.php';
require_once __DIR__ . '/../controllers/SaudeAvaliacaoTestesController.php';


$denunciaController = new DenunciaController($pdo);
$saudeAvaliacaoController = new SaudeAvaliacaoController($pdo);
$resgateController = new ResgateController($pdo);
$saudeAvaliacaoTestesController = new SaudeAvaliacaoTestesController($pdo);

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

// Garante que $requestUri[1] existe antes de usá-lo
if (isset($requestUri[1]) && $requestUri[1] == 'denuncias') {
    switch ($requestMethod) {
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            $denunciaController->create($data);
            break;
        case 'GET':
            if (isset($requestUri[2])) {
                echo json_encode($denunciaController->read($requestUri[2]));
            } else {
                echo json_encode($denunciaController->readAll()); 
            }
            break;
        case 'PUT':
            if (isset($requestUri[2])) {
                $data = json_decode(file_get_contents("php://input"), true);
                $denunciaController->update($requestUri[2], $data);
            }
            break;
        case 'DELETE':
            if (isset($requestUri[2])) {
                $denunciaController->delete($requestUri[2]);
            }
            break;
        default:
            http_response_code(405);
            echo json_encode(["error" => "Método não permitido"]);
    }
} elseif (isset($requestUri[1]) && $requestUri[1] == 'resgates') {
    switch ($requestMethod) {
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            echo json_encode($resgateController->create($data));
            break;
        case 'GET':
            if (isset($requestUri[2])) {
                echo json_encode($resgateController->read($requestUri[2]));
            } else {
                echo json_encode($resgateController->readAll()); 
            }
            break;
        case 'PUT':
            if (isset($requestUri[2])) {
                $data = json_decode(file_get_contents("php://input"), true);
                echo json_encode($resgateController->update($requestUri[2], $data));
            }
            break;
        case 'DELETE':
            if (isset($requestUri[2])) {
                echo json_encode($resgateController->delete($requestUri[2]));
            }
            break;
        default:
            http_response_code(405);
            echo json_encode(["error" => "Método não permitido"]);
    }
} elseif (isset($requestUri[1]) && $requestUri[1] == 'saude_avaliacoes') {
    switch ($requestMethod) {
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            echo json_encode($saudeAvaliacaoController->create($data));
            break;
        case 'GET':
            if (isset($requestUri[2])) {
                echo json_encode($saudeAvaliacaoController->read($requestUri[2]));
            } else {
                echo json_encode($saudeAvaliacaoController->readAll()); 
            }
            break;
        case 'PUT':
            if (isset($requestUri[2])) {
                $data = json_decode(file_get_contents("php://input"), true);
                echo json_encode($saudeAvaliacaoController->update($requestUri[2], $data));
            }
            break;
        case 'DELETE':
            if (isset($requestUri[2])) {
                echo json_encode($saudeAvaliacaoController->delete($requestUri[2]));
            }
            break;
        default:
            http_response_code(405);
            echo json_encode(["error" => "Método não permitido"]);
    }
} elseif (isset($requestUri[1]) && $requestUri[1] == 'saude_avaliacao_testes') {
    switch ($requestMethod) {
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            echo json_encode($saudeAvaliacaoTestesController->create($data));
            break;
        case 'GET':
            if (isset($requestUri[2])) {
                echo json_encode($saudeAvaliacaoTestesController->read($requestUri[2]));
            } else {
                echo json_encode($saudeAvaliacaoTestesController->readAll()); 
            }
            break;
        case 'PUT':
            if (isset($requestUri[2])) {
                $data = json_decode(file_get_contents("php://input"), true);
                echo json_encode($saudeAvaliacaoTestesController->update($requestUri[2], $data));
            }
            break;
        case 'DELETE':
            if (isset($requestUri[2])) {
                echo json_encode($saudeAvaliacaoTestesController->delete($requestUri[2]));
            }
            break;
        default:
            http_response_code(405);
            echo json_encode(["error" => "Método não permitido"]);
    }
} elseif (isset($requestUri[1]) && $requestUri[1] == 'saude_animal') {
    switch ($requestMethod) {
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            echo json_encode($saudeAnimalController->create($data));
            break;
        case 'GET':
            if (isset($requestUri[2])) {
                echo json_encode($saudeAnimalController->read($requestUri[2]));
            } else {
                echo json_encode($saudeAnimalController->readAll()); 
            }
            break;
        case 'PUT':
            if (isset($requestUri[2])) {
                $data = json_decode(file_get_contents("php://input"), true);
                echo json_encode($saudeAnimalController->update($requestUri[2], $data));
            }
            break;
        case 'DELETE':
            if (isset($requestUri[2])) {
                echo json_encode($saudeAnimalController->delete($requestUri[2]));
            }
            break;
        default:
            http_response_code(405);
            echo json_encode(["error" => "Método não permitido"]);
    }
} elseif (isset($requestUri[1]) && $requestUri[1] == 'animal') {
    switch ($requestMethod) {
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            echo json_encode($animalController->create($data));
            break;
        case 'GET':
            if (isset($requestUri[2])) {
                echo json_encode($animalController->read($requestUri[2]));
            } else {
                echo json_encode($animalController->readAll()); 
            }
            break;
        case 'PUT':
            if (isset($requestUri[2])) {
                $data = json_decode(file_get_contents("php://input"), true);
                echo json_encode($animalController->update($requestUri[2], $data));
            }
            break;
        case 'DELETE':
            if (isset($requestUri[2])) {
                echo json_encode($animalController->delete($requestUri[2]));
            }
            break;
        default:
            http_response_code(405);
            echo json_encode(["error" => "Método não permitido"]);
    }
} elseif (isset($requestUri[1]) && $requestUri[1] == 'adocao') {
    switch ($requestMethod) {
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            echo json_encode($adocaoController->create($data));
            break;
        case 'GET':
            if (isset($requestUri[2])) {
                echo json_encode($adocaoController->read($requestUri[2]));
            } else {
                echo json_encode($adocaoController->readAll()); 
            }
            break;
        case 'PUT':
            if (isset($requestUri[2])) {
                $data = json_decode(file_get_contents("php://input"), true);
                echo json_encode($adocaoController->update($requestUri[2], $data));
            }
            break;
        case 'DELETE':
            if (isset($requestUri[2])) {
                echo json_encode($adocaoController->delete($requestUri[2]));
            }
            break;
        default:
            http_response_code(405);
            echo json_encode(["error" => "Método não permitido"]);
    }
} elseif (isset($requestUri[1]) && $requestUri[1] == 'tutor') {
    switch ($requestMethod) {
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            echo json_encode($tutorController->create($data));
            break;
        case 'GET':
            if (isset($requestUri[2])) {
                echo json_encode($tutorController->read($requestUri[2]));
            } else {
                echo json_encode($tutorController->readAll()); 
            }
            break;
        case 'PUT':
            if (isset($requestUri[2])) {
                $data = json_decode(file_get_contents("php://input"), true);
                echo json_encode($tutorController->update($requestUri[2], $data));
            }
            break;
        case 'DELETE':
            if (isset($requestUri[2])) {
                echo json_encode($tutorController->delete($requestUri[2]));
            }
            break;
        default:
            http_response_code(405);
            echo json_encode(["error" => "Método não permitido"]);
    }
} elseif (isset($requestUri[1]) && $requestUri[1] == 'apadrinhamento') {
    switch ($requestMethod) {
        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            echo json_encode($apadrinhamentoController->create($data));
            break;
        case 'GET':
            if (isset($requestUri[2])) {
                echo json_encode($apadrinhamentoController->read($requestUri[2]));
            } else {
                echo json_encode($apadrinhamentoController->readAll()); 
            }
            break;
        case 'PUT':
            if (isset($requestUri[2])) {
                $data = json_decode(file_get_contents("php://input"), true);
                echo json_encode($apadrinhamentoController->update($requestUri[2], $data));
            }
            break;
        case 'DELETE':
            if (isset($requestUri[2])) {
                echo json_encode($apadrinhamentoController->delete($requestUri[2]));
            }
            break;
        default:
            http_response_code(405);
            echo json_encode(["error" => "Método não permitido"]);
    }
} else {
    http_response_code(404);
    echo json_encode(["error" => "Rota não encontrada"]);
}
?>
