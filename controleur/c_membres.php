<h2> Gestion des membres </h2>

<?php
// Inclure le modèle
require_once("modele/modele.class.php");
$modele = new Modele();

// Récupérer la liste des pays pour le formulaire
$pays = $modele->selectAllPays();

$filtre = "";
$leMembre = null;

// Gestion des actions de suppression et d'édition
if (isset($_GET['action']) && isset($_GET['id_membre'])) {
    $id_membre = $_GET['id_membre'];

    if ($_GET['action'] == "sup") {
        // Supprimer le membre
        $modele->deleteMembre($id_membre);
        header("Location: index.php?page=2");
        exit;
    } elseif ($_GET['action'] == "edit") {
        // Récupérer les détails du membre pour pré-remplir le formulaire
        $leMembre = $modele->selectWhereMembre($id_membre);
    }
}

// Traitement du formulaire d'ajout ou de modification d'un membre
if (isset($_POST['Valider']) || isset($_POST['Modifier'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $email = $_POST['email'];
    $idpays = $_POST['idpays'];

    // Préparer les données
    $donnees = [
        'nom' => $nom,
        'prenom' => $prenom,
        'date_naissance' => $date_naissance,
        'email' => $email,
        'idpays' => $idpays
    ];

    if (isset($_POST['Modifier'])) {
        // Mise à jour du membre
        $donnees['id_membre'] = $_POST['id_membre'];
        $modele->updateMembre($donnees);
    } else {
        // Insertion d'un nouveau membre
        $modele->insertMembre($donnees);
    }

    // Redirection après l'opération
    header("Location: index.php?page=2");
    exit;
}

// Traitement du filtre
if (isset($_POST['Filtrer'])) {
    $filtre = $_POST['filtrer'];
    $lesMembres = $modele->selectLikeMembre($filtre);
} else {
    $lesMembres = $modele->selectAllMembres();
}

// Inclure les vues pour le formulaire et la liste des membres
require_once("vue/vue_insert_membre.php");
require_once("vue/vue_select_membres.php");
?>
