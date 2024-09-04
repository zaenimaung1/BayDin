<?php
    $datas=file_get_contents("../json/zodiac.json");
    $datas = json_decode($datas, true); 
    function convertToMyanmarDigits($number) {
        $myanmarDigits = ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];
        $convertedNumber = '';
        
        // Convert each digit to the corresponding Myanmar digit
        $number = strval($number); // Ensure the number is treated as a string
        for ($i = 0; $i < strlen($number); $i++) {
            $digit = $number[$i];
            $convertedNumber .= $myanmarDigits[$digit];
        }
        
        return $convertedNumber;
    }
   

?>
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">၁၂လ ရာသီခွင်</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>စဥ်</th>
                            <th>ရာသီခွင်</th>
                            <th>ရည်မှန်းချက်</th>
                            <th>သစ္စာ</th>
                            <th>ကိုယ်စာပြုပန်း</th>
                            <th>‌‌‌ဒေါသ</th>
                            <th>အသွင်အပြင်လက္ခဏာ</th>
                            <th>ရုပ်ဆင်းအသွင်အပြင်</th>
                            <th>လုပ်ဆောင်ချက်</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; foreach ($datas as $data): ?>
                        <tr>
                          <td><?php echo convertToMyanmarDigits(++$count); ?></td>
                            <td><?php echo htmlspecialchars($data['Name']); ?></td>
                            <td>
                                <div style="max-width:400px; height:200px; overflow:auto; scrollbar-width:none; -ms-overflow-style:none;">
                                    <?php echo htmlspecialchars($data['LifePurpose']); ?>
                                </div>
                            </td>
                            <td>
                                <div style="max-width:300px; height:200px; overflow:auto; scrollbar-width:none; -ms-overflow-style:none;">
                                    <?php echo htmlspecialchars($data['Loyal']); ?>
                                </div>
                            </td>
                            <td>
                                <div style="max-width:300px; height:200px; overflow:auto; scrollbar-width:none; -ms-overflow-style:none;">
                                    <?php echo htmlspecialchars($data['RepresentativeFlower']); ?>
                                </div>
                            </td>
                            <td>
                                <div style="max-width:300px; height:200px; overflow:auto; scrollbar-width:none; -ms-overflow-style:none;">
                                    <?php echo htmlspecialchars($data['Angry']); ?>
                                </div>
                            </td>
                            <td>
                                <div style="max-width:300px; height:200px; overflow:auto; scrollbar-width:none; -ms-overflow-style:none;">
                                    <?php echo htmlspecialchars($data['Character']); ?>
                                </div>
                            </td>
                            <td>
                                <div style="max-width:300px; height:200px; overflow:auto; scrollbar-width:none; -ms-overflow-style:none;">
                                    <?php echo htmlspecialchars($data['PrettyFeatures']); ?>
                                </div>
                            </td>
                            <td>
                               <div  class="d-flex align-items-center justify-content-start">
                               <a href="index.php?page=zodiacedit&edit_id=<?php echo htmlspecialchars($data['Id']); ?>" class="btn btn-success px-3 py-2" style="min-width: 100px;">ပြင်မည်</a>
                               </div>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>