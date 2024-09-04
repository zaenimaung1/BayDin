<?php
  $edit_id = $_GET['edit_id'];

  // Fetch blog content associated with the header
  $stmt = $conn->prepare("SELECT * FROM blogdetail WHERE Blogheader_BlogId = :edit_id");
  $stmt->bindParam(':edit_id', $edit_id, PDO::PARAM_INT);
  $stmt->execute();
  $blogs = $stmt->fetchAll(PDO::FETCH_OBJ);

  // Fetch blog header
  $stmt = $conn->prepare("SELECT * FROM blogheader WHERE BlogId = :edit_id");
  $stmt->bindParam(':edit_id', $edit_id, PDO::PARAM_INT);
  $stmt->execute();
  $category = $stmt->fetchObject();

  // Initialize error variables
  $nameError = '';
  $contentErrors = [];

  if(isset($_POST['editBtn'])){
     $name = $_POST['name'];

     // Check if blog title is empty
     if(empty($name)){
         $nameError = "Blog title cannot be empty!";
     }

     // Loop through blog content to check for errors
     foreach($_POST['content'] as $index => $content) {
         if(empty($content)) {
             $contentErrors[$index] = "Blog content cannot be empty!";
         }
     }

     // Only proceed with the update if there are no errors
     if(empty($nameError) && empty($contentErrors)){
        // Update blog header
        $stmt = $conn->prepare("UPDATE blogheader SET BlogTitle = :name WHERE BlogId = :edit_id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':edit_id', $edit_id, PDO::PARAM_INT);
        $stmt->execute();

        // Update blog content
        foreach($_POST['content'] as $index => $content) {
            $blogId = $_POST['blog_id'][$index]; // Blog detail ID
            $stmt = $conn->prepare("UPDATE blogdetail SET BlogContent = :content WHERE BlogDetailId = :blog_id");
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':blog_id', $blogId, PDO::PARAM_INT);
            $stmt->execute();
        }

        echo "<script>iziToastAlert('ပြင်ဆင်ပြီးပါပြီ။', 'dream')</script>";
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
                <div class="mb-2">
                    <label for="name">အိပ်မက်အမျိုးအစားများ</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($category->BlogTitle); ?>" name="name">
                    <span class="text-danger"><?php echo $nameError; ?></span>
                </div>

                <?php foreach($blogs as $index => $blog): ?>
                  <div class="mb-2">
                    <label for="content-<?php echo $index; ?>">အဖြေ</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($blog->BlogContent); ?>" name="content[]">
                    <input type="hidden" name="blog_id[]" value="<?php echo $blog->BlogDetailId; ?>">
                    <span class="text-danger"><?php echo isset($contentErrors[$index]) ? $contentErrors[$index] : ''; ?></span>
                  </div>
                <?php endforeach; ?>

                <button class="btn btn-primary" name="editBtn">ပြင်ဆင်မည်</button>
            </form>
        </div>
    </div>
</div>
