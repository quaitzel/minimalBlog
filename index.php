<!doctype html>
<html>
<head>
	<title>a very simple blog</title>
	<link rel="shortcut icon" type="image/x-icon" href="favicon/fav.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cousine" />
</head>

<body>
	<header>
    	<div class="headerBanner">
			<div class="headerText">a very simple blog</div>
		</div>
	</header>
	<div class="wrapper">
		<div class="contentWrapper">
			<?php 
				$servername = "localhost";
				$username = "user";
				$password = "pw";
				$dbname = "dbname";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				} 
				
				$sql = "SELECT title, content, info FROM tablename";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo utf8_encode("<div class='singleItem'><div class='itemTitle'>" . $row["title"]. "</div><div class='itemContent'>" . $row["content"].
				        "</div><div class='itemInfo'>" . $row["info"]. "</div></div><br>");
				    }
				} else {
				    echo "0 results";
				}
				$conn->close();
			?>
		</div>
	</div>
	<footer>
		<div class="bannerFooter">
			<div class="bannerFooterMail">
				<a href="mailto:info@domain.tdl">mail</a>
			</div>
		</div>
    </footer>
</body>
</html>