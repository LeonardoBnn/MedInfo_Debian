# 🏥 MedInfo - Gestion de centre médical

> Projet réalisé pour l'épreuve E6 - BTS SIO SLAM

## À propos du projet
**MedInfo** est une solution complète pour la digitalisation du centre médical Ramsay. L'objectif est de centraliser la gestion des rendez-vous et le suivi médical sans dépendre de plateformes tierces.

---

## Stack Technique
* **Web (PHP) :** Interface patients et médecins.
* **Base de données :** MySQL .

---

## Fonctionnalités clés

### Espace Médecin (Web)
* Visualisation du planning quotidien.
* Saisie des notes cliniques en consultation.
* Recherche d'historique patient.

### Espace Patient (Web)
* Prise de rendez-vous en ligne via un calendrier.
* Consultation des prochains RDV.


---

## Équipe
* Jean-Christophe Siazon
* Selmène Boufkar
* Leonardo Bonino

---

## ⚙️ Guide d'installation et de configuration

Pour tester le projet en local, voici les prérequis et les étapes à suivre.

###  Prérequis
* **XAMPP** (ou équivalent) : environnement complet pour le développement PHP local, incluant un serveur **Apache**, **MySQL** et **PHP**.
* Votre IDE préféré (VS Code, IntelliJ, etc.).
* Le projet est compatible avec **Windows** et **Debian/Linux**.

###  Installation pas à pas

1. **Récupérer le projet :**
   Clonez le dépôt ou téléchargez le projet sur votre machine.

2. **Configuration de la Base de Données :**
   * Accédez à MySQL via votre terminal ou via l'interface web (ex: `http://localhost/phpmyadmin`).
   * Exécutez le fichier de création pour générer la base de données et insérer un jeu de données de test.
   * 📁 **Chemin du script :** `medinfo/bdd/script.sql`

3. **Liaison avec l'application (config.php) :**
   * À la racine du dossier du projet, créez un fichier nommé `config.php`.
   * Insérez-y vos informations de connexion à la base de données sous ce format :
     ```php
     <?php
     $user = "votreUserMySQL";
     $mdp = "votreMotDePasseMySQL";
     $host = "localhost";
     $dbname = "medinfo";
     ?>
     ```

4. **Lancement du serveur :**
   * Assurez-vous que votre serveur Apache est démarré et qu'il pointe vers le bon chemin (le dossier racine de votre projet).
   * Ouvrez votre navigateur et accédez au projet !
