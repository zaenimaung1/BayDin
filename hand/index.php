<?php
require_once("../config/db.php");

// Define the number of items per page
$limit = 20;

// Get the current page number from URL, default to 1 if not set
$page = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
$page = max(1, $page); // Ensure page number is at least 1

$start = ($page - 1) * $limit; // Calculate the starting row for the SQL query

// Fetch total number of questions
$stmt = $conn->prepare("SELECT COUNT(*) as total FROM que");
$stmt->execute();
$total = $stmt->fetch(PDO::FETCH_OBJ)->total;

// Calculate total pages
$total_pages = ceil($total / $limit);

// Fetch the current page's questions
$stmt = $conn->prepare("SELECT * FROM que ORDER BY QuestionNo DESC LIMIT :start, :limit");
$stmt->bindParam(':start', $start, PDO::PARAM_INT);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();
$datas = $stmt->fetchAll(PDO::FETCH_OBJ);

// Function to convert numbers to Myanmar digits
function convertToMyanmarDigits($number) {
    $myanmarDigits = ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];
    $convertedNumber = '';
    $number = strval($number); // Ensure the number is treated as a string
    for ($i = 0; $i < strlen($number); $i++) {
        $digit = $number[$i];
        $convertedNumber .= $myanmarDigits[$digit];
    }
    return $convertedNumber;
}
?>
<?php require_once("../layout/header.php"); ?>



<!-- Sidebar -->

<!-- End of Sidebar -->



        <?php
       if (isset($_REQUEST['page'])) {
        switch($_REQUEST['page']){
            
            case 'hello':
                require_once('../hand/Answer.php');
                break;
                #dream-directionary
            case 'dream':
                require_once('../dream/dream.php');
                break;
            case 'dream-detail':
                require_once('../dream/dream-detail.php');
                break;
                #zodiac
                case 'zodiac':
                    require_once('../zodiac/zodiac.php');
                    break;
                case 'zodiac-detail':
                    require_once('../zodiac/zodiac-detail.php');
                    break;
                 #7-days
                 case '7-days':
                    require_once('../7-days/7days.php')   ;
                    break;
                  case '7days-deatil' :
                    require_once('../7-days/7days-detail.php')   ;
                    break;
                     #7-days
                 case 'number':
                    require_once('../number/index.php')   ;
                    break;
                  case 'number-deatil' :
                    require_once('../number/detail.php')   ;
                    break;
                   #pickAPile 
                  case 'pickapile' :
                    require_once('../PickAPile/pickindex.php');
                    break;
                    case 'pick' :
                        require_once('../PickAPile/pick.php');
                        break;
                     #bee
                     case "bee"  :
                        require_once("../bee/bee.php") ;
                        break;
                          #bee
                     case "lizard"  :
                        require_once("../lizard/lizard.php") ;
                        break;
                        #shake
                        case "shake"  :
                            require_once("../shake/shake.php") ;
                            break;
            default:
                echo "<p>Page not found</p>";
        }
    }
    elseif (isset($_GET['id']) || isset($_GET['numberListId'])) {
        // If 'page' is not set but 'id' or 'numberListId' is set, default to
        require_once('Answer.php');
    }
        
    else {
        // Default content if 'page' and 'id' are not set
        ?>



   
<div class="container pb-4 text-center" style="color:black;font-size:23px;font-weight:bold;">
    လက်ထောက်ဗေဒင်
</div>

<div class="container">

    <table class="table table-bordered table-striped">
        <tbody>
            <?php
            $count = $start;
            foreach ($datas as $data): ?>
            <tr>
                <td><?php echo convertToMyanmarDigits(++$count); ?></td>
                <td>
                    <a style="color:black;text-decoration: none;" class="hover-move" href="index.php?page=hello&id=<?php echo $data->QuestionNo; ?>">
                        <?php echo $data->QuestionsName; ?>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination Links -->
    <nav>
        <ul class="pagination justify-content-center ">
            <!-- Previous Page Link -->
            <li class="page-item <?php if ($page <= 1) { echo 'disabled'; } ?>">
                <a class="page-link" href="<?php if ($page > 1) { echo "?page_num=" . ($page - 1); } else { echo '#'; } ?>">နောက်သို့</a>
            </li>

            <!-- Page Numbers -->
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?php if ($page == $i) { echo 'active'; } ?>">
                <a class="page-link" href="index.php?page_num=<?php echo $i; ?>"><?php echo convertToMyanmarDigits($i); ?></a>
            </li>
            <?php endfor; ?>

            <!-- Next Page Link -->
            <li class="page-item <?php if ($page >= $total_pages) { echo 'disabled'; } ?>">
                <a class="page-link" href="<?php if ($page < $total_pages) { echo "?page_num=" . ($page + 1); } else { echo '#'; } ?>">ရှေ့သို့</a>
            </li>
        </ul>
    </nav>

   
</div>

         </section>
        <?php
    }   
    ?>
    <?php require_once("../layout/footer.php")?>
  

    
