<html>
<head>
    <title>Transfer Money</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
    
      button{
        transition: 1.5s;
      }
      button:hover{
        background-color:#616C6F;
        color: white;
      }

      ul {
            list-style-type: none;
            margin: 0;
            padding: 8px;
            overflow: hidden;
            background-color: #333;
        }

        li {
             float: left;
        }

        li a {
             display: block;
             color: white;
             text-align: center;
             padding: 18px 19px;
             text-decoration: none;
        }

         li a:hover {
               background-color: #F5F5F5;
        }



     

    </style>
</head>

<body >
<?php
    include 'config.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
?>

<ul>
  <li><a class="active" href="users.php">Customers</a></li>
  <li><a href="transfer.php">Transactions</a></li>
  <li><a href="history.php">History</a></li>

</ul>


    <div class="container">

        <h2 class="text-center pt-2" style="color : black;">Transfer Money</h2>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-lg">
                    <table class="table table-hover table-lg table-striped table-condensed table-bordered" style="border-color:black;">
                        <thead style="color : black;">
                            <tr>
                            <th scope="col" class="text-center py-4">Id</th>
                            <th scope="col" class="text-center py-4">Name</th>
                            <th scope="col" class="text-center py-4">E-Mail</th>
                            <th scope="col" class="text-center py-4">Balance</th>
                            <th scope="col" class="text-center py-4">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr style="color : black;">
                        <td class="py-4" style="text-align:center"><?php echo $rows['id'] ?></td>
                        <td class="py-4" style="text-align:center"><?php echo $rows['name']?></td>
                        <td class="py-4" style="text-align:center"><?php echo $rows['email']?></td>
                        <td class="py-4" style="text-align:center"><?php echo $rows['balance']?></td>
                        <td style="text-align:center"><a href="users.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn" style="background-color :#66ccff;">Transact</button></a></td> 
                    </tr>
                <?php
                    }
                ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>

        


</body>
</html>