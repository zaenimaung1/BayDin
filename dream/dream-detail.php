<?php
    $BlogId = $_GET["blog_id"];
   
   $stmt =$conn->prepare("SELECT * FROM blogdetail WHERE Blogheader_BlogID = $BlogId");
   $stmt->execute();
 $blogs = $stmt->fetchAll(PDO::FETCH_OBJ);

?>


                    
                    <!-- Begin Page Content -->
        
                       

                 <table class="table table-striped ">
                    <tbody>
                        <?php $counter=1; foreach($blogs as $blog): ?>
                        <tr>
                            <td><?php echo $counter ?></td>
                            <td class="hover-move font-bold"><?php echo $blog->BlogContent ?></td>
                        </tr>
                        <?php $counter++; endforeach?>
                    </tbody>
                 </table>

              
                 <a href="index.php?page=dream"  class="text-light px-3 py-2 border rounded text-decoration-none float-right mt-3" style="background-color: #6f1d1b">နောက်သို့</a>
            <!-- /.container-fluid -->


                
            </section>

                