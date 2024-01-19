<?php
$koneksi = new mysqli ("localhost", "root", "root", "sistem_izin", "8889");

if ($koneksi -> connect_errno) {
    echo "Failed to connect to MySQL: " . $koneksi -> connect_error;
    exit();
}

