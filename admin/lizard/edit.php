<?php
  $edit_id = $_GET['edit_id'];
  $stmt = $conn->prepare("SELECT * FROM  lizard where id= $edit_id");
  $stmt->execute();
  $category=$stmt->fetchObject();
 
 
  $nameError='';
  if(isset($_POST['editBtn'])){
     $name = $_POST['name'];
   if($name===''){
     $nameError="something is wrong!";
   }else{
     $stmt = $conn->prepare("UPDATE lizard SET detail='$name' WHERE id= $edit_id ");
     $stmt ->execute();
     echo "<script>iziToastAlert('ပြင်ဆင်ပြီးပါပြီ။','lizard')</script>";
   }
  }
    
?>
<div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">အိမ်မြှောင်စုပ်ထိုး နိမိတ်</h6>
                            <a href="index.php?page=lizard" class="btn btn-primary">နောက်သို့</a>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="mb-2">
                                    <label for="">အကြောင်းအရာ</label>
                                    <input type="text" class="form-control" value="<?php echo $category->detail?>" name="name">
                                    <span class="text-danger"><?php echo $nameError ?></span>
                                </div>
                               
                                <button class="btn btn-primary" name="editBtn">ပြင်ဆင်မည်</button>
                            </form>
                        </div>
                    </div>

                </div>