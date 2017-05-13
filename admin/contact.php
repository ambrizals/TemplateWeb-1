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
						<li><a href="#">Services</a></li>
						<li><a href="portofolio.html">Portofolio</a></li>
						<li><a href="#">About</a></li>
						<li class="active"><a href="contact.php">Contact</a></li>
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
		<article class="container konten">
        	<div class="row hal">
                <div class="content_body">
                    <?php
                    //Reset
                    $_SESSION['LibsMsgRes'] = 0;
                    $_SESSION['LibsError_Msg'] = 0;
                    //Error Message
                    if ($_SESSION['LibsError_Msg'] == 1) {
                        echo "<div class='error-info'>Belum memilih pesan yang ingin dipilih !</div>";
                        $_SESSION['LibsError_Msg'] = 0;
                    }
                    
                    if(!empty($_GET['showMsg'])) { 
                        $kueriPesan = mysqli_query($connect,"select * from lbs_contactmsg where idContactmsg = ".$_GET['showMsg']." ");
                        $pesan=mysqli_fetch_assoc($kueriPesan)
                        
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
                            <?php
                                $kueriBalas = "select * from lbs_replycontactmsg where idContactmsg = ".$_GET['showMsg']."";
                                $queryReply = mysqli_query($connect,$kueriBalas);
                                $balasan=mysqli_fetch_assoc($queryReply)
                            ?>
                            <tr>
                                <td colspan="2"><center>Balasan</center></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <?php echo $balasan['contentReplycontactmsg']; ?>
                                </td>
                            </tr>
                        </table>
                        <div class="info">
                            <center>
                                <a href="javascript:history.back()" class="btn btn-big">Kembali</a>
                                <?php 
                                $hitungReply = mysqli_num_rows($queryReply);
                                if ($hitungReply == 0) { ?>
                                    <a href="contactResponse.php?balas=<?php echo $_GET['showMsg'] ?>" class="btn btn-big" >Jawab</a>
                                <?php } else { ?>
                                    <a href="#" class="btn btn-big">Sudah Terjawab</a>
                                <?php } ?>
                            </center>
                        </div>
                    <?php } else { 
                        if (empty($_GET['cpm'])) {
                            $_GET['cpm'] = 1;
                        }
                    ?>
                        <table cellpadding="0" cellspacing="2" width="100%" class="table table-hover table-mc-light-blue">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Judul</th>
                                    <th>Email</th>
                                    <th>Tipe</th>
                                    <th>status</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                 </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $field = "idContactmsg,titleContactmsg,emailContactmsg,typeContactmsg,statusContactmsg,timeContactmsg";
                                    $halaman = 5;
                                    $page = isset($_GET["cpm"]) ? (int)$_GET["cpm"] : 1;
                                    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                                    $result = mysqli_query($connect,"SELECT ".$field." FROM lbs_contactmsg order by idContactmsg desc");
                                    $total = mysqli_num_rows($result);
                                    $pages = ceil($total/$halaman);            
                                    $query = mysqli_query($connect,"select ".$field." from lbs_contactmsg order by idContactmsg desc LIMIT ".$mulai.", ".$halaman." ");
                                    $no =$mulai+1;
            
                                    while($d=mysqli_fetch_assoc($query)){
                                        #code ....
                                    ?>
                                        <tr>
                                        <td><?php echo $d['idContactmsg']; ?></td>
                                        <td><?php echo $d['titleContactmsg']; ?></td>
                                        <td><?php echo $d['emailContactmsg']; ?></td>
                                        <td><?php echo $d['typeContactmsg']; ?></td>
                                        <td><?php echo $d['statusContactmsg']; ?></td>
                                        <td><?php echo $d['timeContactmsg']; ?></td>
                                        <td><a href="?showMsg=<?php echo $d['idContactmsg']; ?>" class="btn">Lihat</a></td>
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
                                if ($_GET['cpm'] == $i) {
                                    $cpmSelect = "selected";
                                }
                                else {
                                    $cpmSelect = "";
                                }
                            ?>
                            <a href="?cpm=<?php echo $i; ?>" class="pagination <?php echo $cpmSelect; ?>"><?php echo $i; ?></a>
                        <?php }
                    }?>
                </div>
                <div class="sidebar">
					<div class="window">
						<h2>Info</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
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