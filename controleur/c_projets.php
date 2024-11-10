<h2> Gestion des projets </h2>

<?php
// Inclure le modèle
require_once("modele/modele.class.php");
$modele = new Modele();

// Récupérer la liste des pays pour le formulaire
$pays = $modele->selectAllPays();

$filtre = "";
$leProjet = null;

// Gestion des actions de suppression et d'édition
if (isset($_GET['action']) && isset($_GET['id_projet'])) {
    $id_projet = $_GET['id_projet'];

    if ($_GET['action'] == "sup") {
        // Supprimer le projet
        $modele->deleteProjet($id_projet);
        header("Location: index.php?page=4");
        exit;
    } elseif ($_GET['action'] == "edit") {
        // Récupérer les détails du projet pour pré-remplir le formulaire
        $leProjet = $modele->selectWhereProjet($id_projet);
    }
}

// Traitement du formulaire d'ajout ou de modification d'un projet
if (isset($_POST['Valider']) || isset($_POST['Modifier'])) {
    // Récupérer les données du formulaire
    $nom_projet = $_POST['nom_projet'];
    $description = $_POST['description'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $idpays = $_POST['idpays'];

    // Préparer les données
    $donnees = [
        'nom_projet' => $nom_projet,
        'description' => $description,
        'date_debut' => $date_debut,
        'date_fin' => $date_fin,
        'idpays' => $idpays
    ];

    if (isset($_POST['Modifier'])) {
        // Mise à jour du projet
        $donnees['id_projet'] = $_POST['id_projet'];
        $modele->updateProjet($donnees);
    } else {
        // Insertion d'un nouveau projet
        $modele->insertProjet($donnees);
    }

    // Redirection après l'opération
    header("Location: index.php?page=4");
    exit;
}

// Traitement du filtre
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtrer'];
    $lesProjets = $modele->selectLikeProjet($filtre);
} else {
    $lesProjets = $modele->selectAllProjets();
}

// Inclure les vues
require_once("vue/vue_insert_projet.php");
require_once("vue/vue_select_projets.php");
?>
