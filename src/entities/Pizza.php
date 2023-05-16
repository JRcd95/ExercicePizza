<?php 

class Pizza {

    private string $name;
    private float $price;

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setPrice(float $price): void {
        $this->price = $price;
    }

    public function getPrice(): float {
        return $this->price;
    }

}

?>