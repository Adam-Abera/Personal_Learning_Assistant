<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
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
        ?>
        <div style="margin-left: 475px;">
            <h1 style="font-weight: bold; padding-left:50px" >Welcome <?php echo $_SESSION['username']?></h1>
        <ul class="list-group" style=" text-align:center; width: 400px; " >
        <li class="list-group-item" style=" text-align:center">
                <a href="chat.php" class="list-group-item list-group-item-action">
                <img src="Images/chat.jpg" alt="" style="width: 300px; height: 150px" >
                    Chat and Ask Questions Now
                </a>
            </li>
            <li class="list-group-item" style=" text-align:center" >
                <a href=" " class="list-group-item list-group-item-action">
                <img src="Images/resources.jpg" alt="" style="width: 300px; height: 150px" >
                    Get Resources
                </a>
            </li>
        </ul>
    </div>
    <img class="background" src="Images/mainBackground.jpg"/>
    </body>
</html>