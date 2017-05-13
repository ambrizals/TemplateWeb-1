<html>
	<head>
		<title>Template 1.0</title>
		<link rel="stylesheet" href="main.css" type="text/css"/>
		<link rel="stylesheet" href="ico/font-awesome.min.css" type="text/css" />
	</head>
	<body>
		<header>
			<div class="container">
				<div class="top row">
					<div class="logo">
						<img src="img/libscode.png" />
					</div>
					<div class="ads">
						<div class="cnt">
							<p>Ads in here</p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="menu">
				<div class="container">
					<ul class="main">
						<li class="active"><a href="index.html">Home</a></li>
						<li><a href="services.php">Services</a></li>
						<li><a href="portofolio.html">Portofolio</a></li>
						<li><a href="#">About</a></li>
						<li><a href="contact.php">Contact</a></li>
                        <li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
			<!--- asdsad -->
		</header>
        <?php 
		session_start();
		if ($_SESSION['LibsLogon'] == 1) {
		?>
		<div id="contact-head">
			<h1>Halaman Admin</h1>
		</div>
		<article class="fullpage">
			<h2>Silahkan pilih menu untuk melakukan manage halaman</h2>
		</article>	
        <?php }
			else{
				$_SESSION['LibsNLogin'] = 5;
				header("location:login.php");
			}
		?>	
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-3 item">
						<h2>Libscode</h2>
						<p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div class="col-3 item">
					<h2>Usefull Link</h2>
						<ul class="desc">
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Google Maps</a></li>
							<li><a href="#">Kebijakan Layanan</a></li>
							<li><a href="#">Timeline Process</a></li>
						</ul>
					</div>
					<div class="col-3 item">
					<h2>Subscribe</h2>
					<form><input class="subscribe" type = "text" placeholder="Masukkan Alamat Email untuk Berlangganan.." name="subscribe" /></form>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
					</div>
				</div>
			</div>
		<div class="bottomline">
			<div class="container">
				<p>Template created by ambrizal.</p>
			</div>
		</div>
		</footer>
	</body>
</html>