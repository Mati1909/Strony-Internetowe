<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <link rel="shortcut icon" href="Zdjecia/favicon.png">
    <title>Dodaj wynik na podium</title>
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
            <?php
                $data = $_POST['data'];
                $pozycja = $_POST['pozycja'];
                $czas = $_POST['czas'];
                $ID_Pojazdu = $_POST['ID_Pojazdu'];

                if ($data != NULL && $pozycja != NULL && $czas != NULL && $ID_Pojazdu != NULL)
                {
                    require_once "connect.php";

                    //echo "INSERT INTO grand_race VALUES (NULL, '$data', $pozycja, $czas, $ID_Pojazdu)";

                    $connect = new mysqli($serwer, $user, $haslo, $baza);

                    $connect -> query("INSERT INTO grand_race VALUES (NULL, '$data', $pozycja, $czas, $ID_Pojazdu)");

                    echo "<p>Wstawiono następujące dane: Data <b>$data</b>, Pozycja <b>$pozycja</b>, Czas <b>$czas</b>, ID Pojazdu <b>$ID_Pojazdu</b></p>";

                    $connect -> close();
                }
                else
                {
                    echo '<p>Sprawdź, czy wszystkie dane są wpisane!</p>';
                }
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