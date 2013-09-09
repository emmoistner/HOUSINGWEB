<?php 
session_start();
if (!isset($_SESSION['Fname']) && !isset($_SESSION['Lname'])) { 
	header("Location: ../index.html");
	return true;
} 
include('../connect-db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/body.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<link href="../css/banner.css" rel="stylesheet" type="text/css" />
<title>Delete Message of the Week</title>
<script type="text/javascript" src="../js/buttons.js"></script>
</head>

<body>
<div class= "container">
  <div id="navMenu">
    <ul id="nav">
      <li><a href="../login/login_secure.php">Home</a></li>
      <li><a href="../cms/cms.php">Manage</a>
        <ul id="dropDown">
        <li><a href="../cms/cms.php">Supplies</a>
        <ul id="dropDown">
          <li><a href="../cms/addSupply.php">Insert</a></li>
          <li><a href="../cms/cmsDeleteBrowse.php">Delete</a></li>
          <li><a href="../cms/cmsUpdateBrowse.php">Update</a></li>
          <li><a href="../cms/cmsBrowse.php">Browse</a></li>
          </ul>
          </li>
          <li><a href="../cms/employeecms.php">Employees</a></li>
          <li><a href="messageoftheweek.php">MOTW</a></li>
        </ul>
      </li>
      <li><a href="">Time Keeper</a>
        <ul id="dropDown">
          <li><a href="">Time Stamp</a></li>
          <li><a href="">Time Sheet</a></li>
        </ul>
      </li>
      <li><a href="../fullcalendar/calendar.php">Calendar</a></li>
      <li><a href="">Head Count</a>
        <ul id="dropDown">
          <li><a href="">Studebaker West</a></li>
          <li><a href="">Woodworth</a></li>
          <li><a href="">Noyer</a></li>
        </ul>
      </li>
    </ul>
    <ul id="navWelcome">
      <li>Welcome, <?php echo $_SESSION['Fname'];?>&nbsp;<?php echo $_SESSION['Lname'];?></li>
    </ul>
    <ul id="navLogout">
      <li><a href="../login/logout.php">[Log out]</a></li>
    </ul>
  </div>
</div>
<div class="body">
  <div class="inner-border">
    <div class="border">
      <div class="content">
        <h1 id="form-title">Delete</h1>
        <form id ="delete_message_form" unload = "document.delete_message_form.reload()" name ="select" method="post" action="delete.php" onclick="">
          <fieldset>
            <ol>
				
              <?
          $session_id = session_id();

          $sql = "SELECT * FROM motw where motwID > (select max(motwID)-10 from motw);";
          // execute the SQL statement
          $result = mysql_query($sql) or die(mysql_error());
          //go through each row in the result set and display data
          $i = 0;
          $totalQty = 0;
          while ($newArray = mysql_fetch_array($result))
          { $title = $newArray['title'];
            $entry = $newArray['entry'];
            $postDate = $newArray['postDate'];
            $motwID = $newArray['motwID'];
			$authorID = $newArray['authorID'];
			
			
			
			$emList=mysql_query("select Fname, Lname from Employee where id='$authorID';");
			while($row_list=mysql_fetch_assoc($emList)) {
			$fName = $row_list['Fname'];
			$lName = $row_list['Lname'];
			$author = $fName. " " .$lName;
			}
            
			
			?>
				
              		<li>
                    <label>Message of the Week #<? echo $motwID ?> </label><input type="checkbox" id="delete" name="<? echo "delete".$motwID; ?>" value="<? echo $motwID; ?>" /> 
                    </li>
                    <li>
                    <label for="motwtitle"> Title </label><input type="text" id="motwtitle" name="motwtitle" value="<? echo $title; ?>" />
                  	</li>
                  	<li>
                    <label for="entry"> Entry </label><textarea rows="6" cols="26" id="entry" name="entry" ><? echo $entry; ?> </textarea>
                    </li>
                    <li>
                    <label for="date"> Post Date </label><input type="text" id="date" name="date" value="<? echo $postDate; ?>" /> 
                    </li>
                    <li class="gap">
 					<label for="author"> Author </label><input type="text" id="author" name="author" value="<? echo $author; ?>" /> 
                    </li>
 					<input type="hidden" id="check" name="<? echo "item".$i; ?>" value="<? echo $motwID; ?>" />
              
              <? 
              $i++;
            } 
            ?>
            <li class="bottom"><input type="submit" id="submt" class="submit_button" onclick="set_action('delete.php')" onmouseover="onHover()" onmouseout="onExit()"name="submitButton" value="Delete" />
                    
              <input type="hidden" id="howMany" name="howMany" value = "" />

                    </li>

            </ol>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
</body>

<script type="text/javascript">
function set_action(action) {
  document.getElementById('Shopping_Cart').action = action;
  document.getElementById('Shopping_Cart').submit();
}
</script>

<script type="text/javascript">
var inputTags = document.getElementsByTagName('input');
var textboxCount = 0;
for (var i=0, length = inputTags.length; i<length; i++) {
     if (inputTags[i].type == 'checkbox') {
         textboxCount++;
     }
}
document.getElementById('howMany').value =  textboxCount;

</script>
</html>
