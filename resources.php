<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Resources</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
        
        img.background{
            z-index: -2;
            height: 100%;
            width: 100%;
            top: 0px;
            left: 0px;
            position: absolute;
        }
    </style>
    </head>
    <body >
        <?php
            include('header.php');
            include('dbconn.php');
        ?>
        <div>
            <h1 style="font-weight: bold; padding-left:30px; " >Resources</h1>
        <div style="height: 320px; overflow-y: auto;" >
        <ul class="list-group" >
        <?php
        $output = shell_exec('py D:/xampp/htdocs/Learning_Assistant/resources.py "'.$_SESSION['username'].'"');
        echo '<li class="list-group-item" style="width: 800px; background-color:azure; margin-left: 20px; 
        margin-top:10px">
        <h4>'.$output.'</h4>
        </li>'; 
        ?>
        </ul>
        </div>
    </div>
    <img class="background" src="Images/mainBackground.jpg"/>
    </body>
</html>