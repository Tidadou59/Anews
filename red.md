7eme Partie : Le routage avec Angular, créer des single page app.

Le routage est une fonctionnalité que de nombreux frameworks proposent, dont Angular via du code additionel.

Grâce à ce module, il va être possible de charger un template html lors du clic sur un lien ( ou un autre élément ) puis de l'injecter dans un élément de la page actuelle.

Dans notre projet, nous affichons des films mais nous allons également afficher des livres et des jeux video.

Plutôt que de recréer une page html pour chaque type de produit, nous allons utiliser les routes pour afficher l'un des trois type de produits, nous associerons un controlleur différent pour chaque produit.

Pour commencer, il faut inclure dans notre page html, le script de routage d'AngularJS, rendez vous sur :

https://code.angularjs.org/1.7.5

Puis téléchargez le script suivant : angular-route.min.js

Une fois que ce script est inclu dans votre page ( dans la balise par exemple ), il va nous falloir modifier notre ligne d'instruction Angular.app pour utiliser ce nouveau module :

Dans notre js : var app = angular.module("myApp", []);

Va devenir : var app = angular.module("myApp", ["ngRoute"]);

Puis (idéalement) juste avant notre controlleur ( en dessous de la ligne var app = ... ) , nous allons ajouter les instructions de configuration de nos routes :

app.config(function($routeProvider) { $routeProvider .when("/", { templateUrl : "index.html" }) .when("/films", { templateUrl : "films.html", controller : "monControlleur" }) .when("/livres", { templateUrl : "livres.html", controller : "livresControlleur" }) .when("/jeuxvideos", { templateUrl : "jeuxvideos.html", controller : "jeuxvideosControlleur" }); });

Grâce à ce code, nous allons pouvoir ajouter des liens spéciaux sur notre page qui vont déclencher l'injection du template html correspondant ( exemple , un clic sur le lien /livres va injecter livres.html )

En dessous de templateUrl pour chaque route, j'ajoute également le nom du controlleur à utiliser, comme nous avons déjà écrit un controlleur pour gérer les films appelé "monControlleur", je l'ai spécifié dans la route correspondante mais il faudra modifier ce nom en filmsControlleur par la suite pour uniformiser le nomage de nos controlleur ( cela fait partie des bonnes pratiques de programmation )

IMPORTANT : Dans notre page html principale, nous allons ajouter la balise suivante :

Cet élément va contenir nos templates html injectés.

A vous de jouer !

Vous allez créer les templates html pour les livres et les jeux videos , copier coller le template de la page principal dans une nouvelle page html pour les films , puis ajouter les controlleurs pour les livres, les jeux videos.

Puis vous allez créer le script PHP qui va stocker en base de donnée nos différentes données ( livres,jeux et films )

Puisque nous allons stocker en bdd les données utilisateurs, il faudra également modifier nos controlleurs, afin qu'ils interrogent le serveur et récuperent les données stockées puis qu'ils mettent à jour nos templates !

Un brief projet concernant ce projet va être donné sur Slack dans la partie exercice.

Bon courage !!