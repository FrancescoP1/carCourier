<?php
    /* CONFIG */
    
    define("DB_HOST", "localhost");
    define("DB_USER", "id18069696_admin");
    //define ("DB_USER", "root");
    define("DB_PASS", "D@wd@w123456");
    //define("DB_PASS", "");
    define("DB_DATABASE", "id18069696_carcourier");
    //define ("DB_DATABASE", "mydb");
    
    /* CONNECTION */
    
    $con = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    
    if (!$con) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    /* change character set to utf8
    if (!mysqli_set_charset($link, "utf8"))
        printf("Error loading character set utf8: %s\n", mysqli_error($link));
    */
    /* CLOSE CONNECTION */
    //mysqli_close($con);
?>