<?php
    class Tree{

        public $type;
        public $quantity;
        public $fetus;
        public $quantityFetus;
        public $identify;

        function __construct($type, $quantity, $fetus, $quantityFetus, $identify)
        {
            $this->type = $type;
            $this->quantity = $quantity;
            $this->fetus = $fetus;
            $this->quantityFetus = $quantityFetus;
            $this->identify = $identify;
        }
    }

    $n = 10;
    $p = 15;
    $i = 0;

    do{
        $appleQuantity = mt_rand(40, 50);
        $apple[$i] = new Tree("Яблоня", "1", "Яблоко", $appleQuantity, $i);
        $i++;
    }
    while($i < $n);

    $apples = array_sum(array_column($apple, 'quantityFetus'));
    echo 'Собрано '.$apples.' яблок';

    do{
        $pearQuantity = mt_rand(0, 20);
        $pear[$i] = new Tree("Грушевое дерево", "1", "Груша", $pearQuantity, $i);
        $i++;
    }
    while($i < $p);

    $pears = array_sum(array_column($pear, 'quantityFetus'));
    echo 'Собрано '.$pears.' груш';