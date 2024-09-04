<?php
    $zodiaces = json_decode(file_get_contents("../json/zodiac.json"),true);

    
?>
            <!-- Main Content -->
           
                
                
                <!-- Topbar -->
               

                    
                <div class="container pb-3 text-center"style="color:black;font-size:23px;font-weight:bold;">
                ၁၂လ ရာသီခွင်အ‌ပောာ
            </div>
                    <div class="box-container m-0">
                        <?php foreach($zodiaces as $zodiac): ?>
                           
                       <a style="color:black;text-decoration: none;" href="index.php?page=zodiac-detail&id=<?php echo($zodiac['Id'])  ?>" >
                       <div class="box"  data-url="https://example.com/1">
                      
                      <img src=<?php echo htmlspecialchars($zodiac['ZodiacSignImageUrl']); ?> class="thumb" alt="">
                      <div class="text">
                          <h3 class="title1 "><?php echo htmlspecialchars($zodiac['Name']); ?></h3>
                          <p><?php echo $zodiac['Dates'] ?></p>
                      </div>
                     </div>
                       </a>

                        <?php endforeach  ?>
                    </div>

               
                    </section>
               
                
                  
                       
                    
                
               
                <!-- Begin Page Content -->
                
                   
            <!-- End of Main Content -->
            

    