



 <?php

 
      error_reporting(0);
      session_start();
      include_once '../oesdb.php';

      if(isset($_REQUEST['tcsubmit']))
      {

          $result=executeQuery("select *,DECODE(tcpassword,'oespass') as tc from testconductor where tcname='".htmlspecialchars($_REQUEST['name'],ENT_QUOTES)."' and tcpassword=ENCODE('".htmlspecialchars($_REQUEST['password'],ENT_QUOTES)."','oespass')");
          if(mysql_num_rows($result)>0)
          {

              $r=mysql_fetch_array($result);
              if(strcmp(htmlspecialchars_decode($r['tc'],ENT_QUOTES),(htmlspecialchars($_REQUEST['password'],ENT_QUOTES)))==0)
              {
                  $_SESSION['tcname']=htmlspecialchars_decode($r['tcname'],ENT_QUOTES);
                  $_SESSION['tcid']=$r['tcid'];
                  unset($_GLOBALS['message']);
                  header('Location: tcwelcome.php');
              }else
          {
              $_GLOBALS['message']="Check Your user name and Password.";
          }

          }
          else
          {
              $_GLOBALS['message']="Check Your user name and Password.";
          }
          closedb();
      }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Train your brain</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link rel="stylesheet" type="text/css" href="../css/style3.css" />
		<link rel="stylesheet" type="text/css" href="../css/animate-custom.css" />
    </head>
  <body>
  <div id="container">
  
		<!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="../index.php">
                    <strong>&laquo; GO BACK: </strong>HOME
                </a>
                <span class="right">
                    <a href=" #">
                        <strong>LOGIN AS: TEACHER</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            
           <center><header>
			<a href="#"><img src="../images/logo.png" title="Trial Services" alt="Trial Services" width="230" height="80" border="0" /></a>
				
                <h1>TEACHER <span>LOGIN</span></h1>
				<p>Please din't tell your password anyone.</p>
            </header></center>
			<section>
				<div id="container_demo" >
					<a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="" autocomplete="on" method="post"> 
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
                                    <input type="submit" value="Login" name="tcsubmit" /> 
								</p>
                                <p class="change_link">
									Contact with admin to join
								</p>
                            </form>
                        </div>

                        </div>
						
				</div>  
            </section>
<div id="footerPanel">
				<div id="footerbodyPanel">
					<ul>
						<li><a href="../index.php">Home</a>|</li>
						<li><a href="#">About us</a> |</li>
						<li><a href="#">Support</a>|</li>
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
