<?php require('../config/database.php'); ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Fullname</th>
                <th>Email</th>
                <th>Status</th>
                <th>Foto</th>
                <th>...</th>
            </tr>
        </thead>
        <?php
        
            $query_users = 
            "SELECT
             id,fullname,email,CASE WHEN status = true THEN 'Active' ELSE 'Inactive' END AS status 
            FROM 
                users
            ";
            $result = pg_query($conn, $query_users);
            while($row = pg_fetch_assoc($result)){
                echo "<tr>";
                    echo "<td>". $row['fullname'] ."</td>";
                    echo "<td>". $row['email'] ."</td>";
                    echo "<td>". $row['status'] ."</td>";
                    echo "<td><img src='icons/imagen-de-perfil.png'></td>";
                    echo "<td>
                        <a href='#'><img src='icons/editar.png'></a>
                        <a href='borrar_users.php?id=" . $row['id'] . "' onclick='return confirm(\"¿Estás seguro de eliminar este usuario?\")'>
                        <img src='icons/borrar.png' width='20'>
                        </a>
                    
                    </td>";
                echo "</tr>";
            }
        ?>             
    </table>

</body>
</html>


