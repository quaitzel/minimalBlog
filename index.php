<?php
// configuration section

// content definition
$websiteTitle = "a very simple blog";
$headerText = "a very simple blog - very important!";
$faviconPath = "favicon/fav.ico";
$contactEmailFooter = "info@domain.tdl";
$contactWordingFooter = "mail";

// database connection
$server = "localhost";
$username = "user";
$password = "pw";
$database = "dbName";
$table = "tableName";
?>

<!doctype html>
<html>

<head>
	<title>
		<?php echo $websiteTitle ?>
	</title>
	<link rel="shortcut icon" type="image/x-icon" href=<?php echo $faviconPath ?>>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cousine" />
</head>

<body>
	<header>
		<div class="headerBanner">
			<div class="headerText">
				<?php echo $headerText ?>
			</div>
		</div>
	</header>
	<div class="wrapper">
		<div class="contentWrapper">
			<?php
			// create connection
			$conn = new mysqli($server, $username, $password, $database);
			// check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			// create database query
			$sql = "SELECT title, content, info FROM " . $table;
			// get result from database with query
			$result = $conn->query($sql);
			// check result is not empty
			if ($result->num_rows > 0) {
				// output data of each row
				while ($row = $result->fetch_assoc()) {
					echo utf8_encode("<div class='singleItem'><div class='itemTitle'>" . $row["title"] . "</div><div class='itemContent'>" . $row["content"] .
						"</div><div class='itemInfo'>" . $row["info"] . "</div></div><br>");
				}
			} else {
				echo "0 results";
			}
			// close database connection
			$conn->close();
			?>
		</div>
	</div>
	<footer>
		<div class="bannerFooter">
			<div class="bannerFooterMail">
				<a href="mailto:<?php echo $contactEmailFooter ?>"><?php echo $contactWordingFooter ?></a>
			</div>
		</div>
	</footer>
</body>

</html>