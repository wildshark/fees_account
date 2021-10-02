<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?=$GLOBALS['header']?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
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
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile">
                            <div class="profile-head">
                                
                                <div class="profile-info">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12">
                                            <div class="row">
                                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                    <div class="profile-name">
                                                        <h4 class="text-primary">Name <?=$profile['fname']." ".$profile['lname']?></h4>
                                                        <h4 class="text-primary">Account #<?=$profile['account']?></h4>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                    <div class="profile-email">
                                                        <h4 class="text-muted">Group Name <?=$profile['group_name']?></h4>
                                                        <h4 class="text-muted">Mobile <?=$profile['mobile1']?></h4>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-xl-4 col-sm-4 prf-col">
                                                    <div class="profile-call">
                                                        <h4 class="text-muted">(+1) 321-837-1030</h4>
                                                        <p>Phone No.</p>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Monthly Dues</a>
                                            </li>
                                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">Loans & Payment</a>
                                            </li>
                                            <!--li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Setting</a>
                                            </li-->
                                        </ul>
                                        <div class="tab-content">
                                            <div id="my-posts" class="tab-pane fade active show">
                                            <div class=row>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card">
                                                            <div class="stat-widget-one card-body">
                                                                <div class="stat-icon d-inline-block">
                                                                    <i class="ti-money text-success border-success"></i>
                                                                </div>
                                                                <div class="stat-content d-inline-block">
                                                                    <div class="stat-text">Date</div>
                                                                    <div class="stat-digit"><?=date("d M, Y")?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card">
                                                            <div class="stat-widget-one card-body">
                                                                <div class="stat-icon d-inline-block">
                                                                    <i class="ti-user text-primary border-primary"></i>
                                                                </div>
                                                                <div class="stat-content d-inline-block">
                                                                    <div class="stat-text">Total Transaction</div>
                                                                    <div class="stat-digit"><?=0?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card">
                                                            <div class="stat-widget-one card-body">
                                                                <div class="stat-icon d-inline-block">
                                                                    <i class="ti-layout-grid2 text-pink border-pink"></i>
                                                                </div>
                                                                <div class="stat-content d-inline-block">
                                                                    <div class="stat-text">Paid</div>
                                                                    <div class="stat-digit"><?=number_format($dues_summary['total'],2)?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card">
                                                            <div class="stat-widget-one card-body">
                                                                <div class="stat-icon d-inline-block">
                                                                    <i class="ti-link text-danger border-danger"></i>
                                                                </div>
                                                                <div class="stat-content d-inline-block">
                                                                    <div class="stat-text">Paid Back</div>
                                                                    <div class="stat-digit"><?=0?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-post-content pt-3">
                                                    <div class="table-responsive">
                                                        <table class="text-muted table table-bordered table-striped verticle-middle table-responsive-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>S/N</th>
                                                                    <th>Date</th>
                                                                    <th>Ref #</th>
                                                                    <th>Dues Month</th>
                                                                    <th>Paid</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    if((!isset($transaction['dues_details']))||($transaction['dues_details']== false)){
                                                                        echo"
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>";
                                                                    }else{
                                                                        foreach($transaction['dues_details'] as $r){
                                                                            if(!isset($n)){
                                                                                $n = 1;
                                                                            }else{
                                                                                $n = $n + 1;
                                                                            }
                                                                            $amt = number_format($r['dues_amt'],2);                                                                            
                                                                            echo"<tr>
                                                                                    <td>{$n}</td>
                                                                                    <td>{$r['trandate']}</td>
                                                                                    <td>{$r['ref']}</td>
                                                                                    <td>{$r['dues_month']}-{$r['dues_year']}</td>
                                                                                    <td>{$amt}</td>
                                                                                    
                                                                                </tr>";

                                                                        }

                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="about-me" class="tab-pane fade">
                                                <div class=row>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card">
                                                            <div class="stat-widget-one card-body">
                                                                <div class="stat-icon d-inline-block">
                                                                    <i class="ti-money text-success border-success"></i>
                                                                </div>
                                                                <div class="stat-content d-inline-block">
                                                                    <div class="stat-text">Date</div>
                                                                    <div class="stat-digit"><?=date("d M, Y")?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card">
                                                            <div class="stat-widget-one card-body">
                                                                <div class="stat-icon d-inline-block">
                                                                    <i class="ti-user text-primary border-primary"></i>
                                                                </div>
                                                                <div class="stat-content d-inline-block">
                                                                    <div class="stat-text">Loan</div>
                                                                    <div class="stat-digit"><?=number_format($loan_summary['loan'],2)?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card">
                                                            <div class="stat-widget-one card-body">
                                                                <div class="stat-icon d-inline-block">
                                                                    <i class="ti-layout-grid2 text-pink border-pink"></i>
                                                                </div>
                                                                <div class="stat-content d-inline-block">
                                                                    <div class="stat-text">Paid</div>
                                                                    <div class="stat-digit"><?=number_format($loan_summary['paid'],2)?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="card">
                                                            <div class="stat-widget-one card-body">
                                                                <div class="stat-icon d-inline-block">
                                                                    <i class="ti-link text-danger border-danger"></i>
                                                                </div>
                                                                <div class="stat-content d-inline-block">
                                                                    <div class="stat-text">Paid Back</div>
                                                                    <div class="stat-digit"><?=number_format(($loan_summary['loan']-$loan_summary['paid']),2)?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-post-content pt-3">
                                               
                                                    <div class="table-responsive">
                                                        <table class="text-muted table table-bordered table-striped verticle-middle table-responsive-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>S/N</th>
                                                                    <th>Date</th>
                                                                    <th>Ref #</th>
                                                                    <th>Loan</th>
                                                                    <th>Paid</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    if((!isset($transaction['loan_details']))||($transaction['loan_details']== false)){
                                                                        echo"
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>";
                                                                    }else{
                                                                        foreach($transaction['loan_details'] as $r){
                                                                            if(!isset($n)){
                                                                                $n = 1;
                                                                            }else{
                                                                                $n = $n + 1;
                                                                            }
                                                                            $loan = number_format($r['loan'],2); 
                                                                            $paid = number_format($r['paid'],2);                                                                            
                                                                            echo"<tr>
                                                                                    <td>{$n}</td>
                                                                                    <td>{$r['tran_date']}</td>
                                                                                    <td>{$r['ref']}</td>
                                                                                    <td>{$loan}</td>
                                                                                    <td>{$paid}</td>
                                                                                    
                                                                                    
                                                                                </tr>";

                                                                        }

                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Account Setting</h4>
                                                        <form>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Email</label>
                                                                    <input type="email" placeholder="Email" class="form-control">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Password</label>
                                                                    <input type="password" placeholder="Password" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input type="text" placeholder="1234 Main St" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Address 2</label>
                                                                <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>City</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>State</label>
                                                                    <select class="form-control" id="inputState">
                                                                        <option selected="">Choose...</option>
                                                                        <option>Option 1</option>
                                                                        <option>Option 2</option>
                                                                        <option>Option 3</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Zip</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input" id="gridCheck">
                                                                    <label for="gridCheck" class="form-check-label">Check me out</label>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Sign
                                                                in</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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