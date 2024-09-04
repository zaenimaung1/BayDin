<?php
require_once("../config/db.php");

$questionId = isset($_GET['id']) ? $_GET['id'] : null;  // Get question ID from URL
$numberListId = isset($_GET['numberListId']) ? $_GET['numberListId'] : null;
$answer = '';
$numberLists = [];

if ($questionId) {
    try {
        // Fetch the numberList options for the selected question
        $stmt = $conn->prepare("SELECT * FROM numberList");
        $stmt->execute();
        $numberLists = $stmt->fetchAll(PDO::FETCH_OBJ);
        shuffle($numberLists);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if ($numberListId && $questionId) {
    try {
        // Fetch the corresponding answer based on the selected question and numberList
        $stmt = $conn->prepare("SELECT AnswerResult FROM ans WHERE que_QuestionNo = :questionId AND AnswerNo = :numberListId");
        $stmt->bindParam(':questionId', $questionId);
        $stmt->bindParam(':numberListId', $numberListId);
        $stmt->execute();
        $answer = $stmt->fetch(PDO::FETCH_OBJ)->AnswerResult ?? '';
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<div class="container">
    <?php if ($questionId): ?>
        <h3 class="text-center mb-5">မိမိမေးလိုသောမေးခွန်းကိုအာရုံပြု၍
        မျက်လုံးမှိတ်ကာ နံပါတ်လေးတွေအပေါ်လက်ထောက်ပါ။</h3>
        <div class="row justify-content-center">
            <?php foreach ($numberLists as $nList): ?>
                <div class="col-4 col-md-1 py-1">
                    <form action="" method="get" class="text-center">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($questionId); ?>">
                        <input type="hidden" name="numberListId" value="<?php echo htmlspecialchars($nList->numberList); ?>">
                        <button class="  w-100 py-3  text-center border text-light" style="border-radius:5px;background-color:#6f1d1b"><?php echo htmlspecialchars($nList->numberList); ?></button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center text-danger">Please select a question to proceed.</p>
    <?php endif; ?>
</div>


<!-- SweetAlert script to show the answer -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($answer): ?>
<script>
    Swal.fire({
        
        text: '<?php echo addslashes($answer); ?>',
       
        confirmButtonText: 'နောက်သို့',
         confirmButtonColor: '#6f1d1b'
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = "index.php";
        }
    });
</script>
<?php endif ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

