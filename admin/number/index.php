<?php
    $stmt=$conn->prepare("SELECT * FROM nobaydin");
    $stmt->execute();
    $details=$stmt->fetchAll(PDO::FETCH_OBJ);
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
    if(isset($_POST['DeleteBtn'])){
        $category_id = $_POST['category_id'];
    
    // Use prepared statements with placeholders
    $stmt = $conn->prepare("DELETE FROM nobaydin WHERE id = :category_id");
    $stmt->bindParam(':category_id', $category_id);
    $stmt->execute();
    
    echo "<script>iziToastAlert('ဖျက်ပြီးပါပြီး။', 'number')</script>";
    }
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">ဂဏန်းဗေဒင်</h6>

</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>စဥ်</th>
<th>ရက်သား</th>
<th>အချက်အလက်</th>
<th>လုပ်ဆောင်ချက်</th>

</tr>
</thead>
<tbody>
<?php $count=0; foreach($details as $detail): ?>
<tr>
    <td><?php echo convertToMyanmarDigits(++$count); ?></td>
    <td  style="width:200px"><?php echo $detail->name ?></td>
    <td><?php echo $detail->detail ?></td>
    
    <td>
    <div class="d-flex align-items-center justify-content-start">
        <!-- Edit Button -->
        <a href="index.php?page=numberedit&edit_id=<?php echo $detail->id ?>" class="btn btn-success mr-2" style="min-width: 100px;">ပြင်မည်</a>
        
        <!-- Delete Form -->
        <form action="" method="post" style="display: inline;">
            <input type="hidden" name="category_id" value="<?php echo $detail->id; ?>">
            <button name="DeleteBtn" class="btn btn-danger" style="min-width: 100px;">ဖျက်မည်</button>
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