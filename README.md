# Gauthier_Marceau_tp2
TP 2 : API RESTful de la plateforme du Blog

API permettant de gérer une plateforme de blog sur le thème d'endroit d'hébergement. 
Chaque **article** montre un endroit avec comme information le titre, l'image, le texte et la catégorie.

Il y a trois catégorie disponible identifiées par un chiffre:
|Nom           |identifiant                       
|--------------|-----------
|Hotels        | 1       
|Chalets       | 2                      
|Camping       | 3     

## Create 
> http://localhost:3000/api/post/create

**POST** Permet de créer un nouvel article.

**Exemple de JSON:**
{
"category_id": 1,
"title": "Le titre",
"imageURL": "L'image",
"content": "Le texte"
}

## Read

> http://localhost:3000/api/posts

**GET** Permet de d'afficher tout les articles.

**Aucun paramètre**

## Update

> http://localhost:3000/api/post/update/{id}

**PUT** Permet de modifier un article.

**Exemple de JSON:**
{
"title": "Nouveau titre",
"content": "Nouveau texte"
}

**Note:** Il faut passer l'identifiant de l'article à l'URL

## Update Title

> http://localhost:3000/api/post/update_title/{id}

**PATCH** Permet de modifier un titre d'article.

**Exemple de JSON:**
{
"title": "Nouveau titre"
}

**Note:** Il faut passer l'identifiant de l'article à l'URL

## DELETE

> http://localhost:3000/api/post/delete/{id}

**DELETE** Permet de supprimer un article.

**Note:** Il faut passer l'identifiant de l'article à l'URL

