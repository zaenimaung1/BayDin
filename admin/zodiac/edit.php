<?php
    // Read and decode the JSON file
    $datas = file_get_contents("../json/zodiac.json");
    $datas = json_decode($datas, true); 
    
    // Get the edit ID from the URL
    $editId = isset($_GET['edit_id']) ? intval($_GET['edit_id']) : 0;
    
    // Find the item with the given ID
    $blog = null;
    foreach ($datas as $item) {
        if ($item['Id'] == $editId) {
            $blog = $item;
            break;
        }
    }
    
    if (!$blog) {
        echo "Item not found!";
        exit;
    }

    // Initialize error messages
    $nameError = $imgError = '';

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
        $lifePurpose = isset($_POST['LifePurpose']) ? htmlspecialchars($_POST['LifePurpose']) : '';
        $loyal = isset($_POST['Loyal']) ? htmlspecialchars($_POST['Loyal']) : '';
        $angry = isset($_POST['Angry']) ? htmlspecialchars($_POST['Angry']) : '';
        $representativeFlower = isset($_POST['RepresentativeFlower']) ? htmlspecialchars($_POST['RepresentativeFlower']) : '';
        $character = isset($_POST['Character']) ? htmlspecialchars($_POST['Character']) : '';
        $prettyFeatures = isset($_POST['PrettyFeatures']) ? htmlspecialchars($_POST['PrettyFeatures']) : '';
    
        // Validate title (or other fields if needed)
        if (empty($title)) {
            $nameError = "Title is required";
        }
    
        if (empty($nameError)) {
            // Update the blog item with proper keys
            $blog['Name'] = $title;
            $blog['LifePurpose'] = $lifePurpose;
            $blog['Loyal'] = $loyal;
            $blog['Angry'] = $angry;
            $blog['RepresentativeFlower'] = $representativeFlower;
            $blog['Character'] = $character;
            $blog['PrettyFeatures'] = $prettyFeatures;
    
            // Update the JSON file
            $json_data = json_encode($datas, JSON_PRETTY_PRINT);
            file_put_contents("../json/zodiac.json", $json_data);
    
            // Redirect or show success message
            echo "<script>iziToastAlert('ပြင်ဆင်ပြီးပါပြီ။', 'zodiac')</script>";
            exit;
        }
    }
    
?>
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">၁၂လ ရာသီခွင်</h6>
            <a href="index.php?page=zodiac" class="btn btn-primary">နောက်သို့</a>
        </div>
        <div class="card-body">
        <form method="post" enctype="multipart/form-data">
    <div class="mb-2">
        <label for="">ရာသီခွင်အမည်</label>
        <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($blog['Name']); ?>">
        <span class="text-danger"><?php echo htmlspecialchars($nameError); ?></span>
        <br>

        <label for="">ရည်မှန်းချက်</label>
        <textarea name="LifePurpose" rows='5' class="form-control"><?php echo htmlspecialchars($blog['LifePurpose']); ?></textarea>
        <br>

        <label for="">သစ္စာ</label>
        <textarea name="Loyal" rows='5' class="form-control"><?php echo htmlspecialchars($blog['Loyal']); ?></textarea>
        <br>

        <label for="">ကိုယ်စာပြုပန်း	</label>
        <textarea name="RepresentativeFlower" rows='5' class="form-control"><?php echo htmlspecialchars($blog['RepresentativeFlower']); ?></textarea>
        <br>

        <label for="">‌‌‌ဒေါသ</label>
        <textarea name="Angry" rows='5' class="form-control"><?php echo htmlspecialchars($blog['Angry']); ?></textarea>
        <br>

        <label for="">အသွင်အပြင်လက္ခဏာ</label>
        <textarea name="Character" rows='10' class="form-control"><?php echo htmlspecialchars($blog['Character']); ?></textarea>
        <br>

        <label for="">ရုပ်ဆင်းအသွင်အပြင်</label>
        <textarea name="PrettyFeatures" rows='5' class="form-control"><?php echo htmlspecialchars($blog['PrettyFeatures']); ?></textarea>
    </div>

    <button class="btn btn-primary" name="EditBtn">ပြင်ဆင်မည်</button>
</form>

        </div>
    </div>
</div>
