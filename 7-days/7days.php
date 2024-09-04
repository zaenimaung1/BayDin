 <?php 
    $stmt=$conn->prepare("SELECT * FROM Yeary");
    $stmt->execute();
    $yearly = $stmt->fetchAll(PDO::FETCH_OBJ);


 ?>
        

        <div class="container pb-5 text-center"style="color:black;font-size:23px;font-weight:bold;">
        ၇ ရက်သားမီးများအတွက် တနှစ်စာဟောတမ်း
            </div>
                    <div class="box-container m-0">
                        
                    
                        
                       <?php
                                foreach($yearly as $year):
                       ?>
                         <a style="color:black;text-decoration: none;" href="index.php?page=7days-deatil&id=<?php echo($year->id) ?>">
                         <div class="box" >
                                <div class="text">
                                <h3 class="title1"><?php echo($year->name) ?></h3>
                               
                                 <img src="../image/yatThar/<?php echo $year->image ?>" class="thumb" alt="">
                            </div>
                            </div>
                         </a>
                       <?php
                        endforeach;
                       ?>
                       
            
                  
                       
                    </div>
                 
                    </section>