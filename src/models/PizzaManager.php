<?php
require('../models/ConnectionManager.php');

class PizzaManager {
    
    public function findAll() {
        $bdd = new ConnectionManager();

        $query = "SELECT * FROM pizza;";
        $req = $bdd->prepare($query);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)){
            $pizza = new Pizza();
            $pizza->setName($row['id']);
            $pizza->setName($row['name']);
            $pizza->setPrice($row['price']);

            $pizzas[] = $pizza;
        }

        return $pizzas;
    }

    public function addOne() {
        $bdd = new ConnectionManager();

        $query = "INSERT INTO pizza VALUES(:name, :price)";
        $req = $bdd->prepare($query);
        $req->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $req->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
        $req->execute();

    }
}
?>