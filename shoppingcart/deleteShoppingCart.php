<?php 
session_start();
include('../connect-db.php');
$howMany = $_POST['howMany'];
$sessionID = session_id();
$userID = $_SESSION['id'];
$check = array();
for ($i=0; $i<=$howMany-1; $i++)
		{
			$item = $_POST['item'.$i];
			echo $item;
			$check[$i] = $item;
			
		}

for ($i=0; $i<=$howMany-1; $i++)
		{
			$id = $_POST['item'.$i];
			if (isset($_POST['delete'.$check[$i]]))
			{
				$quantity = 0;
				$supplies = array_push_assoc($supplies, $id, $quantity);
			}
			
		}
		
function array_push_assoc($array, $key, $value){
$array[$key] = $value;
return $array;
}

		$counter = 0;
		$finalValue;
foreach($supplies as $id => $quantity) {
	
	$supplyList=mysql_query("select ItemID, name from Supply where ItemID='$id';") or die (mysql_error()); 
while($row_list=mysql_fetch_assoc($supplyList)) {
	$itemName = $row_list['name'];
}
	
	$values[] = " sessionId = '".$sessionID."' , itemId = '"  .$id. "', quantity = " .$quantity;
	$where[] = " sessionId = '".$sessionID."' and itemId = '" .$id. "' ";
	$counter++;
	
}

for($i=0; $i<$counter; $i++)
{

	$sql[$i] = "update orderTrack set " .$values[$i]." where ".$where[$i]; 
	echo $sql[$i];
	
}

for($i=0; $i<$counter; $i++)
{

$updateResult[$i] = mysql_query($sql[$i]) or die (mysql_error());

}

header("location:shoppingcart4.php");

$dropSQL = "delete from orderTrack where quantity = 0;";
$resultDrop = mysql_query($dropSQL) or die (mysql_error());

	

?>