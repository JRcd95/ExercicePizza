<?php 
include('../src/views/general/header.php');

$bdd = new PDO('mysql:dbname=pizza;host:localhost', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query = $bdd->query('SELECT * FROM pizza');
$pizza = $query->fetchAll(PDO::FETCH_OBJ);

$b = $bdd->query('SELECT 
pizza.id as id_pizza,
ingredient.*

FROM pizza

INNER JOIN ingredient_pizza 
  ON pizza.id = ingredient_pizza.id_pizza
INNER JOIN ingredient
  ON ingredient_pizza.id_ingredient = ingredient.id');
$ingredient = $b->fetchAll(PDO::FETCH_OBJ);

$q = $bdd->query('SELECT * FROM ingredient');
$ings = $q->fetchAll(PDO::FETCH_OBJ);


?>

<div class="container mt-5">
    <div class="d-flex">  
        <?php 
            foreach($pizza as $p) {
        ?>
            <div class="card m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $p->name ?></h5>
                    <p class="card-text">Prix : <?= $p->price ?> €</p>
                    <?php 
                        foreach($ings as $i) {
                    ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" 
                            <?php
                                foreach($ingredient as $ing) {
                                    if($p->id === $ing->id_pizza && $ing->id === $i->id){
                            ?>
                            checked
                            <?php 
                                    }
                                }
                            ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                <?= $i->name ?> <!--(<?= $i->price ?> €)-->
                            </label>
                        </div>
                    <?php 
                        }
                    ?>                   
                </div>
            </div>
        <?php 
            }
        ?>
    </div>

</div>

<form action="">

</form>




<?php 
include('../src/views/general/footer.php');