<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache" />
    <title>Tesla School</title>
    <link href="View/Styles/style.css" rel="stylesheet" type="text/css">
    <link href="View/Styles/connexionForm.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
        require ("View/Accueil.php");
        $pageAcceuil = new Accueil();
        $pageAcceuil->startSession();
        $pageAcceuil->afficherTitre();
        $pageAcceuil->afficherDiaporama();
        $pageAcceuil->afficherMenu();
        $pageAcceuil->afficherVideo();
        $pageAcceuil->afficherTableauTarifs();
        $pageAcceuil->afficherContact();
    ?>
<script type="text/javascript" src="View/Scripts/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="View/Scripts/remplireTableau.js"></script>

</body>

</html>
