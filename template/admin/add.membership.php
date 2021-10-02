<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?=$GLOBALS['header']?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form method="get" action="index.php">
                                        <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
                                        <input type="hidden" name="_admin" value="search">
                                        <input type="hidden" name="token" value="<?=$_GET['token']?>">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <!--li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li-->
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="?_admin=user.profile&token=<?=$_GET['token']?>" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="?_user=logoff" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <?php menu($_GET['token'])?>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <span class="ml-1">Element</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Membership Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="index.php">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Account ID#</label>
                                                <input type="text" name="account-id" value="<?=$account?>" class="form-control" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Group</label>
                                                <select name="group" id="inputState" class="form-control">
                                                    <option selected value='<?=$group_id?>'><?=$group?></option>
                                                    <?=combo_groups($groups)?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Status</label>
                                                <select name="status" id="inputState" class="form-control">
                                                    <option selected><?=$status?></option>
                                                    <option>Enable</option>
                                                    <option>Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>First Name</label>
                                                <input type="text" name="fname" value="<?=$fname?>" class="form-control" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Mid. Name</label>
                                                <input type="text" name="mname" value="<?=$mname?>" class="form-control" placeholder="Mid. Name">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Surname</label>
                                                <input type="text" name="surname" value="<?=$surname?>" class="form-control" placeholder="surname">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Date of Birth</label>
                                                <input type="date" name="dob" value="<?=$dob?>" class="form-control" placeholder="1234 Main St">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Nationality</label>
                                                <input type="text" name="nationality" value="<?=$nationality?>" class="form-control" placeholder="1234 Main St">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>ID Card Type</label>
                                                <select name="type" id="inputState" class="form-control">
                                                    <option selected><?=$type?></option>
                                                    <option>Voter's IDcard</option>
                                                    <option>Ghana IDcard</option>
                                                    <option>NHIS IDcard</option>
                                                    <option>SSN IDcard</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>ID Number</label>
                                                <input type="text" name="id-num" value="<?=$id_num?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Email</label>
                                                <input type="email" name="email" value="<?=$email?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Mobile I</label>
                                                <input type="text" name="mobile1" value="<?=$mobile1?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Mobile II</label>
                                                <input type="text" name="mobile2" value="<?=$mobile2?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Occupation</label>
                                                <input type="text" name="occupation" value="<?=$occupation?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Address I</label>
                                                <input type="text" name="address1" value="<?=$address1?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Address II</label>
                                                <input type="text" name="address2" value="<?=$address2?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label>Next of Kin</label>
                                                <input type="text" name="nok" value="<?=$nok?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Relationship</label>
                                                <input type="text" name="relationship" value="<?=$relationship?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Next of Kin's Mobile</label>
                                                <input type="text" name="nok-mobile" value="<?=$nok_mobile?>" class="form-control">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Next of Kin's Address</label>
                                                <input type="text" name="nok-address" value="<?=$nok_address?>" class="form-control">
                                            </div>
                                        </div>
                                        <button type="submit" name="_submit" value="<?=$btn["value"]?>" class="btn btn-primary"><?=$btn["label"]?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                 
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p><?=$GLOBALS['copyright']?></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    
</body>

</html>