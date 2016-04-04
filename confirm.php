<!DOCTYPE html>

<!--
Project Registration Confirmation page
CIS-425/78019
Fall 2014   
Dan Cannan
-->

<?php
	// Connect to the db (LOCAL or SERVER)
	include('include/server-connect.php');
	
	// Values from HTML
	$fname		= mysqli_real_escape_string($dbc, $_POST['fname']);
	$lname		= mysqli_real_escape_string($dbc, $_POST['lname']);
	$street		= $_POST['address1'];
	$apt		= $_POST['address2'];
	$city		= $_POST['city'];
	$state		= $_POST['state'];
	$zip		= $_POST['zip'];
	$phone		= $_POST['phone'];
	$email		= mysqli_real_escape_string($dbc, $_POST['email']);
	$uname		= $_POST['username'];
	$pword		= $_POST['password'];
	
	// Build our SQL statement
	$query = 
	"INSERT INTO customers(fname, lname, street, apt, city, state, zip, phone, email, uname, pword)" . 
	"VALUES('$fname', '$lname', '$street', '$apt', '$city', '$state', '$zip', '$phone', '$email', '$uname', '$pword')";
	
	// Run the query
	$result = mysqli_query($dbc, $query) or die('Unable to write to DB!');
	
	// Close the SQL Connection
	mysqli_close($dbc);
?>

<html lang="en">
  	
  <head>
    <!-- Meta tag -->
	<meta name="robots" content="noindex, nofollow" />
    <meta charset="utf-8" />
	<meta http-equiv="refresh" content="5; url=login.php" />

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
		
		<p class="bold">
			<?php
				date_default_timezone_set('MST');
				$time = date('H');
				if ($time < '12')
				{
					echo "Good Morning " . $fname . " - Thank you for registering";
				}
				elseif ($time < '17')
				{
					echo "Good Afternoon " . $fname . " - Thank you for registering";
				}
				else
				{
					echo "Good Evening " . $fname . " - Thank you for registering";
				}
			?>
		</p>
		
		<p>Your information has been added to our database</p>
		
		<p>
			You may click the "Login" link below, or this page will automatically redirect you to the Login Page in 5 seconds...
		</p>
		
		<p class="bold">
			Click <a href="login.php">here</a> to login now...
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