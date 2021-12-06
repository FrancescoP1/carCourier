<?php
    function check_login($con){
        if(isset($_SESSION['id_user'])){
            $id = $_SESSION['id_user'];
            $query = "select * from users where id_user = '$id' limit 1";
            $result = mysqli_query($con, $query);
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }

        //redirect to login:
        header("Location: login.php");
    }
    function isLoggedIn($con){
        if(isset($_SESSION['id_user'])){
            $id = $_SESSION['id_user'];
            $query = "select * from users where id_user = '$id' limit 1";
            $result = mysqli_query($con, $query);
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        else return 0;
    }
?>