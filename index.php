<?php
    session_start();
    include ("resurse/includes/mysqliconnect.php");
    include ("functions.php");
    //$user_data = check_login($con);
?>

<html>

    
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
   
    <link rel = "stylesheet" href = "../css/general.css">

    
    <?php include("resurse/includes/navbar.php")?>

    <head>

    </head>

    <body>
        <h1>Bine ai venit 
            <?php 
                $user_data = isLoggedIn($con);
                if($user_data){
                    echo $user_data['prenume'];
                }
            ?>!
            
        </h1>
        <div id = "page_grid">
            <h2>Prezentare aplicatie web</h2>
            <p>Car courier este o companie de transport national de vehicule.</p>
            <h6>Caracteristici ale aplicatiei web:</h6>
            <ul>
                <li>Utilizatorii pot naviga pe site fara a avea un cont, insa pentru a putea avea acces la optiuni avansate
                    (pentru a lansa o comanda de transport, de exemplu), ei trebuie sa isi creeze un cont.
                </li>
                <li>
                    Baza de date stocheaza informatii cu privire la (aceasta mai poate suferi modificari
                    in sensul ca se pot adauga noi tabele necesare altor functionalitati ce vor fi implementate):
                        <ul>
                            <li>
                                utilizatori (id, adresa de email, nume complet, adrese, comenzi anterioare, numar de telefon, etc.)
                            </li>
                            <li>
                                vehiculele companiei (id, marca, model, an fabricatie, consum carburant)
                            </li>
                            <li>
                                soferi (id, nume, prenume, salariu)
                            </li>
                            <li>
                                comenzi (id_comanda, vin vehicul transportat, locatii, pret final, etc)
                            </li>
                            <li>vehiculele transportate (vin, marca, model, an) (</li>
                        </ul>
                </li>
                <li>
                    Utilizatorii nou inregistrati trebuie sa isi confirme conturile, pentru a avea acces la ele.
                    Acestia primesc automat un e-mail la inregistrare.
                </li>
                <li>
                    Vor exista mai multe tipuri de utilizatori(normal si administrator):
                    <ul>
                        <li>
                            Utilizatorii normali, pot lansa comenzi, isi pot modifica profilul, etc.
                        </li>
                        <li>
                            Administratorii pot sterge, bana utilizatorii normali, pot sterge/anula comenzi.
                            Ei pot modifica si preturile, ori salariile soferilor.
                        </li>
                    </ul>
                </li>

                <li>
                    La lansarea unei comenzi, utilizatorii vor trebui sa introduca datele vehicului, locatia de preluare si cea de livrare
                    Aplicatia va calcula distanta dintre cele 2 locatii si va verifica soferii disponibili, iar in functie de aceste doua aspecte
                    ii va afisa clientului un cost. Utilizatorul poate sa accepte sau sa refuze, daca accepta se lanseaza comanda.
                </li>
                <li>
                    Pentru a facilita utilizarea site-ului, va fi implementat si un navbar cu diferite optiuni (comezi, despre companie, profilul meu, etc)
                </li>
            </ul>
            <div>
                <h2>Descriere functionalitate:</h2>
                <p1 style = "font-size:16px">
                    Utilizatorii autentificati, vor putea sa comande un transport, prin intermediul aplicatiei. Ei trebuie sa introduca datele masinii,
                    sa selecteze locatia de preluare si de livrare. Aplicatia va calcula costul transportului, alegand din soferii disponibili, tinand cont
                    de consumul mediu al masinii soferului si de distanta dintre cele doua locatii (un exemplu de formula: pret = 2 * (salariu_unitar * distanta + consum * distanta / 100)).
                    Aplicatia va desemna automat un sofer. Fiecare masina transportata va fi introdusa in baza de date, daca nu exista deja.

                </p1>
                <br>
                <p1 style = "font-size:16px">
                    Administratorii vor avea control absolut asupra utilizatorilor normali, putand sa le schimbe detalii in comenzi (locatii, masini), sa 
                    ii baneze, sa le stearga contul, sa anuleze comenzi, sa ofere comenzi gratis, etc.
                    Ei pot sa adauge din interfata noi soferi, noi masini ale companiei. Pot sa concedieze soferi, sa stearga din masinile companiei, etc.
                    Ei au de asemenea optiunea de generare a salariilor angajatilor (formula: salariu_unitar*distanta_totala; distanta totala reprezinta
                    suma tuturor distantelor parcurse de catre un sofer, in cadrul comenzilor din luna curenta.)
                </p1>
                <br>
                <p1 style = "font-size:16px">
                    Vizitatorii, pot sa vizioneze site-ul, sa citeasca descrierea sa, sa vada imaginile. In momentul in care vor incerca sa calculeze un 
                    transport ori sa lanseze o comanda, vor fi promptati sa se inregistreze.
                </p1>
                <br>
            </div>
            


            <button class = "buton">
                <a href = "schemacc.html">Schema bazei de date</a>
            </button>
            <button class = "buton">
                <a href = "https://github.com/FrancescoP1/carCourier">GitHub</a>
            </button>
            
            
       </div>
    </body>

</html>


