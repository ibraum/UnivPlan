
-- schema.sql

CREATE DATABASE IF NOT EXISTS emploi_temps CHARACTER SET utf8mb4;
USE emploi_temps;

CREATE TABLE filieres (
    ID_FILIERE INT AUTO_INCREMENT PRIMARY KEY,
    NOM_FILIERE VARCHAR(25),
    DESCRIPTION TEXT
);

CREATE TABLE classes (
    ID_CLASSE INT AUTO_INCREMENT PRIMARY KEY,
    ID_FILIERE INT,
    NIVEAU INT,
    FOREIGN KEY (ID_FILIERE) REFERENCES filieres(ID_FILIERE)
);

CREATE TABLE etudiants (
    NUM_INSCRIPTION VARCHAR(15) PRIMARY KEY,
    NOM_ET VARCHAR(25),
    PRENOM_ET VARCHAR(25),
    ADRESSE VARCHAR(70),
    ID_CLASSE INT,
    FOREIGN KEY (ID_CLASSE) REFERENCES classes(ID_CLASSE)
);

CREATE TABLE professeurs (
    ID_PROF INT AUTO_INCREMENT PRIMARY KEY,
    NOM_PROF VARCHAR(25),
    TEL VARCHAR(12)
);

CREATE TABLE modules (
    ID_MODULE VARCHAR(15) PRIMARY KEY,
    NOM_MODULE VARCHAR(25),
    DESCRIPTION TEXT
);

CREATE TABLE salles (
    ID_SALLE INT AUTO_INCREMENT PRIMARY KEY,
    NOM_SALLE VARCHAR(25),
    DESCRIPTION TEXT
);

CREATE TABLE cours (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    ID_CLASSE INT,
    ID_PROF INT,
    ID_SALLE INT,
    ID_MODULE VARCHAR(15),
    JOUR VARCHAR(12),
    HEURE_DEBUT TIME,
    HEURE_FIN TIME,
    FOREIGN KEY (ID_CLASSE) REFERENCES classes(ID_CLASSE),
    FOREIGN KEY (ID_PROF) REFERENCES professeurs(ID_PROF),
    FOREIGN KEY (ID_SALLE) REFERENCES salles(ID_SALLE),
    FOREIGN KEY (ID_MODULE) REFERENCES modules(ID_MODULE)
);

-- Données fictives
INSERT INTO filieres (NOM_FILIERE, DESCRIPTION) VALUES
('SRI', 'Systèmes et Réseaux Informatiques'),
('GL', 'Génie Logiciel');

INSERT INTO classes (ID_FILIERE, NIVEAU) VALUES (1, 3), (2, 3);

INSERT INTO etudiants (NUM_INSCRIPTION, NOM_ET, PRENOM_ET, ADRESSE, ID_CLASSE) VALUES 
('ETU02032024', 'KONDO', 'Ibrahim', 'Lomé', '1'),
('ETU02032025', 'KONDO', 'Ismael', 'Lomé', '1');

INSERT INTO professeurs (NOM_PROF, TEL) VALUES
('Prof A', '90000001'),
('Prof A', '90000001'),
('Prof A', '90000001'),
('Prof B', '90000002');

INSERT INTO modules (ID_MODULE, NOM_MODULE, DESCRIPTION) VALUES
('PJ', 'Java', 'Programmation Java'),
('AR', 'Réseaux', 'Architecture réseau');

INSERT INTO salles (NOM_SALLE, DESCRIPTION) VALUES
('Lab Info', 'Salle informatique'),
('Londres', 'Salle de cours classique');

INSERT INTO cours (ID_CLASSE, ID_PROF, ID_SALLE, ID_MODULE, JOUR, HEURE_DEBUT, HEURE_FIN) VALUES
(1, 1, 1, 'M1', 'lundi', '08:30:00', '10:00:00'),
(1, 2, 2, 'M2', 'lundi', '10:15:00', '11:45:00');


