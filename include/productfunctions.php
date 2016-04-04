<?php
	function get_product_name($dbc, $prodid)
	{
		$query = "SELECT name FROM products WHERE prodid = '$prodid'";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result);
		return $row['name'];
	}
	
	function get_price($dbc, $prodid, $size)
	{
		$price = 0;
		$query = "SELECT price FROM products WHERE prodid = '$prodid'";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result);
		
		if ($size == 'S' || $size == 'M' || $size == 'L' || $size == 'XL')
		{
			$price = $row['price'];
		}
		elseif ($size == '2XL')
		{
			$price = $row['price'] + 2;
		}
		elseif ($size == '3XL')
		{
			$price = $row['price'] + 3;
		}
		
		return $price;
	}
	
	function remove_product($prodid)
	{
		$prodid = intval($prodid);
		$max = count($_SESSION['cart']);
		
		for ($i = 0; $i < $max; $i++)
		{
			if ($prodid == $_SESSION['cart'][$i]['prodid'])
			{
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart'] = array_values($_SESSION['cart']);
	}
	
	function get_order_total($dbc)
	{
		$max = count($_SESSION['cart']);
		$sum = 0;
		
		for ($i = 0; $i < $max; $i++)
		{
			$prodid = $_SESSION['cart'][$i]['prodid'];
			$quantity = $_SESSION['cart'][$i]['quantity'];
			$size = $_SESSION['cart'][$i]['size'];
			$price = get_price($dbc, $prodid, $size);
			$sum += $price * $quantity;
		}
		
		return number_format($sum, 2);
	}
	
	function add_to_cart($prodid, $quantity, $size)
	{
		if($prodid < 1 || $quantity < 1)
		{
			return;
		}
		
		if (is_array($_SESSION['cart']))
		{
			$exists_results = product_exists($prodid, $size);
			$exists = $exists_results[0];
			$position = $exists_results[1];
			
			if ($exists)
			{
				$new_quantity = intval($_SESSION['cart'][$position]['quantity']);
				$new_quantity++;
				$_SESSION['cart'][$position]['quantity'] = $new_quantity;
			}
			else
			{
				$max = count($_SESSION['cart']);
				$_SESSION['cart'][$max]['prodid'] = $prodid;
				$_SESSION['cart'][$max]['quantity'] = $quantity;
				$_SESSION['cart'][$max]['size'] = $size;
			}
		}
		else
		{
			$_SESSION['cart']= array();
			$_SESSION['cart'][0]['prodid'] = $prodid;
			$_SESSION['cart'][0]['quantity'] = $quantity;
			$_SESSION['cart'][0]['size'] = $size;
		}
	}
	
	function product_exists($prodid, $size)
	{
		$prodid = intval($prodid);
		$max = count($_SESSION['cart']);
		$flag = 0;
		
		for ($i = 0; $i < $max; $i++)
		{
			if($prodid == $_SESSION['cart'][$i]['prodid'] && $size == $_SESSION['cart'][$i]['size'])
			{
				$flag = 1;
				break;
			}
		}
		return array ($flag, $i);
	}
?>