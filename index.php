<?php

	session_start();

	$s_username = $_SESSION['logged_on'];
	$i_access = $_SESSION['access_level'];
	$s_loadlogin = $_GET['load'];
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blueprint: Multi-Level Menu</title>
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
	<script src="js/js-custom-lib.js"></script>
</head>

<body>
	<!-- Main container -->
	<div class="container">
		<!-- Webheader header -->
		<header class="bp-header cf">
			<div class="place-logo">
				<div class="dummy-icon foodicon foodicon--coconut"></div>
				<h2 class="left-top-header">Left TOP Headr</h2>
			</div>
			<div class="bp-header__main">
				<span class="bp-header__present"><?php echo ($s_username != null && $s_username != 'Guest') ? $s_username : "Guest"; ?><span class="bp-tooltip bp-icon bp-icon--about" data-content="The user information goes here."></span></span>
				<h1 class="bp-header__title">All mighty PHP kings</h1>
				<nav class="bp-nav">
					<a class="bp-nav__item bp-icon bp-icon--prev" href="basket.php" data-info="Basket"><span>Basket</span></a>
					<a class="bp-nav__item bp-icon bp-icon--drop" href="index.php?load=settings" data-info="Settings"><span>Settings</span></a>
					<a class="bp-nav__item bp-icon bp-icon--archive" href="<?php echo ($s_username != null) ? 'logout.php' : 'index.php?load=login'; ?>" data-info="<?php echo ($s_username != null && $i_access > -1) ? 'Logout' : 'Login';?>"><span>Logout</span></a>
				</nav>
			</div>
		</header>
		<button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
		<nav id="ml-menu" class="menu">
			<button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
			<div class="menu__wrap">
				<ul data-menu="main" class="menu__level">
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1" href="#">Vegetables</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-2" href="#">Fruits</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-3" href="#">Grains</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-4" href="#">Mylk &amp; Drinks</a></li>
				</ul>
				<!-- Submenu 1 -->
				<ul data-menu="submenu-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Stalk Vegetables</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Roots &amp; Seeds</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Cabbages</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Salad Greens</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Mushrooms</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-1-1" href="#">Sale %</a></li>
				</ul>
				<!-- Submenu 1-1 -->
				<ul data-menu="submenu-1-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Fair Trade Roots</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Dried Veggies</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Our Brand</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Homemade</a></li>
				</ul>
				<!-- Submenu 2 -->
				<ul data-menu="submenu-2" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Citrus Fruits</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Berries</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-2-1" href="#">Special Selection</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Tropical Fruits</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Melons</a></li>
				</ul>
				<!-- Submenu 2-1 -->
				<ul data-menu="submenu-2-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Exotic Mixes</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Wild Pick</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Vitamin Boosters</a></li>
				</ul>
				<!-- Submenu 3 -->
				<ul data-menu="submenu-3" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Buckwheat</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Millet</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Quinoa</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Wild Rice</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Durum Wheat</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-3-1" href="#">Promo Packs</a></li>
				</ul>
				<!-- Submenu 3-1 -->
				<ul data-menu="submenu-3-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Starter Kit</a></li>
					<li class="menu__item"><a class="menu__link" href="#">The Essential 8</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Bolivian Secrets</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Flour Packs</a></li>
				</ul>
				<!-- Submenu 4 -->
				<ul data-menu="submenu-4" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Grain Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Seed Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Nut Mylks</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Nutri Drinks</a></li>
					<li class="menu__item"><a class="menu__link" data-submenu="submenu-4-1" href="#">Selection</a></li>
				</ul>
				<!-- Submenu 4-1 -->
				<ul data-menu="submenu-4-1" class="menu__level">
					<li class="menu__item"><a class="menu__link" href="#">Nut Mylk Packs</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Amino Acid Heaven</a></li>
					<li class="menu__item"><a class="menu__link" href="#">Allergy Free</a></li>
				</ul>
			</div>
		</nav>
		<div class="content">
			<?php
				if ($s_loadlogin === 'login' && $_SESSION['logged_on'] == null)
					echo "<iframe name=\"usr_login\" src=\"login.php\" height=\"500px\" width=\"100%\" frameborder=\"0\"></iframe>";
				elseif ($s_loadlogin === 'settings')
					echo "<iframe name=\"usr_login\" src=\"settings.php\" height=\"500px\" width=\"100%\" frameborder=\"0\"></iframe>";
				else
					echo "<p class='info'>Please choose a category</p>";
			?>
			<!--<p class="info">Please choose a category</p>-->
			<!-- Ajax loaded content here -->.
      <ul>
      <li class=\"product\"><div class=\"foodicon foodicon--broccoli\"></div></li>"
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
				onItemClick: load_placeholder_Data // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
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
				gridWrapper.innerHTML = '<ul class="products">' + Placeholder_Data[itemName] + '<ul>';
			}, 700);
		}
	})();
	</script>
</body>

</html>
