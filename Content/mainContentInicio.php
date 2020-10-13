<?php
if(isset($_GET["action"])){
    $action = $_GET['action'];
}else{
    $action = '';
}
?>
<?php 
//MYSQL
// $objeto = new Conexion();
// $conn   = $objeto->Conectar(2);
// $sql    = "CREATE TABLE IF NOT EXISTS Address(address1, address2, city, country, postalcode)";
// //SQL
// $stmt = $conn->prepare($sql);
// $stmt->execute();
// $objetoSQL = new Conexion();
// $conn2   = $objetoSQL->Conectar(2);
// $sql2    = "SELECT PostalCode FROM Person.Address";
// $stmtSQL = $conn2->prepare($sql2);
// $stmtSQL->execute();
// $row = $stmtSQL->fetchAll();
// $postalCodeSQL = $row;

// //POSTGRE
// $stmt = $conn->prepare($sql);
// $stmt->execute();
// $objetoSQL = new Conexion();
// $conn2   = $objetoSQL->Conectar(2);
// $sql2    = "SELECT PostalCode FROM Person.Address";
// $stmtSQL = $conn2->prepare($sql2);
// $stmtSQL->execute();
// $row = $stmtSQL->fetchAll();
// $postalCodeSQL = $row;
// var_dump($row);
?>
<!-- <div id="main-content">
    <div class="container">
        <div id="sqlTable">
            <h1>Nueva Tabla</h1>
            <table id="table-join">
                    <thead>
                        <tr>
                            <th>Address</th>
                            <th>Address 2</th>
                            <th>Distric</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Postal Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Address</th>
                            <th>Address 2</th>
                            <th>Distric</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Postal Code</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>                     -->
    <div id="main-content">
        <div class="container">
            <div id="sqlTable">
                <h1>Anilisis de Datos</h1>
                <a id="create" href="index.php?page=inicio&action=new">Generar Datos</a>
                <a id="delete" href="index.php?page=inicio&action=delete">Eliminar Base de datos</a>
<?php
if($action == 'new'){
    $objeto1 = new Conexion();
    $connMySQL   = $objeto1->Conectar(1);
    $sql = "CREATE DATABASE pruebadb";
    $stmt = $connMySQL->prepare($sql);
    $stmt->execute();
    $sql = "USE pruebadb";
    $stmt = $connMySQL->prepare($sql);
    $stmt->execute();
    //create table
    $sql2 = "CREATE TABLE prueba(
        id INT AUTO_INCREMENT PRIMARY KEY,
        Address1 varchar(50),
        Address2 varchar(50),
        City varchar(50),
        Postal_Code varchar(50)
        )";
    $stmt = $connMySQL->prepare($sql2);
    $stmt->execute();
    //fetch data from postgre
    $objeto = new Conexion();
    $conn   = $objeto->Conectar(3);
    $sql= "SELECT * from city as c join address as a on c.city_id = a.city_id";
    $stmt = $conn->query($sql);

    $querye = "INSERT INTO prueba (Address1, Address2, City, Postal_Code) VALUES ";
    while($row = $stmt->fetch()) {
        $address = $row["address"];
        $address2 = $row["address2"];
        $city= $row["city"];
        $cp = $row["postal_code"];
        $querye .= "('$address', '$address2', '$city', '$cp'),";
    }
    //insert Data to Mysql
    $querye = substr($querye, 0, -1);

    $stmtMySQL = $connMySQL->prepare($querye);
    $stmtMySQL->execute();

    //fetch data from sql
    try{
    $objeto = new Conexion();
    $conn   = $objeto->Conectar(2);
    $sql    = "SELECT AddressLine1, AddressLine2, City, PostalCode FROM Person.Address";                       
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $querye = "INSERT INTO prueba (Address1, Address2, City, Postal_Code) VALUES ";
    $id = 0;
    foreach ($stmt->fetchAll() as $row) {
        $address = str_replace("'","",$row["AddressLine1"]);
        $address = str_replace(",","",$address);
        $address2 = str_replace("'","",$row["AddressLine2"]);
        $address2 = str_replace(",","",$address2);
        $city = $row["City"];
        $city = str_replace("'","",$row["City"]);

        $cp = $row["PostalCode"];
        $querye .= "('$address', '$address2', '$city', '$cp'),";
    }
    //insert Data to Mysql
    $querye = substr($querye, 0, -1);
    $stmtMySQL = $connMySQL->prepare($querye);
    $stmtMySQL->execute();  
}catch(Exception $e){
 echo $e;
}                      
                        ?>  
                        
                <table id="table-join">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Address</th>
                            <th>Address 2</th>
                            <th>City</th>
                            <th>Postal Code</th>
                        </tr>
                    </thead>
                    <tbody> 
                    <?php
                    
                    
                            $sql2 = "SELECT * From prueba";
                            $stmt2 = $connMySQL->prepare($sql2);
                            $stmt2->execute();
                            while ($row = $stmt2->fetch()) {
                                echo  '<tr><td>'. $row["id"] . '</td>';
                                echo '<td>'. $row["Address1"]  .'</td>';
                                echo '<td>'. $row["Address2"]  .'</td>';
                                echo '<td>'. $row["City"]  .'</td>';
                                echo '<td>'. $row["Postal_Code"]  .'</td> </tr>';                       
                            }
                    ?>
                         
                    </tbody>
                    
                </table>
                        <?php }
                        else if($action == 'delete'){
                            $objeto1 = new Conexion();
                            $conn   = $objeto1->Conectar(1);
                            $sql1 = "DROP DATABASE pruebadb";
                            $stmt1 = $conn->prepare($sql1);
                            $stmt1->execute();
                        }?>
            </div>
        </div>
    </div>
</body>
           