<?php
ob_start();
 require_once('layout/header.php');
 session_start();
  if(!isset($_SESSION['admin'])){
    header('location:./login.php');
  }else{
    if($_SESSION['admin']->role !=="admin"){
        header('location:./login.php');
    }
  }
 function rowCount($table){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) as count from $table");
    $stmt->execute();
    $data=$stmt->fetchObject();
    return $data;
}
$hand =  rowCount("que");
$lizard =  rowCount("lizard");
$bee =  rowCount("bee");
$blogHeader =  rowCount("blogHeader");
$yeary =  rowCount("yeary");
$pick =rowCount("questions");
$shakes = rowCount("shakes");
$number = rowCount("nobaydin");
?>
<div id="wrapper">
        <?php
    require_once('layout/sidebar.php');
            ?>
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php require_once('layout/topbar.php'); ?>
            <?php
                    if($_SERVER['QUERY_STRING']):
                        switch($_REQUEST['page']){
                            #hand
                            case 'hand': 
                                require_once('hand/index.php');
                                break;
                            case 'handcreate':
                                require_once('hand/create.php');
                                break;
                            case 'handedit':
                                require_once('hand/edit.php');
                                break;
                                #pickApile
                            case 'pick':
                                require_once('Pick/index.php');
                                break;    
                            case 'pickcreate':
                                    require_once('Pick/create.php');
                                    break;   
                            case 'pickedit':
                                    require_once('Pick/edit.php');
                                    break;  
                                    #Yearly    
                            case 'year':
                                     require_once('Yearly/index.php');
                                     break;
                             case 'yearedit':
                                require_once('Yearly/edit.php');
                                break;  
                                #dream 
                              case 'dream' :
                              require_once('dream/index.php')   ;
                              break; 
                              case 'dreamcreate'  :
                              require_once('dream/create.php')   ;
                              break;         
                              case 'dreamedit'   :
                              require_once('dream/edit.php')   ;
                              break;  
                              #bee
                              case 'bee' :
                                require_once('bee/index.php')   ;
                                break; 
                                case 'beecreate'  :
                                require_once('bee/create.php')   ;
                                break;         
                                case 'beeedit'   :
                                require_once('bee/edit.php')   ;
                                break; 
                                #lizard 
                                case 'lizard' :
                                    require_once('lizard/index.php')   ;
                                    break; 
                                    case 'lizardcreate'  :
                                    require_once('lizard/create.php')   ;
                                    break;         
                                    case 'lizardedit'   :
                                    require_once('lizard/edit.php')   ;
                                    break;          
                                     #lizard 
                                case 'shake' :
                                    require_once('shake/index.php')   ;
                                    break; 
                                    case 'shakecreate'  :
                                    require_once('shake/create.php')   ;
                                    break;         
                                    case 'shakeedit'   :
                                    require_once('shake/edit.php')   ;
                                    break;   
                                          #zodiac
                                case 'zodiac' :
                                    require_once('zodiac/index.php')   ;
                                    break; 
                                            
                                    case 'zodiacedit'   :
                                    require_once('zodiac/edit.php')   ;
                                    break;                                        
                                #user
                            case 'profile':
                                    require_once("profile/index.php");
                                    break;                           
                            case 'profileedit':
                                require_once('profile/edit.php');
                                break;
                                    #user
                            case 'number':
                                require_once("number/index.php");
                                break;                           
                        case 'numberedit':
                            require_once('number/edit.php');
                            break;
                                
                        }
                    else:
                    ?>
            <!-- End of Topbar -->
           
            <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold text-dark text-uppercase mb-1">
                        လက်ထောက်ဗေဒင်</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hand->count ?></div>
                    </div>
                    <div class="col-auto">
                    <img src="../ICON/icons8-hand-48 (2).png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold  text-uppercase mb-1">
                        Pick a pile</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pick->count ?></div>
                    </div>
                    <div class="col-auto">
                    <img src="../ICON/icons8-poker-48.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold  text-uppercase mb-1">
                        ၁၂လ ရာသီခွင်</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                    </div>
                    <div class="col-auto">
                    <img src="../ICON/icons8-cancer-50.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold  text-uppercase mb-1">အိပ်မက် အဘိဓာန်
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $blogHeader->count ?></div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-auto">
                    <img src="../ICON/icons8-thought-balloon-48 (2).png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold  text-uppercase mb-1">အသားလှုပ်နိမိတ်
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $shakes->count ?></div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-auto">
                    <img src="../ICON/icons8-body-67.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold  text-uppercase mb-1">အိမ်မြှောင်စုပ်ထိုး နိမိတ်
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $lizard->count ?></div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-auto">
                    <img src="../ICON/icons8-lizard-48 (1).png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-3 ">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl  font-weight-bold  text-uppercase mb-1">ပျားစွဲ နိမိတ်
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $bee->count ?></div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-auto">
                    <img src="../ICON/icons8-bee-40.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold  text-uppercase mb-1">
                        တနှစ်စာဟောတမ်း</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $yeary->count ?></div>
                    </div>
                    <div class="col-auto">
                    <img src="../ICON/icons8-calendar-50.png" alt="">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xl font-weight-bold  text-uppercase mb-1">
                        ဂဏန်းဗေဒင်</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $number->count ?></div>
                    </div>
                    <div class="col-auto">
                    <img src="../ICON/icons8-numbers-60.png" alt="">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->


</div>
                <?php
                    endif;
                ?>
                

                </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           <?php require_once('layout/copyright.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   

    
<?php
 require_once('layout/footer.php');
?>