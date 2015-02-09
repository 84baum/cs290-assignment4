<?php
session_start();
if(isset($_GET['action']) && $_GET['action'] == 'end') {
    $_SESSION = array();
    session_destroy();
    header('Location: http://web.engr.oregonstate.edu/~picottes/as4/login.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Assignment 4 Part 3</title>
</head>
<body>
<?php
    function setName() {
        if ($_SESSION['valid'] == 1) {
            return TRUE;
        }
        else {
            if ($_POST['username'] === "" || $_POST['username'] === null) {
                echo '<p>A username must be entered. 
                    Click <a href="http://web.engr.oregonstate.edu/~picottes/as4/content1.php?action=end">here</a> to 
                    return to the login screen.';
            }
            else {
                return TRUE;
            }
        }
    }
    $validateVisit = setName();
    if ($validateVisit) {
        if (session_status() == PHP_SESSION_ACTIVE) {
            if (isset($_POST['username'])) {
                $_SESSION['username'] = $_POST['username'];
            }
            if (!isset($_SESSION['visits'])) {
                $_SESSION['visits'] = 0;
            }
            if (!isset($_SESSION['valid'])) {
                $_SESSION['valid'] = 1;
            }
            $_SESSION['visits']++;
            echo "<p>Hi $_SESSION[username], you have visited this page $_SESSION[visits] times before.";
            echo '<p>Click <a href="http://web.engr.oregonstate.edu/~picottes/as4/content1.php?action=end">
                here</a> to logout.';
            echo '<p>Click <a href="http://web.engr.oregonstate.edu/~picottes/as4/content2.php">
                here</a> to go to content two.';
		}
	}
?>
</body>
</html>