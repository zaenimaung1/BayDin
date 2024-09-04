<?php
  $edit_id = $_GET['edit_id'];

  // Fetch answers associated with the question
  $stmt = $conn->prepare("SELECT * FROM ans WHERE que_QuestionNo = :edit_id");
  $stmt->bindParam(':edit_id', $edit_id, PDO::PARAM_INT);
  $stmt->execute();
  $answers = $stmt->fetchAll(PDO::FETCH_OBJ);

  // Fetch question header
  $stmt = $conn->prepare("SELECT * FROM que WHERE QuestionNo = :edit_id");
  $stmt->bindParam(':edit_id', $edit_id, PDO::PARAM_INT);
  $stmt->execute();
  $question = $stmt->fetchObject();

  // Initialize error variables
  $nameError = '';
  $contentErrors = [];

  if(isset($_POST['editBtn'])){
     $name = $_POST['name'];

     // Check if question name is empty
     if(empty($name)){
         $nameError = "Question title cannot be empty!";
     }

     // Loop through answers to check for errors
     foreach($_POST['content'] as $index => $content) {
         if(empty($content)) {
             $contentErrors[$index] = "Answer content cannot be empty!";
         }
     }

     // Only proceed with the update if there are no errors
     if(empty($nameError) && empty($contentErrors)){
        // Update question
        $stmt = $conn->prepare("UPDATE que SET QuestionsName = :name WHERE QuestionNo = :edit_id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':edit_id', $edit_id, PDO::PARAM_INT);
        $stmt->execute();

        // Update answers
        foreach($_POST['content'] as $index => $content) {
            $answerId = $_POST['answer_id'][$index]; // Answer ID
            $stmt = $conn->prepare("UPDATE ans SET AnswerResult = :content WHERE AnswerNo = :answer_id");
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':answer_id', $answerId, PDO::PARAM_INT);
            $stmt->execute();
        }

        echo "<script>iziToastAlert('ပြင်ဆင်ပြီးပါပြီ။', 'hand')</script>";
     }
  }
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">လက်ထောက်ဗေဒင်</h6>
            <a href="index.php?page=hand" class="btn btn-primary ">နောက်သို့</a>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-2">
                    <label for="name">မေးခွန်းခေါင်းစဥ်</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($question->QuestionsName); ?>" name="name">
                    <span class="text-danger"><?php echo $nameError; ?></span>
                </div>

                <?php  foreach($answers as $index => $answer): ?>
  <div class="mb-2">
    <label for="content-<?php echo $index; ?>">အ‌‌‌ဖြေ </label>
    <input type="text" class="form-control" value="<?php echo htmlspecialchars($answer->AnswerResult); ?>" name="content[]">
    <input type="hidden" name="answer_id[]" value="<?php echo $answer->AnswerId; ?>"> <!-- Ensure AnswerId is correct -->
    <span class="text-danger"><?php echo isset($contentErrors[$index]) ? $contentErrors[$index] : ''; ?></span>
  </div>
<?php endforeach; ?>

                <button class="btn btn-primary" name="editBtn">ပြင်ဆင်ပြီး</button>
            </form>
        </div>
    </div>
</div>
