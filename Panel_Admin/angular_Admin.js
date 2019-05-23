var app = angular.module("myApp", ["ngRoute"]);

app.config(function ($routeProvider) {
    $routeProvider
        //.when("/", {templateUrl: "index.html", controller:"Accueil"})
        .when("/Gestion_Utilisateurs", {templateUrl: "Panel_Admin/Gestion_Utilisateurs.html", controller: "Gestion_UtilisateursControlleur"})
        .when("/Gestion_Agenda", {templateUrl: "Panel_Admin/Gestion_Agenda.html", controller: "Gestion_AgendaControlleur"})


        .when("/films", {templateUrl: "Panel_Admin/films.html", controller: "filmsControlleur"})
        .when("/livres", {templateUrl: "Panel_Admin/livres.html", controller: "livresControlleur"})
        .when("/jeuxvideos", {templateUrl: "Panel_Admin/jeuxvideo.html", controller: "jeuxvideosControlleur"})



});
/* ====================== ACCUEIL ================================== */
app.controller('Accueil', function ($scope, $http)
    {
        document.title = " - Accueil - ";
    });

/* ====================== Gestion Utilisateurs ================================== */
app.controller('Gestion_UtilisateursControlleur', function ($scope, $http)
{
    //$scope.loader = "chargement ...";
    $scope.chargement = "1";
    $scope.utilisateurs = [];

    document.title = " - Gestion Utilisateurs - ";

    $http({
        method: "GET",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: "Lecture/Liste_Uilisateurs.php"
    }).then(function $success(response)
        {
            $scope.loader = "";
            $scope.chargement = "";

            //$scope.test = response.text;
            console.log(response.data);

            //todo : verifier response.data a une valeur

            if(response.data)
            {
                $scope.utilisateurs = response.data;
            }
        },
        function Error(response)
        {
            console.log(response.statusText);
            $scope.chargement = "";
        });

    $scope.ajouterUtilisateur = function ()
    {
        console.log($scope.ajoutAgenda);
        $scope.utilisateurs.push($scope.ajoutAgenda);

        $http(
            {
                method: "POST",
                url: "Ecriture/Utilisateur.php",
                data: "nouvelUtilisateur=" + $scope.ajoutUtilisateur,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
            .then(function Success(response)
                {
                    // $scope.agenda=response.data;
                    console.log(response.data);
                },
                function Error(response)
                {
                    console.log(response.statutText);
                });
    }
});

/* ====================== Gestion Agenda ================================== */
app.controller('Gestion_AgendaControlleur', function ($scope, $http)
{
    //$scope.loader = "chargement ...";
    $scope.chargement = "1";
    $scope.agenda = [];

    document.title = " - Agenda - ";

    $http({
        method: "GET",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: "Lecture/Liste_Agenda.php"
    }).then(function $success(response)
        {
            console.log(response);

            $scope.loader = "";
            $scope.chargement = "";
            //$scope.test = response.text;
            //todo : verifier response.data a une valeur

            if(response.data)
            {
                $scope.agenda = response.data;
            }
        },
        function Error(response)
        {
            console.log(response.data);
            $scope.chargement = "";
            //alert(response.data);
        });

    $scope.ajouterAgenda = function ()
    {
        console.log($scope.ajoutAgenda);

        var data = $.param({
            date: $scope.date,
            lieu: $scope.lieu,
            nom: $scope.nom,
            description: $scope.description,
            image: $scope.image,
            activation: $scope.activation
        });

        $http(
            {
                method: "POST",
                url: "../Panel_Admin/Ecriture/Admin_Agenda_create.php",
                data,
                headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
            })
            .then(function Success(response)
                {
                    // $scope.agenda=response.data;
                    console.log(response.data);

                },
                function Error(response)
                {
                    console.log(response.statutText);
                });
    }
});



/* ====================== FILM ================================== */
app.controller('filmsControlleur', function ($scope, $http)
{
    //$scope.loader = "chargement ...";
    $scope.chargement = "1";
    $scope.livres = [];

    document.title = " - Films - ";

    $http({
        method: "GET",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: "Lecture/Liste_Films.php"
    }).then(function $success(response)
        {
            $scope.loader = "";
            $scope.chargement = "";

            //$scope.test = response.text;
            console.log(response.data);

            //todo : verifier response.data a une valeur

            if(response.data) {
                $scope.films = response.data;
            }
        },
        function Error(response)
        {
            console.log(response.statusText);
            $scope.chargement = "";
        });

    $scope.ajouterFilm = function ()
    {
        console.log($scope.ajoutFilm);
        $scope.films.push($scope.ajoutFilm);

        $http(
            {
                method: "POST",
                url: "Ecriture/Film.php",
                data: "nouveauFilm=" + $scope.ajoutFilm,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
            .then(function Success(response)
                {
                    // $scope.films=response.data;
                    console.log(response.data);
                },
                function Error(response)
                {
                    console.log(response.statutText);
                });
    }
});

/* ==================== LIVRES ================================== */
app.controller('livresControlleur', function ($scope, $http)
    {
        //$scope.loader = "chargement ...";
        $scope.chargement = "1";
       $scope.livres = [];

        document.title = " - Livres - ";

        $http({
            method: "GET",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            url: "Lecture/Liste_Livres.php"
        }).then(function $success(response)
            {
                $scope.loader = "";
                $scope.chargement = "";

                //$scope.test = response.text;
                console.log(response.data);

                //todo : verifier response.data a une valeur

                if(response.data) {
                    $scope.livres = response.data;
                }
            },
        function Error(response)
        {
            console.log(response.statusText);
            $scope.chargement = "";
        });

        $scope.ajouterLivre = function ()
            {
                console.log($scope.ajoutLivre);
                $scope.livres.push($scope.ajoutLivre);

                $http(
                    {
                        method: "POST",
                        url: "Ecriture/Livre.php",
                        data: "nouveauLivre=" + $scope.ajoutLivre,
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    })
                .then(function Success(response)
                    {
                        //$scope.films=response.data;


                        console.log(response.data);

                    },
                function Error(response)
                    {
                        console.log(response.statutText);
                    });
            }
    });


/* ================= JEUX ==================================== */
app.controller('jeuxvideosControlleur', function ($scope, $http)
    {
        $scope.loader = "chargement ...";
        $scope.chargement = "1";
        $scope.jeuxvideos = [];

        document.title = " - Jeux Vidéo - ";

        $http({
            method: "GET",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            url: "Lecture/Liste_Jeux.php"
        }).then(function $success(response)
            {
                $scope.loader = "";
                $scope.chargement = "";

                //$scope.test = response.text;
                console.log(response.data);

                //todo : verifier response.data a une valeur

                if(response.data) {
                    $scope.jeuxvideos = response.data;
                }
            },
            function Error(response)
            {
                console.log(response.statusText);
                $scope.chargement = "";
            });

        $scope.ajouterJeu = function ()
        {
            console.log($scope.ajoutJeu);
            $scope.jeuxvideos.push($scope.ajoutJeu);

            $http(
                {
                    method: "POST",
                    url: "Ecriture/Jeu.php",
                    data: "nouveauJeu=" + $scope.ajoutJeu,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                })
            .then(function Success(response)
                    {
                        //$scope.films=response.data;
                        console.log(response.data);
                    },
                function Error(response)
                    {
                        console.log(response.statutText);
                    });
        }
    });




/*
jQuery.ajaxSetup({
    beforeSend: function() {
        $('#chargement').show();
    },
    complete: function(){
        $('#chargement').hide();
    },
});
*/