<?php
if (isset($_GET["gameDevName"])){
    echo "<h2>Student Name: ". $_GET["gameDevName"]. "</h2>";
}

if (isset($_GET["usingGameEngine"])){
    echo "<h2>Using Game Engine: ". $_GET["usingGameEngine"]."</h2>";
}
?>