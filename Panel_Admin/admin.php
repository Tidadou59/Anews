<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Bienvenue </title>

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="Panel_Admin/style_Admin.css">

    <!-- <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/slate/bootstrap.min.css"/> -->
    <link rel="stylesheet" href="../bootstraps.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/admin.png" />


</head>
<body>
<!-- ################################## Début Body ################################## -->
<!-- ----------------------------------- Début Body ------------------------------------------ -->
<div id="menu" data-ng-app="myApp" data-ng-init="">
    <!-- Menu -->
    <nav>
        <div class="navbar navbar-expand-lg navbar-dark bg-primary1">
            <a class="navbar-brand" href="#"><h2>Avesn'News</h2>l'Actu des manifestations</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                </ul>
            </div>

        </div>

    </nav>

    <div class="row">

        <!-- Menu de Gauche -->
        <div id="PanelAdmin_MenuGauche" class="col-sm-3" style="background-color: #1e1e1e;width: 200px; height:600px;">


            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">


                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#!/" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    <i class="fas fa-home" style="font-size: 20px"></i>
                    Accueil
                </a>

                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#!/Gestion_Utilisateurs" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <i class="far fa-user" style="font-size: 20px"></i>
                    Gestion Utilisateurs
                </a>

                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#!/Gestion_Agenda" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                    <i class="far fa-calendar-alt" style="font-size: 20px"></i>
                    Gestion Agenda
                </a>

                <a class="nav-link" id="v-pills-settings-tab1" data-toggle="pill" href="#!/News" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                    <i class="fas fa-bullhorn" style="font-size: 20px"></i>
                    Gestion News
                </a>

                <a class="nav-link" id="v-pills-settings-tab2" data-toggle="pill" href="#!/Galerie" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                    <i class="far fa-images" style="font-size: 20px"></i>
                    Gestion Photo/Vidéo
                </a>

                <a class="nav-link" id="v-pills-settings-tab" data-toggle="" href="../" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                    <i class="fas fa-sign-out-alt" style="font-size: 20px"></i>
                    Retour au site
                </a>

            </div>



        </div>



        <!-- Page Générale -->
        <div id="PanelAdmin_PageGenerale" class="col-sm-9" style="background-color: black;height:600px">

            <!-- ------------------------------- Début code des autres pages ------------------------------- -->

            yooooooooooooooooooooooooo

            <div class="ng-view"></div>


            <!-- ------------------------------- Fin code des autres pages ------------------------------- -->

        </div>



    </div>

</div>

<!-- ==================== SCRIPT ==================== -->
<!-- <script src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script> -->
<script src="../scripts/jquery.min.js"></script>

<!-- <script src="https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js"></script> -->
<script src="../scripts/popper.min.js"></script>

<!-- <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script> -->
<script src="../scripts/bootstrap.min.js"></script>

<!-- <script src="https://bootswatch.com/_assets/js/custom.js"></script> -->
<script src="../scripts/custom.js"></script>

</body>
</html>