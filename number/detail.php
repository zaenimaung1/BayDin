<?php
    $id = $_GET['id'];

    // Check if id is numeric to avoid invalid input
    
        $stmt = $conn->prepare("SELECT * FROM nobaydin WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $details = $stmt->fetchObject();
   
?>

<div class="container">
    <div class="main-content" style="border: 1px solid #ccc; border-radius: 30px;">
        
        <div class="container mt-2">
            <div class="content2">
                <p>
                    <?php echo htmlspecialchars($details->detail); ?>
                </p>
            </div>
        </div> 
    </div>
</div>
<a href="index.php?page=number" class="text-light px-3 py-2 border rounded text-decoration-none float-right mt-3" style="background-color: #6f1d1b">နောက်သို့</a>

</section>
