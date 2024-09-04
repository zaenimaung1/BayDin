<?php
 $nameError="";
 if(isset($_POST['createBtn'])){
    $name = $_POST['name'];
    $detail = $_POST['detail'];
   if($name === ''){
   $nameError ="the name field is require";
   }else{
    $stmt = $conn->prepare("INSERT INTO shakes (position ,detail) values ('$name','$detail')");
    $stmt ->execute();

    echo "<script>iziToastAlert('ထပ်ထည့်ပြီးပါပြီး။' ,'shake')</script>";
   }
  
 }
    
 ?>
<div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">အသားလှုပ်နိမိတ်</h6>
                            <a href="index.php?page=shake" class="btn btn-primary ">နောက်သို့</a>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="mb-2">
                                    <label for="">အသားလှုပ်သောနေရာ</label>
                                    <input type="text" class="form-control" name="name">
                                    <span class="text-danger"><?php echo $nameError ?></span>
                                    <label for="">နိမိတ်</label>
                                    <input type="text" class="form-control" name="detail">
                                    <span class="text-danger"><?php echo $nameError ?></span>
                                </div>
                               
                                <button class="btn btn-primary" name="createBtn">ထည့်မည်</button>
                            </form>
                        </div>
                    </div>

                </div>