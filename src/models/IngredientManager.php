<?php
require('../models/ConnectionManager.php');

class IngredientManager {
    
    public function findAll() {
        $bdd = new ConnectionManager();

        $query = "SELECT * FROM ingredient;";
        $req = $bdd->prepare($query);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)){
            $ingredient = new Ingredient();
            $ingredient->setName($row['name']);
            $ingredient->setPrice($row['price']);

            $ingredients[] = $ingredient;
        }

        return $ingredients;
    }

    public function addOne() {
        $bdd = new ConnectionManager();

        $query = "INSERT INTO ingredient VALUES(:name, :price)";
        $req = $bdd->prepare($query);
        $req->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $req->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
        $req->execute();

    }
}
?>