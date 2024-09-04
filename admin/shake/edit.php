<?php
  $edit_id = $_GET['edit_id'];
  
  // Prepare and execute the select query with a parameterized query
  $stmt = $conn->prepare("SELECT * FROM shakes WHERE id = :edit_id");
  $stmt->bindParam(':edit_id', $edit_id, PDO::PARAM_INT);
  $stmt->execute();
  $category = $stmt->fetchObject();
  
  // Initialize error variables
  $nameError = '';
  $detailError = '';

  if(isset($_POST['editBtn'])){
     $name = $_POST['name'];
     $detail = $_POST['detail'];

     // Check if any field is empty
     if(empty($name)){
         $nameError = "Name cannot be empty!";
     }
     if(empty($detail)){
         $detailError = "Detail cannot be empty!";
     }

     // Only proceed with the update if there are no errors
     if(empty($nameError) && empty($detailError)){
        // Use parameterized queries to update the record
        $stmt = $conn->prepare("UPDATE shakes SET position = :name, detail = :detail WHERE id = :edit_id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':detail', $detail);
        $stmt->bindParam(':edit_id', $edit_id, PDO::PARAM_INT);
        $stmt->execute();
        
        echo "<script>iziToastAlert('ပြင်ဆင်ပြီးပါပြီ။။','shake')</script>";
     }
  }
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">အသားလှုပ်နိမိတ်</h6>
            <a href="index.php?page=shake" class="btn btn-primary ">နောက်သို့</a>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-2">
                    <label for="name">အသားလှုပ်သောနေရာ</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($category->position); ?>" name="name">
                    <span class="text-danger"><?php echo $nameError; ?></span>
                </div>
                <div class="mb-2">
                    <label for="detail">နိမိတ်</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($category->detail); ?>" name="detail">
                    <span class="text-danger"><?php echo $detailError; ?></span>
                </div>
                <button class="btn btn-primary" name="editBtn">ပြင်ဆင်မည်</button>
            </form>
        </div>
    </div>
</div>
