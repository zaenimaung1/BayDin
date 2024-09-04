<?php
$getId = $_GET["id"];

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM admin WHERE id = ?");
$stmt->execute([$getId]);
$admin = $stmt->fetchObject();

if (isset($_POST['saveBtn'])) {
    $name = htmlspecialchars($_POST['names']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $imgName = $_FILES['image']['name'];
    $imgTemp = $_FILES['image']['tmp_name'];
    $imgType = $_FILES['image']['type'];

    // Image upload validation
    $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/jfif'];
    $uploadDir = "../image/yatThar/";

    if (in_array($imgType, $allowedTypes)) {
        $imgPath = $uploadDir . basename($imgName);
        if (move_uploaded_file($imgTemp, $imgPath)) {
            // Update query using prepared statements
            $stmt = $conn->prepare("UPDATE admin SET name = ?, email = ?, password = ?, image = ? WHERE id = ?");
            $result = $stmt->execute([$name, $email, $password, $imgName, $getId]);
            
            if ($result) {
                echo "<script>iziToastAlert('ပြင်ဆင်ပြီးပါပြီ။', 'profile')</script>";
            } 
        }
    }
}
?>

<div class="container mt-5">
  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">
        <div class="row">
          <!-- Name -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="firstName">နာမည်</label>
              <input type="text" class="form-control" name="names" value="<?php echo htmlspecialchars($admin->name); ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">အီး‌မေးလ်</label>
              <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($admin->email); ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <!-- Password -->
          <div class="col-md-12">
            <div class="form-group">
              <label for="password">စကားဝှက်</label>
              <input type="password" class="form-control" name="password" value="<?php echo htmlspecialchars($admin->password); ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <!-- Image -->
          <div class="col-md-12">
            <div class="form-group">
              <label >ပုံ</label>
              <input type="file" class="form-control" name="image">
              <?php if (!empty($admin->image)): ?>
                        <img src="../image/yatThar/<?php echo htmlspecialchars($admin->image); ?>" width="150" alt="Current Image">
                    <?php endif; ?>
            </div>
          </div>
        </div>

        <button class="btn btn-primary px-4" name="saveBtn">Save</button>
      </form>
    </div>
  </div>
</div>
