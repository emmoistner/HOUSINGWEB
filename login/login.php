<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/" />
	<link href="css/body.css" rel="stylesheet" type="text/css" />
	<link href="css/form.css" rel="stylesheet" type="text/css" />
	<title>Lab Utility</title>
	<script type="text/javascript">
	<!--
	function onHover()
	{
		document.getElementById('submt').className='submit_button_hover';
	}
	
	function onExit ()
	{
		document.getElementById('submt').className='submit_button';
	}
	
	function onHoverReset()
	{
		document.getElementById('rst').className='submit_button_hover';
	}
	
	function onExitReset()
	{
		document.getElementById('rst').className='submit_button';
	}
	</script>
	</head>
	<body>
    <div class="body">
      <div class="inner-border">
        <div class="border">
          <div class="content">
            <h1 id="form-title"> Login </h1>
            <br />
            <form id ="registration_form"  method="post" action="checklogin.php">
              <fieldset>
                <ol>
                  <li class="username">
                    <label for="user_name">Username </label>
                    <input type="text" name="user_name" id="user_name" value=""/>
                  </li>
                  <li class="password">
                    <label for="pass_word">Password </label>
                    <input type="password" name="pass_word" id="pass_word" value=""/>
                  </li>
                  <li class="bottom">
                    <input name="submitButton" value="Submit" type="submit" class="submit_button" id="submt" onmouseover="onHover()" onmouseout="onExit()">
                    <input name="resetButton" type="reset" class="reset_button" value="Reset" id="rst" onmouseover="onHoverReset()" onmouseout="onExitReset()" />
                </ol>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
