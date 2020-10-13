<?php
if(isset($_GET["page"])){
    $page = $_GET['page'];
}else{
    $page = 'inicio';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis de datos</title>
    <?php include 'Content/scripts.php'?>
</head>
<body>
    <style>
        body{
    margin:0px;
}
#menu{
    display: flex;
    background-color: #33FFFA;
    height: 80px;
}
#logo{
    width: 10%;
    margin:20px;
    background-color: white;
}
#left-nav ul{
    display:flex;
}
#left-nav li{
    list-style: none;
    color: white;
    margin: 20px;
}
#left-nav a{
    color: black;
    background-color: #33FFB3 ;
    border-radius: 10px;
    padding: 10px;
}
h1{
    text-align: center;
    background-color: #F0F0F0;
}
.dataTables_wrapper{
    margin:30px;
}
a#create {
    background-color: #72CC36;
    color: white;
    width: 200px;
    margin: 10px;
    padding: 12px;
}
a#delete {
    background-color: #F95858;
    color: white;
    width: 200px;
    margin: 10px;
    padding: 12px;
}
#create:hover{
    background-color: #BFF79B;
}
#delete:hover{
    background-color: #FA9B9B;
    
}
    </style>
    <?php
    include 'Content/mainMenu.php';
    include 'BDsettings/conexion.php';

    if($page == 'inicio'){
        include 'Content/mainContentInicio.php'; 
    ?>
    <script src="js/scriptsInicio.js" type="text/javascript"></script>
    <?php
    }
    if($page == 'aventure'){
        include 'Content/mainContentAventure.php'; 
    ?>
    <script src="js/scriptsAventure.js" type="text/javascript"></script>
    <?php
    }
    if($page == 'postgre'){
        include 'Content/mainContentPostgre.php'; 
    ?>
    <script src="js/scriptsPostgre.js" type="text/javascript"></script>
    <?php
    }
    ?>

</body>
</html>