<?php 
require('../models/PizzaManager.php');

class HomeController {

    public static function home(){
        $pizza = (new PizzaManager())->findAll();
        var_dump($pizza);
    }

}

?>