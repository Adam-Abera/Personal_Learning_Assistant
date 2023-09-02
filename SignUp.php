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
    </style>    
    </head>
    <body>
        <?php
            include('dbconn.php');
            if(isset($_POST['submit']))
            {
                $query = "insert into user_login values ('$_POST[username]', '$_POST[passwd]')";
                mysqli_query($conn, $query);

                $query = "create table ".$_POST['username']."_info (Subject varchar(50), Level varchar(20))";
                mysqli_query($conn, $query);

                $query = "insert into ".$_POST['username']."_info values ('$_POST[subject]', '$_POST[level]')";
                mysqli_query($conn, $query);

                $query = "create table ".$_POST['username']."_conversation (Id int, Role varchar(100), Title varchar(100), Content varchar(5000))";
                mysqli_query($conn, $query);

                session_start();
                $_SESSION['username'] = $_POST['username'];
            }
        ?>
        <div class="div1">
            <h1 style="margin-bottom: 50px; margin-top: 50px" >Sign In</h1>
        </div>
        <div>
        </div>
        <div class="main">
        <form action="SignUp.php" style="margin-top: 20px; margin-top: 20px" method="POST">
        <div class="form-group">
        <div class="form-group">
            <label for="textInput"> Enter a username </label>
            <input type="text" class="form-control" name="username" width=150 id="textInput">
        </div>
        <div class="form-group">
        <label>Choose a Password</label>
            <input type="password" class="form-control" name="passwd" width=150>
        </div>
        <div class="form-group">
        <label>Choose a subject</label>
            <select class="form-control" name="subject" width=150>
                <option value="Chemistry">Chemistry</option>
                <option value="Physics">Physics</option>
                <option value="Biology">Biology</option>
                <option value="Mathematics">Mathematics</option>
                <option value="English">English</option>
                <option value="Computer Science">Computer Science</option>
            </select>
        </div>
        <div class="form-group">
        <label>Choose a skill level</label>
            <select class="form-control" name="level" width=150>
                <option value="Grade 9">Grade 9</option>
                <option value="Grade 10">Grade 10</option>
                <option value="Grade 11">Grade 11</option>
                <option value="Grade 12">Grade 12</option>
                <option value="Undergraduate">Undergraduate</option>
            </select>
        </div>
        <div class="form-group">
            <button type="Submit" name= "submit" method = "POST" class="btn btn-primary">Sign Up</button>
        </div>
        </div>
        </form>
        </div>
    </body>
</html>