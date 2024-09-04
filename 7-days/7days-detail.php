<?php
    $dayId = $_GET['id'];

    $stmt =$conn->prepare("SELECT * FROM yeary WHERE id = $dayId ");
    $stmt->execute();
    $details =$stmt->fetchObject();
?>
   <div class="main-content" style="border: 1px solid #ccc;border-radius: 30px;">
    <label for="" style="margin-left: 40px; margin-top: 40px; color: black; font-weight: bold; font-size:30px"><?php echo $details->name ?>အ‌နေဖြင့်</label>
    <div class="container mt-2" >
        <div class="content2" >
            <p>
                  <?php echo $details->detail?>   
        </p>
        </div>
    </div>       
    <hr>  
    <label for="" style="margin-left: 40px; color: black; font-weight: bold; font-size:30px">ယတြာ</label>
    <div class="container mt-2" >
        <div class="content2" >
            <p>
            <?php echo $details->Yadar?>   
            </p>
        </div>
    </div>       
  
    </div>
    <a href="index.php?page=7-days" class="text-light px-3 py-2 border rounded text-decoration-none float-right mt-3" style="background-color: #6f1d1b">နောက်သို့</a>

</section>