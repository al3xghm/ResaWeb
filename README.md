Lien du site : https://resaweb.ghmir.butmmi.o2switch.site/
Lien de la checklist Opquast : https://docs.google.com/spreadsheets/d/1D9cptlWch34NTqwX4nJQRdd-3sQVJOksrWkYvWeMFBk/edit?usp=sharing

**** Installation du site WeRent en local ****

Cette procédure vous guidera à travers les étapes nécessaires pour installer et configurer le site RésaWeb en local à l'aide de XAMPP, MAMP ou WAMP. Vous serez également guidé pour installer la base de données associée.

* Prérequis *

    XAMPP, MAMP ou WAMP installé sur votre machine.

** Installation du site en local **

    Démarrer le serveur Apache :
        Ouvrez votre logiciel de gestion de serveur local (XAMPP, MAMP ou WAMP).
        Activez le serveur Apache.

    Préparer les fichiers du site :
        Ouvrez l'application dans l'explorateur de fichiers.
        Accédez au dossier htdocs (généralement situé dans le répertoire d'installation de votre serveur local).
        Copiez le dossier ResaWeb, qui contient le code du site ainsi que la base de données, dans le dossier htdocs.

    Configurer la connexion à la base de données :
        Ouvrez le fichier connect.php situé dans le dossier ResaWeb.
        Modifiez le champ du mot de passe en fonction de votre système d'exploitation :
            Pour Windows, laissez le champ de mot de passe vide.
            Pour Mac, utilisez "root" comme mot de passe.

    Ouvrir le site dans votre navigateur :
        Lancez votre navigateur préféré.
        Tapez localhost/ResaWeb dans la barre d'URL.
        La page d'accueil de RésaWeb devrait s'ouvrir.

** Installation de la base de données en local **

    Démarrer le serveur MySQL :
        Dans XAMPP (ou MAMP/WAMP), activez le serveur MySQL.

    Accéder à phpMyAdmin :
        Dans votre navigateur, tapez localhost/phpMyAdmin dans la barre d'URL.

    Créer une nouvelle base de données :
        Cliquez sur l'onglet Bases de données.
        Créez une nouvelle base de données nommée resaweb.

    Importer la base de données :
        Sélectionnez la base de données resaweb.
        Cliquez sur le bouton Importer.
        Appuyez sur Parcourir et sélectionnez le fichier "werent.sql" qui se trouve dans le dossier ResaWeb.
        Sélectionnez l'option d'importation rapide et exécutez l'importation.

Après l'importation, la base de données sera configurée et le site sera entièrement opérationnel.

*** Note Importante ***

La fonctionnalité de réservation du site fonctionne correctement en local ; les informations saisies dans le formulaire seront bien insérées dans la base de données. Cependant, étant donné que vous êtes en environnement local, l'envoi de mails ne sera pas possible.