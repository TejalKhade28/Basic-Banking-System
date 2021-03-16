<html>
<head>
    <title>Transaction History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
    

<style>
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
<body>
<ul>
  <li><a class="active" href="users.php">Customers</a></li>
  <li><a href="transfer.php">Transactions</a></li>
  <li><a href="history.php">History</a></li>

</ul>


    <div class="container">
        <h2 class="text-center pt-4" style="color : black;">Transaction History</h2>
        <br>
        <div class="table-responsive-lg">
        <table class="table table-hover table-striped table-condensed table-bordered" >
        <thead style="color : black;">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Sender</th>
            <th class="text-center">Receiver</th>
            <th class="text-center">Amount</th>
        </tr>
        </thead>
            <tbody>
            <?php
                include 'config.php';

                $sql ="SELECT * FROM transfer_details";

                $query =mysqli_query($conn, $sql) or die( mysqli_error($conn));

                while($rows = mysqli_fetch_assoc($query))
                {
            ?>
                <tr style="color : black;">
                <td class="py-4" style="text-align:center"><?php echo $rows['id']; ?></td>
                <td class="py-4" style="text-align:center"><?php echo $rows['sender']; ?></td>
                <td class="py-4" style="text-align:center"><?php echo $rows['receiver']; ?></td>
                <td class="py-4" style="text-align:center"><?php echo $rows['amount']; ?> </td> 
                </tr>
        
            <?php
                }
            ?>
            </tbody>
        </table>
        </div>
    </div>

</body>
</html>