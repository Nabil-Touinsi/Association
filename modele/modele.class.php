<?php
class Modele {
    private $unPdo;

    public function __construct() {
        try {
            $serveur = "localhost:3306";
            $bdd = "association";
            $user = "root";
            $mdp = "";

            $this->unPdo = new PDO("mysql:host=" . $serveur . ";dbname=" . $bdd, $user, $mdp);
        } catch (PDOException $exp) {
            echo "<br> Erreur de connexion à la BDD :" . $exp->getMessage();
        }
        if ($this->unPdo) {
            echo "Connexion réussie à la base de données.";
        } else {
            echo "La connexion à la base de données a échoué.";
        }
    }

    /****** Gestion des Pays ******/
    public function selectAllPays() {
        $requete = "SELECT idpays, nom_pays, code_pays FROM Pays;";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectWherePays($idpays) {
        $requete = "SELECT * FROM Pays WHERE idpays = :idpays;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [":idpays" => $idpays];
        $exec->execute($donnees);
        return $exec->fetch(PDO::FETCH_ASSOC);
    }

    public function selectLikePays($filtre) {
        $requete = "SELECT idpays, nom_pays, code_pays FROM Pays WHERE nom_pays LIKE :filtre OR code_pays LIKE :filtre;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [":filtre" => "%" . $filtre . "%"];
        $exec->execute($donnees);
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertPays($tab) {
        $requete = "INSERT INTO Pays VALUES (null, :nom_pays, :code_pays);";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [
            ":nom_pays" => $tab['nom_pays'],
            ":code_pays" => $tab['code_pays']
        ];
        $exec->execute($donnees);
    }

    public function updatePays($tab) {
        $requete = "UPDATE Pays SET nom_pays = :nom_pays, code_pays = :code_pays WHERE idpays = :idpays;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [
            ":nom_pays" => $tab['nom_pays'],
            ":code_pays" => $tab['code_pays'],
            ":idpays" => $tab['idpays']
        ];
        $exec->execute($donnees);
    }

    public function deletePays($idpays) {
        $requete = "DELETE FROM Pays WHERE idpays = :idpays;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [":idpays" => $idpays];
        $exec->execute($donnees);
    }
    
    /****** Gestion des Membres ******/
    public function selectAllMembres() {
        $requete = "SELECT * FROM Membre;";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectWhereMembre($id_membre) {
        $requete = "SELECT * FROM Membre WHERE id_membre = :id_membre;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [":id_membre" => $id_membre];
        $exec->execute($donnees);
        return $exec->fetch(PDO::FETCH_ASSOC);
    }

    public function selectLikeMembre($filtre) {
        $requete = "SELECT * FROM Membre WHERE nom LIKE :filtre OR prenom LIKE :filtre OR email LIKE :filtre;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [":filtre" => "%" . $filtre . "%"];
        $exec->execute($donnees);
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertMembre($tab) {
        $requete = "INSERT INTO Membre (date_naissance, nom, prenom, email, idpays) VALUES (:date_naissance, :nom, :prenom, :email, :idpays);";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [
            ":date_naissance" => $tab['date_naissance'],
            ":nom" => $tab['nom'],
            ":prenom" => $tab['prenom'],
            ":email" => $tab['email'],
            ":idpays" => $tab['idpays']
        ];
        $exec->execute($donnees);
    }

    public function updateMembre($tab) {
        $requete = "UPDATE Membre SET date_naissance = :date_naissance, nom = :nom, prenom = :prenom, email = :email, idpays = :idpays WHERE id_membre = :id_membre;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [
            ":date_naissance" => $tab['date_naissance'],
            ":nom" => $tab['nom'],
            ":prenom" => $tab['prenom'],
            ":email" => $tab['email'],
            ":idpays" => $tab['idpays'],
            ":id_membre" => $tab['id_membre']
        ];
        $exec->execute($donnees);
    }

    public function deleteMembre($id_membre) {
        $requete = "DELETE FROM Membre WHERE id_membre = :id_membre;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [":id_membre" => $id_membre];
        $exec->execute($donnees);
    }
        
    /****** Gestion des Dons ******/
    public function selectAllDons() {
        $requete = "SELECT * FROM Don;";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectWhereDon($id_don) {
        $requete = "SELECT * FROM Don WHERE id_don = :id_don;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [":id_don" => $id_don];
        $exec->execute($donnees);
        return $exec->fetch(PDO::FETCH_ASSOC);
    }

    public function selectLikeDon($filtre) {
        $requete = "SELECT * FROM Don WHERE moyen_paiement LIKE :filtre OR montant LIKE :filtre;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [":filtre" => "%" . $filtre . "%"];
        $exec->execute($donnees);
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertDon($tab) {
        $requete = "INSERT INTO Don VALUES (null, :montant, :date_don, :moyen_paiement, :id_membre, :id_projet);";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [
            ":montant" => $tab['montant'],
            ":date_don" => $tab['date_don'],
            ":moyen_paiement" => $tab['moyen_paiement'],
            ":id_membre" => $tab['id_membre'],
            ":id_projet" => $tab['id_projet']
        ];
        $exec->execute($donnees);
    }

    public function updateDon($tab) {
        $requete = "UPDATE Don 
                    SET montant = :montant, 
                        date_don = :date_don, 
                        moyen_paiement = :moyen_paiement 
                    WHERE id_don = :id_don;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [
            ":montant" => $tab['montant'],
            ":date_don" => $tab['date_don'],
            ":moyen_paiement" => $tab['moyen_paiement'],
            ":id_don" => $tab['id_don']
        ];
        $exec->execute($donnees);
    }
    

    public function deleteDon($id_don) {
        $requete = "DELETE FROM Don WHERE id_don = :id_don;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [":id_don" => $id_don];
        $exec->execute($donnees);
    }
    
    /****** Gestion des Projets ******/
    public function selectAllProjets() {
        $requete = "SELECT * FROM Projet;";
        $exec = $this->unPdo->prepare($requete);
        $exec->execute();
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectWhereProjet($id_projet) {
        $requete = "SELECT * FROM Projet WHERE id_projet = :id_projet;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [":id_projet" => $id_projet];
        $exec->execute($donnees);
        return $exec->fetch(PDO::FETCH_ASSOC);
    }

    public function selectLikeProjet($filtre) {
        $requete = "SELECT * FROM Projet WHERE nom_projet LIKE :filtre OR description LIKE :filtre;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [":filtre" => "%" . $filtre . "%"];
        $exec->execute($donnees);
        return $exec->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertProjet($tab) {
        $requete = "INSERT INTO Projet VALUES (null, :nom_projet, :montant_total, :description, :date_debut, :date_fin, :idpays);";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [
            ":nom_projet" => $tab['nom_projet'],
            ":montant_total" => $tab['montant_total'],
            ":description" => $tab['description'],
            ":date_debut" => $tab['date_debut'],
            ":date_fin" => $tab['date_fin'],
            ":idpays" => $tab['idpays']
        ];
        $exec->execute($donnees);
    }

    public function updateProjet($tab) {
        $requete = "UPDATE Projet 
                    SET nom_projet = :nom_projet, 
                        description = :description, 
                        date_debut = :date_debut, 
                        date_fin = :date_fin, 
                        idpays = :idpays 
                    WHERE id_projet = :id_projet;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [
            ":nom_projet" => $tab['nom_projet'],
            ":description" => $tab['description'],
            ":date_debut" => $tab['date_debut'],
            ":date_fin" => $tab['date_fin'],
            ":idpays" => $tab['idpays'],
            ":id_projet" => $tab['id_projet']
        ];
        $exec->execute($donnees);
    }
    

    public function deleteProjet($id_projet) {
        $requete = "DELETE FROM Projet WHERE id_projet = :id_projet;";
        $exec = $this->unPdo->prepare($requete);
        $donnees = [":id_projet" => $id_projet];
        $exec->execute($donnees);
    }
    
}

?>
