<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>BÜFK Rezervasyon Sistemi</title>
	</head>
	<body>		
		<?php
			// Create a database connection
			$connection = mysql_connect("localhost","username","password");   
			if (!connection) {
				die ("Please reload page. Database connection failed: " . mysql_error());
			}

			// Select a database to use
			$db_select = mysql_select_db("db_name",$connection);
			if (!$db_select) {
					die("Please reload page. Database selection failed: " . mysql_error());
			}
			
			// Set character set for special characters
			mysql_set_charset("utf8", $connection);
			
			$result = mysql_query("SELECT * FROM reservations ORDER BY date DESC, time DESC",$connection);

			echo "<table border='0.5'>
			<tr>
			<th>___Date___</th>
			<th>___Time___</th>
			<th>___Name___</th>
			<th>___Surname___</th>
			<th>___Phone___</th>
			<th>___Email___</th>
			<th>___Show Date___</th>
			<th>___Full Ticket___</th>
			<th>___Student Ticket___</th>
			</tr>";

			while($row = mysql_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $row['date'] . "</td>";
				echo "<td>" . $row['time'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['surname'] . "</td>";
				echo "<td>" . $row['phone'] . "</td>";
				echo "<td>" . '<a href="mailto:' . $row['email'] . '"> '. $row['email'] . '</a>'. "</td>";
				echo "<td>" . $row['showdate'] . "</td>";
				echo "<td>" . $row['numof_full'] . "</td>";
				echo "<td>" . $row['numof_student'] . "</td>";
				echo "</tr>";
			}

			echo "</table>";
		?>
	</body>
</html>