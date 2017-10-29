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
                            <li class=""><a href="reader.html">Postcode reader</a></li>
                            <li class=""><a href="/ppp/b2.html">Generator</a></li>
                            <li class="active"><a href="log.php">Logs</a></li>
                     
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>




            <?php
		require_once 'dbconfig.php';
    	$r=$_POST['name'];
	 $DBhost = "localhost";
	$DBuser = "t2";
	$DBpass = "t2";
	$DBname = "post";	
    echo ($r);
    echo("YO");
   	
    ?>
	$query = "SELECT * FROM code where UID=".$r;
	
	$stmt = $DBcon->prepare($query);
	$stmt->execute();
	$tim= time();

	$userData = array();
	
	echo "<table class='table table-bordered table-responsive table-striped' 
	 style='box-shadow:inset 1px -1px 1px #444, inset -1px 1px 1px #444;'><thead><tr><th>ID</th><th>NAME</th><th>Address</th><th>PIN</th></tr></thead><tbody>";
	
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
	
	echo "<thread><tr>";    
	echo "<td>" . $row['UID'] . "</td>";
	echo "<td>" . $row['Name'] . "</td>";
	echo "<td>" . $row['Address'] . "</td>";
	echo "<td>" . $row['Pin'] . "</td>";
	echo "</tr></thread>";
	}
	echo "</tbody></table>";
	?>
        </div>
    </center>
</body>

</html>