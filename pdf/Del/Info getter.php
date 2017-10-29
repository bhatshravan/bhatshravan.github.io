<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>PDF417 - 2D Barcode generator test</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
<center>

    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                    <a class="navbar-brand" href="#">BITHACKERS</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="index.html">Home</a></li>
                        <li class=""><a href="info null.php">Info null</a></li>
                        <li class=""><a href="del-updater.html">Updater</a></li>
                        <li class=""><a href="delivery.html">Delivery</a></li>
                        <li class=""><a href="info getter.php">Getter</a></li>  
                    </ul>
               </div>
            </div>
        </nav>




        <?php
    require_once 'dbconfig.php';
try{
$query = "SELECT * FROM del where delivered IS NOT NULL";

$stmt = $DBcon->prepare($query);
$stmt->execute();
$tim= time();

$userData = array();

echo "<table class='table table-bordered table-responsive table-striped' 
    style='box-shadow:inset 1px -1px 1px #444, inset -1px 1px 1px #444;'><thead><tr><th>ID</th><th>IN. Ph</th><th>FROM</th><th>TO</th><th>Delivery</th></tr></thead><tbody>";

while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{

echo "<thread><tr>";    
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td>" . $row['pfrom'] . "</td>";
echo "<td>" . $row['pto'] . "</td>";
echo "<td>" . $row['delivered'] . "</td>";
echo "</tr></thread>";
}
echo "</tbody></table>";}
catch(PDOException $e)
    {
echo "Problem while updating to database.";
}
    $DBcon = null;
?>
    </div>
</center>
</body>

</html>