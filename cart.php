<!DOCTYPE html>

<!--
Project Shopping Cart page
CIS-425/78019
Fall 2014   
Dan Cannan
-->

<?php
	session_name("customer");
	session_start("customer");
	
	// Connect to the db (LOCAL or SERVER)
	include('include/local-connect.php');
	include('include/productfunctions.php');
	
	if ($_REQUEST['command'] == 'delete' && $_REQUEST['productid'] > 0)
	{
		remove_product($_REQUEST['productid']);
	}
	elseif ($_REQUEST['command'] == 'clear')
	{
		unset($_SESSION['cart']);
	}
	elseif ($_REQUEST['command'] == 'update')
	{
		$max = count($_SESSION['cart']);
		
		for ($i = 0; $i < $max; $i++)
		{
			$prodid = $_SESSION['cart'][$i]['prodid'];
			$quantity = intval($_REQUEST['product'.$prodid]);
			
			if ($quantity > 0 && $quantity <= 1000)
			{
				$_SESSION['cart'][$i]['quantity'] = $quantity;
			}
			else
			{
				$message = 'Some products were not updated! Item quantity must be between 1 and 1000';
			}
		}
	}
	elseif ($_REQUEST['command'] == 'complete')
	{
		header("Location: thankyou.php");
	}
?>
<html lang="en">
  	
  <head>
    <!-- Meta tag -->
	<meta name="robots" content="noindex, nofollow" />
    <meta charset="utf-8" />

    <!-- Link tag for CSS -->
    <link type="text/css" rel="stylesheet" href="stylesheets/project.css" />
	
	<!-- JavaScript Tags -->
	<script type="text/javascript">
		function del(productid)
		{
			if (confirm('Are you sure you want to delete this item?'))
			{
				document.cartform.productid.value = productid;
				document.cartform.command.value = 'delete';
				document.cartform.submit();
			}
		}
		
		function clear_cart()
		{
			if (confirm('Are you sure you wish to empty your cart?'))
			{
				document.cartform.command.value = 'clear';
				document.cartform.submit();
			}
		}
		
		function update_cart()
		{
			document.cartform.command.value = 'update';
			document.cartform.submit();
		}
		
		function complete_order()
		{
			document.cartform.command.value = 'complete';
			document.cartform.submit();
		}
	</script>
	
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
		<form name="cartform" method="post" action="#">
			<input type="hidden" name="productid" />
			<input type="hidden" name="command" />
			<span id="cont_shop">
				<input type="button" value="Continue Shopping" onclick="window.location.href='home.php'" />
			</span>
			<div id="formerror"><?php echo $message ?></div>
			
			<table id="cart_table">
				<?php
					if (count($_SESSION['cart']))
					{
						echo '	<tr class="tablehead">
									<th>Name</th>
									<th>Price</th>
									<th>Qty</th>
									<th>Amount</th>
									<th>Size</th>
									<th>Options</th>
								</tr>';
							
						$max = count($_SESSION['cart']);
						for ($i = 0; $i < $max; $i++)
						{
							$prodid = $_SESSION['cart'][$i]['prodid'];
							$quantity = $_SESSION['cart'][$i]['quantity'];
							$prodname = get_product_name($dbc, $prodid);
							$size = $_SESSION['cart'][$i]['size'];
							$prodprice = get_price($dbc, $prodid, $size);
							
							if ($quantity == 0)
							{
								continue;
							}
							echo '
							<tr>
								<td>' . $prodname . '</td>
								<td>&#36; ' . $prodprice . '</td>
								<td><input type="text" name="product' . $prodid . '" value="' . 
									$quantity . '" maxlength="4" size="2" />
								</td>
								<td>&#36; ' . $prodprice*$quantity . '</td>
								<td>' . $size . '</td>
								<td><a href="javascript:del(' . $prodid . ')">Remove Item</a></td>
							</tr>';
						}
						
						echo '<tr>
						<td class="total" colspan="s"><strong>Order Total: &#36;' . get_order_total($dbc) . '</strong></td>
						<td></td>
						<td colspan="3" id="cart_buttons">
						<input type="submit" value="Clear Cart" onclick="clear_cart()">
						<input type="submit" value="Update Cart" onclick="update_cart()">
						<input type="submit" value="Complete Order" onclick="complete_order()">
						</td>
						</tr>';
					}
					else
					{
						echo '<tr><td>There are no items in your shopping cart.</td></tr>';
					}
				?>
			</table>
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