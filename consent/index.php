<!DOCTYPE html>

<!--
I Always Give Consent product page
CIS-425/78019
Fall 2014   
Dan Cannan
-->

<?php
	session_name("customer");
	session_start("customer");
	
	// Import necessary globals and functions
	include('../include/local-connect.php');
	include("../include/productfunctions.php");
	
	if ($_REQUEST['command'] == 'add' && $_REQUEST['productid'] > 0)
	{
		$prodid = $_REQUEST['productid'];
		$size = $_REQUEST['selectedsize'];
		add_to_cart($prodid, 1, $size);
		header("Location: ../cart.php");
		exit();
	}
?>

<html lang="en">
  	
  <head>
    <!-- Meta tag -->
	<meta name="robots" content="noindex, nofollow" />
    <meta charset="utf-8" />

    <!-- Link tag for CSS -->
    <link type="text/css" rel="stylesheet" href="../stylesheets/project.css" />
	
	<!-- JavaScript Tags -->
	<script type="text/javascript">
		function addtocart(prodid)
		{
			var size = document.getElementById("size").value;
			if (size != "")
			{
				document.productform.selectedsize.value = size;
				document.productform.productid.value = prodid;
				document.productform.command.value = 'add';
				document.productform.submit();
			}
			else
			{
				window.alert("Please choose a size.");
			}
		}
	</script>
	
	<!-- Favicon element -->
	<link rel="icon" href="../images/cthulu.ico" />

    <!-- Web Page Title -->
    <title>Oddi-Tees: Odd apparel for odd people</title>

  </head>

  <body>	
	<div id="header">
		<ul id="sitenav">
			<li>
				<a href="../home.php">Home</a>
			</li>
			<li>
				<a href="../login.php">Members</a>					
			</li>
			
			<li>
				<a href="../about.php">About Us</a>
			</li>
			
			<li>
				<a href="../contact.php">Contact Us</a>
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
						Welcome ' . $name . ' (<a class="smallmessage" href="../logout.php">Sign Out</a>)
					</p>
				</div>
				<div id="carticon">
					<p>
						<img src="../images/cart.jpg" alt="Shopping cart" />
					</p>
				</div>
				<div id="cartmessage">
					<p class="carttext">
						<a href="../cart.php">My Cart</a>
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
					<p class="welcomename">Welcome ' . $name . ' (<a class="smallmessage" href="../login.php">Sign In</a>)
				</div>';				
			}
		?>
	</div>
	
	<div id="main">
		<div id="toplogo">
			<img src="../images/big-logo.jpg" alt="Large size logo" />
		</div>
		
		<form name="productform" action="#">
			<input type="hidden" name="productid" />
			<input type="hidden" name="command" />
			<input type="hidden" name="selectedsize" />
		</form>
		
		<div id="prodinfo">
			<?php
				$prodid = 1;
	
				$query = "SELECT * FROM products WHERE prodid = '$prodid'";
				$result = mysqli_query($dbc, $query) or die('Error!');
				$row = mysqli_fetch_array($result);
				
				echo '<p class="title">' . $row['name'] . '</p>';
				echo '<img src="../' . $row['image'] . '" alt="' . $row['name'] . '">';
			?>
		</div>
		
		<div id="descrip">
			<?php
				echo '<span class="sh3">Product Description</span><br />' . $row['description'] . '<br /><br />';
				echo '<span class="sh3">Product Information:</span><br />';
				echo '<span class="sh4">Color: </span>' . $row['color'] . '<br />';
				echo '<span class="sh4">Price: </span>' . $row['price'] . '<br />';
			?>
		</div>
		
		<?php
			if (!isset($_SESSION['customer']))
			{
				echo '<span class="addmessage">Please login to purchase this item!</span>';
			}
			else
			{
				echo '
				<span class="addtocart">
					<label class="sh4" for="size">Select Size:<br />
						<select class="size" name="size" id="size" required title="Size">
							<option value="">Size...</option>
							<option value="S">Small</option>
							<option value="M">Medium</option>
							<option value="L">Large</option>
							<option value="XL">Extra Large</option>
							<option value="2XL">2XL - Add $2.00</option>
							<option value="3XL">3XL - Add $3.00</option>
						</select>
					</label>
				</span>
					
				<input type="button" value="Add to Cart" onclick="addtocart(' . $prodid . ')" />';
			}
		?>
	</div>
	
	<div id="bottom">
		<a class="logo" href="../home.php">
			<img src="../images/logo.png" alt="Logo Image" />
		</a>
		<ul id="bottomnav">
			<li class="seperator">
				<a href="../login.php">Members</a>					
			</li>
			
			<li class="seperator">
				<a href="../about.php">About Us</a>
			</li>
			
			<li>
				<a href="../contact.php">Contact Us</a>
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