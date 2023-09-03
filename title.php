<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Conversation Title</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
        body{
            
            text-align: center;
        }
        form{
            text-align: center;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }
        .main{
            border-width:1px;
            border-style:solid;
            border-color:blue;
            margin-left: 400px;
            margin-right: 400px;
        }
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
    <body>
        <?php
            include 'header.php'
        ?>
        <div class="div1">
            <h1 style="margin-bottom: 50px; margin-top: 50px" >Choose a Conversation Title</h1>
        </div>
        <div>
        </div>
        <div class="main" style="background-color:white" >
        <form action="title.php" style="margin-top: 20px;" method="POST">
        <div class="form-group">
        <div class="form-group">
            <label for="textInput"> New Title </label>
            <input type="text" class="form-control" name="newTitle" width=150 id="textInput">
            <button type="Submit" name= "submit" method = "POST" class="btn btn-primary" style="margin-top:10px">
            +New Chat</button>
        </div>
        </div>
        <?php
            include 'dbconn.php';
            $query = "select distinct title from ".$_SESSION['username']."_conversation";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if(count($data)>0)
            {
                echo '<label for="oldTitle">Pick an Existing Title</label>
                <select class="form-control" name="oldTitle" width=150 id="oldTitle">';
                foreach($data as $datum)
                {
                    echo '<option value="'.$datum['title'].'">'.$datum['title'].'</option>';
                }
                echo '</select>
                <button type="Submit" name= "submit2" method = "POST" class="btn btn-primary">Continue Chat</button>';
            }
        ?>
        </form>
        </div>
        <img class="background" src="Images/mainBackground2.jpg"/>
        <?php
            if(isset($_POST['submit']))
            {
                $_SESSION['title'] = $_POST['newTitle'];
                header('Location: chat.php');
            }
            if(isset($_POST['submit2']))
            {
                $_SESSION['title'] = $_POST['oldTitle'];
                header('Location: chat.php');
            }
        ?>
    </body>
</html>