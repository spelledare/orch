<?php
function dbConnect() {
	// Opens the database connection and prints an error message if something goes wrong.
	global $db;
	global $dbhost, $dbuser, $dbpwd, $dbname;
	$db = @mysql_connect($dbhost, $dbuser, $dbpwd)
		or die("<h1>Database Connect Error</h1>Sometimes things don't work as you expect. Somethings things go wrong. This is such a time. There is a temporary error in the database. Please try again. If the error remains, please contact webmaster@orch.se and write what you intended to do, what happened and this error message: <code>Could not connect to the database</code>. Thank you for your help.");
	@mysql_select_db($dbname, $db)
		or die("<h1>Database Select Error</h1>Sometimes things don't work as you expect. Somethings things go wrong. This is such a time. There is a temporary error in the database. Please try again. If the error remains, please contact webmaster@orch.se and write what you intended to do, what happened and this error message: <code>Could not select the database</code>. Thank you for your help.");
}

function dbDisconnect() {
	// Closes the database connection
	global $db;
	mysql_close($db);
}

function checkUser() {
	if ( isset ($_SESSION['id']) ) {
		// if user is logged in, everything is cool and you just go on
		dbConnect();
		$date = date("Y-m-d H:i:s");
		$id = $_SESSION['id'];
		$sql = "UPDATE orch_user SET uSenDate = \"$date\" WHERE uID = \"$id\";";
		$result = mysql_query($sql);
		dbDisconnect();
	} else {
		// user isn't logged in, send to the login page
		$url = "http://" . $_SERVER['SERVER_ADDR'] . $_SERVER['PHP_SELF'] ;
		$_SESSION['url'] = $url;
		header("Location: login.php");
	}
}

function login() {

}
function logout($page) {
	session_unset();
	session_destroy();
	header("Location: $page");
}

?>
