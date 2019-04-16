<!DOCTYPE html>
<HTML>

	<HEAD>
		<META charset="utf-8">
		<TITLE>Home Page</TITLE>
		<LINK type="text/css" rel="stylesheet" HREF="css/Style.css" media="screen">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="https://cdn.blockspring.com/blockspring.js"></script>
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
			
			input[type=text].stype
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
			
			textarea. test {
   				resize: none;
			}
			
			.dataLook
			{
				color: black;
			}
			
			TABLE
			{
				width: 100%;
				border-collapse: collapse;
			}
			
			TD
			{
				padding: 8px;
				text-align: left;
				border-bottom: 1px solid #ddd;
				//background-color:white;
			}
			
			.Tabs
			{
				background-color:white;
			}
			
			TH
			{
				padding: 8px;
				font-weight: bold;
				text-align: left;
				border-bottom: 1px solid #ddd;
				background-color:white;
			}
			
			TR:hover 
			{
				background-color:#FFC474;
			}
			
			form.mover
			{
				margin-left: 85px;
			}
			
			H2.STittle
			{
				margin-left: 5%;
				font-size:2.5em;
				font-weight:bold;
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
			<A class="active" HREF="search.php">Graphics Card Calculator</H2></A>
			<A HREF="AbUs.php">About Us</A>
			<A HREF="Help.php">Help</A>
		</DIV>

		<DIV class="card">
			<BR/>
			<H2 class="STittle">Graphics Card Calculator</H2>
			<BR/>
			<FONT>Below you can search the graphics card that you have or are looking at buying and figure out how much money that graphics card can make you</FONT>
			<BR/>
			<FONT>mining some of the most profitable crypto currencies.</FONT>
			<BR/>
			<BR/>
			<H2 class="STittle">Search Graphic Cards</H2>
			<BR/>
			<form class="mover" action="search.php" method="post">
				<input class="stype" type="text" placeholder="Search.."  name="q">
				<button class="search_bar" type="submit" name="submit" style="vertical-align:middle"><span>Search </span></button>
				
			</form>
		</DIV>
		
		<DIV class = "Tabs">
		<?php 
		if (isset($_POST['submit']))
		{
			$servername = "127.0.0.1";
			$username = "tyler";
			$password = "tyler";
			$database = "tyler";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $database);
			
			$q = $_POST['q'];
			
			//echo $q;
			
			if($conn->connect_error) 
			{
				exit('Could not connect');
			}

			$sql = "SELECT id, name, eth, zec, xmr FROM graphics_card WHERE name LIKE '%".$q."%'";

			$result = $conn->query($sql);

			$avgEth = 0.013466667;
			$avgZec = 0.0004677333333;
			$avgXmr = 0.0001466;
			
			printf ("<BR/>\n<TABLE>\n" . "<TR>\n" . "<TH>Graphics Card Name</TH><TH>Etherium Hashrate(Mh/s)</TH><TH>Zec Coin Hashrate(H/s)</TH><TH>XMR Hashrate(H/s)</TH><TH>Etherium Cash per Day</TH><TH>Zec Cash per Day</TH><TH>XMR Cash per Day</TH></TR>\n");
			while ($row = $result->fetch_assoc()) 
			{
				printf("<TR>\n");//<a href='" . $_SERVER['SCRIPT_FILENAME'] . "?aid=" . $row['id'] . "'>
				printf("<TD>" . $row['name'] . "</TD>" . "<TD>" . $row['eth'] . "</TD>" . "<TD>" . $row['zec'] . "</TD>" . "<TD>" . $row['xmr'] . "</TD>" . "<TD>" . "$" . $avgEth*$row['eth'] . "</TD>" . "<TD>" . "$" . $avgZec*$row['zec'] . "</TD>" . "<TD>" . "$" . $avgXmr*$row['xmr'] . "</TD>");
				printf("</a></TR>\n");
			}
			printf("</TABLE>\n");

			$result->free();
			$conn->close();
		}
		?>
		<BR/>
		</DIV>
	</BODY>
</HTML>