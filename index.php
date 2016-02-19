
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
	$val=9;
	for($i=$val;$i<10;$i++){
	 $tsql1 = "insert into [dbo].nowfloats (FPTag ,IP ,RequestHeader ,RequestType ,City ,State ,Country,CreatedOn ,URL ) values  ('RENTORENT','66.249.71.13','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','NULL', 'Coldwater','NULL','United States',GETDATE()".$i.",'NULL');";
        $stmt1 = sqlsrv_query($conn, $tsql1);
	}


}
    catch(Exception $e)
    {
        echo("Error!");
    }

/*

  try
    {
//        $tsql = "SELECT CONVERT(date, CreatedOn) as CreatedOn FROM dbo.nowfloats";
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
            
//            echo("<br/>");
            //echo($row['CreatedOn']);
            $productCount++;
        }
        sqlsrv_free_stmt($getProducts);
        sqlsrv_close($conn);
    }  catch(Exception $e)
    {
        echo("Error!");
    }
    */
    
    
  try
    {
//        $tsql = "SELECT * FROM dbo.nowfloats where CreatedOn < DATEADD(day, -105, GETDATE());";
        $tsql = "SELECT top 1000 * FROM dbo.nowfloats where CreatedOn < DATEADD(WEEK, -15, GETDATE()) order by ID asc;";
		 
        $getProducts = sqlsrv_query($conn, $tsql);
        if ($getProducts == FALSE)
            die(FormatErrors(sqlsrv_errors()));
        $productCount = 0;
	    $tsql2 = "insert into [dbo].nowfloatsarchive (FPTag ,IP ,RequestHeader ,RequestType ,City ,State ,Country,CreatedOn ,URL) values ";
	while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
        {
            /*
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
			*/
			$rowFPTag		 = $row['FPTag'];                                
			$rowIP			 = $row['IP'];                                   
			$rowRequestHeader	 = $row['RequestHeader'];                        
			$rowRequestType		 = $row['RequestType'];                          
			$rowCity		 = $row['City'];                                 
			$rowState		 = $row['State'];                                
			$rowCountry		 = $row['Country'];                              
			$rowCreatedOn		 = $row['CreatedOn']->format('Y-m-d H:i:s');     
			$rowURL			 = $row['URL'];                                  
			//$rowID			 = $row['ID'];                                   
			                                                   
           // echo("<br/>");
            $productCount++;
		$tsql2 .= "('".$rowFPTag."','".$rowIP."','".$rowRequestHeader."','".$rowRequestType."', '".$rowCity."','".$rowState."','".$rowCountry."','".$rowCreatedOn."','".$rowURL."'),";

        }
		$tsql2 = rtrim($tsql2, ',');
	//	echo $tsql2;
        sqlsrv_free_stmt($getProducts);
        //sqlsrv_close($conn);
    }  catch(Exception $e)
    {
        echo("Error!");
    }

	?>



<?php

/// Connection 2 
 try
    {
        $serverName = "tcp:v1d1b1wc97.database.windows.net,1433";
        $connectionOptions = array("Database"=>"nowfloatsarchive",
            "Uid"=>"palsadmn", "PWD"=>"P@ls2015");
        $conn2 = sqlsrv_connect($serverName, $connectionOptions);
        if($conn2 == false)
            die(FormatErrors(sqlsrv_errors()));
			
    }
    catch(Exception $e)
    {
        echo("Error!");
    }

try{
/*
	$val=-1000;
	for($i=$val;$i<1000;$i++){
	 $tsql1 = "insert into [dbo].nowfloatsarchive (FPTag ,IP ,RequestHeader ,RequestType ,City ,State ,Country,CreatedOn ,URL ) values  ('RENTORENT','66.249.71.13','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','NULL', 'Coldwater','NULL','United States',GETDATE()".$i.",'NULL');";
        $stmt1 = sqlsrv_query($conn, $tsql2);
	}
*/
	 //$tsql2 = "SET IDENTITY_INSERT [dbo].nowfloatsarchive ON; insert into [dbo].nowfloatsarchive (FPTag ,IP ,RequestHeader ,RequestType ,City ,State ,Country,CreatedOn ,URL ) values  ('RENTORENT','66.249.71.13','Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','NULL', 'Coldwater','NULL','United States',GETDATE(),'NULL');";
$stmt1 = sqlsrv_query($conn2, $tsql2);
if($stmt1){ echo "Success"; } else { echo $stmt1." Error";}
echo "Hello";
}
    catch(Exception $e)
    {
        echo("Error!");
    }

	?>
	<?php

	$tsqldelete2 = ";WITH CTE AS ( SELECT TOP 1000 * FROM [dbo].nowfloats ORDER BY ID ) DELETE FROM CTE";
	$stmtdelete = sqlsrv_query($conn, $tsqldelete2);
	sqlsrv_free_stmt($stmt1);
	sqlsrv_free_stmt($stmtdelete);

        sqlsrv_close($conn);
        sqlsrv_close($conn2);


?>