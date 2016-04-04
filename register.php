<!DOCTYPE html>

<!--
Project Registration Page
CIS-425/78019
Fall 2014   
Dan Cannan
-->

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
		
		<form id="joinform" action="confirm.php" method="post">
			<p class="fh1">
				Sign-up Form:
			</p>
			
			<p>
				<!-- First Name -->
				<label class="reglabel" for="fname">First Name<br />
					<input type="text" id="fname" name="fname" 
					required autofocus
					pattern="[a-zA-Z-' ]{2,30}"
					title="Name: 2-30 chars, u/l case letters and - or ' only!"
					placeholder="First name" />
				</label>
				
				<!-- Last Name -->
				<label class="reglabel" for="lname">Last Name<br />
					<input type="text" id="lname" name="lname" 
					required autofocus
					pattern="[a-zA-Z-' ]{2,30}"
					title="Name: 2-30 chars, u/l case letters and - or ' only!"
					placeholder="Last name" />
				</label>
				
				<!-- Address 1 -->
				<label class="reglabel" for="address1">Street Address<br />
					<input type="text" id="address1" name="address1" 
					required autofocus
					pattern="[a-zA-Z0-9- .]{4,50}"
					title="Street Address"
					placeholder="Street Address" />
				</label>
				<br />
				
				<!-- Address 2 -->
				<label class="reglabel" for="address2">Apt/Suite<br />
					<input type="text" id="address2" name="address2" 
					autofocus
					pattern="[a-zA-Z0-9-]{0,10}"
					title="Apt/Suite Number"
					placeholder="Apartment or Suite number" />
				</label>
				<br />
				
				<!-- City -->
				<label class="reglabel" for="city">City<br />
					<input type="text" id="city" name="city" 
					required autofocus
					pattern="[a-zA-Z- ]{3,30}"
					title="City Name"
					placeholder="City" />
				</label>
				<br />
				
				<!-- State -->
				<label class="reglabel" for="state">State<br />
					<select name="state" id="state" required title="State"
					onfocus="bmsg()">
						<option value="">State...</option>
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District Of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
					</select>
				</label>
				<br />
				
				<!-- Zip -->
				<label class="reglabel" for="zip">Zip Code<br />
					<input type="text" id="zip" name="zip" 
					required autofocus
					pattern="[0-9]{5,5}"
					title="5-digit Zip Code"
					placeholder="Zip Code" />
				</label>
				
				<br />
				
				<!-- Phone Number -->
				<label class="reglabel" for="phone">Phone Number<br />
					<input type="tel" id="phone" name="phone"
					required
					title="Phone Number"
					placeholder="10-digit Phone Number" />
				</label>
				
				<br />
				
				<!-- Username -->
				<label class="reglabel" for="username">Username<br />
					<input type="text" id="username" name="username"
					required
					pattern="[a-zA-Z0-9-_!$]{4,15}"
					title="Username: 4-15 chars, u/l case letters, 0-9 and - _ ! or $ only!"
					placeholder="4-15 character username" />
				</label>
				
				<br />
				
				<!-- Password -->
				<label class="reglabel" for="password">Password<br />
					<input type="password" id="password" name="password"
					required
					pattern="[a-zA-Z0-9-_!$]{5,15}"
					title="Password: 5-15 chars, u/l case letters, 0-9 and - _ ! or $ only!"
					placeholder="5-15 character password"
					onchange="form.reenter.pattern=this.value;" />
				</label>
				<br />
				
				<!-- Re-enter -->
				<label class="reglabel" for="reenter">Re-Enter Password<br />
					<input type="password" id="reenter" name="reenter"
					required
					title="Passwords mush match!"
					placeholder="Re-enter your password" maxlength="50" />
				</label>
				
				<br />
				
				<!-- Email -->
				<label class="reglabel" for="email">Email<br />
					<input type="email" id="email" name="email" 
					required
					placeholder="Email..." />
				</label>
				<br />
			</p>
			
			<p class="submit">
				<input type="submit" value="Register" />
				
				<span class="reset">
					<input type="reset" value="Clear"  onclick="history.go(0)" />
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