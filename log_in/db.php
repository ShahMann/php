<?php

$conn = mysqli_connect("localhost", "root", "root", "teacher");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }