<?php include('../connect-db.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/body.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<link href="../css/banner.css" rel="stylesheet" type="text/css" />
<title>CMS</title
</head>

<body>

<div class= "container">
  <div id="navMenu">
    <ul id="nav">
      <li><a href="../index.html">Home</a></li>
      <li><a href="registration.html">Register</a></li>
    </ul>
  </div>
</div>
<div class="body">
  <div class="inner-border">
    <div class="border">
      <div class="content">
        <h1 id="form-title"> Supplies</h1>
        <form id ="supply_form" unload = "document.supply_form.reload()" name ="select" onsubmit ="return validateForm()" action="cmsSelect.php" method="post">
          <fieldset>
            <ol>
              <li class="Select">
                <label for="Select"> Supply List </label>
                <select name = "supply" onchange="supplySelect()">
                  <option value="0">Select or add</option>
                  
                 <? if (isset ($select)&&$select!=""){
			  		$select=$_POST ['NEW'];
			  		}
			  	?>
                <?
			  		$list=mysql_query("select * from Supply order by ItemID asc;");
					while ($row_list=mysql_fetch_assoc($list)){
			  	?>
                  	<option value="<? echo $row_list['ItemID']; ?>" <? if($row_list['ItemID']==$select){ echo "selected"; } ?>> <?echo $row_list['name']; ?> </option>
                <?
                }
                ?>
                </select>
                <br />
              </li>
              <li class="Name">
                <label for="Iname"> Item Name </label>
                <span class="validation">Required</span>
                <input type="text" name="Iname" id="Iname" value="" onclick="" onblur=""/>
              </li>
              <li class="quantity">
                <label for="quantity"> Quantity </label>
                <input type="text" name="quantity" id="quantity" value=""/>
                <span class="validation">Required</span> </li>
              <li class="lastUpdate">
                <label for="lastUpdate"> Last Update </label>
                <input type="text" name="lastUpdate" id="lastUpdate" value=""/ readonly="readonly">
                <span class="lastUpdateID"> Last Update by </span>
                <input type="text" name="lastUpdateID" id="lastUpdateID" value=""/ readonly="readonly">
                <span class="validation">User's Name </span> </li>
              <li class="bottom">
                <input name="submitButton" value="Submit" type="submit" class="submit_button" id="submt" onmouseover="onHover()" onmouseout="onExit()" />
                <input name="resetButton" value="Reset" type="reset" class="reset_button"  id="rst" onmouseover="onHoverReset()" onmouseout="onExitReset()" />
              </li>
            </ol>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
