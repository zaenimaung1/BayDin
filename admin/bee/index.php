<?php
  $stmt=$conn->prepare("SELECT * FROM bee");
  $stmt->execute();
 $questions = $stmt->fetchAll(PDO::FETCH_OBJ);
 function convertToMyanmarDigits($number) {
    $myanmarDigits = ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];
    $convertedNumber = '';
    
    // Convert each digit to the corresponding Myanmar digit
    $number = strval($number); // Ensure the number is treated as a string
    for ($i = 0; $i < strlen($number); $i++) {
        $digit = $number[$i];
        $convertedNumber .= $myanmarDigits[$digit];
    }
    
    return $convertedNumber;
}
 if (isset($_POST['DeleteBtn'])) {
     $category_id = $_POST['category_id'];
 
     // Use prepared statements with placeholders
     $stmt = $conn->prepare("DELETE FROM bee WHERE id = :category_id");
     $stmt->bindParam(':category_id', $category_id);
     $stmt->execute();
     echo "<script>iziToastAlert('ဖျက်ပြီးပါပြီး။','bee')</script>";
     // Display a SweetAlert success message
 
 }
?>
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">ပျားစွဲ နိမိတ်</h6>
    <a href="index.php?page=beecreate" class="btn btn-primary">+ အသစ်</a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
    <th>စဥ်</th>
    <th>ပျားအိမ်စွဲကပ်သောနေရာ</th>
    <th>လုပ်ဆောင်ချက်</th>
    </tr>
    </thead>
    <tbody>
    <?php $count=0; foreach($questions as $question): ?>
    <tr>
    <td><?php echo convertToMyanmarDigits(++$count); ?></td>
        <td><?php echo $question->detail ?></td>
        <td>
        <div class="d-flex">
        <form action="" method="post" class="mx-2">
        <a href="index.php?page=beeedit&edit_id=<?php echo $question->id ?>" class="btn btn-success">ပြင်မည်</a>
        </form>
        <form action="" method="post">
        <input type="hidden" name="category_id" value="<?php echo $question->id; ?>">
        <button name="DeleteBtn" class="btn btn-danger">ဖျက်မည်</button>
        </form>
        </div>
         </td>

    </tr>
    <?php endforeach ?>
    </tbody>
    </table>
    </div>

    </div>
    </div>
    </div>