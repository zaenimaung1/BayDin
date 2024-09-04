<?php
// Fetch all categories or blog entries (depending on your use case)
$stmt = $conn->prepare("SELECT * FROM nobaydin");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_OBJ);

// Get blog ID from the URL parameter
$blogId = $_GET['edit_id'] ?? null;

// Initialize error messages
$nameError = '';
$detailError = '';
$successMessage = '';

// Fetch the specific blog data for editing
if ($blogId) {
    $stmt = $conn->prepare("SELECT * FROM nobaydin WHERE id = :id");
    $stmt->bindParam(':id', $blogId, PDO::PARAM_INT);
    $stmt->execute();
    $blog = $stmt->fetchObject();
}

// Handle form submission
if (isset($_POST['EditBtn'])) {
    $name = $_POST['title'] ?? '';
    $detail = $_POST['content'] ?? '';

    // Validate the form fields
    if (empty($name)) {
        $nameError = "The title field is required.";
    }

    if (empty($detail)) {
        $detailError = "The detail field is required.";
    }

    // Proceed with the update if no validation errors
    if (empty($nameError) && empty($detailError)) {
        $stmt = $conn->prepare("UPDATE nobaydin SET name = :name, detail = :detail WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':detail', $detail);
        $stmt->bindParam(':id', $blogId, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            // Show a success message
            echo "<script>iziToastAlert('ပြင်ဆင်ပြီးပါပြီ။', 'number')</script>";
            $successMessage = "The blog post has been updated successfully!";
        } else {
            echo "Failed to update the blog post.";
        }
    }
}
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">ဂဏန်းဗေဒင်</h6>
            <a href="index.php?page=number" class="btn btn-primary">နောက်သို့</a>
        </div>
        <div class="card-body">
           
            <form method="post">
                <div class="mb-2">
                    <label for="">ရက်သား</label>
                    <!-- Assuming title field should be the blog's name -->
                    <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($blog->name ?? ''); ?>">
                    <span class="text-danger"><?php echo htmlspecialchars($nameError); ?></span>
                    <br>
                    <label for="">ယခုနှစ်ကံကြမ္မာ</label>
                    <textarea name="content" rows='10' class="form-control"><?php echo htmlspecialchars($blog->detail ?? ''); ?></textarea>
                    <span class="text-danger"><?php echo htmlspecialchars($detailError); ?></span>
                </div>
                <button class="btn btn-primary" name="EditBtn">ပြင်ဆင်မည်</button>
            </form>
        </div>
    </div>
</div>
