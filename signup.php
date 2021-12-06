<?php
    session_start();
    include ("resurse/includes/mysqliconnect.php");
    include ("functions.php");
    //$user_data = check_login($con);

    if($_POST){
        //s-a apasat INREGISTRARE
        $email = $_POST['email'];
        $password = $_POST['parola'];
        $nume = $_POST['nume'];
        $prenume = $_POST['prenume'];
        $nrtel = $_POST['nrtel'];

        $log = true;

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Email invalid!\n";
            $log = false;
        }
        if(strlen($password) < 6){
            echo "Parola trebuie sa contina cel putin 6 caractere!\n";
            $log = false;
        }
        if(strlen($nrtel) < 10 || strlen($nrtel) > 12){
            $log = false;
            echo "Numarul de telefon trebuie sa contina cel putin 10 caractere, dar nu mai mult de 12.\n";
        }
        for($i = 0; $i < strlen($nrtel); $i++){
            if(!is_numeric($nrtel[$i]) || $nrtel[0] != "0" || $nrtel[1] != "7"){
                $log = false;
                echo "Numarul de telefon este invalid! Trebuie sa fie de forma 07CCCCCCCC\n";
                break;
            }
        }
        if(strlen($nume) < 3){
            echo "Nume invalid!\n";
            $log = false;
        }

        if(strlen($prenume) < 3){
            echo "Prenume invalid!\n";
            $log = false;
        }

        if($log){
            //formularul este valid
            //salvam in baza de date
            $query = "insert into users (email, nume, prenume, parola, nrtel) values ('$email', '$nume', '$prenume', '$password', '$nrtel')";
            mysqli_query($con, $query);
            header("Location: index.php");
            die;
        }
    }
?>

<!DOCTYPE html>
<html>
    <?php
        
        include ("resurse/includes/navbar.php");
    ?>

    <head>

    </head>

    <body>
        <div>
            <form method = "post" style = "width: 50%; margin: auto">
                <div>Inregistrare</div>

                <div class = "form-group">
                    <label for = "email">E-mail: </label>
                    <input type = "text" name = "email" id = "email" class = "form-control">

                    <label for = "nume">Nume: </label>
                    <input type = "text" name = "nume" id = "nume" class = "form-control">

                    <label for = "prenume">Prenume: </label>
                    <input type = "text" name = "prenume" id = "prenume" class = "form-control">

                    <label for = "parola">Parola: </label>
                    <input type = "password" name = "parola" id = "parola" class = "form-control">

                    <label for = "nrtel">Numar telefon: </label>
                    <input type = "text" name = "nrtel" id = "nrtel" class = "form-control">
                    
                </div>
                <button type = "submit" class = "btn btn-primary">Inregistrare</button>
                
                <p>Ai deja un cont <a href = "login.php">Login</a></p>
            </form>
        </div>
        
    </body>

</html>