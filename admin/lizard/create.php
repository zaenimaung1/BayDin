<?php
 $nameError="";
 if(isset($_POST['createBtn'])){
    $name = $_POST['name'];
   if($name === ''){
   $nameError ="the name field is require";
   }else{
    $stmt = $conn->prepare("INSERT INTO lizard (detail) values ('$name')");
    $stmt ->execute();

    echo "<script>iziToastAlert('ထပ်ထည့်ပြီးပါပြီး။။' ,'lizard')</script>";
   }
  
 }
    
 ?>
<div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">အိမ်မြှောင်စုပ်ထိုး နိမိတ်</h6>
                            <a href="index.php?page=lizard" class="btn btn-primary ">နောက်သို့</a>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="mb-2">
                                    <label for="">အကြောင်းအရာ</label>
                                    <input type="text" class="form-control" name="name">
                                    <span class="text-danger"><?php echo $nameError ?></span>
                                </div>
                               
                                <button class="btn btn-primary" name="createBtn">ထည့်မည်</button>
                            </form>
                        </div>
                    </div>

                </div>