<!DOCTYPE html>

<!--
Contact Us Page
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
		
		<p class="fh1">Contact Us:</p>
		<form id="joinform" action="https://webapp4.asu.edu/pubtools/Mail" method="post">
			<p>
			
				<!-- 3 hidden elements to proces our emails -->
				<!-- CHANGE THE EMAIL ADDRESS TO TARUN BEFORE SUBMITTING FOR A GRADE! -->
				<input name="sendto" type="hidden" value="ihatebeingamish@gmail.com" />
				<input name="subject" type="hidden" value="Your Request" />
				<input name="location" type="hidden" value="http://cis425.wpcarey.asu.edu/dcannan/project/emthankyou.php" />
				
				<!-- Name -->
				<label class="emaillabel" for="name">Name:</label>
				<input type="text" id="name" name="name" 
				required autofocus
				pattern="[a-zA-Z-' ]{4,30}"
				title="Name: 4-30 chars, u/l case letters and - or ' only!"
				placeholder="First and Last name"
				/>
				<br />
				
				<!-- Email -->
				<label class="emaillabel" for="email">Email:</label>
				<input type="email" id="email" name="email" 
				required
				placeholder="youremail@whatever.com"
				/>
				<br />
				
				<!-- Comments -->
				<label class="emaillabel" for="comments">Comments:
					<br />
					<textarea name="comments" id="comments" rows="2" cols="49"
					required maxlength="500" title="1-500 chars" placeholder="1-500 characters..."></textarea>
				</label>
			</p>
			
			<p class="submit">
				<input type="submit" value="Send Email" />
				
				<span class="reset">
					<input type="reset" value="Clear Form!" onclick="history.go(0)" />
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
			<img src="images/html5.png" alt="Valid XHTML5 Icon" />
			<img src="images/css3.png" alt="Valid CSS3 Icon" />
			<br />
			&copy;2014, Dan Cannan
		</p>
	</div>
  </body>

</html>