var app = angular.module("myApp", ["ngRoute"]);
var user;

app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {templateUrl: "Vue/index2.html", controller: "Accueil"})

        .when("/connexion", {templateUrl: "Vue/connexion.html", controller: "ListeCheckConnexionControlleur"})
        .when("/inscription", {templateUrl: "Vue/inscription.html", controller: "inscriptionControlleur"})

        .when("/agenda", {templateUrl: "Vue/agenda.html", controller: "agendaControlleur"})
        .when("/Liens", {templateUrl: "Vue/Liens.html", controller: "LiensControlleur"})
        .when("/LiensVilles", {templateUrl: "Vue/Liens.html", controller: "LiensVillesControlleur"})
        .when("/LiensArtificiers", {templateUrl: "Vue/Liens.html", controller: "LiensArtificiersControlleur"})
        .when("/LiensAssociations", {templateUrl: "Vue/Liens.html", controller: "LiensAssociationsControlleur"})
        .when("/LiensAutres", {templateUrl: "Vue/Liens.html", controller: "LiensAutresControlleur"})

        .when("/article", {templateUrl: "Vue/article.html", controller: "articleControlleur"})

        .when("/contact", {templateUrl: "Vue/contact.html", controller: "contactControlleur"})
});

function dateUStoFR(sDate) {
    return sDate.split('/').reverse().join('/');
}
dateUStoFR('Agenda_Date');

/* ====================== ACCUEIL ================================== */
app.controller('Accueil', function ($scope, $http) {
    document.title = " - Accueil - ";
    //isconnected();
});

/* ====================== CONNEXION ================================== */
/*
function isconnected() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log('ok');
            user = JSON.parse(this.responseText);
            console.log(user);
        }
    };
    xhttp.open('GET', '../checkLogin.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send();
}
*/

app.controller('ListeCheckConnexionControlleur', function ($scope, $http) {
    //$scope.loader = "chargement ...";
    $scope.chargement = "1";
    $scope.connexion = [];

/*
    $scope.soumission = function () {
        // envoi User_Pseudo et User_Password au serveur
        $login = document.getElementById('User_Pseudo').value;
        $password = document.getElementById('User_Password').value;

        document.title = " - Connexion - ";

        $http({
            method: "GET",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            url: "Lecture/Liste_Check_Connexion.php"
        }).then(function $success(response)
            {
                if (response.data) {
                    $scope.connexion = response.data;
                }
            },
            function Error(response) {
                console.log(response.statusText);
                $scope.chargement = "";

                window.location = "#!/connexion"
            });

    };
*/

    $scope.soumission = function () {
        // use $.param jQuery function to serialize data from JSON
        var data = $.param({
            User_Pseudo: $scope.User_Pseudo,
            User_Password: $scope.User_Password
        });

        var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        };

        $http.post('Lecture/Liste_Check_Connexion.php', data, config)
            .then(function $success(response) {

                if(response.data.status == "OK")
                {
                    //alert('connecte');

                    //redirection vers le Panel Admin
                    document.location.href="../Panel_Admin"
                }
                else
                {
                    alert('Impossible de se connecter, verifiez mot de passe');
                }

            })
            .error(function (data, status, header, config) {
                $scope.ResponseDetails = "Data: " + data +
                    "<hr />status: " + status +
                    "<hr />headers: " + header +
                    "<hr />config: " + config;
            });
    };
});


