<?php
session_start();
header('refresh:1;url=../index.php');
session_destroy();