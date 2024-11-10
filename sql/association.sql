
DROP DATABASE IF EXISTS association;
CREATE DATABASE IF NOT EXISTS association;
USE association;

CREATE TABLE IF NOT EXISTS Pays (
    idpays INT AUTO_INCREMENT PRIMARY KEY,
    nom_pays VARCHAR(50) NOT NULL,
    code_pays VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS Membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    date_naissance DATE,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    idpays INT,
    FOREIGN KEY (idpays) REFERENCES Pays(idpays)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Projet (
    id_projet INT AUTO_INCREMENT PRIMARY KEY,
    nom_projet VARCHAR(50) NOT NULL,
    montant_total DECIMAL(10, 2) DEFAULT 0,
    description VARCHAR(250),
    date_debut DATE,
    date_fin DATE,
    idpays INT,
    FOREIGN KEY (idpays) REFERENCES Pays(idpays)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Don (
    id_don INT AUTO_INCREMENT PRIMARY KEY,
    montant DECIMAL(10, 2) NOT NULL CHECK (montant > 0), 
    date_don DATE NOT NULL,
    moyen_paiement VARCHAR(50) NOT NULL,
    id_membre INT,
    id_projet INT,
    FOREIGN KEY (id_membre) REFERENCES Membre(id_membre)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (id_projet) REFERENCES Projet(id_projet)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);


INSERT INTO Pays (nom_pays, code_pays) VALUES
	('France', 'FRA'),
	('Canada', 'CAN'),
	('Sénégal', 'SEN'),
	('Brésil', 'BRA');

INSERT INTO Membre (date_naissance, nom, prenom, email, idpays) VALUES
	('1985-07-14', 'Dupont', 'Jean', 'jean.dupont@example.com', 1),
	('1990-03-22', 'Smith', 'John', 'john.smith@example.com', 2),
	('1978-11-30', 'Ndiaye', 'Amina', 'amina.ndiaye@example.com', 3),
	('1982-06-05', 'Silva', 'Maria', 'maria.silva@example.com', 4);

INSERT INTO Projet (nom_projet, description, date_debut, date_fin, idpays) VALUES
	('Construction d\'une école', 'Projet de construction d\'une école au Sénégal', '2024-01-01', '2024-12-31', 3),
	('Reforestation en Amazonie', 'Projet de plantation d\'arbres dans la forêt amazonienne', '2023-05-15', '2024-05-15', 4),
	('Aide alimentaire', 'Distribution de nourriture pour les familles en difficulté', '2024-02-01', '2024-08-31', 1),
	('Sensibilisation au recyclage', 'Campagne de sensibilisation au recyclage au Canada', '2024-03-01', '2024-07-01', 2);

INSERT INTO Don (montant, date_don, moyen_paiement, id_membre, id_projet) VALUES
	(500.00, '2024-02-10', 'Virement bancaire', 1, 1), 
	(250.00, '2024-03-15', 'Carte de crédit', 2, 4),
	(1000.00, '2024-01-20', 'Espèces', 3, 2), 
	(300.00, '2024-04-05', 'Virement bancaire', 4, 3);

DELIMITER //

CREATE TRIGGER after_don_insert
AFTER INSERT ON Don FOR EACH ROW
BEGIN
    UPDATE Projet
    SET montant_total = montant_total + NEW.montant
    WHERE id_projet = NEW.id_projet;
END //

CREATE TRIGGER after_don_delete
AFTER DELETE ON Don FOR EACH ROW
BEGIN
    UPDATE Projet
    SET montant_total = montant_total - OLD.montant
    WHERE id_projet = OLD.id_projet;
END //

DELIMITER ;