/* ====================== INSCRIPTION ================================== */
app.controller('inscriptionControlleur', function ($scope, $http) {
    //$scope.loader = "chargement ...";
    $scope.chargement = "1";
    $scope.connexion = [];

    document.title = " - Inscription - ";

    $http({
        method: "GET",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: "Lecture/Inscription.php"
    }).then(function $success(response) {
            $scope.loader = "";
            $scope.chargement = "";

            //$scope.test = response.text;
            console.log(response.data);

            //todo : verifier response.data a une valeur

            if (response.data) {
                $scope.connexion = response.data;
            }
        },
        function Error(response) {
            console.log(response.statusText);
            $scope.chargement = "";
        });

    $scope.ajouterFilm = function () {
        console.log($scope.ajoutFilm);
        $scope.films.push($scope.ajoutFilm);

        $http(
            {
                method: "POST",
                url: "Ecriture/Film.php",
                data: "nouveauFilm=" + $scope.ajoutFilm,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
            .then(function Success(response) {
                    // $scope.films=response.data;
                    console.log(response.data);
                },
                function Error(response) {
                    console.log(response.statutText);
                });
    }
});

/* ====================== AGENDA ================================== */
app.controller('agendaControlleur', function ($scope, $http) {
    //$scope.loader = "chargement ...";
    $scope.chargement = "1";
    $scope.agenda = [];

    document.title = " - Avesn'News : Agenda - ";

    $http({
        method: "GET",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: "Lecture/Liste_Agenda.php"
    }).then(function $success(response) {

            console.log(response);

            $scope.loader = "";
            $scope.chargement = "";
            //$scope.test = response.text;
            //todo : verifier response.data a une valeur

            if (response.data) {
                $scope.agenda = response.data;
            }
        },
        function Error(response) {
            console.log(response.data);
            $scope.chargement = "";
            //alert(response.data);
        });

    $scope.ajouterAgenda = function () {
        console.log($scope.ajoutAgenda);
        var data = $.param({
            Date: $scope.Date,
            Lieu: $scope.Lieu,
            Nom: $scope.Nom,
            Description: $scope.Description,
            Image: $scope.Image,
            Activation: $scope.Activation
        });
        $http(
            {
                method: "POST",
                url: "../Panel_Admin/Ecriture/Admin_Agenda_create.php",
                data: "nouvelDate=" + $scope.ajoutAgenda,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
            .then(function Success(response) {
                    // $scope.agenda=response.data;
                    console.log(response.data);
                },
                function Error(response) {
                    console.log(response.statutText);
                });
    }
});

/* ====================== ARTICLE ================================== */
app.controller('articleControlleur', function ($scope, $http) {
    //$scope.loader = "chargement ...";
    $scope.chargement = "1";
    $scope.agenda = [];

    document.title = " - Avesn'News : Article - ";

    $http({
        method: "GET",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: "Lecture/Liste_Galerie.php"
    }).then(function $success(response) {

            console.log(response);

            $scope.loader = "";
            $scope.chargement = "";
            //$scope.test = response.text;
            //todo : verifier response.data a une valeur



            if (response.data) {
                $scope.article = response.data;
            }
        },
        function Error(response) {
            console.log(response.data);
            $scope.chargement = "";
            //alert(response.data);
        });

    $scope.ajouterGalerie = function () {
        console.log($scope.ajoutGalerie);
        $scope.article.push($scope.ajoutGalerie);

        $http(
            {
                method: "POST",
                url: "../Ecriture/Galerie.php",
                data: "nouvelDate=" + $scope.ajoutGalerie,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
            .then(function Success(response) {
                    console.log(response.data);
                },
                function Error(response) {
                    console.log(response.statutText);
                });
    }
});


/* ====================== Liens Utiles ================================== */
app.controller('LiensControlleur', function ($scope, $http) {
    //$scope.loader = "chargement ...";
    $scope.chargement = "1";
    $scope.liens = [];

    document.title = " - Liens Utiles - ";

    $http({
        method: "POST",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: "Lecture/Liste_Liens.php"
    }).then(function $success(response) {
            $scope.loader = "";
            $scope.chargement = "";

            console.log(response.data);

            //todo : verifier response.data a une valeur

            if (response.data) {
                $scope.liens = response.data;
            }
        },
        function Error(response) {
            console.log(response.statusText);
            $scope.chargement = "";
        });

    /*
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
     */
});

/* ------------------- Villes -------------------------- */
app.controller('LiensVillesControlleur', function ($scope, $http) {
    //$scope.loader = "chargement ...";
    $scope.chargement = "1";
    $scope.liens = [];

    document.title = " - Liens Utiles - ";

    $http({
        method: "POST",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: "Lecture/Liste_Liens.php"
    }).then(function $success(response) {
            $scope.loader = "";
            $scope.chargement = "";

            console.log(response.data);

            //todo : verifier response.data a une valeur

            if (response.data) {
                $scope.liens = response.data;
            }
        },
        function Error(response) {
            console.log(response.statusText);
            $scope.chargement = "";
        });

    /*
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
     */
});

/* ------------------- Artificiers -------------------------- */
app.controller('LiensArtificiersControlleur', function ($scope, $http) {
    //$scope.loader = "chargement ...";
    $scope.chargement = "1";
    $scope.liens = [];

    document.title = " - Liens Utiles - ";

    $http({
        method: "GET",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: "Lecture/Liste_Liens.php"
    }).then(function $success(response) {
            $scope.loader = "";
            $scope.chargement = "";

            console.log(response.data);

            //todo : verifier response.data a une valeur

            if (response.data) {
                $scope.liens = response.data;
            }
        },
        function Error(response) {
            console.log(response.statusText);
            $scope.chargement = "";
        });

    /*
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
     */
});

/* ------------------- Associations -------------------------- */
app.controller('LiensAssociationsControlleur', function ($scope, $http) {
    //$scope.loader = "chargement ...";
    $scope.chargement = "1";
    $scope.liens = [];

    document.title = " - Liens Utiles - ";

    $http({
        method: "GET",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: "Lecture/Liste_Liens.php"
    }).then(function $success(response) {
            $scope.loader = "";
            $scope.chargement = "";

            console.log(response.data);

            //todo : verifier response.data a une valeur

            if (response.data) {
                $scope.liens = response.data;
            }
        },
        function Error(response) {
            console.log(response.statusText);
            $scope.chargement = "";
        });

    /*
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
     */
});

/* ------------------- Autres -------------------------- */
app.controller('LiensAutresControlleur', function ($scope, $http) {
    //$scope.loader = "chargement ...";
    $scope.chargement = "1";
    $scope.liens = [];

    document.title = " - Liens Utiles - ";

    $http({
        method: "GET",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        url: "Lecture/Liste_Liens.php"
    }).then(function $success(response) {
            $scope.loader = "";
            $scope.chargement = "";

            console.log(response.data);

            //todo : verifier response.data a une valeur

            if (response.data) {
                $scope.liens = response.data;
            }
        },
        function Error(response) {
            console.log(response.statusText);
            $scope.chargement = "";
        });

    /*
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
     */
});

