<?php
// Define how many questions you want to display per page
$limit = 10;

// Get the current page number from the URL, default to 1 if not set
$page = isset($_GET['page_no']) ? (int)$_GET['page_no'] : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $limit;

// Fetch the total number of questions to calculate total pages
$stmt = $conn->prepare("SELECT COUNT(*) as total FROM que");
$stmt->execute();
$totalQuestions = $stmt->fetch(PDO::FETCH_OBJ)->total;
$totalPages = ceil($totalQuestions / $limit);

// Prepare the SQL query with LIMIT and OFFSET for pagination
$stmt = $conn->prepare("SELECT * FROM que LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_OBJ);

// Convert digits to Myanmar language function
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

// Handle Delete
if (isset($_POST['DeleteBtn'])) {
    $category_id = $_POST['category_id'];
    
    // Use prepared statements with placeholders
    $stmt = $conn->prepare("DELETE FROM que WHERE QuestionNo = :category_id");
    $stmt->bindParam(':category_id', $category_id);
    $stmt->execute();
    
    echo "<script>iziToastAlert('ဖျက်ပြီးပါပြီး။', 'hand')</script>";
}
?>

<!-- Table display -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">လက်ထောက်ဗေဒင်</h6>
            <a href="index.php?page=handcreate" class="btn btn-primary">+ အသစ်</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>စဥ်</th>
                            <th>မေးခွန်းခေါင်းစဥ်</th>
                            <th>လုပ်ဆောင်ချက်</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = $offset; foreach($questions as $question): ?>
                        <tr>
                            <td><?php echo convertToMyanmarDigits(++$count); ?></td>
                            <td class="w-75"><?php echo htmlspecialchars($question->QuestionsName); ?></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-start">
                                    <!-- Edit Button -->
                                    <a href="index.php?page=handedit&edit_id=<?php echo $question->QuestionNo ?>" class="btn btn-success mr-2" style="min-width: 100px;">ပြင်မည်</a>
                                    
                                    <!-- Delete Form -->
                                    <form action="" method="post" style="display: inline;">
                                        <input type="hidden" name="category_id" value="<?php echo $question->QuestionNo; ?>">
                                        <button name="DeleteBtn" class="btn btn-danger" style="min-width: 100px;">ဖျက်မည်</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-center">
                    <!-- Previous Button -->
                    <li class="page-item <?php if($page <= 1) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($page > 1) { echo "index.php?page=hand&page_no=" . ($page - 1); } ?>">နောက်သို့</a>
                    </li>

                    <!-- Page Numbers -->
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php if($i == $page) { echo 'active'; } ?>">
                            <a class="page-link" href="index.php?page=hand&page_no=<?php echo $i; ?>"><?php echo convertToMyanmarDigits($i); ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next Button -->
                    <li class="page-item <?php if($page >= $totalPages) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($page < $totalPages) { echo "index.php?page=hand&page_no=" . ($page + 1); } ?>">ရှေ့သို့</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
