<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Assignment 4 Part 3</title>
</head>
<body>
<?php
    if ($_SESSION['valid'] == 1) {
        echo '<p>Click <a href="http://web.engr.oregonstate.edu/~picottes/as4/content1.php">
            here</a> to go to content one.';    
    }
    else {
        echo '<p>A username must be entered. 
            Click <a href="http://web.engr.oregonstate.edu/~picottes/as4/content1.php?action=end">here</a> to 
            return to the login screen.';
	}
?>
</body>
</html>