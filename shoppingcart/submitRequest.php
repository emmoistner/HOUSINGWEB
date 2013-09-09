<?php 
session_start();
include('../connect-db.php');
$howMany = $_POST['howMany'];
$sessionID = session_id();
$userID = $_SESSION['id'];
$lab = $_POST['lab'];


$check = array();
for ($i=0; $i<=$howMany-1; $i++)
		{
			$item = $_POST['item'.$i];
			$check[$i] = $item;
			
		}
		
$list=mysql_query("select itemID, Quantity from Supply order by ItemID asc;");
	$suppliesAvailable = array();
	while ($row_list=mysql_fetch_assoc($list)){
		$supplyId = $row_list['itemID'];
		$supplyQuantity = $row_list['Quantity'];
		$suppliesAvailable = array_push_assoc($suppliesAvailable, $supplyId, $supplyQuantity);
		
		
	}
		
	$supplies = array();
	for ($i=0; $i<=$howMany-1; $i++)
		{
			$id = $_POST['item'.$i];
			$quantity = $_POST[$check[$i]];		
			$supplies = array_push_assoc($supplies, $id, $quantity);
		}
		
		
		$presentValue = 0;
		$finalValue;
		$suppliesAvailableId = array();
		$suppliesAvailableQuantity = array();
foreach($supplies as $id => $quantity) {



$list=mysql_query("select itemID, Quantity from Supply where ItemID='$id';");

	while ($row_list=mysql_fetch_assoc($list)){
		$supplyId = $row_list['itemID'];
		$supplyQuantity = $row_list['Quantity'];
		
		if ($id == $supplyId){
			
			$updatedQuantity = $supplyQuantity - $quantity;
			$suppliesAvailableId[$presentValue] = $supplyId;
			if($updatedQuantity < 0){
				
				header("location:shoppingcart4.php");
			}
			else{
			$suppliesAvailableQuantity[$presentValue] = $updatedQuantity; 
			$presentValue++;
			}
		}
	}
}
function array_push_assoc($array, $key, $value){
	$array[$key] = $value;
	return $array;
}



	$counter = 0;
	for ($i=0; $i < $presentValue; $i++) {
	$supplyId = $suppliesAvailableId[$i];
	$supplyQuantity = $suppliesAvailableQuantity[$i];


	echo $supplyId;
	$supplyUpdate[$i] = "quantity = " .$supplyQuantity;
	$supplyWhere[$i] = " itemId = '" .$supplyId. "' ";
	$counter++;
}
	
for($i=0; $i<$presentValue; $i++)
{

	$supplyUpdateSql[$i] = "update Supply set " .$supplyUpdate[$i]." where ".$supplyWhere[$i]."; "; 
	echo $supplyUpdateSql[$i];
	
	$resultSupplyUpdate = mysql_query($supplyUpdateSql[$i]) or die (mysql_error());	
}


//This block of Code cleans the shopping cart out ||Shopping_Cart_Clear||
		$counter = 0;
		$finalValue;
foreach($supplies as $id => $quantity) {
	
	$supplyList=mysql_query("select ItemID, name from Supply where ItemID='$id';") or die (mysql_error()); 
while($row_list=mysql_fetch_assoc($supplyList)) {
	$itemName = $row_list['name'];
}
	$quantity = 0;
	$values[] = " sessionId = '".$sessionID."' , itemId = '"  .$id. "', quantity = " .$quantity;
	$where[] = " sessionId = '".$sessionID."' and itemId = '" .$id. "' ";
	$counter++;
	
}

for($i=0; $i<$counter; $i++)
{

	$clearCartSql[$i] = "update orderTrack set " .$values[$i]." where ".$where[$i]. ";" ; 
	$resultDropItem = mysql_query($clearCartSql[$i]) or die (mysql_error());
	
}
$dropInfoSql = "delete from orderInfo where sessionid = '" .$sessionID. "';";
$dropSql = "delete from orderTrack where quantity = 0;";
$resultDrop = mysql_query($dropSql) or die (mysql_error());

$resultDropInfo = mysql_query($dropInfoSql) or die (mysql_error());

// End ||Shopping_Cart_Clear||


