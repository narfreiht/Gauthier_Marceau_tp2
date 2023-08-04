<?php
// Définition d'un article
class Article{
  
  private $conn;
  private $table = 'article';

  //Les propriétés de l'article
  public $id;
  public $category_id;
  public $category_name;
  public $title;
  public $imageURL;
  public $content;
  public $created_at;

  //constructeur
  public function __construct($db){
    $this->conn = $db;
  }

  // Création d'un article
  public function create($category_id, $title, $imageURL, $content){
    //Requête
    $query = 'INSERT INTO ' . $this->table . '(`category_id`, `title`, `imageURL`, `content`)
        VALUES(
        :category_id,
        :title,
        :imageURL,
        :content)';

    // Préparation des informations de la requête
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':imageURL', $imageURL);
    $stmt->bindParam(':content', $content);

    // Execute la requête
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
  }

  //Lecture des articles
  public function read(){
    //Requête
    $query = 'SELECT
      c.name as category_name,
      p.id,
      p.category_id,
      p.title,
      p.imageURL,
      p.content,
      p.created_at
      FROM
      ' . $this->table . ' p 
      LEFT JOIN
      categorie c ON p.category_id = c.id ORDER BY p.created_at DESC';

      // Préparation des informations de la requête
      $stmt = $this->conn->prepare($query);

      // Execute la requête
      $stmt->execute();
      
      return $stmt;
  }

    //Suppression d'un article
    public function delete($id){
        //Requête
        $query = 'DELETE FROM ' . $this -> table . ' WHERE id = :id';

        // Préparation des informations de la requête
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        // Execute la requête
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Mise à jour d'un article
    public function update($id, $title, $content){
        //Requête
        $query = 'UPDATE ' . $this->table . ' SET title = :title, content = :content WHERE id = :id';

        // Préparation des informations de la requête
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);

        // Execute la requête
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Mise à jour d'un titre d'article
    public function update_title($id, $title){
        //Requête
        $query = 'UPDATE ' . $this->table . ' SET title = :title WHERE id = :id';

        // Préparation des informations de la requête
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);

        // Execute la requête
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}