<?php
 
 $servername= "localhost";
 $username= "root";
 $password= "";
 $dbname= "sppsekolah";
 
 $koneksi = mysqli_connect($servername, $username, $password, $dbname);
 
 if (! session_id()) {
    session_start();
}