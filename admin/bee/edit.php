<?php
  $edit_id = $_GET['edit_id'];
  $stmt = $conn->prepare("SELECT * FROM  bee where id= $edit_id");
  $stmt->execute();
  $category=$stmt->fetchObject();
 
 
  $nameError='';
  if(isset($_POST['editBtn'])){
     $name = $_POST['name'];
   if($name===''){
     $nameError="something is wrong!";
   }else{
     $stmt = $conn->prepare("UPDATE bee SET detail='$name' WHERE id= $edit_id ");
     $stmt ->execute();
     echo "<script>iziToastAlert('ပြင်ဆင်ပြီးပါပြီ။','bee')</script>";
   }
  }
    
?>
<div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">ပျားစွဲနိမိတ်</h6>
                            <a href="index.php?page=bee" class="btn btn-primary ">နောက်သို့</a>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="mb-2">
                                    <label for="">ပျားအိမ်စွဲကပ်သောနေရာ</label>
                                    <input type="text" class="form-control" value="<?php echo $category->detail?>" name="name">
                                    <span class="text-danger"><?php echo $nameError ?></span>
                                </div>
                               
                                <button class="btn btn-primary" name="editBtn">ပြင်ဆင်မည်</button>
                            </form>
                        </div>
                    </div>

                </div>