<!DOCTYPE html>

<!--
Project landing page
CIS-425/78019
Fall 2014   
Dan Cannan
-->

<?php
	// Unset the cart session, so that the cart empties, and start the customer session.
	session_name("customer");
	session_start("customer");
	unset($_SESSION['cart']);
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
		<p class="fh1">Order Submitted:</p>
		<p>
			Thank you for you order! When your order has shipped, you will recieve
			the tracking order via email. Click <a href="home.php">here</a> to return 
			to the home page to buy more shirts!
		</p>
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
			<img src="images/html5.png" alt="Valid XHTML5 Icon" />
			<img src="images/css3.png" alt="Valid CSS3 Icon" />
			<br />
			&copy;2014, Dan Cannan
		</p>
	</div>
  </body>

</html>