/*
		$counter = 0;
		$finalValue;
foreach($supplies as $id => $quantity) {
	
	
	
	$supplyList=mysql_query("select ItemID, name from Supply where ItemID='$id';") or die (mysql_error()); 
while($row_list=mysql_fetch_assoc($supplyList)) {
	$itemName = $row_list['name'];
}
	
	$suppliesItemsT[] = "( " .$id. ", " .$quantity. " )";
	$counter = $counter + 1;
	
}

*/


if ($presentValue == 1){

	
	$insertTransactionsSql = " insert into transactions (requesteeID, requestID, requestDate) values ( 18,'$userID', now());";
	
	$resultTransactions = mysql_query($insertTransactionsSql) or die(mysql_error());
	
		
	$sql=mysql_query("SELECT MAX(transactionID) AS transactionId FROM transactions WHERE requestid ='$userID'");
	$result=mysql_fetch_assoc($sql);
	$transactionid = $result['transactionId'];
	
			$counter = 0;
		$finalValue;
foreach($supplies as $id => $quantity) {
	
	
	
	$supplyList=mysql_query("select ItemID, name from Supply where ItemID='$id';") or die (mysql_error()); 
while($row_list=mysql_fetch_assoc($supplyList)) {
	$itemName = $row_list['name'];
}
	
	$suppliesItemsT[] = "( ".$transactionid.", " .$id. ", " .$quantity. " )";
	$counter = $counter + 1;
	
}
	
	
	$insertSuppliesTransactionsSql = "insert into suppliesTransactions (transactionID, requestID, labLocation) values ('$transactionid', '$userID' , '$lab' );";
	
	$resultSuppliesTransactions = mysql_query($insertSuppliesTransactionsSql) or die(mysql_error());
	
	
	$insertSuppliesItemsTSql = "insert into suppliesItemsT (transactionID, itemID, quantity) values $suppliesItemsT[0];";
	
	
	 $resultSuppliesItemsT= mysql_query($insertSuppliesItemsTSql) or die (mysql_error());
		
		
		
	header("location:submitSuccess.php");
	
}


if ($presentValue > 1) {
	
	
	$insertTransactionsSql = " insert into transactions (requesteeID, requestID, requestDate) values ( 18,'$userID', now());";
	
	$resultTransactions = mysql_query($insertTransactionsSql) or die(mysql_error());
	
	$sql=mysql_query("SELECT MAX(transactionID) AS transactionId FROM transactions WHERE requestid ='$userID'");
	$result=mysql_fetch_assoc($sql);
	$transactionid = $result['transactionId'];
	
			$counter = 0;
		$finalValue;
foreach($supplies as $id => $quantity) {
	
	
	
	$supplyList=mysql_query("select ItemID, name from Supply where ItemID='$id';") or die (mysql_error()); 
while($row_list=mysql_fetch_assoc($supplyList)) {
	$itemName = $row_list['name'];
}
	
	$suppliesItemsT[] = "( ".$transactionid.", " .$id. ", " .$quantity. " )";
	$counter = $counter + 1;
	
}
	
	$insertSuppliesTransactionsSql = "insert into suppliesTransactions (transactionID, requestID, labLocation) values ('$transactionid','$userID', '$lab' );";
	
	$resultSuppliesTransactions = mysql_query($insertSuppliesTransactionsSql) or die(mysql_error());
	
	$insertSuppliesItemsTSql = "insert into suppliesItemsT (transactionID, itemID, quantity) values ";
		
	
		
	$i=0;
	while ($i <= $counter-2){
	
	$insertSuppliesItemsTSql = $insertSuppliesItemsTSql .$suppliesItemsT[$i]. ", ";
	 $i = $i + 1;
	}
	
	$insertSuppliesItemsTSql = $insertSuppliesItemsTSql .$suppliesItemsT[$i]. ";";
	
	
    $resultSuppliesItemsT= mysql_query($insertSuppliesItemsTSql) or die (mysql_error());
	
	$deleteQuantityZero = mysql_query("delete from suppliesItemsT where quantity = 0;") or die (mysql_error());		
		
	header("location:submitSuccess.php");
	

}









?>