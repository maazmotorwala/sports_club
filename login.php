<?php
include("header.php");
include("connect.php");
if(isset($_POST['btnlogin']))
{
  
    $email =$_POST['txtemail'];
    $pwd =$_POST['txtpwd'];


    $res1 = mysqli_query($con,"select * from admin_detail where email_id='$email' and pwd='$pwd'");
    if(mysqli_num_rows($res1)>0){
        echo "<script>";
        echo "alert('Admin Login Succssfully');";
        echo "window.location.href='admin_manage_ground.php';";
        echo "</script>";
    }else{
      $res2 = mysqli_query($con,"select * from member_regis where email_id='$email' and pwd='$pwd'");
      if(mysqli_num_rows($res2)>0){
          echo "<script>";
          echo "alert('Member Login Succssfully');";
          echo "window.location.href='login.php';";
          echo "</script>";
      }else{
          echo "<script>";
         echo "alert('Check Your Email Id Or Password');";
          echo "window.location.href='login.php';";
          echo "</script>";
     }
   }
}
?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container text-center">

    <div class="d-flex  justify-content-between align-items-center">
      
     
    </div>
    <h2>LOGIN</h2>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>LOGIN</h2>
        
        </div>

        <div class="row">

          

          <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form method="post" role="form" class="php-email-form">
                <div class="form-group mt-3">
                  <label for="name">Your Email</label>
                  <input type="text" name="txtemail" class="form-control" >
                </div>
                <div class="form-group mt-3">
                  <label for="name">Your Password</label>
                  <input type="password" name="txtpwd" class="form-control" >
                </div>
              <div class="my-3">
              
              </div>
              <div class="text-center">
                <button type="submit" name="btnlogin" >LOGIN</button>
                
            </div>
            </form>
          </div>

          <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch">
          <img src="assets/img/log1.gif"  style="width:100%;"/>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->

<?php
include("footer.php");
?>