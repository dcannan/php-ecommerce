<!DOCTYPE html>

<!--
Project landing page
CIS-425/78019
Fall 2014   
Dan Cannan
-->

<?php
	session_name("customer");
	session_start("customer");
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
		
		<p class="fh1">The Oddi-Tees:</p>
		
		<div id="prodicons">
			<ul id="products">
			<li>
				<a href="consent/"><img src="images/consent.jpg" alt="Always Give Consent" /></a>
			</li>
			
			<li>
				<a href="dare/"><img src="images/dare.jpg" alt="Drugs Are Really Expensive" /></a>					
			</li>
			
			<li>
				<a href="mcdjoker/"><img src="images/mcdjoker.jpg" alt="Why So Serious?" /></a>
			</li>
			
			<li>
				<a href="smooth/"><img src="images/trooper.jpg" alt="Smooth Trooper" /></a>
			</li>
			
			<li>
				<a href="lovedick/"><img src="images/lovedick.jpg" alt="I Love Dick" /></a>
			</li>
			
			<li>
				<a href="jesus/"><img src="images/jesus.jpg" alt="Jesus is my Final Solution" /></a>
			</li>
			
			<li>
				<a href="knowkarate/"><img src="images/knowkarate.jpg" alt="I Know Karate" /></a>
			</li>
			
			<li>
				<a href="wtfjapan/"><img src="images/wtfjapan.jpg" alt="WTF Japan?" /></a>
			</li>
			
			<li>
				<a href="sanders/"><img src="images/japan.jpg" alt="Colonel Sanders" /></a>
			</li>
			
			<li>
				<a href="cthulu/"><img src="images/cthulu.png" alt="CTHULU!" /></a>
			</li>
		</ul>
		</div>
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