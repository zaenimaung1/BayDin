<?php
    // Check if there is a search query in the request
    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

    // Prepare the SQL query with a search condition
    $stmt = $conn->prepare("SELECT * FROM questions WHERE QuestionName LIKE :searchQuery");
    // Bind the search query parameter with wildcards for partial matching
    $stmt->bindValue(':searchQuery', '%' . $searchQuery . '%');
    $stmt->execute();
    // Fetch the filtered results
    $questions = $stmt->fetchAll(PDO::FETCH_OBJ);

    // Check if there are no results and if a search query was submitted
    if (count($questions) == 0 && !empty($searchQuery)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'No Results Found',
                text: 'No results were found for \"".htmlspecialchars($searchQuery)."\", please try another search term.',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = 'index.php?page=pickapile';  
            });
        </script>";
    }
    
    
?>

<!-- Page Heading -->
<div class="container pb-4 text-center" style="color:black; font-size:23px; font-weight:bold;">
    PICK A PILE
</div>                


<!-- Search Bar -->
<!-- Search Bar -->



<!-- Questions Table -->
<div class="container">
    <table class="table table-striped">
        <tbody>
            <?php
          

            $count = 0; 
            foreach($questions as $question):
            ?>
            <tr>
                <td><?php echo convertToMyanmarDigits(++$count) ?></td>
                <td>
                    <a style="color:black;text-decoration: none;" href="index.php?page=pick&pickId=<?php echo $question->QuestionId ?>">
                        <?php echo htmlspecialchars($question->QuestionName) ?>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
