<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <center>
  <form method="post">
    <table border="1">
      <tr >
        <th >Product Name</th>
        <th >Images</th>
        <th >Prices</th>
        <th >Quantity</th>
        <th ></th>
      </tr>
      <?php   
      session_start();     
      include("connect.php");
      $UserName = $_SESSION['UserName'];
      $sql="select * from cart where UserName='$UserName'";
      $result = mysqli_query($connect, $sql);
      $check_user = mysqli_num_rows($result);
      if ($check_user == 0){
        echo "<tr>
        <td colspan='6'><h5>Your shopping cart is empty</h5></td>
        </tr>";
      }
      else {
        $sql = "select CartID, SongName, SongImage, Price from song, cart where Song.SongID = cart.SongID AND UserName='$UserName'";

        $result = mysqli_query($connect, $sql);
        while($row_cart =  mysqli_fetch_array($result)){
          $CartID =$row_cart['CartID']; 
          $SongName =$row_cart['SongName']; 
          $SongImage =$row_cart['SongImage']; 
          $Price =$row_cart['Price']; 

          echo "
          <tr>
          <td ><a href='detail.php?product_id=$CartID' >$SongName</a></td>
          <td class='col-md-2 col-sm-3 col-4'><img src='Images/$SongImage' width='50' height='50' ></td>
          <td class='col-sm-2 col-2'><span>$</span>$Price</td>
          <td class='col-2'><a href='cart.php?delete_cart_pro=$CartID'>Delete</a></td>
          </tr>
          ";
        }

      }
      ?>

    </table>
<?php 
    
    if (isset($_GET["delete_cart_pro"])) {  
      $cart_id = $_GET['delete_cart_pro'];
      $sql="delete from cart where cart_id =$CartID";
      $result = mysqli_query($connect, $sql);
      if ($result) {
        echo "<script>window.open('cart.php','_self')</script>";
      }
      else {
        echo "<script>alert('Error')</script>";
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }

   ?>

  </form>
  <h3 style="text-align: center;">Payment Information</h3>
  <form method="POST" action="thanhtoan.php" >
    <table>
      <tr>
        <td> UserName</td>
        <td> <input type="text" id="usr" name="name" value="<?php echo $_SESSION['UserName'];  ?>" readonly></td>
      </tr>
      <tr>
        <td> Select payment bank</td>
        <td><select class="custom-select" required id="bank" name="bank">
          <option selected></option>
          <option value="Vietcombank">Vietcombank</option>
          <option value="Techcombank">Techcombank</option>
          <option value="Airpay">Airpay</option>
          <option value="momo">momo</option>
        </select> </td>
      </tr>
      <tr>
        <td>Order Date </td>
        <td><input type="text" class="form-control" id="usr" name="date" value="<?php
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        echo "". date("d.m.Y h:i:sa");
      ?>" readonly> </td>
    </tr>
    <tr>
      <td> Total</td>
      <td> <input type="text" readonly name="total">
      </div></td>
    </tr>
    <tr>
      <td> <input type="submit" class="btn btn-success" value="Pay"></td>
    </tr>
  </table>


</form>
</center>
</body>
</html>