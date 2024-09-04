<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #6f1d1b;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <img src="../image/zodiac-icons/parchment.png" alt="" style="width: 50px; height: 50px;">&nbsp;
        </div>
        <div class="sidebar-brand-text">ရိုးရာဗေဒင်</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'dashboard' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php">
            <img src="../image/zodiac-icons/icons8-folder-50.png" style="width: 23px;" alt="">&nbsp;&nbsp;
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Admin -->
    <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'profile' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=profile">
            <img src="../image/zodiac-icons/icons8-admin-50.png" style="width: 23px;" alt="">&nbsp;&nbsp;
            <span>စီမံသူ</span>
        </a>
    </li>

    <!-- Nav Item - Hand -->
    <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'hand' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=hand">
         
            <img src="../ICON/icons8-hand-48 (2).png" style="width: 23px;" alt="">&nbsp;&nbsp;
            <span>လက်ထောက်ဗေဒင်</span>
        </a>
    </li>

    <!-- Nav Item - Pick a Pile -->
    <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'pick' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=pick">
            <img src="../ICON/icons8-cancer-50.png" style="width: 23px;" alt="">&nbsp;&nbsp;
            <span>Pick a pile</span>
        </a>
    </li>

    <!-- Nav Item - Zodiac -->
    <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'zodiac' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=zodiac">
            <img src="../ICON/icons8-cancer-50.png" style="width: 23px;" alt="">&nbsp;&nbsp;
            <span>၁၂လ ရာသီခွင်</span>
        </a>
    </li>

    <!-- Nav Item - Dream -->
    <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'dream' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=dream">
            <img src="../ICON/icons8-thought-balloon-48 (2).png" style="width: 23px;" alt="">&nbsp;&nbsp;
            <span>အိပ်မက် အဘိဓာန်</span>
        </a>
    </li>

    <!-- Nav Item - Shake -->
    <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'shake' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=shake">
            <img src="../ICON/icons8-body-67.png" style="width: 23px;" alt="">&nbsp;&nbsp;
            <span>အသားလှုပ် နိမိတ်</span>
        </a>
    </li>

    <!-- Nav Item - Lizard -->
    <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'lizard' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=lizard">
            <img src="../ICON/icons8-lizard-48 (1).png" style="width: 23px;" alt="">&nbsp;&nbsp;
            <span>အိမ်မြှောင်စုပ်ထိုး နိမိတ်</span>
        </a>
    </li>

    <!-- Nav Item - Bee -->
    <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'bee' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=bee">
            <img src="../image/zodiac-icons/icons8-bee-50.png" style="width: 23px;" alt="">&nbsp;&nbsp;
            <span>ပျားစွဲ နိမိတ်</span>
        </a>
    </li>

    <!-- Nav Item - Year -->
    <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'year' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=year">
            <img src="../ICON/icons8-calendar-50.png" style="width: 23px;" alt="">&nbsp;&nbsp;
            <span>တနှစ်စာဟောတမ်း</span>
        </a>
    </li>
    <li class="nav-item <?php echo isset($_GET['page']) && $_GET['page'] == 'number' ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php?page=number">
            <img src="../ICON/icons8-numbers-60.png" style="width: 23px;" alt="">&nbsp;&nbsp;
            <span>ဂဏန်းဗေဒင်</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
