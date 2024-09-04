
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no ">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../assest/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assest/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assest/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="../assest/css/zodiac.css">
    <link rel="stylesheet" href="../assest/css/skin.css">
  
  

   
    


</head>

<body id="page-top">
  
   

  
    <!-- Page Wrapper -->
    <div id="wrapper" style="height:100vh;">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #6f1d1b;overflow-x:hidden;  overflow-y: scroll;">
    <!-- Sidebar - Brand -->
   
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
        <div class="sidebar-brand-icon ">
        <img src="../image/zodiac-icons/parchment.png" alt="" style="width: 50px; height: 50px;">&nbsp;
        </div>
        <div class="sidebar-brand-text ">ရိုးရာဗေဒင်</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo !isset($_GET['page']) ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php">
            <img src="../ICON/icons8-hand-48 (2).png" style="width: 20px;" alt="">&nbsp;
            <span>လက်ထောက်ဗေဒင်</span>
        </a>
    </li>

    <li class="nav-item <?php echo isset($_GET['page']) && ($_GET['page'] === 'pickapile' || $_GET['page'] === 'pick') ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=pickapile">
            <img src="../ICON/icons8-poker-48.png" style="width: 20px;" alt="">&nbsp;
            <span>Pick a pile</span>
        </a>
    </li>

    <li class="nav-item <?php echo isset($_GET['page']) && ($_GET['page'] === 'zodiac' || $_GET['page'] === 'zodiac-detail') ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=zodiac">
            <img src="../ICON/icons8-cancer-50.png" style="width: 20px;" alt="">&nbsp;
            <span>၁၂လ ရာသီခွင်</span>
        </a>
    </li>

    <li class="nav-item <?php echo isset($_GET['page']) && ($_GET['page'] === 'dream' || $_GET['page'] === 'dream-detail') ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=dream">
            <img src="../ICON/icons8-thought-balloon-48 (2).png" style="width: 20px;" alt="">&nbsp;
            <span>အိပ်မက် အဘိဓာန်</span>
        </a>
    </li>

    <li class="nav-item <?php echo (isset($_GET['page']) && $_GET['page'] === "shake") ? "active" : "" ; ?>">
        <a class="nav-link" href="index.php?page=shake">
            <img src="../ICON/icons8-body-67.png" style="width: 20px;" alt="">&nbsp;
            <span>အသားလှုပ် နိမိတ်</span>
        </a>
    </li>

    <li class="nav-item <?php echo (isset($_GET['page']) && $_GET['page'] === "lizard") ? "active" : "" ; ?>">
        <a class="nav-link" href="index.php?page=lizard">
            <img src="../ICON/icons8-lizard-48 (1).png" style="width: 20px;" alt="">&nbsp;
            <span>အိမ်မြှောင်စုပ်ထိုး နိမိတ်</span>
        </a>
    </li>

    <li class="nav-item <?php echo (isset($_GET['page']) && $_GET['page'] === "bee") ? "active" : "" ; ?>">

        <a class="nav-link" href="index.php?page=bee">
            <img src="../ICON/icons8-bee-40.png" style="width: 20px;" alt="">&nbsp;
            <span>ပျားစွဲ နိမိတ်</span>
        </a>
    </li>

    <li class="nav-item <?php echo isset($_GET['page'])&& ($_GET['page']=='7-days' ||($_GET['page'])=='7days-deatil')  ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=7-days">
            <img src="../ICON/icons8-calendar-50.png" style="width: 20px;" alt="">&nbsp;
            <span>တနှစ်စာဟောတမ်း</span>
        </a>
    </li>
    <li class="nav-item <?php echo isset($_GET['page'])&& ($_GET['page']=='number' ||($_GET['page'])=='number-deatil')  ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=number">
            <img src="../ICON/icons8-numbers-60.png" style="width: 20px;" alt="">&nbsp;
            <span>ဂဏန်းဗေဒင်</span>
        </a>
    </li>
    <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
  
</ul>


        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content"   >
                <div class="p-4 d-block d-md-none static-top bg-dark" style="height: 70px;position:sticky;top:0px;"  >
                    <button id="sidebarToggleTop" style="padding: 5px 10px; border-radius: 5px; border: none;">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                
         <section  class="sign container" >

      
        
       