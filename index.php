<?php

	session_start();

	$s_username = $_SESSION['logged_on'];
	$i_access = $_SESSION['access_level'];

	$s_load = $_GET['load'];
	$_cat = $_GET['cat'];
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WTC_ Shop</title>
	<meta name="description" content="WeThinkcode PHP_BootCamp Rush_00 Project." />
	<meta name="keywords" content="Making a mini e-commerce online shop" />
	<meta name="author" content="ggroener and oexall" />
	<link rel="shortcut icon" href="favicon.ico">
	<!-- food icons -->
	<link rel="stylesheet" type="text/css" href="css/organicfoodicons.css" />
	<!-- index styles -->
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<!-- menu styles -->
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<!--Used for icons -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<script src="js/js-custom-lib.js"></script>
</head>

<body>
	<!-- Main container -->
	<div class="container">
		<!-- Webheader header -->
		<header class="bp-header cf">
			<div class="place-logo">
				<div class="placeholder-icon foodicon foodicon--coconut"> <img class="logo_img" src="http://www.logospike.com/wp-content/uploads/2014/11/Superman_logo-4.jpeg"> </div>
				<h2 class="left-top-header">Left TOP Header</h2>
			</div>
			<div class="index-header__main">
				<span class="index-header__present"><?php echo ($s_username != null && $s_username != 'Guest') ? $s_username : "Guest"; ?><span class="bp-tooltip index_icon bp-icon--about" data-content="The user information goes here."></span></span>
				<h1 class="index-header__title">All mighty PHP kings</h1>
				<nav class="bp-nav">
					<a class="index-nav__item index_icon index-header__icon--basket" href="basket.php" data-info="Basket"><i class="material-icons">add_shopping_cart</i><span>Basket</span></a>
					<a class="index-nav__item index_icon index-header__icon--settings" href="index.php?load=settings" data-info="Settings"><i class="material-icons">build</i><span>Settings</span></a>
					<a class="index-nav__item index_icon index-header__icon--login" href="<?php echo ($s_username != null) ? 'logout.php' : 'index.php?load=login'; ?>" data-info="<?php echo ($s_username != null && $i_access > -1) ? 'Logout' : 'Login';?>"><i class="material-icons">account_circle</i><span>Logout</span></a>
				</nav>
			</div>
		</header>
		<button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
		<nav id="ml-menu" class="menu">
			<button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
			<div class="menu__wrap">
				<ul data-menu="main" class="menu__level">
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1" href="#">Electronics</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-2" href="#">Food Items</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-3" href="index.php?load=items&cat=misc">Misc.</a></li>
					<?php
						if ($i_access === 1)
							echo "<li class=\"menu__item\"><a class=\"menu__link\" data-submenu=\"submenu-4\" href=\"index.php?load=admin\">Admin</a></li>";
					?>
				</ul>
				<!-- Submenu 1 -->
				<ul data-menu="submenu-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="index.php?load=items&cat=phones">Phones</a></li>
					<li class="menu__item"><a class="menu__link" href="index.php?load=items&cat=accessories">Accessories</a></li>
				</ul>
				<!-- Submenu 2 -->
				<ul data-menu="submenu-2" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="index.php?load=items&cat=fastfood">Fast Food</a></li>
					<li class="menu__item"><a class="menu__link" href="index.php?load=items&cat=food">Proper Food</a></li>
				</ul>
			</div>
		</nav>
		<div class="content">
			<?php
				if ($s_load === 'login' && $_SESSION['logged_on'] == null)
					echo "<iframe name=\"usr_login\" src=\"login.php\" height=\"500px\" width=\"100%\" frameborder=\"0\"></iframe>";
				elseif ($s_load === 'settings')
					echo "<iframe name=\"usr_login\" src=\"settings.php\" height=\"500px\" width=\"100%\" frameborder=\"0\"></iframe>";
				elseif ($s_load	=== 'admin' && $i_access === 1)
					echo "<iframe name=\"usr_login\" src=\"admin.php\" height=\"500px\" width=\"100%\" frameborder=\"0\"></iframe>";
				elseif ($s_load !== 'items')
					echo "<p class='info'>Please choose a category</p>";
			?>
			<!-- Ajax loaded content here -->
      	<ul class="products">
      			<li class="product" style="text-align:center;">
      				ITEM NAME <br/>
      				<!--<div class="foodicon foodicon--broccoli">-->
      					<img class="product_img" src="http://www.mcdonalds.co.za/sites/default/files/product/Big-Tasty.png"/>
      				<!--</div>-->
							<div class="price_placement">
      				<p class="price"> R00 000.00 </p>
      				<form class="trolly">
      					<input type="submit" name="submit" value="ADD"/>
      				</form>
						</div>
      			</li>
    		</ul>
		</div>
	</div>
	<!-- /view -->
	<script src="js/classie.js"></script>
	<script src="js/placeholder_data.js"></script>
	<script src="js/main.js"></script>
	<script>
	(function() {
		var menuEl = document.getElementById('ml-menu'),
			mlmenu = new MLMenu(menuEl, {
				// breadcrumbsCtrl : true, // show breadcrumbs
				// initialBreadcrumb : 'all', // initial breadcrumb text
				backCtrl : false, // show back button
				// itemsDelayInterval : 60, // delay between each menu item sliding animation
				//onItemClick: load_placeholder_Data // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
			});

		// mobile menu toggle
		var openMenuCtrl = document.querySelector('.action--open'),
			closeMenuCtrl = document.querySelector('.action--close');

		openMenuCtrl.addEventListener('click', openMenu);
		closeMenuCtrl.addEventListener('click', closeMenu);

		function openMenu() {
			classie.add(menuEl, 'menu--open');
		}

		function closeMenu() {
			classie.remove(menuEl, 'menu--open');
		}

		// simulate grid content loading
		var gridWrapper = document.querySelector('.content');

		function load_placeholder_Data(ev, itemName) {
			ev.preventDefault();

			closeMenu();
			gridWrapper.innerHTML = '';
			classie.add(gridWrapper, 'content--loading');
			setTimeout(function() {
				classie.remove(gridWrapper, 'content--loading');
				gridWrapper.innerHTML = '<ul class="products">' + Placeholder_Data[itemName] + '</ul>';
			}, 700);
		}
	})();
	</script>
</body>

</html>
