<div id="main-content">
        <div class="container">
            <div id="sqlTable">
                <h1>Tabla PostgreSQL</h1>
                <table id="table-post">
                    <thead>
                        <tr>
                            <th>Address</th>
                            <th>Address 2</th>
                            <th>Disctrict</th>
                            <th>City Id</th>
                            <th>Postal Code</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $objeto = new Conexion();
                        $conn   = $objeto->Conectar(3);    
                        $sql= "SELECT * from  address";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        while ($row = $stmt->fetch()) {
                            echo  '<tr><td>'. $row["address"] . '</td>';
                            echo '<td>'. $row["address2"]  .'</td>';
                            echo '<td>'. $row["district"]  .'</td>';
                            echo '<td>'. $row["city_id"]  .'</td>';
                            echo '<td>'. $row["postal_code"]  .'</td>';
                            echo '<td>'. $row["phone"]  .'</td>';
                        }
                        ?>
                        
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>
</body>