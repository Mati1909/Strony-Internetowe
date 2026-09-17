<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <link rel="shortcut icon" href="Zdjecia/favicon.png">
    <title>Wyniki Grand Race</title>
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
            <a href="#podium" class="linki">Wyniki na podium</a> <a href="#zwyciestwa_dzien" class="linki">Zwycięstwa danego dnia</a> <a href="#zwyciestwa_pojazd" class="linki">Zwycięstwa danego pojazdu</a>
            <?php
                require_once "connect.php";

                $connect = new mysqli($serwer, $user, $haslo, $baza);
                
                // Wyniki Grand Race
                $result = $connect -> query("SELECT * FROM wyniki_grand_race;");

                $liczba = $result -> num_rows;

                echo '<div id="podium">';
                echo "<h1>Wyniki na podium w Grand Race w liczbie: $liczba</h1>";

                echo "<table>";
                echo "<tr><th>Data</th> <th>Pozycja</th> <th>Czas do 1 miejsca</th> <th>Marka</th> <th>Model</th> <th>Rocznik</th> <th>Kraj</th> <th>Typ</th> </tr>";
                while ($row = $result -> fetch_assoc())
                {
                    echo '<tr><td>'. $row['Data'] .'</td><td> '. '<b>'. $row['Pozycja']. '</b></td><td> '. $row['Czas']. '</td><td> '. $row['Marka']. '</td><td> '. $row['Model']. '</td><td> '. $row['Rocznik']. '</td><td> '. $row['Kraj']. '</td><td> '. $row['Typ'] .'</td></tr>';
                }
                echo "</table>";
                echo '</div>';

                // Zwycięstwa Grand Race danego dnia
                $result = $connect -> query("SELECT DATE_FORMAT(Data, '%d.%m.%Y') AS Data, COUNT(Pozycja) AS Ilosc FROM grand_race WHERE Pozycja = 1 GROUP BY 1 ORDER BY 2 DESC;");

                echo '<div id="zwyciestwa_dzien">';
                echo "<h1>Ilość zwycięstw z danego dnia</h1>";

                echo "<table>";
                echo "<tr><th>Data</th> <th>Ilość</th></tr>";
                while ($row = $result -> fetch_assoc())
                {
                    echo '<tr><td>'. $row['Data'] .'</td><td> '. '<b>'. $row['Ilosc']. '</b></td></tr>';
                }
                echo "</table>";
                echo '</div>';

                // Zwycięstwa pojazdów na Grand Race
                $result = $connect -> query("SELECT * FROM zwyciestwa_pojazdy_grand_race");

                echo '<div id="zwyciestwa_pojazd">';
                echo "<h1>Zwycięstwa pojazdów na Grand Race</h1>";

                echo "<table>";
                echo "<tr><th>Marka</th> <th>Model</th> <th>Rocznik</th> <th>Kraj</th> <th>Typ</th> <th>Ilość</th></tr>";
                while ($row = $result -> fetch_assoc())
                {
                    echo '<tr><td>'. $row['Marka'] .'</td><td> '. $row['Model']. '</td><td> '. $row['Rocznik']. '</td><td> '. $row['Kraj']. '</td><td> '. $row['Typ']. '</td><td><b>'. $row['Ilosc']. '</b></td></tr>';
                }
                echo "</table>";
                echo '</div>';

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