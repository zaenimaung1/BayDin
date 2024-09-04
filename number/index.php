<?php
    $stmt=$conn->prepare("SELECT * FROM nobaydin");
    $stmt->execute();
    $shakes = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container pb-4 text-center"style="color:black;font-size:23px;font-weight:bold;">

          ဂဏန်းဗေဒင်
        
        </div>   
         <p class="mb-5"><span style="font-weight:bold;font-size:20px;">မှတ်ချက်:</span>ကိုယ်က ၁-ရက် ၁၀-ရက် ၁၉-ရက် ၂၈-ရက်တွေမှာမွေးရင် မိမိမွေးရက်အားပေါင်းကြည့်ခြင်းဖြင့်သိနိုင်ပါတယ်။ <br>
         ဉပမာ> ၁+၉=၁၀/၂+၈=၁၀ ဆိုရင် ၁ဂဏန်းသမား။</p>         
         
<div class="box-container m-0">
    
    <?php foreach ($shakes as $shake): ?>
    <a href="index.php?page=number-deatil&id=<?php echo $shake->id ?>" style="color:black;text-decoration: none;">
    <div class="border border-danger-subtle border-3 rounded h-100 p-4 shadow-sm text-center "id="shake">
       
        <p class="shake">
            <?php echo $shake->name; ?>
        </p>
    </div>
    </a>
    <?php endforeach; ?>
</div>