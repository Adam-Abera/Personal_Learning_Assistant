<?php
    $conn = mysqli_connect('localhost', 'root', '', 'learningassistant');
    if(!$conn)
    {
        echo 'Error!'. mysqli_connect_error();
    }
?>