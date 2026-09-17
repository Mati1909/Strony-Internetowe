<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <link rel="shortcut icon" href="Zdjecia/favicon.png">
    <title>Wyniki Summit</title>
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

                $result = $connect -> query("SELECT Nazwa, Miejsce, DATE_FORMAT(DataPoczatek, '%d.%m.%Y') AS DataPoczatek, DATE_FORMAT(DataKoniec, '%d.%m.%Y') AS DataKoniec FROM summit ORDER BY ID DESC;");

                $liczba = $result -> num_rows;

                echo "<h1>Wyniki Summit w liczbie: $liczba</h1>";

                echo "<table>";
                echo "<tr><th>Nazwa</th> <th>Miejsce</th> <th>Data Początek</th> <th>Data Koniec</th></tr>";
                while ($row = $result -> fetch_assoc())
                {
                    echo '<tr><td>'. $row['Nazwa'] .'</td><td> '. '<b>'. $row['Miejsce']. '</b></td><td>'. $row['DataPoczatek']. '</td><td>'. $row['DataKoniec'] .'</td></tr>';
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