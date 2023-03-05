<?php
    $conn = new PDO("mysql:host=localhost; dbname=abcage", "root", "");

    $date = ($_POST["date"] ?? '');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Тестовое задание</title>
    </head>
    <body>
        <form action="" method="post">
            <input type="date"  name="date">
            <input type="submit" value="Получить данные"  name="get">
        </form>

        <div>
            Информация со склада на <?php echo $date; ?>:<br>
            <?php
                if(isset($_POST["date"]) && isset($_POST["get"])){
                    $result = $conn->query("SELECT product, SUM(quantity), SUM(price) FROM products WHERE date <= '$date' GROUP BY product");
                    $time = $conn->query("SELECT DATEDIFF('$date', '2021-01-13')");
                    $prepare = $result->fetchAll();
                    $t = $time->fetchColumn();

                    if($prepare == false){
                        echo "Товара нету на складе";
                        die;
                    }
            
                    //Функция строящая зависимость чисел Фибоначчи
                    $m = 0;
                    $n = 1;
                    $o = 0;
                    $i = 0;
                    while($i <= $t){
                        $o = $m + $n;
                        $m = $n;
                        $n = $o;
                        $i++;
                        //echo $o ."<br>";
                    }
            
                    $sumB = [];
                    $sumC = [];
                    $k = 0;
                    foreach($prepare as list ($a, $b, $c)){
                        $sumB[$k] = $b;
                        $sumC[$k] = $c;
                        if($a == 'Левый носок'){
                            $b = $b - $o;
                            if($b < 0){
                                echo "<script>alert('Обратите внимание, что носков заказали больше чем имеется на складе, обратитесь к руководству');</script>";
                            }
                        }
                        $k++;
                        echo "Товар: $a; Остаток: $b<br>";
                    }
            
                    $d = array_sum($sumB);
                    $e = array_sum($sumC);
                    $f = $e / $d;
                    $g = round($f, 1) + (round($f, 1) * (30 / 100));
                    echo "Цена для ценника: $g";
                }
            ?>
        </div>
    </body>
</html>