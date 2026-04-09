<?php
// Utilisation de ROOT pour éviter les erreurs de chemin qui coupent la page
include_once ROOT . 'model/rendez_vous/model.rdv.php';
include_once ROOT . 'model/medecin/model.medecin.php';
include_once ROOT . 'bdd/bdd.php';

$rdvModel = new Rendez_vous($bdd);
$medecinModel = new Medecin($bdd);

// Sécurisation absolue de l'étape
$step = 1;
if (isset($_GET['step']) && !empty($_GET['step'])) {
    $step = (int)$_GET['step'];
}
if ($step < 1 || $step > 3) {
    $step = 1;
}

// Variables pour stocker nos données
$medecins = [];
$creneaux = [];
$specialites = [];
$recapInfo = null;

if ($step == 1) {
    // ÉTAPE 1 : Médecins et spécialités
    $medecins = $medecinModel->readMedecin();
    $req = $bdd->query("SELECT * FROM specialite");
    $specialites = $req->fetchAll(PDO::FETCH_ASSOC);
    
    if (isset($_GET['specialite']) && !empty($_GET['specialite'])) {
        $id_spe_recherche = (int)$_GET['specialite'];
        $medecins = array_filter($medecins, function($m) use ($id_spe_recherche) {
            return $m['fk_id_specialite'] == $id_spe_recherche;
        });
    }
} 
elseif ($step == 2) {
    // ÉTAPE 2 : Créneaux
    $id_medecin = isset($_GET['id_medecin']) ? (int)$_GET['id_medecin'] : 0;
    $date_choisie = isset($_GET['date_choisie']) && !empty($_GET['date_choisie']) ? $_GET['date_choisie'] : null;
    
    if ($id_medecin > 0) {
        $creneaux = $rdvModel->getCreneauxDispoByMedecin($id_medecin, $date_choisie);
    }
} 
elseif ($step == 3) {
    // ÉTAPE 3 : Motif
    $id_creneau = isset($_GET['id_creneau']) ? (int)$_GET['id_creneau'] : 0;
    if ($id_creneau > 0) {
        $recapInfo = $rdvModel->getCreneauInfos($id_creneau);
    }
}
?>