<?php
    $stmt=$conn->prepare("SELECT *FROM lizard");
    $stmt->execute();
    $lizards=$stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container pb-4 text-center"style="color:black;font-size:23px;font-weight:bold;">
အိမ်မြှောင်စုပ်ထိုး နိမိတ်
            </div>                
                   <div class="box-container m-0">
                  
                   
                     <?php  foreach($lizards as $lizard): ?>
                      <div class="border border-danger-subtle border-3 rounded h-100 p-3 shadow-sm text-center" data-url="https://example.com/1">
    <p><?php echo htmlspecialchars($lizard->detail); ?></p>
</div>

                     <?php endforeach;?>
                     

                     
                   </div>

</section>