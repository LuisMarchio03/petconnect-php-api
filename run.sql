CREATE DATABASE IF NOT EXISTS petconnect;
USE petconnect;

-- Tabela de Espécies
CREATE TABLE especie (
    id_especie INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL
);

-- Tabela de Raças
CREATE TABLE raca (
    id_raca INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL
);

-- Tabela de Portes
CREATE TABLE porte (
    id_porte INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(50) NOT NULL
);

-- Tabela de Cores
CREATE TABLE cores (
    id_cor INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(50) NOT NULL
);

-- Tabela de Localizações
CREATE TABLE localizacao (
    id_localizacao INT AUTO_INCREMENT PRIMARY KEY,
    descricao TEXT NOT NULL
);

-- Tabela de Animais
CREATE TABLE animal (
    id_animal INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    fk_especie INT,
    fk_raca INT,
    idade INT,
    sexo ENUM('M', 'F') NOT NULL,
    fk_porte INT,
    fk_cor_predominante INT,
    descricao TEXT,
    fk_localizacao INT,
    FOREIGN KEY (fk_especie) REFERENCES especie(id_especie),
    FOREIGN KEY (fk_raca) REFERENCES raca(id_raca),
    FOREIGN KEY (fk_porte) REFERENCES porte(id_porte),
    FOREIGN KEY (fk_cor_predominante) REFERENCES cores(id_cor),
    FOREIGN KEY (fk_localizacao) REFERENCES localizacao(id_localizacao)
);

-- Tabela de Situações de Denúncia
CREATE TABLE situacao_denuncia (
    id_situacao INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL
);

-- Tabela de Situações de Resgate
CREATE TABLE situacao_resgate (
    id_situacao INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL
);

-- Tabela de Denúncias
CREATE TABLE denuncia (
    id_denuncia INT AUTO_INCREMENT PRIMARY KEY,
    foto BLOB,
    telefone VARCHAR(20),
    endereco TEXT,
    localizacao_maps TEXT,
    data_denuncia DATETIME DEFAULT CURRENT_TIMESTAMP,
    observacao TEXT,
    tipo_denuncia VARCHAR(100),
    fk_situacao_denuncia INT,
    fk_id_animal INT,
    FOREIGN KEY (fk_situacao_denuncia) REFERENCES situacao_denuncia(id_situacao),
    FOREIGN KEY (fk_id_animal) REFERENCES animal(id_animal)
);

-- Tabela de Resgates
CREATE TABLE resgate (
    id_resgate INT AUTO_INCREMENT PRIMARY KEY,
    foto BLOB,
    telefone VARCHAR(20),
    data_resgate DATETIME DEFAULT CURRENT_TIMESTAMP,
    endereco TEXT,
    observacao TEXT,
    fk_id_denuncia INT,
    acompanhamento_policial BOOLEAN DEFAULT FALSE,
    fk_situacao_resgate INT,
    fk_id_animal INT,
    FOREIGN KEY (fk_id_denuncia) REFERENCES denuncia(id_denuncia),
    FOREIGN KEY (fk_situacao_resgate) REFERENCES situacao_resgate(id_situacao),
    FOREIGN KEY (fk_id_animal) REFERENCES animal(id_animal)
);

-- Tabela de Avaliação de Saúde
CREATE TABLE saude_avaliacao (
    id_avaliacao INT AUTO_INCREMENT PRIMARY KEY,
    fk_id_resgate INT,
    exame_clinico TEXT,
    exame_laboratorial TEXT,
    vermifugo BOOLEAN DEFAULT FALSE,
    antipulga BOOLEAN DEFAULT FALSE,
    data_avaliacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (fk_id_resgate) REFERENCES resgate(id_resgate)
);

-- Tabela de Testes na Avaliação de Saúde
CREATE TABLE saude_avaliacao_testes (
    id_teste INT AUTO_INCREMENT PRIMARY KEY,
    tipo_teste VARCHAR(100) NOT NULL,
    resultado VARCHAR(100) NOT NULL,
    fk_id_avaliacao INT,
    data_teste DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (fk_id_avaliacao) REFERENCES saude_avaliacao(id_avaliacao)
);

-- Tabela de Saúde do Animal
CREATE TABLE saude_animal (
    id_saude_animal INT AUTO_INCREMENT PRIMARY KEY,
    fk_id_avaliacao INT,
    vacinacao BOOLEAN DEFAULT FALSE,
    doente BOOLEAN DEFAULT FALSE,
    castrado BOOLEAN DEFAULT FALSE,
    tratamento TEXT,
    fk_estadia INT,
    fk_animal INT,
    FOREIGN KEY (fk_id_avaliacao) REFERENCES saude_avaliacao(id_avaliacao),
    FOREIGN KEY (fk_animal) REFERENCES animal(id_animal)
);

-- Tabela de Tutores
CREATE TABLE tutor (
    id_tutor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco TEXT NOT NULL
);

-- Tabela de Adoções
CREATE TABLE adocao (
    id_adocao INT AUTO_INCREMENT PRIMARY KEY,
    fk_id_animal INT,
    fk_tutor INT,
    FOREIGN KEY (fk_id_animal) REFERENCES animal(id_animal),
    FOREIGN KEY (fk_tutor) REFERENCES tutor(id_tutor)
);

-- Tabela de Padrinhos
CREATE TABLE padrinho (
    id_padrinho INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco TEXT NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL
);

-- Tabela de Apadrinhamento
CREATE TABLE apadrinhamento (
    id_apadrinhamento INT AUTO_INCREMENT PRIMARY KEY,
    fk_animal INT,
    fk_padrinho INT,
    data_apadrinhamento DATETIME DEFAULT CURRENT_TIMESTAMP,
    valor_contribuicao DECIMAL(10,2),
    FOREIGN KEY (fk_animal) REFERENCES animal(id_animal),
    FOREIGN KEY (fk_padrinho) REFERENCES padrinho(id_padrinho)
);

-- Tabela de Fotos de Animais
CREATE TABLE fotos_animais (
    id_foto INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255),
    tipo_foto ENUM('perfil', 'ambiente', 'outros'),
    foto_capa BOOLEAN DEFAULT FALSE,
    foto BLOB,
    fk_id_animal INT,
    FOREIGN KEY (fk_id_animal) REFERENCES animal(id_animal)
);

-- Tabela de Fotos de Denúncias
CREATE TABLE fotos_denuncias (
    id_foto INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255),
    foto BLOB,
    fk_id_denuncia INT,
    FOREIGN KEY (fk_id_denuncia) REFERENCES denuncia(id_denuncia)
);

-- Tabela de Fotos de Resgates
CREATE TABLE fotos_resgates (
    id_foto INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255),
    foto BLOB,
    fk_id_resgate INT,
    FOREIGN KEY (fk_id_resgate) REFERENCES resgate(id_resgate)
);
