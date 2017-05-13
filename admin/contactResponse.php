<?php 
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
						<li><a href="index.php">Home</a></li>
						<li><a href="services.php">Services</a></li>
						<li><a href="portofolio.html">Portofolio</a></li>
						<li><a href="#">About</a></li>
						<li class="active"><a href="contact.php">Contact</a></li>
                        <li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
			<!--- asdsad -->
		</header>
		<div id="contact-head">
			<h1>Halaman Admin</h1>
		</div>
		<article class="fullpage">
			<?php 
            session_start();
			$kueriBalas = "select * from lbs_replycontactmsg where idContactmsg = ".$_GET['balas']."";
			$queryReply = mysqli_query($connect,$kueriBalas);
			$hitungReply = mysqli_num_rows($queryReply);
            if (empty($_GET['balas'])){
                $_SESSION['LibsError_Msg'] = 1;
                header("location:contact.php");
            }
			elseif ($hitungReply > 0) {
                $_SESSION['LibsError_Msg'] = 1;
                header("location:contact.php");
			}
            elseif (!empty($_GET['balas'])) {
                if ($_SESSION['LibsLogon'] == 1) {
                    if (!empty($_POST['btnSend'])) {
                        $check = 0;
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
                        if ($check == 0) {
                            $kueri = "INSERT INTO lbs_replycontactmsg(subjectReplycontactmsg,idContactmsg,useradminID,emailReplycontactmsg,typeReplycontactmsg,contentReplycontactmsg,timeReplycontactmsg) VALUES('".$subject."','".$_GET['balas']."','".$_SESSION['LibsUserID']."','".$email."','".$jenis_pesan."','".$isi_pesan."','".date("Y/m/d h:i:s")."')";
                            if ($connect->query($kueri) === TRUE) {
								$mail=$isi_pesan;
								$to="admin@localhost";
								$header= "From: $email";
								@mail($email, $subject, $isi_pesan, $header);
                                echo "<p class='success-info'>Pesan Telah Terkirim</p>";
								$ubahStatus = "UPDATE lbs_contactmsg SET statusContactmsg = 'Terjawab' WHERE idContactmsg = ".$_GET['balas']." ";
								 if ($connect->query($ubahStatus) === TRUE) {
									 echo "<p class='success-info'>Data telah diupdate</p>";
								 }
								 else {
									 echo "Error: " . $kueri . "<br>" . $connect->error;
								 }
                            } else {
                                echo "Error: " . $kueri . "<br>" . $connect->error;
                            }
                        }
                        else {?>
                            <p class="error-info">Pesan Kesalahan : Terdapat data yang kosong / tidak benar</p>
                        <?php
                        }
                            
                    }
                    $_SESSION['LibsMsgRes'] = $_GET['balas'];
                    $kueri = mysqli_query($connect, "select * from lbs_contactmsg where idContactmsg = ".$_GET['balas']."");
                    $pesan=mysqli_fetch_assoc($kueri)
                    
                    
		?>
        	<table width="100%" class="table">
            	<tr>
                	<td class="judulWid">Nomor Contact : </td>
                    <td><?php echo $pesan['idContactmsg']; ?></td>
                </tr>
                <tr>
                	<td class="judulWid">Judul Pesan : </td>
                    <td><p><span class="prefix"><?php echo $pesan['typeContactmsg']; ?></span> <?php echo $pesan['titleContactmsg']; ?></p></td>
                </tr>
                <tr>
                	<td class="judulWid">Email Pengirim : </td>
                    <td><?php echo $pesan['emailContactmsg']; ?></td>
                </tr>
                <tr>
                	<td class="judulWid">Isi Pesan : </td>
                    <td><?php echo $pesan['contentContactmsg']; ?></td>
                </tr>
                <tr>
                	<td class="judulWid">Status Pesan : </td>
                    <td><?php echo $pesan['statusContactmsg']; ?></td>
                </tr>
                <tr>
                	<td class="judulWid">Waktu Kirim : </td>
                    <td><?php echo $pesan['timeContactmsg']; ?></td>
                </tr>
                <tr>
                	<td colspan="2" class="separator"></td>
                </tr> 
				<form action="" method="POST">
				<tr>
					<td class="judulWid">Subjek</td>
					<td><input text="text" name="subject" class="input" value="Re: <?php echo $pesan['titleContactmsg'];?>" readonly>
				</tr>
				<tr>
					<td class="judulWid">Email :</td>
					<td><input text="text" name="email" class="input" value="<?php echo $pesan['emailContactmsg'];?>" readonly>
				</tr>
				<tr>
					<?php 
						$tipepesan = $pesan['typeContactmsg']; 
						$tipepesanAktif1 = "";
						$tipepesanAktif3 = "";
						$tipepesanAktif2 = "";
						if ($tipepesan == "Emergency"){
							$tipepesanAktif1 = "selected";
						}
						elseif ($tipepesan == "Penting") {
							$tipepesanAktif2 = "selected";
						}
						elseif ($tipepesan == "Normal") {
							$tipepesanAktif3 = "selected";
						}
					?>
					<td class="judulWid">Jenis Pesan</td>
					<td>
						<select name="jenis_pesan" class="select">
							<option value="Emergency" <?php echo $tipepesanAktif1 ?>>Emergency</option>
							<option value="Penting" <?php echo $tipepesanAktif2 ?>>Penting</option>
							<option value="Normal" <?php echo $tipepesanAktif3 ?> >Normal</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="judulWid">Isi Pesan</td>
					<td><textarea name="isi_pesan" class="textarea" rows="10"></textarea></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" class="btn btn-reverse btn-line" name="btnSend" value="Balas Pertanyaan"></input></td>
				</tr>
				</form>
			</table>
		</article>
        <?php }
			else{
				$_SESSION['LibsNLogin'] = 5;
				header("location:login.php");
			}
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