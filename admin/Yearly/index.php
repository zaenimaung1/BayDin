<?php
    $stmt=$conn->prepare("SELECT * FROM yeary");
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
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">တနှစ်စာဟောတမ်း</h6>

</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>စဥ်</th>
<th>ရက်သား</th>
<th>ယခုနှစ်ကံကြမ္မာ</th>
<th>ယတြာ</th>
<th>ပုံ</th>
<th>ရက်စွဲ</th>
<th>လုပ်ဆောင်ချက်</th>
</tr>
</thead>
<tbody>
<?php $count=0; foreach($details as $detail): ?>
<tr>
    <td><?php echo convertToMyanmarDigits(++$count); ?></td>
    <td><?php echo $detail->name ?></td>
    <td class="w-50">
    <div style=" height:200px; overflow:auto; scrollbar-width:none; -ms-overflow-style:none;">
        <?php echo  $detail->detail  ?>
    </div>
</td>
<td class="w-50">
    <div style="max-width:350px; height:200px; overflow:auto; scrollbar-width:none; -ms-overflow-style:none;">
        <?php echo $detail->Yadar ?>
    </div>
</td>

    <td><img src="../image/yatThar/<?php echo $detail->image; ?>" alt=""></td>
    <td><?php echo $detail->create_at?></td>
    <td>
    <div class="d-flex align-items-center justify-content-start">
        <!-- Edit Button -->
        <a href="index.php?page=yearedit&edit_id=<?php echo $detail->id ?>" class="btn btn-success mr-2" style="min-width: 100px;">ပြင်မည်</a>
        
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