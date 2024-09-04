<?php
    $stmt = $conn->prepare("SELECT * FROM shakes");
    $stmt->execute();
    $shakes = $stmt->fetchAll(PDO::FETCH_OBJ);
?>


<div class="container pb-4 text-center"style="color:black;font-size:23px;font-weight:bold;">
အသားလှုပ် နိမိတ်
            </div>                

<div class="box-container m-0">
    <?php foreach ($shakes as $shake): ?>
    <div class="border border-danger-subtle border-3 rounded h-100 p-3 shadow-sm text-center "id="shake">
        <!-- Make sure 'answer' field exists in your database or data -->
        <p class="shake " data-answer="<?php echo isset($shake->detail) ? $shake->detail : 'No answer available'; ?>">
            <?php echo $shake->position; ?>
        </p>
    </div>
    <?php endforeach; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 
   document.querySelectorAll('.shake').forEach(function(element) {
    
    element.addEventListener('click', function() {
       
        var answer = this.getAttribute('data-answer');
        
        
        Swal.fire({
            
            text: answer,
            width: '600px', // Adjust the width to make it more appealing
            padding: '20px', // Padding around the content
            backdrop: `rgba(0,0,0,0.4)`, // Background transparency for popup
            customClass: {
                popup: 'shadow-lg' 
            },
            confirmButtonText: 'နောက်သို',
            confirmButtonColor:" #6f1d1b"
        });
    });
});



</script>
