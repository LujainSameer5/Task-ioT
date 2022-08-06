<html>
<head>
    <style>
        body{
            background-color: navajowhite;
            color: whitesmoke;
            text-align: center;
        }
        h1{
            margin-top: 7%;

        }
        p{
            text-align: center;
            margin-top: 15em;
            
        }
        table {
            margin-top: 5em;
            margin-left: 50em;
        }
    </style>
</head>
<body>

<h1>(THE RESULTS IN DATABASE)</h1>
    

<form action="sensors.php" method="GET">
            <p> Enter the valus of sensor: </p>
            <input type="number" id="value" name="value"> 
            </br>
            </br>
            <input type="submit" id="submit" value="submit" name="submit">
            </form>
    
    <?php

// Address error handling.
//ini_set ('display_errors', 1);
//error_reporting (E_ALL & ~E_NOTICE);


$SERVER ="localhost";
$username="root";
$password="135791";
$dbname="sensor";

$dbc=mysqli_connect($SERVER,$username,$password,$dbname);

/*
if ($dbc = mysqli_connect ($SERVER, $username, $password)){
    print '<p>Successfully connected to MySQL.</p>';
    }
    else {
    die ('could not connect because:' . mysqli_error($conn));
    }
*/
if(empty($_GET['value']))
{
    echo "please enter vaule again <br>";
}
else
{
    if (isset ($_GET['submit'])) {
    $value=$_GET['value'];
    echo "<p>" , " The value you entered :" . $_GET['value'], '<br /></p>';
}}

/*
    
// then create the sensor table.
$query = 'CREATE TABLE IF NOT EXISTS sensor(
     valuee INT UNSIGNED NOT NULL)';
    
*/

// the table with the above value of sensors then add a more records.
$query= "insert into sensor values($value)" ; 

$run=mysqli_query($dbc,$query);

//message
echo "<h3>" , "Values of all sensors in the Database", '<br /></h3>';

$sql = "SELECT * FROM sensor";
$result =  mysqli_query($dbc, $sql);

echo "<table border='1'>";

//to store a value of senseor in database.
while ($row = mysqli_fetch_assoc($result)) { 
    echo "<tr>";

    foreach ($row as $field => $value) { 
        echo "<td>" . $value . "</td>"; 
    }
    echo "</tr>";
}
echo "</table>";

    ?>


</body>
</html>