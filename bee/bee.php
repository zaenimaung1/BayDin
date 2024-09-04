<?php
    $stmt=$conn->prepare("SELECT *FROM bee");
    $stmt->execute();
    $bees=$stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container pb-4 text-center"style="color:black;font-size:23px;font-weight:bold;">
ပျားစွဲ နိမိတ်
            </div>                
                   <div class="box-container m-0">
                  
                   
                     <?php  foreach($bees as $bee): ?>
                     <div class="border border-danger-subtle border-3 rounded h-100 p-3 shadow-sm text-center"  data-url="https://example.com/1">
                      
                         <p><?php echo $bee->detail?></p>                  
                    </div>
                     <?php endforeach;?>
                     

                     
                   </div>

</section>