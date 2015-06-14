<?php

require_once("prepare.php");
//var_dump(getEmail() );
if (getEmail() === "needsToLogin") {
    require_once("guest.html");
} else {
    require_once("user.html");
    require_once("body.html");
}
// for testing it is working
//echo "modal.php permissions of $email = $permission";
?>