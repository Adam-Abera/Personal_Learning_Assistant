<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
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
            <h1 style="font-weight: bold; padding-left:30px" >Chat</h1>
        <div style="background-color:dimgray; height: 320px; overflow-y: auto;" >
        <ul class="list-group" >
        <?php
        $query = "select * from ".$_SESSION['username']."_conversation";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if(count($data) > 0)
        {
            foreach ($data as $datum)
            { 
                if(strtolower($datum['role']) == "user")
                {
                    echo '<li class="list-group-item" style="width: 500px; color:cadetblue; margin-left: 20px; 
                    margin-top:10px">
                            <h5>You</h5>
                            <h6>'.$datum['content'].'</h6>
                    </li>';
                }
                else
                {
                    echo '<li class="list-group-item" style="width: 500px; color:cadetblue; margin-left: 20px; 
                    margin-top:10px">
                            <h5>Assistant</h5>
                            <h6>'.$datum['content'].'</h6>
                    </li>';
                }
            }
        }
        else
        {
            echo '<li class="list-group-item" style="width: 500px; background-color:grey; align-self:center; 
                    margin-top:10px">
                            <h5>Start a conversation</h5>
                    </li>';
        }
        ?>
        </ul>
        </div>
    </div>
    <div>
    <form action="chat.php" method="post" style="margin-top: 20px; " >
        <textarea name="response" cols="100" rows="5" style="margin-left:100px;" ></textarea>
        <input type="submit" value="Send" class="btn btn-primary" >
    </form>
    </div>
    <img class="background" src="Images/mainBackground.jpg"/>
    </body>
</html>