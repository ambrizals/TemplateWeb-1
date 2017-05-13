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
						<li><a href="index.php">Home</a></li>
						<li><a href="#">Services</a></li>
						<li><a href="portofolio.php">Portofolio</a></li>
						<li><a href="#">About</a></li>
						<li><a href="contact.php">Contact</a></li>
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
			<h1>Login Admin</h1>
		</div>
		<article class="fullpage">
        <?php
			include "koneksi.php";	
			// Create connection
			if ($connect->connect_error) {
				die("Connection failed: " . $conn->connect_error);
				exit;
			}
				
			session_start();
			if (!empty($_SESSION['LibsNLogin'])) {
				echo "<p class='error-info'>Anda perlu login untuk mengakses halaman ini !</p>";
				$_SESSION['LibsNLogin'] = 0;
			}
			
			if (!empty($_SESSION['LibsLogon'])){
				header("location:index.php");
			}
			elseif (!empty($_POST['btnlogin'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				if (empty($username)) {
					echo "<p class='error-info'>Username tidak boleh kosong</p>";
				}
				elseif (empty($password)) {
					echo "<p class='error-info'>Password tidak boleh kosong</p>";
				}
				else {
					//Convert password ke MD5
					$pwd = md5($password);
					$login = "SELECT * FROM web.lbs_useradmin where (useradminUsername = '".$username."') & (useradminPassword ='".$pwd."')";
					$proses = mysqli_query($connect,$login);
					$result = mysqli_num_rows($proses);
					$ambilInfoUser = mysqli_fetch_assoc($proses);
					if ($result == 1) {
						$_SESSION['LibsLogon'] = 1;
						$_SESSION['LibsUserName'] = $ambilInfoUser['useradminName'];
						$_SESSION['LibsUserID'] = $ambilInfoUser['useradminID'];
						header("location:index.php");
					}
					else {
						echo "<p class='error-info'>User atau Password Salah !</p>";
					}
				}
			}
		?>
        	<table width="100%">
            	<form action="" method="post">
                    <tr>
                        <td>Username :</td>
                        <td><input type="text" name="username" class="input" /></td>
                    </tr>
                    <tr>
                        <td>Password :</td>
                        <td><input type="password" name="password" class="input" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="btnlogin" class="btn btn-reverse btn-line" value="Login"/></td>
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