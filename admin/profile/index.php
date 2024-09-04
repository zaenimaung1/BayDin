<?php
    $adminId = $_SESSION['admin']->id;
    $stmt = $conn->prepare("SELECT * FROM admin WHERE id = $adminId");
    $stmt->execute();
    $admin = $stmt->fetchObject();
    
    // Handle form submission for image upload
   
?>

<div class="container ">
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">စီမံခန့်ခွဲသူ</h6>
      <a href="index.php?page=profileedit&id=<?php echo $admin->id?>" class="btn btn-primary ">ပြင်ဆင်ရန်</a>
    </div>
    <div class="card-body  justify-content-between">
        <div>
            <p><strong>နာမည် : </strong><?php echo $admin->name ?></p>
            <p><strong>အီးမေးလ် : </strong><?php echo $admin->email ?></p>
            <p><strong>စကားဝှက် : </strong><?php echo $admin->password ?></p>
        </div>
        <div>
           <img src="../image/yatThar/<?php echo $admin->image ?>" alt="Profile Image" class="img-thumbnail mb-2" style="width: 150px; height: 150px;">
        </div>
    </div>
   
    <div>
 
      
    </div>
  </div>

