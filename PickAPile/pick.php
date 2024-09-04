<?php
    $pickId = $_GET['pickId'];
    
    // Query to fetch QuestionName along with Answers
    $stmt = $conn->prepare("SELECT q.QuestionName, a.AnswerId, a.AnswerDesp FROM questions q JOIN answers a ON q.QuestionId = a.QuestionId WHERE q.QuestionId = :pickId");
    $stmt->bindValue(':pickId', $pickId, PDO::PARAM_INT);
    $stmt->execute();
    $details = $stmt->fetchAll(PDO::FETCH_OBJ);

    // Get the QuestionName from the first result (since it's the same for all answers)
    $questionName = $details[0]->QuestionName ?? 'Unknown Question';

    // Shuffle the answers to generate a random order
    shuffle($details);
?>

  <!-- Display Question Name in h3 -->
<h3 class="text-dark mb-4"><?php echo htmlspecialchars($questionName); ?></h3>
<p>
သင်မေးခဲ့သောမေးခွန်းအပေါ်အာရုံစိုက်ထားပြီးအောက်ပါကဒ်တွေထဲကမိမိနှစ်သက်ရာတစ်ကဒ်အားရွေးချယ်ပါ ။
</p>

<div class="container-img d-flex justify-content-between mt-5 row">
    <?php foreach($details as $detail): ?>
    <div class="col-12 col-md-3 mb-4 answer-div" data-description="<?php echo htmlspecialchars($detail->AnswerDesp); ?>">
        <a style="color:black;text-decoration: none;" href="javascript:void(0);">
            <img src="../1.png" alt="Card Image" class="img-fluid rounded">
        </a>
    </div>
    <?php endforeach ?>
</div>


<!-- SweetAlert2 Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // SweetAlert2 Script
document.querySelectorAll('.answer-div').forEach(function(div) {
    div.addEventListener('click', function() {
        let description = this.getAttribute('data-description');
        
        // SweetAlert2 scrollable popup with improved design
        Swal.fire({
            html: `<div style="font-size: 16px; text-align: left;">${description}</div>`,
            confirmButtonText: 'နောက်သို့',
            confirmButtonColor: '#6f1d1b', // Bootstrap's info color
            width: '600px', // Adjust the width to make it more appealing
            padding: '15px', // Padding around the content
            backdrop: `rgba(0,0,0,0.4)`, // Background transparency for popup
            customClass: {
                popup: 'shadow-lg' 
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect back to the main page
                location.href = "index.php?page=pickapile";
            }
        });
    });
});

</script>
