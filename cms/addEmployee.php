<?php 
session_start();
if (!isset($_SESSION['Fname']) && !isset($_SESSION['Lname'])) { 
	header("Location: ../index.html");
	return true;
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/body.css" rel="stylesheet" type="text/css" />
<link href="../css/form.css" rel="stylesheet" type="text/css" />
<link href="../css/banner.css" rel="stylesheet" type="text/css" /> 
<title>Lab Utility</title>
<script type="text/javascript" src="../js/formValidate.js"></script>
<script type="text/javascript" src="../js/buttons.js"></script>
</head>
<body>
<div class= "container">
  <div id="navMenu">
    <ul id="nav">
      <li><a href="../login/login_secure.php">Home</a></li>
      <li><a href="cms.php">Manage</a>
        <ul id="dropDown">
        <li><a href="cms.php">Supplies</a>
        <ul id="dropDown">
          <li><a href="addSupply.php">Insert</a></li>
          <li><a href="cmsDeleteBrowse.php">Delete</a></li>
          <li><a href="cmsUpdateBrowse.php">Update</a></li>
          <li><a href="cmsBrowse.php">Browse</a></li>
          </ul>
          </li>
          <li><a href="employeecms.php">Employees</a></li>
          <li><a href="../Motw/messageoftheweek.php">MOTW</a></li>
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
        <h1 id="form-title"> Add Employee</h1>
        <form id ="registration_form" unload = "document.registration_form.reload()" name ="Title" onsubmit ="return validateForm()" action="insertEmployee.php" method="post">
          <fieldset>
            <ol>
              <li class="Name">
                <label for="Fname"> Name </label>
                <span class="validation">Required</span>
                <input type="text" name="Fname" id="Fname" value="First Name" onclick="if(this.value=='First Name'){this.value=''}" onblur="if(this.value==''){this.value='First Name'}"/>
                <input type="text" name="Minit" id="Minit" value="M.I." width="70000px" onclick="if(this.value=='M.I.'){this.value=''}" onblur="if(this.value==''){this.value='M.I.'}"/>
                <input type="text" name="Lname" id="Lname" value="Last Name" onclick="if(this.value=='Last Name'){this.value=''}" onblur="if(this.value==''){this.value='Last Name'}"/>
              </li>
              <li class="password">
                <label for="pass_word"> Password </label>
                <input type="password" name="pass_word" id="pass_word" value=""/>
                <span class="confirmation"> Confirm Password </span>
                <input type="password" name="pass_word2" id="pass_word2" value="" onkeyup="checkPassword(); return false;"/>
                <span class="validation">Required</span> </li>
              <li class="email">
                <label for="e_mail"> BSU Email </label>
                <span class="validation">Required</span>
                <input type="text" name="e_mail" id="e_mail" value=""/>
              </li>
              <li class="Birth_Date">
                <label for="Birth_Date"> Birth Date </label>
                <span class="validation">Required</span>
                <select name="Month" id="Month">
                  <option value="-1">Month:</option>
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
                <select name="Day" id="Day">
                  <option value="-1">Day:</option>
                  <option value="01">1</option>
                  <option value="02">2</option>
                  <option value="03">3</option>
                  <option value="04">4</option>
                  <option value="05">5</option>
                  <option value="06">6</option>
                  <option value="07">7</option>
                  <option value="08">8</option>
                  <option value="09">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
                <select name="Year" id="Year">
                  <option value="-1">Year:</option>
                  <option value="2013">2013</option>
                  <option value="2012">2012</option>
                  <option value="2011">2011</option>
                  <option value="2010">2010</option>
                  <option value="2009">2009</option>
                  <option value="2008">2008</option>
                  <option value="2007">2007</option>
                  <option value="2006">2006</option>
                  <option value="2005">2005</option>
                  <option value="2004">2004</option>
                  <option value="2003">2003</option>
                  <option value="2002">2002</option>
                  <option value="2001">2001</option>
                  <option value="2000">2000</option>
                  <option value="1999">1999</option>
                  <option value="1998">1998</option>
                  <option value="1997">1997</option>
                  <option value="1996">1996</option>
                  <option value="1995">1995</option>
                  <option value="1994">1994</option>
                  <option value="1993">1993</option>
                  <option value="1992">1992</option>
                  <option value="1991">1991</option>
                  <option value="1990">1990</option>
                  <option value="1989">1989</option>
                  <option value="1988">1988</option>
                  <option value="1987">1987</option>
                  <option value="1986">1986</option>
                  <option value="1985">1985</option>
                  <option value="1984">1984</option>
                  <option value="1983">1983</option>
                  <option value="1982">1982</option>
                  <option value="1981">1981</option>
                  <option value="1980">1980</option>
                  <option value="1979">1979</option>
                  <option value="1978">1978</option>
                  <option value="1977">1977</option>
                  <option value="1976">1976</option>
                  <option value="1975">1975</option>
                  <option value="1974">1974</option>
                  <option value="1973">1973</option>
                  <option value="1972">1972</option>
                  <option value="1971">1971</option>
                  <option value="1970">1970</option>
                  <option value="1969">1969</option>
                  <option value="1968">1968</option>
                  <option value="1967">1967</option>
                  <option value="1966">1966</option>
                  <option value="1965">1965</option>
                  <option value="1964">1964</option>
                  <option value="1963">1963</option>
                  <option value="1962">1962</option>
                  <option value="1961">1961</option>
                  <option value="1960">1960</option>
                  <option value="1959">1959</option>
                  <option value="1958">1958</option>
                  <option value="1957">1957</option>
                  <option value="1956">1956</option>
                  <option value="1955">1955</option>
                  <option value="1954">1954</option>
                  <option value="1953">1953</option>
                  <option value="1952">1952</option>
                  <option value="1951">1951</option>
                  <option value="1950">1950</option>
                  <option value="1949">1949</option>
                  <option value="1948">1948</option>
                  <option value="1947">1947</option>
                  <option value="1946">1946</option>
                  <option value="1945">1945</option>
                  <option value="1944">1944</option>
                  <option value="1943">1943</option>
                  <option value="1942">1942</option>
                  <option value="1941">1941</option>
                  <option value="1940">1940</option>
                  <option value="1939">1939</option>
                  <option value="1938">1938</option>
                  <option value="1937">1937</option>
                  <option value="1936">1936</option>
                  <option value="1935">1935</option>
                  <option value="1934">1934</option>
                  <option value="1933">1933</option>
                  <option value="1932">1932</option>
                  <option value="1931">1931</option>
                  <option value="1930">1930</option>
                  <option value="1929">1929</option>
                  <option value="1928">1928</option>
                  <option value="1927">1927</option>
                  <option value="1926">1926</option>
                  <option value="1925">1925</option>
                  <option value="1924">1924</option>
                  <option value="1923">1923</option>
                  <option value="1922">1922</option>
                  <option value="1921">1921</option>
                  <option value="1920">1920</option>
                  <option value="1919">1919</option>
                  <option value="1918">1918</option>
                  <option value="1917">1917</option>
                  <option value="1916">1916</option>
                  <option value="1915">1915</option>
                  <option value="1914">1914</option>
                  <option value="1913">1913</option>
                  <option value="1912">1912</option>
                  <option value="1911">1911</option>
                  <option value="1910">1910</option>
                  <option value="1909">1909</option>
                  <option value="1908">1908</option>
                  <option value="1907">1907</option>
                  <option value="1906">1906</option>
                  <option value="1905">1905</option>
                </select>
              </li>
              <li class="Sex">
                <label for="Sex"> Sex </label>
                <span class="validation">Required</span>
                <input type="radio" name="Sex" value="M" checked="checked" />
                Male
                <input type="radio" name="Sex" value="F" />
                Female </li>
              <li class="Class_Level">
                <label for="Class_Level"> Class Level </label>
                <span class="validation">Optional</span>
                <select name="Class_Level" id="Class_Level">
                  <option value="-1">Grade:</option>
                  <option value="1">Freshman</option>
                  <option value="2">Sophomore</option>
                  <option value="3">Junior</option>
                  <option value="4">Senior</option>
                  <option value="5">Fifth Year+</option>
                </select>
              </li>
              </li>
              <li class="PositionID">
                <label for="PostionID"> Position ID </label>
                <span class="validation">Optional</span>
                <select name="PositionID" id="PositionID" onchange="Admin()">
                  <option value="-1">Job Title:</option>
                  <option value="1">Administrator</option>
                  <option value="2">Company Head</option>
                  <option value="3">Lab Manager</option>
                  <option value="4">Computer Service Technician</option>
                  <option value="5">Computer Lab Assistant</option>
                </select>
                <span id="succes" style="color:#FF0000"></span> </li>
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
