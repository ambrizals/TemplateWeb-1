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
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

			<br/>
            
			<?php
				$check = 0;
				$servername = "localhost";
				$username = "root";
				$password = "";
				$database = "web";
				
				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $database);
				
				// Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				else {
					if (!empty($_POST['simpan'])) {
						$subject = $_POST['subject'];
						$email = $_POST['email'];
						$jenis_pesan = $_POST['jenis_pesan'];
						$isi_pesan = $_POST['isi_pesan'];
						
						//Verifikasi data kosong
						if (count($subject) == 0 && count($isi_pesan) == 0 ) {
							$check = 1;
						}
						if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							$check = 1;
						}
						
						//Verifikasi data kosong berdasarkan status $check
						if ($check == 0) {
							$kueri = "INSERT INTO lbs_contactmsg(titleContactmsg,emailContactmsg,typeContactmsg,contentContactmsg,timeContactmsg,statusContactmsg) VALUES('".$subject."','".$email."','".$jenis_pesan."','".$isi_pesan."','".date("Y/m/d h:i:s")."','Menunggu Respon')";
							if ($conn->query($kueri) === TRUE) {
								echo "<p class='success-info'>Pesan Terkirim akan dijawab dalam waktu 3 x 24 jam !</p>";
							} else {
								echo "Error: " . $kueri . "<br>" . $conn->error;
							}
						}
						else {?>
							<p class="error-info">Pesan Kesalahan : Terdapat data yang kosong / tidak benar</p>
                        <?php
						}
					}
				}
				
            ?>
            

			<table width="100%">
				<form action="" method="POST">
					<tr>
						<td>Subjek</td>
						<td><input text="text" name="subject" class="input">
					</tr>
					<tr>
						<td>Email :</td>
						<td><input text="text" name="email" class="input">
					</tr>
					<tr>
						<td>Jenis Pesan</td>
						<td>
							<select name="jenis_pesan" class="select">
								<option value="Emergency">Emergency</option>
								<option value="Penting">Penting</option>
								<option value="Normal">Normal</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Isi Pesan</td>
						<td><textarea name="isi_pesan" class="textarea" rows="10"></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" class="btn btn-reverse btn-line" name="simpan"></input></td>
					</tr>
				</form>
			</table>
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