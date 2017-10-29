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

        console.log(<?php echo(json_encode($_POST['uid'])); ?>);
        var uid = <?php echo(json_encode($_POST['uid'])); ?>;
        var nameid = <?php echo(json_encode($_POST['name'])); ?>;
        var fid = <?php echo(json_encode($_POST['from'])); ?>;
        var tid = <?php echo(json_encode($_POST['to'])); ?>;
        var tranid = <?php echo(json_encode($_POST['tm'])); ?>;
        var daid = <?php echo(json_encode($_POST['da'])); ?>;
        var dlid = <?php echo(json_encode($_POST['dl'])); ?>;

        var s = nameid.value;
        var q = uid.value;
        var l = fid.value;
        var m = tid.value;
        var n = tranid.value;
        var o = daid.value;
        var p = dlid.value;

        console.log(s, q, l, m, n, o, p);
        console.log(uid,nameid,fid,tid,tranid,daid,dlid);

        var q1 = ";;"; 
        var o1 = "\n UID:";
        var s1 = "\n Delivery Name:";
        var l1 = "\n From:";
        var m1 = "\n To:";
        var n1 = "\n Method:";

        xx = "ud"; 
        s = q1.concat(s);
        q = q1.concat(q);
        l = q1.concat(l);
        m = q1.concat(m);
        n = q1.concat(n);
        o = q1.concat(o);
        p = q1.concat(p);

        s = q1.concat(uid);
        q = q1.concat(nameid);
        l = q1.concat(fid);
        m = q1.concat(tid);
        n = q1.concat(tranid);
        o = q1.concat(daid);
        p = q1.concat(dlid);

        

        var fina = xx.concat(s, q, l, m, n,o,p);
        console.log(fina);
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


$yid=$_POST['uid'];	
$ytin=$_POST['name'];
$yfrom=$_POST['from'];
$yto=$_POST['to'];
$ytrmet=$_POST['tm'];
$ydl=$_POST['dl'];
$yda=$_POST['da'];
$r=rand();
    
try{	
    $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
    $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO del (id,phone,seed,DA,DL,method,pfrom,pto,delivered) VALUES ('".$yid."','".$ytin."','".$r."','".$yda."','".$ydl."','".$ytrmet."','".$yfrom."','".$yto."','On the way')";
    $DBcon->exec($sql);
    
    
                echo ("UID:".$yid."<br>  Name:".$ytin."<br>   From:".$yfrom."<br>   TO:".$yto."<br>  Transport method: ".$ytrmet."<br>   Date leaving:".$ydl."<br> Date arrving:".$yda);
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
