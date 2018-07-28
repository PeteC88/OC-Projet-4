<?php
include('SessionAdmin.php');

$sessionAdmin = new SessionAdmin();

$sessionAdmin->deconnect();

header("Location: connect.php");
