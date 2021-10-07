<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$GLOBALS['header']?></title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">   

    <!-- Common -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
      <div class="nano-content">
        <?=menu($_GET['token'])?>
      </div>
    </div>
  </div>
  <!-- /# sidebar -->
  <div class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="float-left">
            <div class="hamburger sidebar-toggle">
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
            </div>
          </div>
          <div class="float-right">         
            <div class="dropdown dib">
              <div class="header-icon" data-toggle="dropdown">
                <span class="user-avatar"><?=$_SESSION['username']?>
                  <i class="ti-angle-down f-s-10"></i>
                </span>
                 <!--div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Upgrade Now</span>
                                        <p class="trial-day">30 Days Trail</p>
                                    </div>
                                    <div class="dropdown-content-body">
                                    <?=profile_menu($_GET['token'])?>
                                    </div>
                                </div-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
              <div class="page-title">
              <h1><?=$temp['title']?></h1>
              </div>
            </div>
          </div>
          <!-- /# column -->
          <!--div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div-->
          <!-- /# column -->
        </div>
        <!-- /# row -->
        <section id="main-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="user-profile">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="user-photo m-b-30">
                          <img class="img-fluid" src="<?=$photo?>" alt="" />
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="custom-tab user-profile-tab">
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <h2><?=$fullname?></h2>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="basic-information">
                                <h4>Basic information</h4>
                                <div class="birthday-content">
                                  <span class="contact-title">Birthday:</span>
                                  <span class="birth-date"><?=$dob?> </span>
                                </div>
                                <div class="gender-content">
                                  <span class="contact-title">Gender:</span>
                                  <span class="gender"><?=$gender?></span>
                                </div>
                                <div class="gender-content">
                                  <span class="contact-title">Nationality:</span>
                                  <span class="gender"><?=$nationality?></span>
                                </div>
                              </div>
                              <div class="contact-information">
                                <h4>Contact information</h4>
                                <div class="phone-content">
                                  <span class="contact-title">Name:</span>
                                  <span class="phone-number"><?=$gname?></span>
                                </div>
                                <div class="phone-content">
                                  <span class="contact-title">Phone:</span>
                                  <span class="phone-number"><?=$gmobile?></span>
                                </div>
                                <div class="address-content">
                                  <span class="contact-title">Address:</span>
                                  <span class="mail-address"><?=$address?></span>
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
          <!-- /# row -->
            <div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-body">
											<!--h4 class="card-title">Nav Pills Tabs</h4-->
											<ul class="nav nav-pills m-t-30 m-b-30">
												<li class=" nav-item"> <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Class Assign</a> </li>
												<li class="nav-item"> <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Fee Transaction</a> </li>
												<!--li class="nav-item"> <a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">Tab Three</a> </li-->
											</ul>
											<div class="tab-content br-n pn">
												<div id="navpills-1" class="tab-pane active">
													<div class="row">
                            <div class="table-responsive">
                              <table class="table table-hover ">
                                <thead>
                                  <tr>
                                    <th>Date</th>
                                    <th>Academic Yrs.</th>
                                    <th>Term</th>
                                    <th>Grade</th>
                                    <th>Fees</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    if((!isset($assign))||($assign == false)){
                                      echo"";
                                    }else{

                                      foreach($assign as $r){
                                          echo" 
                                          <tr>
                                            <td>{$r['tran_date']}</td>
                                            <td>{$r['acad_id']}</td>
                                            <td>{$r['term']}</td>
                                            <td>{$r['grade']}</td>
                                            <td>{$r['fees']}</td>
                                          </tr>";
                                      }
                                    }
                                  ?>
                                </tbody>
                              </table>
                            </div>
													</div>
												</div>
												<div id="navpills-2" class="tab-pane">
													<div class="row">
                            <div class="table-responsive">
                              <table class="table table-hover ">
                                <thead>
                                  <tr>
                                    <th>Date</th>
                                    <th>Ref</th>
                                    <th>Academic Yrs.</th>
                                    <th>Details</th>
                                    <th>Term</th>
                                    <th>Grade</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                      if((!isset($ledger))||($ledger== false)){
                                        echo"";
                                      }else{

                                        foreach($ledger as $r){

                                          if($r['pay_type'] == "Bill"){
                                            $css ="text-danger";
                                          }elseif(($r['pay_type'] == "Cash")||($r['pay_type'] == "Bank")){
                                            $css ="text-success";
                                          }else {
                                            $css="";
                                          }

                                          $amt = number_format($r['bill'] + $r['paid'],2);
                                            echo" 
                                            <tr>
                                              <td>{$r['tran_date']}</td>
                                              <td>{$r['ref']}</td>
                                              <td>{$r['acad_yr']}</td>
                                              <td>{$r['details']}</td>
                                              <td>{$r['term']}</td>
                                              <td>{$r['grade']}</td>
                                              <td class='{$css}'>{$r['pay_type']}</td>
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
												<div id="navpills-3" class="tab-pane">
													<div class="row">
														<div class="col-md-4"> <img src="assets/images/c1.jpg" class="img-fluid thumbnail mr25"> </div>
														<div class="col-md-8"> Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.
															<p>
																<br/> Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                <?php require("model.php")?>
						</div>
          <div class="row">
            <div class="col-lg-12">
              <div class="footer">
              <p><?=$GLOBALS['copyright']?></p>
                </p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

    <!-- Common -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>

</body>

</html>