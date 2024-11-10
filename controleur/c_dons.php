<h2> Gestion des dons </h2>

<?php
// Inclure le modèle
require_once("modele/modele.class.php");
$modele = new Modele();

$membres = $modele->selectAllMembres();
$projets = $modele->selectAllProjets();

$filtre = "";
$leDon = null;

// Gestion des actions de suppression et d'édition
if (isset($_GET['action']) && isset($_GET['id_don'])) {
    $id_don = $_GET['id_don'];

    if ($_GET['action'] == "sup") {
        // Supprimer le don
        $modele->deleteDon($id_don);
        header("Location: index.php?page=3");
        exit;
    } elseif ($_GET['action'] == "edit") {
        // Récupérer les détails du don pour pré-remplir le formulaire
        $leDon = $modele->selectWhereDon($id_don);
    }
}

// Traitement du formulaire d'ajout ou de modification d'un don
if (isset($_POST['Valider']) || isset($_POST['Modifier'])) {
    $montant = $_POST['montant'];
    $date_don = $_POST['date_don'];
    $moyen_paiement = $_POST['moyen_paiement'];
    $id_membre = $_POST['id_membre'];
    $id_projet = $_POST['id_projet'];

    $donnees = [
        'montant' => $montant,
        'date_don' => $date_don,
        'moyen_paiement' => $moyen_paiement,
        'id_membre' => $id_membre,
        'id_projet' => $id_projet
    ];

    if (isset($_POST['Modifier'])) {
        $donnees['id_don'] = $_POST['id_don'];
        $modele->updateDon($donnees);
    } else {
        $modele->insertDon($donnees);
    }

    header("Location: index.php?page=3");
    exit;
}

// Traitement du filtre
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtrer'];
    $lesDons = $modele->selectLikeDon($filtre);
} else {
    $lesDons = $modele->selectAllDons();
}

// Inclure les vues pour le formulaire et la liste des dons
require_once("vue/vue_insert_don.php");
require_once("vue/vue_select_dons.php");
?>
