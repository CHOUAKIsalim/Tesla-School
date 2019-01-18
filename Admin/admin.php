<?php
    session_start();
    if(!isset($_SESSION["username"])) header('Location: /Tesla/Admin');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache" />

    <title>Page administrateur</title>

    <link href="View/Styles/adminstyle.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="View/Scripts/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="View/Scripts/gestionFormations.js"></script>
</head>

<body>
<?php
echo "aaa";
    require_once ("View/AdminPage.php");
    $adminPage = new AdminPage();
    $adminPage->afficherTitre();
    $adminPage->afficherTableauFormations();
    $adminPage->afficherFormInsertion();
    $adminPage->afficherFormModification();
    $adminPage->afficherDeconnexion();
?>





</body>
</html>

