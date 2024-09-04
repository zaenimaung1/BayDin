<?php
  
   
   require_once("../config/db.php");
   

    $stmt =$conn->prepare("SELECT * FROM blogheader");
    $stmt->execute();
    $blogs = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container pb-4 text-center"style="color:black;font-size:23px;font-weight:bold;">
အိပ်မက်အဘိဓာန်
            </div>                
                   
                    <div class="box-container  m-0">
                    <?php foreach($blogs as $blog): ?>
                       <a style="color:black;text-decoration: none;"  href="index.php?page=dream-detail&blog_id=<?php echo $blog->BlogId ?>">
                       <div class="box"  data-url="https://example.com/1">
                          <p><?php echo $blog->BlogTitle ?></p>                  
                     </div>
                       </a>

                        <?php endforeach  ?>
                    </div>

</section>


