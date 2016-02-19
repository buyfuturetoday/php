
<?php
// connection 1
 
 try
    {
        $serverName = "tcp:nowfloatsdemo.database.windows.net,1433";
        $connectionOptions = array("Database"=>"helloone",
            "Uid"=>"palsadmn", "PWD"=>"P@ls2015");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die(FormatErrors(sqlsrv_errors()));
			
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
/*
/// Connection 2 
 try
    {
        $serverName = "tcp:v1d1b1wc97.database.windows.net,1433";
        $connectionOptions = array("Database"=>"nowfloatsarchive",
            "Uid"=>"palsadmn", "PWD"=>"P@ls2015");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die(FormatErrors(sqlsrv_errors()));
			
    }
    catch(Exception $e)
    {
        echo("Error!");
    }
*/
try{
	$val=-1000;
	for($i=$val;$i<1000;$i++){
	 $tsql1 = "insert into [dbo].nowfloats (FPTag ,IP ,RequestHeader ,RequestType ,City ,State ,Country,CreatedOn ,URL ) values  ('RENTORENT','66.249.71.13','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','NULL', 'Coldwater','NULL','United States',GETDATE()".$i.",'NULL');";
        $stmt1 = sqlsrv_query($conn, $tsql1);
	}

}
    catch(Exception $e)
    {
        echo("Error!");
    }

  try
    {
        $tsql = "SELECT * FROM dbo.nowfloats";
        $getProducts = sqlsrv_query($conn, $tsql);
        if ($getProducts == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        $productCount = 0;
        while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
        {
            echo($row['FPTag']);
            echo($row['IP']);
            echo($row['RequestHeader']);
            echo($row['RequestType']);
            echo($row['City']);
            echo($row['State']);
            echo($row['Country']);
            echo($row['CreatedOn']->format('Y-m-d H:i:s'));
            echo($row['URL']);
            echo($row['ID']);
            echo("<br/>");
            $productCount++;
        }
        sqlsrv_free_stmt($getProducts);
        sqlsrv_close($conn);
    }  catch(Exception $e)
    {
        echo("Error!");
    }
	?>