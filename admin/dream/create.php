<?php
$nameError = "";
$detailError = "";

if (isset($_POST['createBtn'])) {
    $name = trim($_POST['name']);     // Blog title
    $details = $_POST['details'];     // Blog details array

    // Validate the name input
    if ($name === '') {
        $nameError = "The name field is required";
    } elseif (empty($details) || in_array('', $details)) {
        $detailError = "At least one detail is required!";
    } else {
        try {
            // Begin transaction
            $conn->beginTransaction();

            // Insert into blogheader
            $stmt = $conn->prepare("INSERT INTO blogheader (BlogTitle) VALUES (:name)");
            $stmt->bindParam(':name', $name);
            $stmt->execute();

            // Get the last inserted BlogId
            $blogId = $conn->lastInsertId();

            // Insert details into blogdetail with the foreign key (BlogId)
            $stmt = $conn->prepare("INSERT INTO blogdetail (BlogContent, Blogheader_BlogId) VALUES (:content, :blogId)");

            foreach ($details as $detail) {
                $stmt->bindParam(':content', $detail);
                $stmt->bindParam(':blogId', $blogId);
                $stmt->execute();
            }

            // Commit transaction
            $conn->commit();

            // Show success message and redirect
            echo "<script>iziToastAlert('ထပ်ထည့်ပြီးပါပြီး။', 'dream')</script>";


        } catch (Exception $e) {
            // Rollback transaction in case of an error
            $conn->rollBack();
            echo "Failed: " . $e->getMessage();
        }
    }
}
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">အိပ်မက်အဘိဓာန်</h6>
            <a href="index.php?page=dream" class="btn btn-primary ">နောက်သို့</a>
        </div>
        <div class="card-body">
            <form method="post">
                <!-- Blog Title -->
                <div class="mb-2">
                    <label for="name">အိပ်မက်အမျိုးအစားများ</label>
                    <input type="text" class="form-control" name="name" placeholder="မြန်မာအက္ခရာနှင့်စသော အိပ်မက်">
                    <span class="text-danger"><?php echo $nameError; ?></span>
                </div>

                <!-- Blog Details (allow multiple details) -->
                <div class="mb-2" id="detailFields">
                    <label for="details">အဖြေများ</label>
                    <div class="detail-entry">
                        <input type="text" class="form-control mb-2" name="details[]" placeholder="အဖြေထည့်ရန်">
                    </div>
                    <span class="text-danger"><?php echo $detailError; ?></span>
                </div>

                <!-- Button to add more detail fields -->
                <button type="button" class="btn btn-secondary " onclick="addDetailField()">အဖြေထပ်ထည့်ရန်</button>

                <button class="btn btn-primary" name="createBtn">ထည့်မည်</button>
            </form>
        </div>
    </div>
</div>

<script>
function addDetailField() {
    // Get the detail fields container
    var container = document.getElementById('detailFields');
    
    // Create a new input field
    var newField = document.createElement('div');
    newField.classList.add('detail-entry');
    
    // Add input element for the new detail
    newField.innerHTML = '<input type="text" class="form-control mb-2" name="details[]" placeholder="အဖြေထည့်ရန်">';
    
    // Append the new field to the container
    container.appendChild(newField);
}
</script>
