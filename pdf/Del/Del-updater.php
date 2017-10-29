<html>
    <head><title>Delivery updater</title></head>
    <body>
          <?php
     $DBhost = "localhost";
	$DBuser = "t2";
	$DBpass = "t2";
	$DBname = "post";	
  
 
	try{	
            if (isset($_GET['id']))
             {
             $yn=$_GET['id'];
            if(isset($_GET['error']))
                 {
                     $ye=$_GET['error'];
                     if($ye=="Delivered"||$ye=="yes"||$ye=="YES"||$ye=="Yes"||$ye=="yES"||$ye=="YeS")
                     {
                         $ye="NULL";
                     }
                    echo ("<br/>Please wait while updating to server<br/>");
                    try{
                    	$DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
	                	$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	                    $sql = "UPDATE del set delivered='".$ye."' where id='".$yn."'";
		                $DBcon->exec($sql);
                    }
                    catch(PDOException $e)
                    {
                        //	die($e->getMessage());
                        echo("Problem updating to server");
                    }
                        echo("UPDATED SUCCESFULLY");
                }
                else
                {
                    echo("ERROR-NO VALUE GIVEN");
                }

             }
             else
             {
                  echo ("ERROR - NO ID GIVEN");
             }
             }
    catch(PDOException $e)
     {
    echo "Problem while updating to database.";
	die($e->getMessage());
    }
       $DBcon = null;
            ?>
     </body>
</html>
       