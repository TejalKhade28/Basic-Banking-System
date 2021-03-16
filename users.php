<?php
include 'config.php';
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transfer_details(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> 
                                    alert('Transaction Successful');
                                     window.location='history.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>
<html>
<head>
    <title>Customers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style type="text/css">
    	
		button{
			border:none;
			background: #66ccff;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
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
    
<ul>
  <li><a class="active" href="users.php">Customers</a></li>
  <li><a href="transfer.php">Transactions</a></li>
  <li><a href="history.php">History</a></li>

</ul>

   

	<div class="container">
   
        <h2 class="text-center pt-4" style="color : black;">Customers</h2>
        <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr style="color : black;">
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
            
            <?php
                include 'config.php';

                $sql ="SELECT * FROM users";

                $query =mysqli_query($conn, $sql) or die( mysqli_error($conn));

                while($rows = mysqli_fetch_assoc($query))
                {
            ?>
            
                <tr style="color : black;">
                    <td class="py-4" style="text-align:center"><?php echo $rows['id']; ?></td>
                    <td class="py-4" style="text-align:center"><?php echo $rows['name']; ?></td>
                    <td class="py-4" style="text-align:center"><?php echo $rows['email']; ?></td>
                    <td class="py-4" style="text-align:center"><?php echo $rows['balance']; ?></td>
                </tr>
                <?php 
                } 
            ?>
        </table>
           
        </div>
        <br><br><br>
        <label style="color : black;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
           
        </select>
        <br>
        <br>
         <div>
            <label style="color : black;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn" >Transfer</button>
            </div>
        
            </div>
            </form>
    </div>


</body>
</html>