INSERT INTO etudiants (num_inscription, id_classe, nom_et, prenom_et, adresse) VALUES
('ETU001', 3, 'ABORA', 'b. Godfried', ''),
('ETU002', 3, 'ADETOU', 'Clarisse', ''),
('ETU003', 3, 'ADOGLI', 'Amorin', ''),
('ETU004', 3, 'AFANOU', 'Komlan', ''),
('ETU005', 3, 'AFLOU', 'Welborn', ''),
('ETU006', 3, 'AFOUTOU', 'Kévin', ''),
('ETU007', 3, 'AGBEKPONOU', 'Samson', ''),
('ETU008', 3, 'AGBOBLI', 'Bernice', ''),
('ETU009', 3, 'AGBODIVE', 'Didier', ''),
('ETU010', 3, 'AGBONGOE', 'Martin', ''),
('ETU011', 3, 'AHLI', 'Pédro', ''),
('ETU012', 3, 'AHONSU', 'Emmanuel', ''),
('ETU013', 3, 'AMEWOUDA', 'Samuel', ''),
('ETU014', 3, 'AMOUDJI', 'Presnel', ''),
('ETU015', 3, 'AMOUSSOU', 'Winner', ''),
('ETU016', 3, 'ANYAGE', 'Daniel', ''),
('ETU017', 3, 'ASSION ASSITE', 'Ethiel', ''),
('ETU018', 3, 'BASSABI', 'Amdane', ''),
('ETU019', 3, 'BIENFOALI', 'Damssan', ''),
('ETU020', 3, 'DAKLU', 'Julio', ''),
('ETU021', 3, 'DJAGBA', 'Véronique', ''),
('ETU022', 3, 'DJOSSOU', 'Ulrich', ''),
('ETU028', 3, 'DJREKE', 'Michel', ''),
('ETU024', 3, 'DOGBEVI', 'Déborah', ''),
('ETU025', 3, 'DZINAKU', 'Etienne', ''),
('ETU026', 3, 'GUEGANG', 'Kévin', ''),
('ETU027', 3, 'KONDO', 'Ibrahim', ''),
('ETU023', 3, 'KONDO', 'Tété Paul', ''),
('ETU029', 3, 'KONTEVI', 'Anne', ''),
('ETU030', 3, 'KOYE', 'Léléda Mabelle', ''),
('ETU031', 3, 'KPODO', 'Léa', ''),
('ETU032', 3, 'KWASI', 'Pierre', ''),
('ETU033', 3, 'LABAH', 'Laeticia', ''),
('ETU034', 3, 'LANWADAN', 'Junior', ''),
('ETU035', 3, 'MOCTAR', 'Djalal Adoum', ''),
('ETU036', 3, 'N''KPO', 'Florent', ''),
('ETU037', 3, 'N''ZONOU', 'Valérie', ''),
('ETU038', 3, 'SYLVESTRE', 'Albert', ''),
('ETU039', 3, 'TOGASRA', 'Scott', ''),
('ETU040', 3, 'YAO', 'Eunice', ''),
('ETU041', 3, 'YOVO', 'gilles', ''),
('ETU042', 3, 'ZAGANA', 'Gael', '');

INSERT INTO cours (ID_CLASSE, ID_PROF, ID_SALLE, ID_MODULE, JOUR, HEURE_DEBUT, HEURE_FIN) VALUES
(1, 6, 1, 'M1', 'lundi', '08:30:00', '10:00:00'),
(1, 3, 1, 'M1', 'lundi', '08:30:00', '10:00:00'),
(1, 5, 1, 'M1', 'lundi', '08:30:00', '10:00:00'),
(1, 5, 1, 'M1', 'lundi', '08:30:00', '10:00:00'),
(1, 7, 1, 'M1', 'lundi', '08:30:00', '10:00:00'),
(1, 3, 1, 'M1', 'lundi', '08:30:00', '10:00:00'),
(1, 8, 1, 'M1', 'lundi', '08:30:00', '10:00:00'),
(1, 8, 1, 'M1', 'lundi', '08:30:00', '10:00:00'),
(1, 8, 1, 'M1', 'lundi', '08:30:00', '10:00:00'),
(1, 7, 1, 'M1', 'lundi', '08:30:00', '10:00:00'),
(1, 5, 2, 'M2', 'lundi', '10:15:00', '11:45:00');