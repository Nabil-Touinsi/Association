<!DOCTYPE html>
<html>
    <head>
        <title>Association</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .custom-img {
                border: 4px solid #007bff;
                padding: 15px;
                background-color: #e9f7fe;
                border-radius: 12px;
                margin: 15px;
                transition: transform 0.3s, box-shadow 0.3s;
            }
            .custom-img:hover {
                transform: scale(1.1);
                box-shadow: 0 5px 15px rgba(0, 123, 255, 0.5);
            }
            .page-link img {
                display: block;
                margin: auto;
            }
        </style>
    </head>
    <body>
        <div class="container text-center mt-4">
            <h1 class="mb-4 text-primary">Gestion de l'association LM 25</h1>
            <div class="d-flex justify-content-center flex-wrap mb-4">
                <a href="index.php?page=1" class="page-link"><img src="images/logo.png" height="100" width="100" class="custom-img"></a>
                <a href="index.php?page=2" class="page-link"><img src="images/client.png" height="100" width="100" class="custom-img"></a>
                <a href="index.php?page=3" class="page-link"><img src="images/telephone.png" height="100" width="100" class="custom-img"></a>
                <a href="index.php?page=4" class="page-link"><img src="images/technicien.png" height="100" width="100" class="custom-img"></a>
                <a href="index.php?page=5" class="page-link"><img src="images/intervention.png" height="100" width="100" class="custom-img"></a>
            </div>
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            switch ($page) {
                case 1: require_once("controleur/home.php"); break;
                case 2: require_once("controleur/c_membres.php"); break;
                case 3: require_once("controleur/c_dons.php"); break;
                case 4: require_once("controleur/c_projets.php"); break;
                case 5: require_once("controleur/c_pays.php"); break;
            }
            ?>
        </div>
    </body>
</html>
