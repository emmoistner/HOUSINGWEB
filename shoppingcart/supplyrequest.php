<?php 
session_start();
include('../connect-db.php');

	$sessionID = session_id();
	$userID = $_SESSION['id'];
	$howMany=$_POST['howMany'];
	$check = array();
	$activeCart = false;
	$infoSessionId = mysql_query("select sessionid as sessionid from orderInfo;") or die(mysql_error());
	while($result = mysql_fetch_assoc($infoSessionId)){
		
		if ($sessionID == $result['sessionid']){
			$activeCart = true;
			break;
		}
		
	}
	
	
for ($i=0; $i<=$howMany-1; $i++)
		{
			$check[$i] = $_POST['item'.$i];
			
		}
	
	$supplies = array();
	for ($i=0; $i<=$howMany-1; $i++)
		{
			$id = $_POST['item'.$i];
			$quantity = $_POST[$check[$i]];
			if ($quantity > 0)
			{
			$supplies = array_push_assoc($supplies, $id, $quantity);
			}
		}
		
function array_push_assoc($array, $key, $value){
	$array[$key] = $value;
	return $array;
}

/*$cartID = mysql_query("select max(cartid) as cartid from orderInfo;") or die(mysql_error()); 
$result = mysql_fetch_assoc($cartID);
$cartID = $result['cartid'];
$cartID = $cartID + 1;*/

		$counter = 0;
		$finalValue;
foreach($supplies as $id => $quantity) {
	
	
	
	$supplyList=mysql_query("select ItemID, name from Supply where ItemID='$id';") or die (mysql_error()); 
while($row_list=mysql_fetch_assoc($supplyList)) {
	$itemName = $row_list['name'];
}
	
	$values[] = "( '".$sessionID."' , '"  .$id. "', '" .$itemName. "', " .$quantity. " )";
	$counter = $counter + 1;
	
}


if ($counter == 1){

	if($activeCart == false){
	$infoSQL = "insert into orderInfo (userid, sessionid, submitDate)
	values('$userID', '$sessionID', now());";
	$resultInfo = mysql_query($infoSQL) or die(mysql_error());
	}
	$trackSQL = "insert into orderTrack (sessionId, itemId, itemName, quantity)
	values $values[0];";
	
	
 	$resultTrack = mysql_query($trackSQL) or die (mysql_error());
		
		
		
	header("location:shoppingcart4.php");
	
}


if ($counter > 1) {
	
	if($activeCart == false){
	$infoSQL = "insert into orderInfo (userid, sessionid, submitDate)
	values('$userID', '$sessionID', now());";
	$resultInfo = mysql_query($infoSQL) or die(mysql_error());
	}
	
	$trackSQL = "insert into orderTrack (sessionId, itemId, itemName, quantity)
	values";
	$i=0;
	while ($i <= $counter-2){
	
	$trackSQL = $trackSQL .$values[$i]. ", ";
	 $i = $i + 1;
	}
	
	$trackSQL = $trackSQL .$values[$i]. ";";
	
	
	$resultTrack = mysql_query($trackSQL) or die (mysql_error());
		
		
	header("location:shoppingcart4.php");
	

}

$dropSQL = "delete from orderTrack where quantity = 0;";
$resultDrop = mysql_query($dropSQL) or die (mysql_error());

?>