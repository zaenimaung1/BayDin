<?php
// Prepare and execute queries
$stmt = $conn->prepare("SELECT * FROM yeary");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_OBJ);

// Get id
$blogId = $_GET['edit_id'];
$nameError = '';
$imgError = '';
$stmt = $conn->prepare("SELECT * FROM yeary WHERE id = :id");
$stmt->bindParam(':id', $blogId);
$stmt->execute();
$blog = $stmt->fetchObject();

if (isset($_POST['EditBtn'])) {
    $title = $_POST['title'];
    $yadar = $_POST['yadar'];
    $detail = $_POST['content'];
    $imgName = $_FILES['image']['name'];
    $imgTmp = $_FILES['image']['tmp_name'];
    $imgType = $_FILES['image']['type'];
    
    // Initialize error message
    if (empty($title) || empty($yadar) || empty($detail)) {
        $nameError = "All fields are required!";
    } else {
        // Prepare update query
        if (empty($imgName)) {
            // Update without image
            $stmt = $conn->prepare("UPDATE yeary SET name = :title, Yadar = :yadar, detail = :detail WHERE id = :id");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':yadar', $yadar);
            $stmt->bindParam(':detail', $detail);
            $stmt->bindParam(':id', $blogId);
        } else {
            // Delete old image if necessary
            if (!empty($blog->image)) {
                unlink("../image/yatThar/" . $blog->image);
            }

            // Generate a unique name for the image
            $imgName = uniqid() . "_" . $imgName;

            // Move uploaded file if it's a valid image type
            if (in_array($imgType, ['image/png', 'image/jpeg', 'image/jpg'])) {
                move_uploaded_file($imgTmp, "../image/yatThar/" . $imgName);
            } else {
                $imgError = "Invalid image format!";
            }

            // Update with image
            $stmt = $conn->prepare("UPDATE yeary SET name = :title, Yadar = :yadar, detail = :detail, image = :image WHERE id = :id");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':yadar', $yadar);
            $stmt->bindParam(':detail', $detail);
            $stmt->bindParam(':image', $imgName);
            $stmt->bindParam(':id', $blogId);
        }

        if (empty($imgError)) {
            // Execute the query
            $stmt->execute();

            // Display success message
            echo "<script>iziToastAlert('ပြင်ဆင်ပြီးပါပြီ။','year')</script>";
        }
    }
}
?>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">တနှစ်စာ‌ဟောတမ်း</h6>
            <a href="index.php?page=year" class="btn btn-primary ">နောက်သို့</a>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-2">
                    <label for="">ရက်သား</label>
                    <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($blog->name); ?>">
                    <span class="text-danger"><?php echo htmlspecialchars($nameError); ?></span>
                    <br>
                    <label for="">ယခုနှစ်ကံကြမ္မာ</label>
                    <textarea name="content" rows='10' class="form-control"><?php echo htmlspecialchars($blog->detail); ?></textarea>
                    <label for="">ယတြာ</label>
                    <textarea name="yadar" rows='10' class="form-control"><?php echo htmlspecialchars($blog->Yadar); ?></textarea>
                    <label for="">ပုံ</label>
                    <input type="file" class="form-control" name="image">
                    <?php if (!empty($blog->image)): ?>
                        <img src="../image/yatThar/<?php echo htmlspecialchars($blog->image); ?>" width="150" alt="Current Image">
                    <?php endif; ?>
                    <br>
                    <span class="text-danger"><?php echo htmlspecialchars($imgError); ?></span>
                </div>
                <button class="btn btn-primary" name="EditBtn">ပြင်ဆင်မည်</button>
            </form>
        </div>
    </div>
</div>
