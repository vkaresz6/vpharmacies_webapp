<?php
require_once('config/init.php');



printHTML('html/header.html');
printMenu();

$limit = 1;

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
		           <th>Id</th>
    	          	   <th>TTT</th>
                           <th>actor</th>
			   <th>from</th>
			   <th>to</th>
			   <th>Amount</th>
                           <th>exist</th>
	                 </tr>
		    </thead>
	         <tbody>";
        while ($row = mysqli_fetch_assoc($result)) {

	$output.="<tr>
	            <td>{$row['id']}</td>
                    <td>{$row['OEP_TTT']}</td>
	            <td>{$row['actor_id']}</td>
	            <td>{$row['from_ph_id']}</td>
	            <td>{$row['to_pa_id']}</td>
	            <td>{$row['amount']}</td>
                    <td>{$row['exist']}</td>

		 </tr>";
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
printHTML('html/gyogyszereim.html');
$con -> close();
?>