<?php
// Load the JSON file and decode it into an associative array
$zodiaces = json_decode(file_get_contents("../json/zodiac.json"), true);

$zodiac_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$zodiacDetail = null;

// Debugging: Check if JSON data is loaded
if (!$zodiaces) {
    echo "Error loading or parsing JSON file.";
    exit();
}

// In case $zodiaces is not an array (your JSON example is a single object)
if (isset($zodiaces["Id"])) {
    $zodiaces = [$zodiaces]; // Convert to array with one element
}

// Find the zodiac detail by matching the Id
foreach ($zodiaces as $item) {
    if (strval($item['Id']) === $zodiac_id) { // Use strval to handle type matching
        $zodiacDetail = $item;
        break;
    }
}
?>

<div class="Aontainer">
    <div class="left-box ">
    <img class="rounded" 
     src="<?php echo htmlspecialchars($zodiacDetail['ZodiacSign2ImageUrl']); ?>" 
     alt="Zodiac Image">

    </div>

    <div class="right-container">
        <div class="top-right-box">
            <h5 class="text-black">ရာသီခွင် : &nbsp; <?php echo htmlspecialchars($zodiacDetail['Name']); ?></h5>
            <h5>မြန်မာလ : &nbsp; <?php echo htmlspecialchars($zodiacDetail['MyanmarMonth']); ?></h5>
            <h5>သတ်မှတ်ကြာချိန် : &nbsp; <?php echo htmlspecialchars($zodiacDetail['Dates']); ?></h5>
            <h5>ဒြပ်စင် :&nbsp; <?php echo htmlspecialchars($zodiacDetail['Element']); ?></h5>
        </div>

        <div class="bottom-right-box">
            <?php
            if ($zodiacDetail && isset($zodiacDetail["Traits"]) && is_array($zodiacDetail["Traits"])) :
                foreach ($zodiacDetail["Traits"] as $trait) :
                    $name = htmlspecialchars($trait["name"]);
                    $percentage = intval($trait["percentage"]); // Ensure the percentage is an integer
            ?>
            <div class="trait">
    <span class="trait-name mt-2"><?php echo $name; ?>:</span>
    <div class="progress-bar">
        <div class="progress" style="width: <?php echo $percentage; ?>%;"></div>
    </div>
    <span class="percentage"><?php echo $percentage; ?>%</span>
</div>

            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</div>








<div class="main-content" style="border: 1px solid #ccc;border-radius: 30px; margin-top: 50px;">
    <label for="" style="margin-left: 40px; margin-top: 40px; color: black; font-weight: bold; font-size:30px">ဘဝရည်မှန်းချက်</label>
    <div class="container mt-2" >
        <div class="content2" >
            <p>
            <?php echo htmlspecialchars($zodiacDetail['LifePurpose']); ?>
            </p>
        </div>
    </div>   
    <hr>      
    <label for="" style="margin-left: 40px;  color: black; font-weight: bold; font-size:30px">သစ္စာရှိမှု</label>
    <div class="container mt-2" >
        <div class="content2" >
            <p>
            <?php echo htmlspecialchars($zodiacDetail['Loyal']); ?>
            </p>
        </div>
    </div> 
    <hr>      
    <label for="" style="margin-left: 40px; color: black; font-weight: bold; font-size:30px">ရာသီခွင် ကိုယ်စားပြုပန်း</label>
    <div class="container mt-2" >
        <div class="content2" >
            <p>
            <?php echo htmlspecialchars($zodiacDetail['RepresentativeFlower']); ?>
            </p>
        </div>
    </div> 
    <hr>    
    <label for="" style="margin-left: 40px; color: black; font-weight: bold; font-size:30px">ဒေါသစိတ်</label>
    <div class="container mt-2" >
        <div class="content2" >
            <p>
            <?php echo htmlspecialchars($zodiacDetail['Angry']); ?>
             </p>
        </div>
    </div>  
    <hr>      
    <label for="" style="margin-left: 40px;  color: black; font-weight: bold; font-size:30px">အသွင်အပြင်လက္ခဏာ</label>
    <div class="container mt-2" >
        <div class="content2" >
            <p>
            <?php echo htmlspecialchars($zodiacDetail['Character']); ?>
             </p>
        </div>
    </div>  
    <hr>
    <label for="" style="margin-left: 40px; color: black; font-weight: bold; font-size:30px">ရုပ်ဆင်းအသွင်အပြင်</label>
    <div class="container mt-2" >
        <div class="content2" >
            <p>
            <?php echo htmlspecialchars($zodiacDetail['PrettyFeatures']); ?>
             </p>
        </div>
    </div> 
</div>
<a href="index.php?page=zodiac" class="text-light px-3 py-2 border rounded text-decoration-none float-right mt-3" style="background-color :#6f1d1b">နောက်သို့</a>
</section>

<script>
   document.addEventListener("DOMContentLoaded", function() {
    var progressBars = document.querySelectorAll('.progress');

    progressBars.forEach(function(progressBar) {
        // Get the final width from the inline style
        var width = progressBar.style.width;
        // Set initial width to 0
        progressBar.style.width = '0'; 

        // Use a timeout to allow the CSS transition to start
        setTimeout(function() {
            progressBar.style.width = width; 
        }, 100); 
    });
});

</script>

