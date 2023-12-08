<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php require "conn.php"; ?>
    <div class="container mt-4">
        <p><h2> Search using PHP MySQL and Ajax</h2></p>
        <h6 class="mt-5"><b>Searche Name</b></h6>
        <div class="input-group mb-4 mt-3">
            <div class="form-outline">
                <input type="text" id = "getName">
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    
                </tr>
            </thead>
            <tbody id="showdata">
                <?php
                $query = "SELECT * FROM `users`";
                $queryconn = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_array($queryconn)) {
                    $id = $row['UserID'];
                    $name = $row['UserName'];
                    $email = $row['UserEmail'];
                
                echo "<tr>";
                echo "<td>". $id ."</td>";
                echo  "<td>". $name ."</td>";
                echo  "<td>". $email ."</td>";
                echo  "</tr>";
                 } ; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#getName').on("keyup", function(){
                var getName = $(this).val();
                $.ajax({
                    method: 'POST',
                    url: 'searchajax.php',
                    data: {name:getName},
                    success:function(response)
                    {
                        $("#showdata").html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>