<!DOCTYPE html>
<HTML>

	<HEAD>
		<META charset="utf-8">
		<TITLE>Home Page</TITLE>
		<LINK type="text/css" rel="stylesheet" HREF="css/Style.css" media="screen">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<STYLE>
			.search_bar {
  				display: inline-block;
  				border-radius: 4px;
  				background-color: #D30227;
				border: none;
  				color: #FFFFFF;
  				text-align: center;
  				font-size: 28px;
  				padding: 7px;
  				width: 200px;
  				transition: all 0.5s;
  				cursor: pointer;
  				//margin-top: 1px;
			}

			.search_bar span {
  				cursor: pointer;
  				display: inline-block;
  				position: relative;
  				transition: 0.5s;
			}

			.search_bar span:after {
  				content: '\00bb';
  				position: absolute;
  				opacity: 0;
 				top: 0;
  				right: -20px;
  				transition: 0.5s;
			}

			.search_bar:hover span {
  				padding-right: 25px;
			}

			.search_bar:hover span:after {
  				opacity: 1;
  				right: 0;
			}
			
			input[type=text].nm 
			{
				width: 15%;
				font-size: 20px;
				height: 45px;
				padding 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				box-sizing: border-box;
			}
			
			input[type=text].ezx
			{
				width: 10%;
				font-size: 20px;
				height: 45px;
				padding 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				box-sizing: border-box;
			}
			
			H2.added
			{
				margin-left: 5%;
				font-size:2.3em;
				font-weight:bold;
			}
			
			form.mover
			{
				margin-left: 85px;
			}
			font
			{
				margin-left: 85px;
			}
			.movie
			{
				margin-top: 5px;
				margin-left: 25px;
			}
		</STYLE>
	</HEAD>

	<BODY>
		<DIV class="menu-design">
			<strong style="font-size:50px; color:white;">Cryptominers Guide</strong>

		</DIV>
		<DIV class="menu">
			<A HREF="Index.html">Home</A>
			<div class="dropdown">
    				<button class="dropbtn">Beginners Guide 
      					<i class="fa fa-caret-down"></i>
    				</button>
    				<div class="dropdown-content">
      					<a HREF="Bitcoin.php">Bitcoin<IMG class="movie" SRC="Images/logoBit.png" width="40px"></a>
      					<a HREF="Etherium.php">Etherium<IMG SRC="Images/ethLogo.png" width="50px"></a>
    				</div>
  			</div>
			<A HREF="search.php">Graphics Card Calculator</H2></A>
			<A HREF="AbUs.php">About Us</A>
			<A class="active" HREF="Help.php">Help</A>
		</DIV>
		
		<DIV class="card">
			<BR/>
			<H2 class="added">Help</H2>
			<BR/>
			<font>If you would like to help make this website a better user destination feel free to input some data to help new miners.</font>
				<BR/>
				<BR/>
			<font>If you see any graphics cards that are not on the site, feel free to add their name and hashrate.</font>
			<BR/>
			<BR/>
			<H2 class="added">Add Graphics Card to Database</H2>
			<form class="mover" action="Help.php" method="post">
				<input class="nm" type="text" placeholder="Name..."  name="n">
				<input class="ezx" type="text" placeholder="Etherium value..."  name="e">
				<input class="ezx" type="text" placeholder="Zec Coin Value..."  name="z">
				<input class="ezx" type="text" placeholder="XMR Value..."  name="x">
				<button class="search_bar" type="submit" name="submit" style="vertical-align:middle"><span>Submit</span></button>
			</form>
			<BR/>
			<BR/>
			<BR/>
			<BR/>
			
		</DIV>
		<BR/>
		<BR/>
		<?php 
		if (isset($_POST['submit']))
		{
			$servername = "127.0.0.1";
			$username = "tyler";
			$password = "tyler";
			$database = "tyler";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $database);
			
			$n = $_POST['n'];
			$e = $_POST['e'];
			$z = $_POST['z'];
			$x = $_POST['x'];
			//echo $q;
			
			if($conn->connect_error) 
			{
				exit('Could not connect');
			}

			//$sql = "SELECT id, name, eth, zec, xmr FROM graphics_card WHERE name LIKE '%".$q."%'";
			
			$sql = "INSERT INTO graphics_card (name, eth, zec, xmr) VALUES ('".$n."', '".$e."', '".$z."', '".$x."')";

			if ($conn->query($sql) === TRUE) {
				printf( "New record created successfully");
			} 
			else 
			{
				printf( "Error: " . $sql . "<br>" . $conn->error);
			}
			$conn->close();
		}
		?>
	</BODY>
</HTML>