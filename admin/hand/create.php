<?php
$nameError = "";
$detailError = "";

if (isset($_POST['createBtn'])) {
    $name = trim($_POST['name']);  // Blog title (question name)
    $details = array_filter($_POST['details'], 'trim'); // Filter out empty details

    // Validate the name input
    if ($name === '') {
        $nameError = "The name field is required";
    } elseif (empty($details)) {
        $detailError = "At least one detail is required!";
    } else {
        try {
            // Begin transactiona
            $conn->beginTransaction();

            // Insert into que (questions table)
            $stmt = $conn->prepare("INSERT INTO que (QuestionsName) VALUES (:name)");
            $stmt->bindParam(':name', $name);
            $stmt->execute();

            // Get the last inserted QuestionNo
            $questionId = $conn->lastInsertId();

            // Insert into ans (answers table)
            $stmt = $conn->prepare("INSERT INTO ans (AnswerNo, AnswerResult, que_QuestionNo) VALUES (:answerNo, :content, :questionId)");

            $answerNo = 1;  // Start the AnswerNo count
            foreach ($details as $detail) {
                $stmt->bindParam(':answerNo', $answerNo, PDO::PARAM_INT);
                $stmt->bindParam(':content', $detail);
                $stmt->bindParam(':questionId', $questionId);
                $stmt->execute();
                $answerNo++;  // Increment the answer number
            }

            // Commit transaction
            $conn->commit();

            // Show success message and redirect
            echo "<script>iziToastAlert('ထပ်ထည့်ပြီးပါပြီး။', 'hand')</script>";
           

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
            <h6 class="m-0 font-weight-bold text-primary"> လက်ထောက်ဗေဒင်</h6>
            <a href="index.php?page=hand" class="btn btn-primary ">နောက်သို့</a>
        </div>
        <div class="card-body">
            <form method="post">
                <!-- Question Title -->
                <div class="mb-2">
                    <label for="name">မေးခွန်းခေါင်းစဥ်</label>
                    <input type="text" class="form-control" name="name" placeholder="မေးခွန်းထည့်ရန်">
                    <span class="text-danger"><?php echo $nameError; ?></span>
                </div>

                <!-- Answer Details (allow multiple details) -->
                <div class="mt-2" id="detailFields">
                    <label for="details">အဖြေများ</label> 
                    <div class="detail-entry">
                        <input type="text" class="form-control mb-2 " name="details[]" placeholder="အဖြေထည့်ရန်">
                    </div>
                    <span class="text-danger"><?php echo $detailError; ?></span>
                </div>

                <!-- Button to add more detail fields -->
             <div class="d-flex mt-4">
             <button type="button" class="btn btn-secondary mr-3" onclick="addDetailField()">အဖြေထပ်ထည့်ရန်</button>

            <button class="btn btn-primary" name="createBtn">ထည့်မည်</button>
             </div>
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
