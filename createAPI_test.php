<?php

    /* Headers */

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");

    /* Connexion BD */

        $db_user = 'root';
        $db_password = 'framboise';
        $db_name = 'articles_blog';

    /* Demande POST pour créer nouvel article */

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Récupérer les données envoyées de la requête */

            $data = json_decode(file_get_contents("php://input"));

    /* Vérification des données nécessaires */

            if (!empty($data->title) && !empty($data->body) && !empty($data->author) && !empty($data->category_id) && !empty($data->category_name)) {
                try {

    /* Connexion à la DB PDO */

                    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /* Préparer et exécuter la requête SQL pour insérer l'article

                    $stmt = $conn->prepare("INSERT INTO articles (title, body, author, category_id, category_name, date_published) VALUES (:title, :body, :author, :category_id, :category_name, NOW())");
                    $stmt->bindParam(':title', $data->title);
                    $stmt->bindParam(':body', $data->body);
                    $stmt->bindParam(':author', $data->author);
                    $stmt->bindParam(':category_id', $data->category_id);
                    $stmt->bindParam(':category_name', $data->category_name);
                    $stmt->execute();

    /* Message de succès */

                  http_response_code(201); 

    /* Code de réponse HTTP 201 Créé */

                    echo json_encode(array("message" => "L'article a été créé avec succès."));
                } catch (PDOException $e) {

    /* Message d'erreur */

            http_response_code(500); // Code de réponse HTTP 500 Internal Server Error
            echo json_encode(array("message" => "Impossible de créer l'article. Erreur : " . $e->getMessage()));
        }

    /* Fermer la connexion à la BD */

                $conn = null;
            } else {

    /* Données manquantes ... message d'erreur */

                http_response_code(400); // Code de réponse HTTP 400 Bad Request
                echo json_encode(array("message" => "Des données insuffisantes pour créer l'article."));
            }
        } else {

    /* Message d'erreur pour toutes les autres méthodes HTTP */
            
            http_response_code(405); // Code de réponse HTTP 405 Method Not Allowed
            echo json_encode(array("message" => "Méthode non autorisée."));
        }
        ?>

