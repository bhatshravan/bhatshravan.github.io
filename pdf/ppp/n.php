<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>PDF417 - 2D Barcode generator test</title>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

    <script src="bcmath-min.js" type="text/javascript"></script>
    <script src="pdf417.js" type="text/javascript"></script>        
    <script>  

    window.onload = function() { 
   
        var o=<?php echo(json_encode($_POST['name'])); ?>;

        var s=<?php echo(json_encode($_POST['name'])); ?>;
        var q=<?php echo(json_encode($_POST['addr'])); ?>;
        var l=<?php echo(json_encode($_POST['upsc'])); ?>;
        var m=<?php echo(json_encode($_POST['zippr'])); ?>;
        var n=<?php echo(json_encode($_POST['pin'])); ?>;
        var j=<?php echo(json_encode($_POST['tel'])); ?>;


    /*  var q1="\n ADDRESS:";
        var s1="\n Name:";
        var l1="\n UPSC:";
        var m1="\n Aadhar:";
        var n1="\n PIN:"; 
        
        s=s1.concat(s);
        q=q1.concat(q);
        l=l1.concat(l);
        m=m1.concat(m);
        n=n1.concat(n);            
 */

        var q1=";;";
        var s1="\n Name:";
        var l1="\n UPU:";
        var m1="\n Type:";
        var n1="\n PIN:";  
        var j1="\n Tel:";


        s=q1.concat(s);
        q=q1.concat(q);
        l=q1.concat(l);
        m=q1.concat(m);
        n=q1.concat(n);      
        j=q1.concat(j);     
     
        var fina = s.concat(q,l,m,n,j);
        PDF417.init(fina);    

        var barcode = PDF417.getBarcodeArray();

            // block sizes (width and height) in pixels
            var bw = 2;
            var bh = 2;

            // create canvas element based on number of columns and rows in barcode
            var canvas = document.createElement('canvas');
            canvas.width = bw * barcode['num_cols'];
            canvas.height = bh * barcode['num_rows'];
            document.getElementById('barcode').appendChild(canvas);

            var ctx = canvas.getContext('2d');                    

            // graph barcode elements
            var y = 0;
            // for each row
            for (var r = 0; r < barcode['num_rows']; ++r) {
                var x = 0;
                // for each column
                for (var c = 0; c < barcode['num_cols']; ++c) {
                    if (barcode['bcode'][r][c] == 1) {                        
                        ctx.fillRect(x, y, bw, bh);
                    }
                    x += bw;
                }
                y += bh;
            }            
        }

        </script>



        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <!--body onLoad="window.print()"-->
    <body>
        <center>
            <div class="container">

                <table style="table-layout: fixed; width: 800px;margin-top: 10px;" cellpadding='5' cellspacing='5' border='1'>
                    <tr>
                        <td style='padding:0 0 0 0;' align="center"><div id='barcode'></div></td>
            <td style="word-wrap: break-word" align=center>
   
			
    <?php 
    $DBhost = "localhost";
	$DBuser = "t2";
	$DBpass = "t2";
	$DBname = "post";	
    $yn=$_POST['name'];
    $yt=$_POST['addr'];
    $yu=$_POST['upsc'];
    $yz=$_POST['zippr'];
    $yp=$_POST['pin'];
	$r=rand();
      
	try{	
		$DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
		$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO code (Name, Address,Pin,Upsc,seed) VALUES ('".$yn."','".$yt."','".$yp."','".$yu."','".$r."')";
		 $sql2 = "SELECT TOP 1 FROM code WHERE SEED=".$r;
    // use exec() because no results are returned
    $DBcon->exec($sql);
	/*$stmt = $DBcon->prepare($sql2);
	$stmt->execute();
	  */   
                   $yn=$_POST['name'];
                   $yt=$_POST['addr'];
                   $yu=$_POST['upsc'];
                   $yz=$_POST['zippr'];
                   $yp=$_POST['pin'];
                   $yj=$_POST['tel'];

				   
				 /*  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
						$r=$row['UID'];  }
	*/
                   echo ("   Name:".$yn."<br>   Address:".$yt."<br>   UPU:".$yu."<br>  Type: ".$yz."<br>   PIN:".$yp."<br> Tel:".$yj);/*./"Code:".$r);*/
                   
				   
				     }
    catch(PDOException $e)
    {
    echo "Problem while updating to database.";
	die($e->getMessage());
    }
       $DBcon = null;
  
				   ?></td></tr><tr><td colspan="2"><br/><br/><br/></tr></td></table>

       </div>
   <script type="text/javascript">
<!--
window.print();
//-->
</script>
</body>
</html>
