<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <link rel="shortcut icon" href="Zdjecia/favicon.png">
    <title>Losuj pojazdy</title>
</head>
<body>
    <header>
        <div id="baner1">
            <a href="index.html"><img src="Zdjecia/Logo.png" alt="Logo"></a>
        </div>
        <div id="baner2">
            <ul>
                <li>
                    <a href="statystyki.php">Statystyki</a>
                </li>
                <li>
                <a href="">Grand Race</a>
                    <ul class="dropdown">
                    <li><a href="losujPojazdy.html">Losuj pojazdy</a></li>
                    <li><a href="podium.html">Dodaj wynik na podium</a></li>
                    <li><a href="wynikiGrandRace.php">Pokaż wyniki</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Summit</a>
                        <ul class="dropdown">
                        <li><a href="wynikiSummit.php">Pokaż wyniki</a></li>
                        <li><a href="dodajWynikSummit.html">Dodaj wynik summit</a></li>
                        </ul>
                </li>
            </ul>
        </div>
    </header>
    <main>
        <div id="content">
            <h1>Losuj pojazdy na Grand Race - Wyniki</h1>
            <?php
                /* SELECT Marka, Model, Rocznik, Kraj FROM pojazdy WHERE czyPosiadany = 'Tak';
                   AND Marka = '$marka' AND Rocznik BETWEEN $dekadaPoczatek AND $dekadaKoniec
                   AND $zapytanieKraj AND Kolor = '$Kolor' */
                $klasa1 = $_POST['klasa1'];
                $klasa2 = $_POST['klasa2'];
                $klasa3 = $_POST['klasa3'];

                $jakosc = $_POST['jakosc'];
                $marka = $_POST['marka'];
                $Dekada = $_POST['Dekada'];
                $zapytanieDekada = "";
                $dekadaPoczatek;
                $dekadaKoniec;

                @$Kraj = $_POST['Kraj'];
                @$Kraj_Austria = $_POST['Kraj_Austria'];
                @$Kraj_Chorwacja = $_POST['Kraj_Chorwacja'];
                @$Kraj_Dania = $_POST['Kraj_Dania'];
                @$Kraj_Francja = $_POST['Kraj_Francja'];
                @$Kraj_Holandia = $_POST['Kraj_Holandia'];
                @$Kraj_Japonia = $_POST['Kraj_Japonia'];
                @$Kraj_Niemcy = $_POST['Kraj_Niemcy'];
                @$Kraj_Szwecja = $_POST['Kraj_Szwecja'];
                @$Kraj_USA = $_POST['Kraj_USA'];
                @$Kraj_Wielka_Brytania = $_POST['Kraj_Wielka_Brytania'];
                @$Kraj_Wlochy = $_POST['Kraj_Wlochy'];
                @$Kraj_ZEA = $_POST['Kraj_ZEA'];
                @$Kraj_Rosja = $_POST['Kraj_Rosja'];
                $zapytanieKraj = "";
                $czyPierwszy = true;
                
                $Kolor = $_POST['Kolor'];
                $zapytanieKolor = "";
                $czyMotocykl = $_POST['czyMotocykl'];

                if ($Kolor != NULL)
                {
                    $zapytanieKolor = " AND Kolor = '$Kolor'";
                }

                switch ($Dekada) 
                {
                    case '50s':
                        $dekadaPoczatek = 1900;
                        $dekadaKoniec = 1959;
                        break;
                    case '60s':
                        $dekadaPoczatek = 1960;
                        $dekadaKoniec = 1969;
                        break;
                    case '70s':
                        $dekadaPoczatek = 1970;
                        $dekadaKoniec = 1979;
                        break;
                    case '80s':
                        $dekadaPoczatek = 1980;
                        $dekadaKoniec = 1989;
                        break;
                    case '90s':
                        $dekadaPoczatek = 1990;
                        $dekadaKoniec = 1999;
                        break;
                    case '2000s':
                        $dekadaPoczatek = 2000;
                        $dekadaKoniec = 2009;
                        break;
                    case '2010s':
                        $dekadaPoczatek = 2010;
                        $dekadaKoniec = 2019;
                        break;
                    case '2020s':
                        $dekadaPoczatek = 2020;
                        $dekadaKoniec = 2029;
                        break;
                    default:
                        $dekadaPoczatek = 1900;
                        $dekadaKoniec = 2024;
                        break;
                }

                if ($Kraj == NULL)
                {
                    $zapytanieKraj = "Kraj = 'Austria' OR Kraj =  'Francja' OR Kraj =  'Holandia' OR Kraj =  'Japonia' OR Kraj =  'Niemcy' OR Kraj =  'Szwecja' OR Kraj =  'USA' OR Kraj =  'Wielka Brytania' OR Kraj =  'Włochy' OR Kraj =  'Rosja' OR Kraj =  'Dania' OR Kraj =  'ZEA' OR Kraj =  'Chorwacja'";
                }
                if ($Kraj_Austria != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'Austria' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'Austria' ";
                    }
                }
                if ($Kraj_Francja != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'Francja' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'Francja' ";
                    }
                }
                if ($Kraj_Holandia != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'Holandia' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'Holandia' ";
                    }
                }
                if ($Kraj_Japonia != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'Japonia' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'Japonia' ";
                    }
                }
                if ($Kraj_Niemcy != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'Niemcy' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'Niemcy' ";
                    }
                }
                if ($Kraj_Szwecja != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'Szwecja' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'Szwecja' ";
                    }
                }
                if ($Kraj_USA != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'USA' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'USA' ";
                    }
                }
                if ($Kraj_Wielka_Brytania != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'Wielka Brytania' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'Wielka Brytania' ";
                    }
                }
                if ($Kraj_Wlochy != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'Włochy' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'Włochy' ";
                    }
                }
                if ($Kraj_Rosja != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'Rosja' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'Rosja' ";
                    }
                }
                if ($Kraj_Dania != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'Dania' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'Dania' ";
                    }
                }
                if ($Kraj_ZEA != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'ZEA' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'ZEA' ";
                    }
                }
                if ($Kraj_Chorwacja != NULL)
                {
                    if ($czyPierwszy)
                    {
                        $zapytanieKraj = "Kraj = 'Chorwacja' ";
                        $czyPierwszy = false;
                    }
                    else
                    {
                        $zapytanieKraj = $zapytanieKraj. "OR Kraj = 'Chorwacja' ";
                    }
                }

                /*echo "Klasa 1: ". $klasa1. '<br>';
                echo "Klasa 2: ". $klasa2. '<br>';
                echo "Klasa 3: ". $klasa3. '<br>';
                echo "Marka: ". $marka. '<br>';
                echo "Dekada: ". $dekadaPoczatek. ' ' .$dekadaKoniec .'<br>';
                echo "Kraj: ". $zapytanieKraj. '<br>';
                echo "Kolor: ". $Kolor. '<br>';
                */

                // SELECT Marka, Model, Rocznik, Kraj FROM pojazdy WHERE czyPosiadany = 'Tak' AND Typ = 'Racing'; 

                require_once "connect.php";

                $connect = new mysqli($serwer, $user, $haslo, $baza);

                // Wyszukiwanie pojazdów z klasy 1
                $zapytanieSQL = "SELECT Marka, Model, Rocznik, Kraj FROM pojazdy WHERE czyPosiadany = 'Tak' AND Typ = '$klasa1'";
                $dobreZapytanieSQL = "";

                // Wysyłanie zapytania z czyPosiadany oraz konkretną klasą 1
                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }
                
                // Dopisanie do zapytania jakości pojazdu
                $zapytanieSQL = $zapytanieSQL. " AND Jakosc = '$jakosc'";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }
                
                // Dopisanie do zapytania marki pojazdu
                $zapytanieSQL = $zapytanieSQL. " AND Marka = '$marka'";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania dekadę pojazdu
                $zapytanieSQL = $zapytanieSQL. " AND Rocznik BETWEEN $dekadaPoczatek AND $dekadaKoniec";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania krajów pojazdu
                $zapytanieSQL = $zapytanieSQL. " AND ($zapytanieKraj)";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania koloru pojazdu
                $zapytanieSQL = $zapytanieSQL. $zapytanieKolor;

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania czy pojazd jest motocyklem
                $zapytanieSQL = $zapytanieSQL. " AND czyMotocykl = '$czyMotocykl'";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Sortowanie wyników po marce
                $dobreZapytanieSQL = $dobreZapytanieSQL. " ORDER BY Marka";

                // Wysyłanie dobrego zapytania i wyświetlenie wyników
                $result = $connect -> query($dobreZapytanieSQL);
                $ileWynikow = $result -> num_rows;
                $wylosowanyPojazd = rand(1, $ileWynikow);
                $i = 1;

                echo "<h2>Klasa $klasa1</h2>";
                echo "<table>";
                while ($row = $result -> fetch_assoc())
                {
                    if ($i == $wylosowanyPojazd)
                    {
                        echo '<tr id="wylosowany"><td>'. $i. '.</td><td> '. $row['Marka']. '</td><td> '. $row['Model']. '</td><td> '. $row['Rocznik']. '</td><td> '. $row['Kraj']. '</td></tr>';
                    }
                    /*else
                    {
                        echo '<tr><td>'. $i. '.</td><td> '. $row['Marka']. '</td><td> '. $row['Model']. '</td><td> '. $row['Rocznik']. '</td><td> '. $row['Kraj']. '</td></tr>';
                    }*/
                    $i++;
                }
                echo "</table>";

                // Wyszukiwanie pojazdów z klasy 2
                $zapytanieSQL = "SELECT Marka, Model, Rocznik, Kraj FROM pojazdy WHERE czyPosiadany = 'Tak' AND Typ = '$klasa2'";
                $dobreZapytanieSQL = "";

                // Wysyłanie zapytania z czyPosiadany oraz konkretną klasą 2
                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania jakości pojazdu
                $zapytanieSQL = $zapytanieSQL. " AND Jakosc = '$jakosc'";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }
                
                // Dopisanie do zapytania marki pojazdu
                $zapytanieSQL = $zapytanieSQL. " AND Marka = '$marka'";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania dekadę pojazdu
                $zapytanieSQL = $zapytanieSQL. " AND Rocznik BETWEEN $dekadaPoczatek AND $dekadaKoniec";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania krajów pojazdu
                $zapytanieSQL = $zapytanieSQL. " AND ($zapytanieKraj)";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania koloru pojazdu
                $zapytanieSQL = $zapytanieSQL. $zapytanieKolor;

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania czy pojazd jest motocyklem
                $zapytanieSQL = $zapytanieSQL. " AND czyMotocykl = '$czyMotocykl'";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Sortowanie wyników po marce
                $dobreZapytanieSQL = $dobreZapytanieSQL. " ORDER BY Marka";
                
                // Wysyłanie dobrego zapytania i wyświetlenie wyników
                $result = $connect -> query($dobreZapytanieSQL);
                $ileWynikow = $result -> num_rows;
                $wylosowanyPojazd = rand(1, $ileWynikow);
                $i = 1;

                echo "<h2>Klasa $klasa2</h2>";
                echo "<table>";
                while ($row = $result -> fetch_assoc())
                {
                    if ($i == $wylosowanyPojazd)
                    {
                        echo '<tr id="wylosowany"><td>'. $i. '.</td><td> '. $row['Marka']. '</td><td> '. $row['Model']. '</td><td> '. $row['Rocznik']. '</td><td> '. $row['Kraj']. '</td></tr>';
                    }
                    /*else
                    {
                        echo '<tr><td>'. $i. '.</td><td> '. $row['Marka']. '</td><td> '. $row['Model']. '</td><td> '. $row['Rocznik']. '</td><td> '. $row['Kraj']. '</td></tr>';
                    }*/
                    $i++;
                }
                echo "</table>";

                // Wyszukiwanie pojazdów z klasy 3
                $zapytanieSQL = "SELECT Marka, Model, Rocznik, Kraj FROM pojazdy WHERE czyPosiadany = 'Tak' AND Typ = '$klasa3'";
                $dobreZapytanieSQL = "";

                // Wysyłanie zapytania z czyPosiadany oraz konkretną klasą 1
                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania jakości pojazdu
                $zapytanieSQL = $zapytanieSQL. " AND Jakosc = '$jakosc'";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }
                
                // Dopisanie do zapytania marki pojazdu
                $zapytanieSQL = $zapytanieSQL. " AND Marka = '$marka'";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania dekadę pojazdu
                $zapytanieSQL = $zapytanieSQL. " AND Rocznik BETWEEN $dekadaPoczatek AND $dekadaKoniec";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania krajów pojazdu
                $zapytanieSQL = $zapytanieSQL. " AND ($zapytanieKraj)";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania koloru pojazdu
                $zapytanieSQL = $zapytanieSQL. $zapytanieKolor;

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Dopisanie do zapytania czy pojazd jest motocyklem
                $zapytanieSQL = $zapytanieSQL. " AND czyMotocykl = '$czyMotocykl'";

                $result = $connect -> query($zapytanieSQL);

                if ($result -> num_rows > 0)
                {
                    $dobreZapytanieSQL = $zapytanieSQL;
                }
                else
                {
                    $zapytanieSQL = $dobreZapytanieSQL;
                }

                // Sortowanie wyników po marce
                $dobreZapytanieSQL = $dobreZapytanieSQL. " ORDER BY Marka";
                
                // Wysyłanie dobrego zapytania i wyświetlenie wyników
                $result = $connect -> query($dobreZapytanieSQL);
                $ileWynikow = $result -> num_rows;
                $wylosowanyPojazd = rand(1, $ileWynikow);
                $i = 1;

                echo "<h2>Klasa $klasa3</h2>";
                echo "<table>";
                while ($row = $result -> fetch_assoc())
                {
                    if ($i == $wylosowanyPojazd)
                    {
                        echo '<tr id="wylosowany"><td>'. $i. '.</td><td> '. $row['Marka']. '</td><td> '. $row['Model']. '</td><td> '. $row['Rocznik']. '</td><td> '. $row['Kraj']. '</td></tr>';
                    }
                    /*else
                    {
                        echo '<tr><td>'. $i. '.</td><td> '. $row['Marka']. '</td><td> '. $row['Model']. '</td><td> '. $row['Rocznik']. '</td><td> '. $row['Kraj']. '</td></tr>';
                    }*/
                    $i++;
                }
                echo "</table>";

                $connect -> close();
            ?>
        </div>
    </main>
    <footer>
        <div id="stopka">
            <p>The Crew Motorfest Hub &copy 2023 - 2025. Projekt autorski nie do publikacji w Internecie</p>
        </div>
    </footer>
</body>
</html>