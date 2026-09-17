<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <link rel="shortcut icon" href="Zdjecia/favicon.png">
    <title>Lista pojazdów</title>
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
                require_once "connect.php";

                $connect = new mysqli($serwer, $user, $haslo, $baza);

                $result = $connect -> query("SELECT ID, Marka, Model, Rocznik, Kraj, Typ, Kolor FROM pojazdy WHERE czyPosiadany = 'Tak';");

                $liczba = $result -> num_rows;

                echo "<h1>Posiadane pojazdy w liczbie: $liczba</h1>";
                
                echo '<table id="listaPojazdow">';
                echo "<tr><th>ID</th> <th>Marka</th> <th>Model</th> <th>Rocznik</th> <th>Kraj</th> <th>Typ</th> <th>Kolor</th> </tr>";
                while ($row = $result -> fetch_assoc())
                {
                    echo '<tr><td><b>'. $row['ID'] .'</b></td><td>'. $row['Marka']. '</td><td>'. $row['Model']. '</td><td>'. $row['Rocznik']. '</td><td>'. $row['Kraj']. '</td><td>'. $row['Typ']. '</td><td>'. $row['Kolor'] .'</td></tr>';
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
    <a href="#" class="gotop">➜</a>
</body>
</html>