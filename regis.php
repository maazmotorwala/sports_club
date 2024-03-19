<?php
include("header.php");
include("connect.php");
?>
<script>
    function validation()
    {
        var v = /^[a-zA-Z ]+$/
        if(form1.txtname.value=="")
        {
            alert("Please Enter Your Name");
            form1.txtname.focus();
            return false;
        }
        else
        {
            if(!v.test(form1.txtname.value))
            {
                alert("Please Enter Only Characters in Your Name");
                form1.txtname.focus();
                return false;
            }
        }

        if(form1.txtadd.value=="")
        {
            alert("Please Enter Your Address");
            form1.txtadd.focus();
            return false;
        }

        if(form1.txtcity.value=="")
        {
            alert("Please Enter Your City Name");
            form1.txtcity.focus();
            return false;
        }
        else
        {
            if(!v.test(form1.txtcity.value))
            {
                alert("Please Enter Only Characters in Your City Name");
                form1.txtcity.focus();
                return false;
            }
        }

        var v = /^[0-9]{10,10}$/
        if(form1.txtmno.value=="")
        {
            alert("Please Enter Your Mobile No");
            form1.txtmno.focus();
            return false;
        }else if(form1.txtmno.value.length!=10)
        {
            alert("Please Enter Your Mobile No 10 Digit Long");
            form1.txtmno.focus();
            return false;
        }
        else
        {
            if(!v.test(form1.txtmno.value))
            {
                alert("Please Enter Only Digits in Your Mobile No");
                form1.txtmno.focus();
                return false;
            }
        }

        var v = /^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})+$/
        if(form1.txtemail.value=="")
        {
            alert("Please Enter Your Email ID");
            form1.txtemail.focus();
            return false;
        }
        else
        {
            if(!v.test(form1.txtemail.value))
            {
                alert("Please Enter Valid Email ID");
                form1.txtemail.focus();
                return false;
            }
        }

        if(form1.txtpwd.value=="")
        {
            alert("Please Enter Your Password");
            form1.txtpwd.focus();
            return false;
        }else if(form1.txtpwd.value.length<6)
        {
            alert("Please Enter More than 6 Characters in Your Password");
            form1.txtpwd.focus();
            return false;
        }else if(form1.txtpwd.value.length>10)
        {
            alert("Please Enter Less than 10 Characters in Your Password");
            form1.txtpwd.focus();
            return false;
        }

    }
</script>
<?php
if(isset($_POST['btnregis']))
{
    $name =$_POST['txtname'];
    $add =$_POST['txtadd'];
    $city =$_POST['txtcity'];
    $mno =$_POST['txtmno'];
    $email =$_POST['txtemail'];
    $pwd =$_POST['txtpwd'];


    $res1 = mysqli_query($con,"select * from member_regis where email_id='$email'");
    if(mysqli_num_rows($res1)>0){
        echo "<script>";
        echo "alert('Email Id Already Exists');";
        echo "window.location.href='regis.php';";
        echo "</script>";
    }else{
        //auto number coding start...
        $res2=mysqli_query($con,"select max(member_id) from member_regis");
        $mid=0;
        while($r2=mysqli_fetch_array($res2))
        {
            $mid=$r2[0];
        }
        $mid++;
        //auto number coding end...
        $query = "insert into member_regis values('$mid','$name','$add','$city','$mno','$email','$pwd')";
        if(mysqli_query($con,$query))
        {
            echo "<script>";
            echo "alert('Register Successfully');";
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
    <h2>Registration</h2>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
      <div class="container">

   

        <div class="row">

          <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form method="post" role="form" class="php-email-form" name="form1">
                <div class="form-group mt-3">
                  <label for="name">Your Name</label>
                  <input type="text" name="txtname" class="form-control">
                </div>
            <div class="form-group mt-3">
                <label for="name">Address</label>
                <textarea class="form-control" name="txtadd" rows="3" ></textarea>
              </div>
              <div class="form-group mt-3">
                <label for="name">City</label>
                <input type="text" class="form-control" name="txtcity">
              </div>
              <div class="form-group mt-3">
                <label for="name">Mobile No</label>
                <input type="text" class="form-control" name="txtmno">
              </div>
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
                    <button type="submit" name="btnregis" onclick="return validation();">REGISTER</button>
                </div>
            </form>
          </div>
          
          <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch">
          <img src="assets/img/regis1.gif"  style="width:100%;"/>
          </div>
          
        </div>
       
      </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->

<?php
include("footer.php");
?>