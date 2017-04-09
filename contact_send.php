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
						<li><a href="index.html">Home</a></li>
						<li><a href="#">Services</a></li>
						<li><a href="portofolio.html">Portofolio</a></li>
						<li><a href="#">About</a></li>
						<li class="active"><a href="contact.html">Contact</a></li>
					</ul>
				</div>
			</div>
			<div class="second-menu">
				<div class="container">
					<ul>
						<li><a href="#">Crew List</a></li>
						<li><a href="#">Client Area</a></li>
						<li><a href="#">Project</a></li>
						<li><a href="#">Carrer</a></li>
					</ul>
				</div>
			</div>
			<!--- asdsad -->
		</header>
		<div id="contact-head">
			<h1>Hubungi Libscode</h1>
		</div>
		<article class="fullpage">

			<?php
				$host = mysql_connect("localhost", "root", "");
				$db = mysql_select_db("web");
				
				if (!empty($_POST['contact'])) {
					header("location:contact.php");
				}
				elseif ($host & $db) {
					$subject =$_POST['subject'];
					$jenis_pesan = $_POST['jenis_pesan'];
					$isi_pesan = $_POST['isi_pesan'];

					$kueri = 'insert into libs_contact values("'.$subject.'","'.$jenis_pesan.'","'.$isi_pesan.'")';
					mysql_query($kueri);
					echo '<p>Pesan terkirim dan akan direspon selama 3x24jam';
				}
				else {
					echo "Koneksi Gagal";
				}
			?>
		</article>		
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