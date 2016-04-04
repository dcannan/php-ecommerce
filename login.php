<!DOCTYPE html>

<!--
Project login page
CIS-425/78019
Fall 2014   
Dan Cannan
-->

<?php
	// Start a PHP session
	session_name("customer");
	session_start("customer");
	
	if (isset($_SESSION["customer"]))
	{
		header('Location: welcome.php');
		exit;
	}
?>

<html lang="en">
  	
  <head>
    <!-- Meta tag -->
	<meta name="robots" content="noindex, nofollow" />
    <meta charset="utf-8" />

    <!-- Link tag for CSS -->
    <link type="text/css" rel="stylesheet" href="stylesheets/project.css" />
	
	<!-- Favicon element -->
	<link rel="icon" href="images/cthulu.ico" />

    <!-- Web Page Title -->
    <title>Oddi-Tees: Odd apparel for odd people</title>

  </head>

  <body>	
	<div id="header">
		<ul id="sitenav">
			<li>
				<a href="home.php">Home</a>
			</li>
			<li>
				<a href="login.php">Members</a>					
			</li>
			
			<li>
				<a href="about.php">About Us</a>
			</li>
			
			<li>
				<a href="contact.php">Contact Us</a>
			</li>
		</ul>
		
		<?php			
			if (isset($_SESSION['customer']))
			{
				$cart = 0;
				$max = count($_SESSION['cart']);
				$name = $_SESSION['customer'];
				
				for ($i = 0; $i < $max; $i++)
				{
					$cart += $_SESSION['cart'][$i]['quantity'];
				}
				
				// Display the welcome message in the header
				echo '
				<div id="welcome">
					<p class="welcomename">
						Welcome ' . $name . ' (<a class="smallmessage" href="logout.php">Sign Out</a>)
					</p>
				</div>
				<div id="carticon">
					<p>
						<img src="images/cart.jpg" alt="Shopping cart" />
					</p>
				</div>
				<div id="cartmessage">
					<p class="carttext">
						<a href="cart.php">My Cart</a>
						(' . $cart . ')
					</p>
				</div>';
			}
			else
			{
				// Set name to Guest
				$name = 'Guest';
				
				// Display the welcome message in the header
				echo '
				<div id="welcome">
					<p class="welcomename">Welcome ' . $name . ' (<a class="smallmessage" href="login.php">Sign In</a>)
				</div>';				
			}
		?>
	</div>
	
	<div id="main">
		<div id="toplogo">
			<img src="images/big-logo.jpg" alt="Large size logo" />
		</div>
		
		<form id="joinform" action="process.php" method="post">
			<p class="fh1">
				Member Login: <br />
			</p>
			<p class="fh2">
				Please login with your username/password.
				If you are not yet registered, please click <a href="register.php">here</a>
			</p>
			
			<?php
				// Check return code from process.php
				if ($_GET["rc"] == 1)
				{
					echo '<p class="logerr">Username not found!</p>';
				}
				
				if ($_GET["rc"] == 2)
				{
					echo '<p class="logerr">Password not found!</p>';
				}
				
				if ($_GET["rc"] == 3)
				{
					echo '<p class="logerr">Returned from process.php...</p>';
				}
			?>
			
			<p>
				<!-- Username -->
				<label class="loglabel" for="username">Username:</label>
				<input type="text" id="username" name="username"
				required
				pattern="[a-zA-Z0-9-_!$]{4,15}"
				title="Username: 4-15 chars, u/l case letters, 0-9 and - _ ! or $ only!"
				placeholder="Username..."
				autofocus
				/>
				
				<br />
				
				<!-- Password -->
				<label class="loglabel" for="password">Password:</label>
				<input type="password" id="password" name="password"
				required
				pattern="[a-zA-Z0-9-_!$]{5,15}"
				title="Password: 5-15 chars, u/l case letters, 0-9 and - _ ! or $ only!"
				placeholder="Password"
				/>
			</p>
			
			<p>
				
			</p>
			
			<p class="loginsubmit">
				<input type="submit" value="Login" />
				
				<span class="loginreset">
					<input type="reset" value="Reset" onclick="history.go(0)" />
				</span>
			</p>
		</form>
	
	</div>
	
	<div id="bottom">
		<a class="logo" href="home.php">
			<img src="images/logo.png" alt="Logo Image" />
		</a>
		<ul id="bottomnav">
			<li class="seperator">
				<a href="login.php">Members</a>					
			</li>
			
			<li class="seperator">
				<a href="about.php">About Us</a>
			</li>
			
			<li>
				<a href="contact.php">Contact Us</a>
			</li>
		</ul>
	</div>
	
	<div id="footer">
		<p>
			<img src="../images/html5.png" alt="Valid XHTML5 Icon" />
			<img src="../images/css3.png" alt="Valid CSS3 Icon" />
			<br />
			&copy;2014, Dan Cannan
		</p>
	</div>
  </body>

</html>