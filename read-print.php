<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uutta kotia etsivät lemmikit</title>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
                ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>
<body>
    
    <?php include("settings.php"); 

   //paljon testailua ja koodinpätkiä
   
   $sql = "SELECT * FROM elain;";
    // $sql = "SELECT * FROM elain;";
    // echo $sql;
    // WHERE ikaluokka > ?

    // prepare
    $stmt = $pdo -> prepare($sql);
/*
    // alternative 1
    // bind
    $stmt -> bindParam(1,$ikaluokka,PDO::PARAM_INT);
    $hinta = $_GET['h'];
   
*/
    //alternative 2
    // $ikaluokka = $_GET['ikaluokka'];
    // $stmt -> execute([$ikaluokka]);

    // execute
     $stmt -> execute();
    // Haetaan kaikki rivit
    $rivit = $stmt -> fetchAll();

    //if ($fetch['laji'] = 'kissa')
    //{
    // echo "<td><input type='radio' name='laji' value='koira' id='laji' checked> Koira <input type='radio' name='laji' value='kissa' id='laji'> Kissa </td>";
    // }
    //else
    //{
    //echo "<td><input type='radio' name='sex' value='male' id='sex'> Male <input type='radio' name='sex' value='female' id='sex' checked> Female </td>";
    // }

    echo '
    <table border="1">
        <tr>
            <th>Nimi</th>
            <th>Laji</th>
            <th>Ikä</th>
        </tr>
    ';

    foreach ($rivit as $rivi)
    {
        echo '<tr>';
            echo '<td>' . $rivi['nimi'] . '</td>';
            echo '<td>' . $rivi['laji'] . '</td>';
            echo '<td>' . $rivi['ikaluokka'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';

    // suljetaan yhteys
    $pdo -> connection = null; 

    ?>

</body>
</html>
