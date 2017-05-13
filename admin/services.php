<?php
	session_start();
	include "koneksi.php";
?>
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
						<li class="active"><a href="services.php">Services</a></li>
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
			if ($_SESSION['LibsLogon'] == 1) {
		?>
		<div id="contact-head">
			<h1>Halaman Admin</h1>
		</div>
		<article class="container konten">
			<div class="row hal">
            	<div class="content_body">
                	<?php if (!empty($_GET['searchService'])) { ?>
						Cari Services
					<?php } elseif (!empty($_GET['newService'])) { ?>
                    	<?php
							if (!empty($_POST['btnCreateServices'])) {
								$inputData = 'INSERT INTO lbs_services (useradminID,nameServices,contentServices,priceServices) VALUE ("'.$_SESSION['LibsUserID'].'","'.$_POST['nameservices'].'","'.$_POST['contentservices'].'","'.$_POST['priceservice'].'")';
								if ($connect->query($inputData) == TRUE) {
									$_SESSION['LibsCreateService'] = 1;
									header("location:services.php"); 
								} else {
									echo "Error: " . $kueri . "<br>" . $connect->error;
								}
							}
						?>
						<h2>Buat Services Baru</h2>
                        <br>
                        <table class="table">
                            <form action="" method="POST">
                                <tr>
                                    <td class="judulWid">Nama Services :</td>
                                    <td><input type="text" name="nameservices" class="input"></td>
                                </tr>
                                <tr>
                                    <td class="judulWid">Deskripsi Services : </td>
                                    <td><textarea name="contentservices" class="textarea" rows="10"></textarea></td>
                                </tr>
                                <tr>
                                    <td class="judulWid">Harga Services : (Rp) </td>
                                    <td><input type="number" name="priceservice" value="" class="input"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" class="btn btn-reverse btn-line" name="btnCreateServices" value="Buat Services"></input></td>
                                </tr>
                            </form>
                        </table>
                    <?php } else { ?>
                    	<?php 
							if (!empty($_SESSION['LibsCreateService'])) {
								if ($_SESSION['LibsCreateService'] == 1) {
									echo "<p class='success-info'>Data sudah dibuat</p>";
									$_SESSION['LibsCreateService'] = 0;
								}
							}
							if (empty($_GET['spm'])) {
								$_GET['spm'] = 1;
							}
							
						?>
<table cellpadding="0" cellspacing="2" width="100%" class="table table-hover table-mc-light-blue">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Dibuat oleh</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga Layanan</th>
                                    <th>Aksi</th>
                                 </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $field = "*";
                                    $halaman = 5;
                                    $page = isset($_GET["spm"]) ? (int)$_GET["spm"] : 1;
                                    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                                    $result = mysqli_query($connect,"SELECT ".$field." FROM lbs_services order by idServices desc");
                                    $total = mysqli_num_rows($result);
                                    $pages = ceil($total/$halaman);            
                                    $query = mysqli_query($connect,"select ".$field." from lbs_services order by idServices desc LIMIT ".$mulai.", ".$halaman." ");
                                    $no =$mulai+1;
            
                                    while($d=mysqli_fetch_assoc($query)){
                                        #code ....
										$dibuatUser = $d['useradminID'];
										$kueriDibuatUser = 'select * from lbs_useradmin where useradminID = '.$dibuatUser.'';
										$queryDibuatUser = mysqli_query($connect,$kueriDibuatUser);
										$ambilDibuatUser = mysqli_fetch_assoc($queryDibuatUser);
                                    ?>
                                        <tr>
                                        <td><?php echo $d['idServices']; ?></td>
                                        <td><?php echo $ambilDibuatUser['useradminName']; ?></td>
                                        <td><?php echo $d['nameServices']; ?></td>
                                        <td><?php echo $d['priceServices']; ?></td>
                                        <td><a href="?showMsg=<?php echo $d['idServices']; ?>" class="btn">Lihat</a></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                            </tbody>
                        </table>
                        <div class="info">
                            <p>Data yang terecord : <?php echo $total;?></p>
                        </div>
                        <?php for ($i=1; $i<=$pages ; $i++){ ?>
                            <?php
                                if ($_GET['spm'] == $i) {
                                    $spmSelect = "selected";
                                }
                                else {
                                    $spmSelect = "";
                                }
                            ?>
                            <a href="?spm=<?php echo $i; ?>" class="pagination <?php echo $spmSelect; ?>"><?php echo $i; ?></a>
                        <?php } ?>
						
					<?php } ?>
                </div>
                <div class="sidebar">
                	<div class="window">
                    	<h2>Menu</h2>
                        <ul>
                        	<li><a href="services.php">Daftar Services</a></li>
                        	<li><a href="?searchService=do">Cari Service Baru</a></li>
                        	<li><a href="?newService=do">Tambah Service Baru</a></li>
                        </ul>
                    </div>
                </div>
            </div>
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