<?php
require_once("../config/db.php");
$edit_id = isset($_GET['edit_id']) ? (int)$_GET['edit_id'] : null;

// Fetch the question based on the edit ID
$stmt = $conn->prepare("SELECT * FROM questions WHERE QuestionId = :edit_id");
$stmt->bindParam(':edit_id', $edit_id, PDO::PARAM_INT);
$stmt->execute();
$question = $stmt->fetchObject();

// Fetch all answers associated with the question
$stmt = $conn->prepare("SELECT * FROM answers WHERE QuestionId = :edit_id");
$stmt->bindParam(':edit_id', $edit_id, PDO::PARAM_INT);
$stmt->execute();
$answers = $stmt->fetchAll(PDO::FETCH_OBJ);

$nameError = '';
$detailError = '';

if(isset($_POST['editBtn'])){
    $name = trim($_POST['name']);
    $details = array_filter($_POST['details'], 'trim');

    if($name === ''){
        $nameError = "The name field is required.";
    } elseif(empty($details)){
        $detailError = "At least one answer is required!";
    } else {
        try {
            // Begin transaction
            $conn->beginTransaction();

            // Update the question
            $stmt = $conn->prepare("UPDATE questions SET QuestionName = :name WHERE QuestionId = :edit_id");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':edit_id', $edit_id, PDO::PARAM_INT);
            $stmt->execute();

            // Update the answers
            foreach($details as $index => $content){
                if(isset($_POST['answer_id'][$index])) {
                    $answerId = $_POST['answer_id'][$index];
                    // Update existing answer
                    $stmt = $conn->prepare("UPDATE answers SET AnswerDesp = :content WHERE AnswerId = :answer_id");
                    $stmt->bindParam(':content', $content);
                    $stmt->bindParam(':answer_id', $answerId, PDO::PARAM_INT);
                    $stmt->execute();
                } else {
                    // Insert new answer if it was added in the edit form
                    $stmt = $conn->prepare("INSERT INTO answers (AnswerDesp, QuestionId) VALUES (:content, :questionId)");
                    $stmt->bindParam(':content', $content);
                    $stmt->bindParam(':questionId', $edit_id, PDO::PARAM_INT);
                    $stmt->execute();
                }
            }

            // Commit transaction
            $conn->commit();

            // Show success message and redirect
            echo "<script>iziToastAlert('ပြင်ဆင်ပြီးပါပြီ။', 'pick')</script>";
        } catch (Exception $e) {
            $conn->rollBack();
            echo "Failed: " . $e->getMessage();
        }
    }
}
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pick a pile</h6>
            <a href="index.php?page=pick" class="btn btn-primary ">နောက်သို့</a>
        </div>
        <div class="card-body">
            <form method="post">
                <!-- Question Title -->
                <div class="mb-2">
                    <label for="name">မေးခွန်းခေါင်းစဥ်</label>
                    <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($question->QuestionName); ?>">
                    <span class="text-danger"><?php echo $nameError; ?></span>
                </div>

                <!-- Answer Details -->
                <div class="mb-2" id="detailFields">
                    <label for="details">အဖြေများ</label>
                    <?php foreach ($answers as $index => $answer): ?>
                        <div class="detail-entry">
                            <textarea class="form-control mb-2" name="details[]"  rows='6'><?php echo htmlspecialchars($answer->AnswerDesp); ?></textarea>
                            <input type="hidden" name="answer_id[]" value="<?php echo $answer->AnswerId; ?>">
                        </div>
                    <?php endforeach; ?>
                    <span class="text-danger"><?php echo $detailError; ?></span>
                </div>

                <!-- Button to add more detail fields -->
                <!-- You may want to include JavaScript to dynamically add new textarea fields -->

                <button class="btn btn-primary" name="editBtn">ပြင်ဆင်ပြီး</button>
            </form>
        </div>
    </div>
</div>
