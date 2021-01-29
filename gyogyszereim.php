<?php
require_once('config/init.php');



printHTML('html/header.html');
printMenu();
printHTML('html/gyogyszereim.html');


$limit = 10;

	if (isset($_POST['page_no'])) {
	    $page_no = $_POST['page_no'];
	}else{
	    $page_no = 1;
	}

	$offset = ($page_no-1) * $limit;
        //TODO: állítsd át a 22-t user id re.
	$query = "SELECT * FROM debtphtopa WHERE to_pa_id = 22 LIMIT $offset, $limit";

	$result = mysqli_query($con, $query);

	$output = "";

	if (mysqli_num_rows($result) > 0) {

	$output.="<table class='table'>
		    <thead>
		        <tr>
    	          	   <th>Gyógyszer neve</th>
			   <th>Patika neve</th>
			   <th>Mennyiség</th>
	                 </tr>
		    </thead>
	         <tbody>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            
                $sql = "SELECT OEP_NEV, OEP_KSZ FROM gyogysz WHERE OEP_TTT = " . $row['OEP_TTT'];
                $stmt = $con -> prepare($sql);
                $stmt -> execute();
                $stmt -> store_result();
                $stmt -> bind_result($OEP_NEV, $OEP_KSZ);
                $stmt -> fetch();
                
                $sql = "SELECT name FROM pharmacies WHERE id =" .  $row['from_ph_id'];
                $stmt = $con -> prepare($sql);
                $stmt -> execute();
                $stmt -> store_result();
                $stmt -> bind_result($pharmacy_name);
                $stmt -> fetch();
                $gyogysz = $OEP_NEV .' ' . $OEP_KSZ;
                        //TODO: a 0-t íírd át 1 re

                if ($row['exist'] == 0 || $row['exist'] == 2) {
                $output.="<tr>
                    <td>$gyogysz</td>
	            <td>$pharmacy_name</td>
	            <td>{$row['amount']}</td>

		 </tr>";
            }
	
	} 
	$output.="</tbody>
		</table>";

	$sql = "SELECT * FROM debtphtopa";

	$records = mysqli_query($con, $sql);

	$totalRecords = mysqli_num_rows($records);

	$totalPage = ceil($totalRecords/$limit);

	$output.="<ul class='pagination justify-content-center' style='margin:20px 0'>";

	for ($i=1; $i <= $totalPage ; $i++) { 
	   if ($i == $page_no) {
		$active = "active";
	   }else{
		$active = "";
	   }
        $output.="<li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>";
	}

	$output .= "</ul>";

	echo $output;
        }
printHTML('html/footer.html');
$con -> close();
?>