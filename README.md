## Choses à faire pour la création du framework

- Création du routeur
    - Rédiriger vers la bonne route ✔
    - Evite  d'avoir deux routes identiques ✔
    - Si la route correspondant à la requete n'existe pas, alors "not found" ✔
- Création de la structure de la route
    - Dirige vers le bon contrôleur ✔
    - Execute la bonne action ✔
    - Compare le path de la requete au path de la route ✔

- Création de la requete
    - Une requête un path. ex : 'path/to/resource' ✔
    - Une requête a une méthode. ex : "POST, GET, DELETE, PATCH, etc."
    - Une requete a un corps si la méthode est de type "POST, PATCH, PUT, etc."

- Création de la reponse
    - Une reponse a un corps (json, html, etc.);
    - une reponse a un statutCode
    - Une reponse a des headers

- Création d'une sorte d'ORM
    - Décomposer une requete SQL