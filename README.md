A Symfony project created on October 22, 2016, 10:46 pm.


The website based on Symfony I pretty much entirely coded for Welcom', when I came in the association. I entered quite late (months after the elections) and I'm not a member of the board, so I'm not credited in the poster.
It was my first experience in "webdesign" (don't think it was such a bad job, for something that was never even properly drawn or anything before) and website creation (after a short introduction to Symfony in class) and the working prototype took me one week during the holidays to complete, and then around two more days, spread across two months to get to v0.7 which was put online at www.welcom-evry.com .
There was still a bit of cleaning to do, a few missing functionnalities which should now mostly be fixed in this initial commit for v0.9.
For 1.0, I still need to write a few comments here and there, add backup CSS for older browsers (even though most of the site won't work for browsers way too old...), and fix a design problem in the "tri-news" (three news displayed next to each other in columns) that appears on small devices.
													William Vignat

v0.9 : 12/28/2016 




Need PHP >5.4 to work, and package php-sqlite (the release on welcom-evry.com works doesn't work with sqlite, it's just for local debugging)

@@@@@@@@@@@@@@@@@@@@@Instructions and explanations in French@@@@@@@@@@@@@@@@@@@@@

######################Instructions################
Une fois pull un 
php bin/console doctrine:fixtures:load 
permettra de récupérer un site tout neuf avec des fake user: 
tous ont comme mot de passe :
	123456789
les users sont :	
	john_user
	anna_admin
	tom_super_admin
(on peut les retrouver la dedans : 
https://github.com/dry3ss/Welcom-Website/blob/master/src/DR/UserBundle/DataFixtures/ORM/LoadUsers.php )

Pour se connecter côté BackEnd c'est sur http://127.0.0.1:8000/login

######################Fonctionnement backend################
Tout le code utile est dans src/DR/ je n'ai pas utilisé l'AppBundle (tous les controleurs et toutes les vues sont dans src/DR/NewsBundle), mais ai créé 3 Bundles différents:
- un UserBundle pour s'occuper de quelques petites modifications par rapport à FOSUserBundle
- un ImageBundle qui gère et stocke des images à la fois en base de donnée et sur le disque dur dans web/image_db
- un NewsBundle qui est le bundle principal avec tous les controleurs et toutes les vues, il gère aussi les news en base de données

Toutes les news (mot générique pour tous les articles du site) et les images sont gérées en base de données (SQLite pour le dev et MySQL pour la prod).


Pour chacune des pages le front est relativement "vide", et un paramétrage initial dans la vue permet de créer très rapidement une nouvelle page en definissant quelques paramètres TWIG afin de choisir quels "widgets" (carrousel d'image vs fond d'écran fixe, affichage des news, ajout d'un logo mouvant...) on va afficher dedans.
Si l"on choisi d'activer l'affichage des news, chaque page doit être liée à une 'Category' unique ( à travers le controlleur et self::createDisplayOrder() ). Le controlleur va chercher dans la base de données toutes les news ayant le paramètre 'Category' choisi, les classe par 'OrderNumber' et les envoie à la vue. 

Lorsque entre 1 et 3 news ont le même 'OrderNumber' et ont le paramètre 'Partoftrinew' à true elles sont agencées côte à côte horizontalement et un traitement spécial est effectué afin de gérer le côté design-responsive qui n'est pas trivial. Même si cette possibilité n'est pas encore utilisée sur la version actuelle du site, il est tout à fait possible d'ajouter des images dans les tri-news (voir http://127.0.0.1:8000/tutorial une fois le serveur lancé pour un exemple).


L'affichage des vues utilise de manière très intensive TWIG et les templates inclus les uns dans les autres afin qu'il soit extrêmement facile de créer une nouvelle page sur le front. 
Pour créer une nouvelle page il suffit de:
-s'inspirer de src/DR/NewsBundle/Resources/views/README_BASIC_EXAMPLE.html.twig pour choisir les "widgets" à utiliser. 
-s'inspirer de src/DR/NewsBundle/Controller/DefaultController.php pour créer un controlleur. 
-ajouter des news depuis le backend avec la "Category" correspondante à ce qui a été choisi pour appeler la fonction self::createDisplayOrder() dans le DefaultController.php .

La vue src/DR/NewsBundle/Resources/views/true_base.html.twig est grossièrement un gigantesque if else if qui s'occupe d'ajouter et d'agencer tous les "widgets" choisis. 


######################Possibilités backend################
Au niveau des possibilités cote backend on peut:
-ajouter/modifier/enlever des news, en leur liant une image si l'on veut
-ajouter/modifier/enlever des images directement avec suppression de l'ancienne image sur le disque si tu modifies (sauf dans le cas ou le type de l'image est "default")
-lier à nimporte quelle news une image principale, en changer son emplacement (au dessus du titre, entre le titre et la news, après la news)
-mettre en forme le texte des news, ajouter des images à l'intérieur (ce n'est pas moi qui ai géré cette partie, c'est le Bundle Symfony IvoryCKEditorBundle)
-créer des utilisateurs (pas les supprimer cela dit)





