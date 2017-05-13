        <?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "web";
				
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $database);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
				exit;
			}
				
			session_start();
			if (!empty($_POST['btnlogin'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				
				$pwd = md5($password);
				$postLogin = "SELECT * FROM lbs_useradmin where (useradminUsername = '".$username."') & (useradminPassword ='".$pwd."')";
				$resultLogin = mysqli_num_rows($postLogin);
				if ($resultLogin > 0) {
					$_SESSION['LibsLogon'] = 1;
					header("location:index.php");
				}
				elseif ($resultLogin == 0) {
					header("location:login.php?p=salah");
				}
				else {
					echo "Error: " . $postLogin . "<br>" . $conn->error;
				}
			}
		?>