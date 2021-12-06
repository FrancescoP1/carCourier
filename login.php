<?php
    session_start();
    include ("resurse/includes/mysqliconnect.php");
    include ("functions.php");
    if(isset($_SESSION['id_user'])){
        header("Location: index.php");
    }
    if($_POST){
        //s-a apasat login
        $email = $_POST['email'];
        $password = $_POST['parola'];

        $log = true;

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Email invalid!\n";
            $log = false;
        }
        if(strlen($password) < 6){
            echo "Parola trebuie sa contina cel putin 6 caractere!\n";
            $log = false;
        }

        if($log){
            //formularul este valid
            //citim din baza de date
            $query = "select * from users where email = '$email' limit 1";
            $result = mysqli_query($con, $query);
            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['parola'] === $password){
                        $_SESSION['id_user'] = $user_data['id_user'];
                        header("Location: index.php");
                        die;
                    }
                    else{
                        echo "Parola invalida!";
                    }
                }
                else{
                    echo "Username invalid!";
                }
            }
            else{
                echo "Username invalid!";
            }
            
            
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
                <div>Log In</div>

                <div class = "form-group">
                    <label for = "email">E-mail: </label>
                    <input type = "text" name = "email" id = "email" class = "form-control">
                    <label for = "password">Parola: </label>
                    <input type = "password" name = "parola" class = "form-control"> 
                </div>
                <div class = "row">
                    <div class = "col">
                        <div class = "form-group">
                            <button type = "submit" class = "btn btn-primary">Log In</button>
                        </div>
                    </div>
                    </div class ="col">
                        <div class = "form-group">
                            <p>Nu ai cont?    <a href = "signup.php">Inregistrare</a> </p>
                        </div>
                        
                    </div>
                </div>
                
               

                
            </form>
        </div>

    </body>

</html>