<?php
    session_start();
    include("./resurse/includes/mysqliconnect.php");
    include("functions.php");
    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
    <?php
        include("./resurse/includes/navbar.php");
        include("./resurse/includes/distance.php");
        $distance = 0;
        $pret = 0;
    ?>
    <head>

    </head>

    <body>
        <h1>Calculeaza costul estimativ al transportului</h1>
        <form method = "post" style = "width: 50%; margin: auto">
            <div class = "form-group">
                <label for = "masa">Masa autovehicul (in kilograme):</label>
                <input type = text name = "masa" id = "masa" class = "form-control">

                <label for = "c1">Cod Postal localitate ridicare autovehicul:</label>
                <input type = text name = "Cod1" id = "c1" class = "form-control">

                <label for = "c2">Cod Postal localitate livrare vehicul: </label>
                <input type = text name = "Cod2" id = "c2" class = "form-control">
            </div>
            <button type = "submit" class = "btn btn-primary">Calculeaza</button>
           
        </form>

        <div>
            <p>Distanta de parcurs: <?php echo $distance?></p>
            <br>
            <p>Pret estimativ: <?php echo $pret ?> </p>
            <br>
        </div>


    </body>
    <?php
        if($_POST){
            $weight = $_POST['masa'];
            $c1 = $_POST['Cod1'];
            $c2 = $_POST['Cod2'];
            if(strlen($c1) === 6 && strlen($c2) === 6){
                $distance = getDistance($c1, $c2);
                echo $distance;
                $pret = 2 * (($distance/10 * 6) + ($distance * 0.5)) + 0.2 * $weight;
            }
        }
    ?>
</html> 