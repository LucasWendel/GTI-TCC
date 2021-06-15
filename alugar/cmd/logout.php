<?php

// Configura a data de expiração para uma hora

setcookie ("login", "", time() - 3600);
setcookie ("senha", "", time() - 3600, 1);
header("Location: login.php");

?>
