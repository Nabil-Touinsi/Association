<h2> Gestion des pays </h2>

<?php
// Inclure le modèle
require_once("modele/modele.class.php");
$modele = new Modele();

$filtre = "";
$lePays = null;

// Gestion des actions de suppression et d'édition
if (isset($_GET['action']) && isset($_GET['idpays'])) {
    $idpays = $_GET['idpays'];

    if ($_GET['action'] == "sup") {
        // Supprimer le pays
        $modele->deletePays($idpays);
        header("Location: index.php?page=5");
        exit;
    } elseif ($_GET['action'] == "edit") {
        // Récupérer les détails du pays pour pré-remplir le formulaire
        $lePays = $modele->selectWherePays($idpays);
    }
}

// Traitement du formulaire d'ajout ou de modification d'un pays
if (isset($_POST['Valider']) || isset($_POST['Modifier'])) {
    $nom_pays = $_POST['nom_pays'];
    $code_pays = $_POST['code_pays'];

    // Préparer les données
    $donnees = [
        'nom_pays' => $nom_pays,
        'code_pays' => $code_pays
    ];

    if (isset($_POST['Modifier'])) {
        // Mise à jour du pays
        $donnees['idpays'] = $_POST['idpays'];
        $modele->updatePays($donnees);
    } else {
        // Insertion d'un nouveau pays
        $modele->insertPays($donnees);
    }

    // Redirection après l'opération
    header("Location: index.php?page=5");
    exit;
}

// Traitement du filtre
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtrer'];
    $lesPays = $modele->selectLikePays($filtre);
} else {
    $lesPays = $modele->selectAllPays();
}

// Inclure les vues pour le formulaire et la liste des pays
require_once("vue/vue_insert_pays.php");
require_once("vue/vue_select_pays.php");
?>
