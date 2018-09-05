



 <?php

 
      error_reporting(0);
      session_start();
      include_once 'oesdb.php';
      if(isset($_REQUEST['register']))
      {
            header('Location: register.php');
      }
      else if($_REQUEST['stdsubmit'])
      {
          $result=executeQuery("select *,DECODE(stdpassword,'oespass') as std from student where stdname='".htmlspecialchars($_REQUEST['name'],ENT_QUOTES)."' and stdpassword=ENCODE('".htmlspecialchars($_REQUEST['password'],ENT_QUOTES)."','oespass') ");
          if(mysql_num_rows($result)>0)
          {

              $r=mysql_fetch_array($result);
              if(strcmp(htmlspecialchars_decode($r['std'],ENT_QUOTES),(htmlspecialchars($_REQUEST['password'],ENT_QUOTES)))==0&&strcmp(htmlspecialchars_decode($r['status'],ENT_QUOTES),'pending')!=0)
			  
              {
                  $_SESSION['stdname']=htmlspecialchars_decode($r['stdname'],ENT_QUOTES);
                  $_SESSION['stdid']=$r['stdid'];
                  unset($_GLOBALS['message']);
                  header('Location: stdwelcome.php');
              }
			  else
          {
              $_GLOBALS['message']="Waiting for the Approval";
          }

          }
          else
          {
              $_GLOBALS['message']="Check Your User name and Password.";
          }
          closedb();
      }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <title>Online Examination System</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="oes.css"/>
	 <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/style3.css" />
		<link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />
	
    
  </head>
  <body>
  <div id="container">
	
            <div class="codrops-top">
                <a href="index.php">
                    <strong>&laquo; GO BACK: </strong>HOME
                </a>
                <span class="right">
                    <a href=" #">
                        <strong>LOGIN AS: STUDENT</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
  
            
            <div class="header">
                <img style="margin:10px 2px 2px 10px;float:left;" height="80" width="250" src="images/logo.png" alt="OES"/><h3 class="headtext"> &nbsp;Online Examination System </h3><h4 style="color:#ffffff;text-align:center;margin:0 0 5px 5px;"></h4>
			</div>
			<form id="stdloginform" action="login.php" method="post">
				<div class="menubar">
       
					<ul id="menu">
      
                    <?php if(isset($_SESSION['stdname'])){
                          header('Location: stdwelcome.php');}else{  
                        ?>

                      <!--  <li><input type="submit" value="Register" name="register" class="subbtn" title="Register"/></li>-->
					<li><div class="aclass"><a href="register.php" title="Click here  to Register">Register</a></div></li>
                        <?php } ?>
					</ul>

				</div>
				<div class="page">
             
					<div id="wrapper">
                        <div id="login" class="animate form">
                            <form  id="indexform" action="login.php" method="post" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="name" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" name="stdsubmit" value="Login" /> 
									
									
								</p>
								<?php
      
								if(isset($_GLOBALS['message']))
								{
									echo "<div class=\"msg\">".$_GLOBALS['message']."</div>";
								}
								?>
								<!--
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>-->
                            </form>
                        </div>


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
      <li><a href="http://www.templateworld.com">Md. Anupam</a></li>
    </ul>
    
  </div>
</div>

  </div>
  </body>
</html>
