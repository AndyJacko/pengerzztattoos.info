<?php
session_start();
session_unset();
session_destroy();
header("Location: /cp/?s=2");
?>