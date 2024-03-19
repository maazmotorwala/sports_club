<?php
include("admin_header.php");
include("connect.php");

?>
<script>
    function validation()
    {
        var v = /^[a-zA-Z ]+$/
        if(form1.txtname.value=="")
        {
            alert("Please Enter Ground Name");
            form1.txtname.focus();
            return false;
        }
        else
        {
            if(!v.test(form1.txtname.value))
            {
                alert("Please Enter Only Characters in Ground Name");
                form1.txtname.focus();
                return false;
            }
        }

        if(form1.txtdesc.value=="")
        {
            alert("Please Enter Ground Description");
            form1.txtdesc.focus();
            return false;
        }


        var fname = document.getElementById("txtimg").value;
        var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase();
        if(document.getElementById("txtimg").value=="")
        {
            alert("Please Enter Ground Image");
            return false;
        }
        else
        {
            if(!(ext=="png" || ext=="jpeg" || ext=="jpg" || ext=="webp"))
            {
                alert("Please Select Proper Image Format Like png,jpg,jpeg or webp");
                return false;
            }
        }

        
    }

    function update_validation()
    {
        var v = /^[a-zA-Z ]+$/
        if(form1.txtname.value=="")
        {
            alert("Please Enter Ground Name");
            form1.txtname.focus();
            return false;
        }
        else
        {
            if(!v.test(form1.txtname.value))
            {
                alert("Please Enter Only Characters in Ground Name");
                form1.txtname.focus();
                return false;
            }
        }

        if(form1.txtdesc.value=="")
        {
            alert("Please Enter Ground Description");
            form1.txtdesc.focus();
            return false;
        }


        var fname = document.getElementById("txtimg").value;
        var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase();
        if(document.getElementById("txtimg").value!="")
        {
            
            if(!(ext=="png" || ext=="jpeg" || ext=="jpg" || ext=="webp"))
            {
                alert("Please Select Proper Image Format Like png,jpg,jpeg or webp");
                return false;
            }
        }

        
    }
</script>
<?php
if(isset($_POST['btnsave']))
{
    $name =$_POST['txtname'];
    $desc =$_POST['txtdesc'];
     //auto number coding start...
    $res2=mysqli_query($con,"select max(ground_id) from ground_detail");
    $gid=0;
    while($r2=mysqli_fetch_array($res2))
    {
        $gid=$r2[0];
    }
    $gid++;
    //auto number coding end...
    $tmppath = $_FILES['txtimg']['tmp_name'];
    $ipath = "ground_img/".$gid."_".time().".png";
    $query = "insert into ground_detail values('$gid','$name','$desc','$ipath')";
    if(mysqli_query($con,$query))
    {
        move_uploaded_file($tmppath,$ipath);
        echo "<script>";
        echo "alert('Ground Detail Saved Successfully');";
        echo "window.location.href='admin_manage_ground.php';";
        echo "</script>";
    }
}

if(isset($_REQUEST['dgid']))
{   
    $gid=$_REQUEST['dgid'];
    $query = "delete from ground_detail where ground_id='$gid'";
    if(mysqli_query($con,$query))
    {
        echo "<script>";
        echo "alert('Ground Detail Deleted Successfully');";
        echo "window.location.href='admin_manage_ground.php';";
        echo "</script>";
    }
}

if(isset($_REQUEST['ugid']))
{
    $gid = $_REQUEST['ugid'];
    $res3=mysqli_query($con,"select * from ground_detail where ground_id='$gid'");
    $r3=mysqli_fetch_array($res3);
    $name1 = $r3[1];
    $desc1 = $r3[2];
    $img1 = $r3[3];
}

if(isset($_POST['btnupdate']))
{
    $name =$_POST['txtname'];
    $desc =$_POST['txtdesc'];
    $gid=$_REQUEST['ugid'];

    if($_FILES["txtimg"]["size"] >0)
    {
        $tmppath = $_FILES['txtimg']['tmp_name'];
        $ipath = "ground_img/".$gid."_".time().".png";
        move_uploaded_file($tmppath,$ipath);
        $query = "update ground_detail set ground_name='$name',description='$desc',ground_img='$ipath' where ground_id='$gid'";
    }else{
        $query = "update ground_detail set ground_name='$name',description='$desc' where ground_id='$gid'";
    }
    
    if(mysqli_query($con,$query))
    {

        echo "<script>";
        echo "alert('Ground Detail Updated Successfully');";
        echo "window.location.href='admin_manage_ground.php';";
        echo "</script>";
    }
}
?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container text-center">

    <div class="d-flex  justify-content-between align-items-center">
      
     
    </div>
    <h2>MANAGE GROUND DETAIL</h2>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>MANAGE GROUND</h2>
        
        </div>

        <div class="row">

          

          <div class="col-lg-4 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form method="post" name="form1" role="form" class="php-email-form" enctype="multipart/form-data">
            <div class="form-group mt-3">
                  <label for="name">Ground Name</label>
                  <input type="text" name="txtname" class="form-control" value="<?php echo $name1; ?>">
                </div>
            <div class="form-group mt-3">
                <label for="name">Ground Description</label>
                <textarea class="form-control" name="txtdesc" rows="3" ><?php echo $desc1; ?></textarea>
              </div>
              <div class="form-group mt-3">
                <label for="name">Ground Image</label>
                <input type="file" class="form-control" name="txtimg" id="txtimg">
              </div>
              <div class="my-3">
              
              </div>
              <div class="text-center">
                <?php
                if(isset($_REQUEST['ugid']))
                {
                ?>
                    <img src="<?php echo $img1; ?>" style="width:150px; height:150px;"/>
                    <button type="submit" name="btnupdate" onclick="return update_validation();">UPDATE</button>

                <?php
                }else{
                ?>
                    <button type="submit" name="btnsave" onclick="return validation();">SAVE</button>
                <?php
                }
                ?>
                
            </div>
            </form>
          </div>

          <div class="col-lg-8 mt-5 mt-lg-0  align-items-stretch">
            <?php
            $qur1 = mysqli_query($con,"select * from ground_detail");
            if(mysqli_num_rows($qur1)>0){
                echo "<table class='table table-bordered'>
                        <tr>
                            <th>GROUND ID</th>
                            <th>GROUND NAME</th>
                            <th>DESCRIPTION</th>
                            <th>GROUND IMAGE</th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                        </tr>";
                    while($q1=mysqli_fetch_array($qur1))
                    {
                        echo "<tr>";
                        echo "<td>$q1[0]</td>";
                        echo "<td>$q1[1]</td>";
                        echo "<td>$q1[2]</td>";
                        echo "<td><img src='$q1[3]' style='width:150px; height: 150px;' ></td>";
                        echo "<td><a href='admin_manage_ground.php?ugid=$q1[0]'>UPDATE</a></td>";
                        echo "<td><a href='admin_manage_ground.php?dgid=$q1[0]'>DELETE</a></td>";
                        echo "</tr>";
                    }
                echo "</table>";
            }else{
                echo "<h2>No Ground Detail Found</h2>";
            }
            ?>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->

<?php
include("footer.php");
?>