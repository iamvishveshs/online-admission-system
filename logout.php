<?php
session_start();
if(session_unset())
{
    header("Location: login.php");
}

?>