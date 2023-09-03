<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Chat</title>
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
            <h1 style="font-weight: bold; padding-left:30px; " >Chat</h1>
        <div style="height: 320px; overflow-y: auto;" >
        <ul class="list-group" >
        <?php
        $output = shell_exec('py D:/xampp/htdocs/Learning_Assistant/chat.py "'.$_SESSION['username'].'" "'.$_SESSION['title'].'"');
        #echo '<p>'.$output.'</p>';
        $query = "select * from ".$_SESSION['username']."_conversation where title = '$_SESSION[title]'";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $num = count($data);
        $currentID = 0;
        if($num > 0)
        {
            $currentID = $data[$num-1]['Id'];
            foreach ($data as $datum)
            { 
                if(strtolower($datum['Role']) == "user")
                {
                    echo '<li class="list-group-item" style="width: 500px; background-color:azure; margin-left: 20px; 
                    margin-top:10px">
                            <h5 style="color:blue" >You</h5>
                            <h6>'.$datum['Content'].'</h6>
                    </li>';
                }
                else
                {
                    echo '<li class="list-group-item" style="width: 500px; background-color:azure; margin-left: 20px; 
                    margin-top:10px">
                            <h5 style="color:chocolate" >Assistant</h5>
                            <h6>'.$datum['Content'].'</h6>
                    </li>';
                }
            }
        }
        else
        {
            echo '<li class="list-group-item" style="width: 500px; background-color:azure; align-self:center; 
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
        <textarea name="content" cols="100" rows="5" style="margin-left:100px;" placeholder="Write your message here"></textarea>
        <button type="Submit" name= "submit" method = "POST" class="btn btn-primary">Send</button>
    </form>
    </div>
    <?php
        $newID = $currentID + 1;
        if(isset($_POST['submit']))
        {
            $query = "insert into ".$_SESSION['username']."_conversation values ($newID, 'user', '$_SESSION[title]', 
            '$_POST[content]')";
            mysqli_query($conn, $query);
            header('Location: chat.php');
        } 
    ?>
    <img class="background" src="Images/mainBackground.jpg"/>
    </body>
</html>