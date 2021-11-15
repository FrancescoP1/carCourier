<html>

    <style>
        <?php
            include 'resurse/css/general.css';
        ?>
    </style>

    <?php
        //Get Heroku ClearDB connection information
        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $cleardb_server = $cleardb_url["host"];
        $cleardb_username = $cleardb_url["user"];
        $cleardb_password = $cleardb_url["pass"];
        $cleardb_db = substr($cleardb_url["path"],1);
        $active_group = 'default';
        $query_builder = TRUE;
        // Connect to DB
        $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
    ?>



    <head>

    </head>

    <body>
       <div id = "page_grid">
        <h1>Car Courier</h1>
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

            <button><a href = "schemacc.html">Schema bazei de date</a></button>
            <a href = "">GitHub</a>
       </div>
    </body>

</html>


