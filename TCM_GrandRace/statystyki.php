<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <link rel="shortcut icon" href="Zdjecia/favicon.png">
    <title>Statystyki</title>
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
            <h1>Statystyki</h1>
            <a href="#podium" class="linki">Ilość podium</a> <a href="#zwyciestwa" class="linki">Ilość zwycięstw</a> <a href="#zwyciestwa_miesiac_rok" class="linki">Ilość zwycięstw w danym miesiącu roku</a>
            <a href="#zwyciestwa_miesiac" class="linki">Ilość zwycięstw w danym miesiącu</a> <a href="#zwyciestwa_rok" class="linki">Ilość zwycięstw w danym roku</a> <a href="#summit_pozycja" class="linki">Średnia pozycja w Summit</a>
            <?php
                require_once "connect.php";

                $connect = new mysqli($serwer, $user, $haslo, $baza);

                // Ilość podium
                $result = $connect -> query("SELECT * FROM ilosc_podium;");

                echo '<h2 id="podium">Ilość podium dla pojazdu</h2>';
                
                echo '<table id="listaPojazdow">';
                echo "<tr><th>Marka</th> <th>Model</th> <th>Rocznik</th> <th>Typ</th> <th>Ilość</th> </tr>";
                while ($row = $result -> fetch_assoc())
                {
                    echo '<tr><td>'. $row['Marka'] .'</td><td>'. $row['Model']. '</td><td>'. $row['Rocznik']. '</td><td>'. $row['Typ']. '</td><td><b>'. $row['Ilość']. '</b></td></tr>';
                }
                echo "</table>";

                // Ilość zwycięstw
                $result = $connect -> query("SELECT * FROM ilosc_zwyciestw;");

                while ($row = $result -> fetch_assoc())
                {
                    echo '<h2 id="zwyciestwa">Ilość zwycięstw: '. $row['Ilość']. '</h2>';
                }

                // Ilość zwycięstw w danym miesiącu roku
                $result = $connect -> query("SELECT * FROM zwyciestwa_miesiac_rok;");

                echo '<h2 id="zwyciestwa_miesiac_rok">Ilość zwycięstw w każdym miesiącu roku</h2>';

                echo '<table id="listaPojazdow">';
                echo "<tr><th>Miesiąc</th> <th>Rok</th> <th>Ilość</th></tr>";
                while ($row = $result -> fetch_assoc())
                {
                    echo '<tr><td>'. $row['Miesiąc'] .'</td><td>'. $row['Rok']. '</td><td><b>'. $row['Zwycięstwa']. '</b></td></tr>';
                }
                echo "</table>";

                // Ilość zwycięstw w danym miesiącu
                $result = $connect -> query("SELECT * FROM zwyciestwa_miesiac;");

                echo '<h2 id="zwyciestwa_miesiac">Ilość zwycięstw w każdym miesiącu</h2>';

                echo '<table id="listaPojazdow">';
                echo "<tr><th>Miesiąc</th> <th>Ilość</th></tr>";
                while ($row = $result -> fetch_assoc())
                {
                    echo '<tr><td>'. $row['Miesiąc'] .'</td><td><b>'. $row['Zwycięstwa']. '</b></td></tr>';
                }
                echo "</table>";

                // Ilość zwycięstw w danym roku
                $result = $connect -> query("SELECT * FROM zwyciestwa_rok;");

                echo '<h2 id="zwyciestwa_rok">Ilość zwycięstw w każdym roku</h2>';

                echo '<table id="listaPojazdow">';
                echo "<tr><th>Rok</th> <th>Ilość</th></tr>";
                while ($row = $result -> fetch_assoc())
                {
                    echo '<tr><td>'. $row['Rok'] .'</td><td><b>'. $row['Zwycięstwa']. '</b></td></tr>';
                }
                echo "</table>";
                
                // Średnia pozycja w miesiącu Summit
                $result = $connect -> query("SELECT * FROM summit_srednia_pozycja;");

                echo '<h2 id="summit_pozycja">Średnia pozycja w Summit w miesiącu</h2>';

                echo '<table id="listaPojazdow">';
                echo "<tr><th>Miesiąc</th> <th>Rok</th> <th>Średnia Pozycja</th></tr>";
                while ($row = $result -> fetch_assoc())
                {
                    echo '<tr><td>'. $row['Miesiąc'] .'</td><td>'. $row['Rok'] .'</td><td><b>'. $row['Średnia_Pozycja']. '</b></td></tr>';
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