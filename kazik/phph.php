<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sklep dla uczniow</title>
    <link rel="stylesheet" href="styl.css">
    
<?php
$haslo = "";
$conn = new mysqli("localhost", "root", $haslo, "sklep");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
$sql = "select * from towary";
$result = $conn->query($sql);
$alfabet = array("a", "b", "c", "d", "e");
$a = 0;

// Sprawdzenie, czy formularz został przesłany
$wybranyProdukt = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $wybranyProdukt = $_POST['cars']; // Odbieramy dane z formularza
}
?>
    
</head>
<body>
    <div id="container">
        <div id="top">
            t
        </div>
        <div id="mid">
             <div id="left">
                    <h2>Taniej o 30%</h2><br>
                    <div id="essa">
                    <?php
                    while($row = $result -> fetch_assoc()){
                        if($row["promocja"] == 1){
                            echo $alfabet[$a].'. '.$row["nazwa"]."<br>";
                            $a++;
                        }
                    }
                    ?>
                    </div>
                </div>
             <div id="srodek">
                    <h2>Sprawdz cene</h2>
                    
                    <!-- Formularz, który przesyła dane za pomocą metody POST -->
                    <form method="POST" action="">
                        <select name="cars" id="cars">
                            <option value="Gumka">Gumka do mazania</option>
                            <option value="Cienkopis">Cienkopis</option>
                            <option value="Pisaki">Pisaki 60szt</option>
                            <option value="Markery">Markery 4szt</option>
                        </select>
                        <input id="btn" type="submit" value="przycisk">
                    </form>
                    
                    <div id="wynik">
                        <!-- Wynik wyświetli się tutaj po przesłaniu formularza -->
                        <?php
                        if ($wybranyProdukt == "Gumka") {
                            $zp = "select cena from towary where id = '7'";
                        }
                        else if($wybranyProdukt == "Cienkopis") {
                            $zp = "select cena from towary where id = '8'";
                        }
                        else if($wybranyProdukt == "Pisaki") {
                            $zp = "select cena from towary where id = '9'";
                        }
                        else if($wybranyProdukt == "Markery") {
                            $zp = "select cena from towary where id = '10'";
                        }
                        $ss = mysqli_query($conn , $zp);
                        $row = mysqli_fetch_assoc($ss);
                        $cena = $row['cena'];
                        $cenapromocja = $cena * 0.7;
                        echo "cena regularna: $cena <br>";
                        echo "cena w promocji 30%: $cenapromocja";
                        ?>
                    </div>
             </div>
             <div id="right">
                    <h2>Kontakt</h2><br>
                    e-mail: <a href="mailto:bok@sklep.pl">bok@sklep.pl</a><br><br>
                    <div id="zdjecie"><img id="zdj" src="promocja.png" alt="Promocja"></div>
             </div>
        </div>
        <div id="bot">
            a
        </div>
    </div>
</body>
</html>
