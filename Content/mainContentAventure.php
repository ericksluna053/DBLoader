<div id="main-content">
        <div class="container">
            <div id="sqlTable">
                <h1>Tabla PostgreSQL</h1>
                <table id="table-aventure">
                    <thead>
                        <tr>
                            <th>Address</th>
                            <th>Address 2</th>
                            <th>City</th>
                            <th>Postal Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $objeto = new Conexion();
                        $conn   = $objeto->Conectar(2);    
                        $sql= "SELECT * from  Person.Address";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch()) {
                            echo  '<tr><td>'. $row["AddressLine1"] . '</td>';
                            echo '<td>'. $row["AddressLine2"]  .'</td>';
                            echo '<td>'. $row["City"]  .'</td>';
                            echo '<td>'. $row["PostalCode"]  .'</td>';
                        }
                        ?>
                        
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>
</body>