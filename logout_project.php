<html>
<body>
<?php

    session_start();
session_destroy(); // Destroying All Sessions

header("Location: Cover Page3.php"); // Redirecting To Home Page
exit;
?>
</body>
</html>
