<?php
// Fetch all records from the shakes table
$stmt = $conn->prepare("SELECT * FROM shakes");
$stmt->execute();
$shakes = $stmt->fetchAll(PDO::FETCH_OBJ);

// Function to convert digits to Myanmar numerals
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

// Handle the delete operation
if (isset($_POST['DeleteBtn'])) {
    $category_id = $_POST['category_id'];

    // Use prepared statements with placeholders to avoid SQL injection
    $stmt = $conn->prepare("DELETE FROM shakes WHERE id = :category_id");
    $stmt->bindParam(':category_id', $category_id);
    $stmt->execute();
    echo "<script>iziToastAlert('ဖျက်ပြီးပါပြီး။','shake')</script>";

    // Optionally reload the page to reflect changes
    echo "<meta http-equiv='refresh' content='0'>";
}
?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">အသားလှုပ်နိမိတ်</h6>
            <a href="index.php?page=shakecreate" class="btn btn-primary">+ အသစ်</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>စဥ်</th>
                            <th>အသားလှုပ်သောနေရာ</th>
                            <th>နိမိတ်</th>
                            <th>လုပ်ဆောင်ချက်</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; foreach($shakes as $shake): ?>
                        <tr>
                            <td><?php echo convertToMyanmarDigits(++$count); ?></td>
                            <td><?php echo htmlspecialchars($shake->position); ?></td>
                            <td><?php echo htmlspecialchars($shake->detail); ?></td>
                            <td>
                                <div class="d-flex">
                                    <!-- Edit Button -->
                                    <a href="index.php?page=shakeedit&edit_id=<?php echo $shake->id ?>" class="btn btn-success mx-2">ပြင်မည်</a>
                                    
                                    <!-- Delete Form -->
                                    <form action="" method="post">
                                        <input type="hidden" name="category_id" value="<?php echo $shake->id; ?>">
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
