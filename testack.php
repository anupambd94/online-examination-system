


<?php

error_reporting(0);
session_start();
include_once 'oesdb.php';
if(!isset($_SESSION['stdname'])) {
    $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
}
else if(isset($_REQUEST['logout']))
{
  
    unset($_SESSION['stdname']);
    header('Location: index.php');

}
else if(isset($_REQUEST['dashboard'])){
   
   
     header('Location: stdwelcome.php');

}
if(isset($_SESSION['starttime']))
{
    unset($_SESSION['starttime']);
    unset($_SESSION['endtime']);
    unset($_SESSION['tqn']);
    unset($_SESSION['qn']);
    unset($_SESSION['duration']);
    executeQuery("update studenttest set status='over' where testid=".$_SESSION['testid']." and stdid=".$_SESSION['stdid'].";");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <title>trainyourbrain</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="oes.css"/>
    <script type="text/javascript" src="validate.js" ></script>
    </head>
  <body >
       <?php

        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
      <div id="container">
      <div class="header">
                <img style="margin:10px 2px 2px 10px;float:left;" height="80" width="200" src="images/logo.png" alt="OES"/><h3 class="headtext"> &nbsp;Online Examination System </h3>
                <h4 style="color:#ffffff;text-align:center;margin:0 0 5px 5px;"><i></i></h4>
            </div>
           <form id="editprofile" action="editprofile.php" method="post">
          <div class="menubar">
               <ul id="menu">
                        <?php if(isset($_SESSION['stdname'])) {
                         // Navigations
                         ?>
                        <li><input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/></li>
                        <li><input type="submit" value="DashBoard" name="dashboard" class="subbtn" title="Dash Board"/></li>
                       

               </ul>
          </div>
      <div class="page">
          <h3 style="color:#0000cc;text-align:center;">Your answers are Successfully Submitted. To view the Results <b><a href="viewresult.php">Click Here</a></b> </h3>
          <?php
                        }
          ?>
      </div>

           </form>
         <div id="footerPanel">
  <div id="footerbodyPanel">
    <ul>
      <li><a href="index.php">Home</a>|</li>
      <li><a href="#">About us</a> |</li>
      <li><a href="#">Take a Tour</a>|</li>
      <li><a href="#">Faq</a> |</li>
      <li><a href="#">Contact</a></li>
    </ul>
    <p class="copyright">© trial services all right reaserved</p>
    <ul class="templateworld">
      <li>Design By:</li>
      <li><a href="#">Md. Anupam</a></li>
    </ul>
    
  </div>
</div>
      </div>
  </body>
</html>

