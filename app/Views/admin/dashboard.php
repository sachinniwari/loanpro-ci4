<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoanPro</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <link href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="body">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--sidebar-->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <button id="sidebarToggleTop" class="btn btn-link menu-close">
                <img src="images/close.png" alt="" width="18">
            </button>
            <!-- logo -->
            <a class="sidebar-brand d-flex align-items-center" href="<?php echo base_url() ?>/admin/fetchData">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="<?php echo base_url() ?>/assets/images/LoanProLogo.png" class="logo1" width="200px" />
                    <img src="<?php echo base_url() ?>/assets/images/icon.png" class="logo2" width="40px"/>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class='bx bx-chalkboard'></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link active" href="overview.php" data-bs-toggle="collapse" data-bs-target="#home-collapse"
                    aria-expanded="true">
                    <i class='bx bx-spreadsheet'></i>
                    <span>User List</span>
                </a>
                <!-- <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" >   <i class='bx bx-search-alt' ></i>CRM Search</a></li>
            <li><a href="#">   <i class='bx bx-bar-chart-square' ></i>Sales Report</a></li>
           
          </ul>

        </div> -->
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class='bx bx-cog'></i>
                    <span>Administration Tools</span></a>
            </li>

        </ul>
        <!--sodebar-close-->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-3 static-top ">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link  rounded-circle mr-3" onclick="toggle()">
                        <i class='bx bx-menu'></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="form-inline me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" method="get">
                        <div class="input-group search-group ">
                            <div class="search-icon">
                                <i class='bx bx-search'></i>
                            </div>
                            <input type="text" class="form-control border-0 small" name = "search" placeholder="Search for" />
                            <button class="btn search-btn">Search</button>
                            <button class="btn search-btn" value="asc" name="sort">Asc Sort</button>
                            <button class="btn search-btn" value="desc" name="sort">Desc Sort</button>
                        </div>

                        
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2" />
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>





                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="me-2 d-none d-lg-inline text-gray-600 small">John Doe</span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url() ?>/assets/imagesadmin/Max-R_Headshot (1).jpg" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow " aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>


                <!-- home-Page-Content -->
                <div class="container-fluid">



                    <h4 class="mb-0 text-gray-800">LoanPro User Search</h4>
                    <nav class="border-bottom">
                        <ol class="breadcrumb mt-3">
                            <li class="breadcrumb-item"><a href="#"><i class='bx bx-home'></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">LoanPro</li>
                        </ol>
                    </nav>

                    <div class="filter-sec border-bottom mb-4 pb-3">
                        <div class="d-flex mt-3">
                            <span for="" class="me-2">Filter:</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="filter" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Name</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="filter" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Loan Amount</label>
                            </div>

                        </div>

                        <div class="row mb-3 mt-3 f-form-row">

                            <!-- <div class="col-md-2">
                <select name="" id="" class="form-select">
                  <option value="">nam</option>
                </select>
              </div> -->
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="First Name">
                            </div>

                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>

                            <!-- <div class="col-md-2">
                <select name="" id="" class="form-select">
                  <option value="">Distcrit</option>
                </select>
              </div> -->

                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="Mobile Number">
                            </div>


                            <!-- <div class="col-md-3">
                <select name="" id="" class="form-select">
                  <option value="">Pipeline Stage</option>
                </select>
              </div> -->

                        </div>

                        <!-- <div class="row mb-3"> -->

                        <div class="col-md-6">
                            <button class="btn btn-primary">Search</button>
                        </div>
                        <!-- <div class="col-md-6 d-flex">
                <div class="ms-auto">
                  <button class="btn btn-light add-btn "><i class='bx bx-plus'></i> Add School</button>
                  <button class="btn btn-light add-btn "> <i class='bx bx-plus'></i>Add District</button>
                </div>

              </div> -->
                        <!-- </div> -->

                    </div>
                    <!--Close-filter-sec -->
                


                   
                    <div class="row">
                        <div class="col-md-12">

                        <div class="up d-flex flex-row-reverse m-2" >
                                <?php $pager->setpath('LoanProject/admin/fetchData'); ?>
                                <?php echo $pager->links(); ?>
                            </div>
                            <!--pagination-->
                            <!-- <div class="d-flex align-items-center justify-content-end mb-3">
                                <div class="csv border-end me-3 pe-3 d-flex align-items-center">
                                    <a href="" class="d-flex text-decoration-none text-dark "><img
                                            src="<?php echo base_url() ?>/assets/imagesadmin/excel-file.svg"
                                            class="me-2"> Export CSV </a>
                                </div>

                                <select name="" id="" class="form-select me-2 page-count ">
                                    <option value="">10</option>
                                </select>

                                <ul class="pagination mb-0">
                                    <li class="page-item"><a class="page-link" href="#"> <img
                                                src="<?php echo base_url() ?>/assets/imagesadmin/left-arrow-light.svg"
                                                alt=""> </a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><img
                                                src="<?php echo base_url() ?>/assets/imagesadmin/right-arrow-dark.svg"
                                                alt=""> </a></li>
                                </ul>
                            </div> -->
                            <!--close-pagination-->

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">S.No.</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile Number</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <?php $sno = 1;?>
                                <?php if($page = $_GET['page']){
                                    $sn = ($page - 1) * 5;
                                }?>
                                <?php foreach ($user as $userdata) {
                                  
                                        $sn++; ?>
                                    
                                    <tbody>
                                        
                                        <tr>
                                            <td><?= $sn ?></td>
                                            <td><?= $userdata['firstName'] ?></td>
                                            <td><?= $userdata['lastName'] ?></td>
                                            <td><?= $userdata['email'] ?></td>
                                            <td><?= $userdata['mobile'] ?></td>

                                            <td>
                                                <?php  if ($userdata['role'] < 1) { ?> 
                                                <a href="<?php echo base_url('admin/update/'. $userdata['id']);?>"> <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i></button></a> 

                                            <a href = <?php echo base_url('admin/delete/' . $userdata['id']);?>> 
                                            <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                            <?php }?>
                                        </td> 
                                            
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                
                            </table>

                            <div class="row">
                                <?php $pager->setpath('LoanProject/admin/fetchData'); ?>
                                <?php echo $pager->links(); ?>
                            </div>

                           
                            <!--pagination-->
                            <!-- <div class="d-flex align-items-center justify-content-end">
                                <div class="csv border-end me-3 pe-3 d-flex align-items-center">
                                    <a href="" class="d-flex text-decoration-none text-dark "><img
                                            src="<?php echo base_url() ?>/assets/imagesadmin/excel-file.svg"
                                            class="me-2"> Export CSV </a>
                                </div>

                                <select name="" id="" class="form-select me-2 page-count ">
                                    <option value="">5</option>
                                </select>

                                <ul class="pagination mb-0">
                                    <li class="page-item"><a class="page-link" href="#"> <img
                                                src="<?php echo base_url() ?>/assets/imagesadmin/left-arrow-light.svg"
                                                alt=""> </a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><img
                                                src="<?php echo base_url() ?>/assets/imagesadmin/right-arrow-dark.svg"
                                                alt=""> </a></li>
                                </ul>
                            </div> -->
                            <!--close-pagination-->
                        </div>
                    </div>
                    <!--close-table-sec-->



                </div>
                <!--Close-home-Page-Content -->

            </div>

        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <!--Close-Page-Wrapper -->
    
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.bundle.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/sidebars.js"></script>
    <script>
        function toggle() {
            var element = document.getElementById("accordionSidebar");
            var body = document.getElementById("body");
            element.classList.toggle("toggled");
            body.classList.toggle("sidebar-toggled");


        }
    </script>



</body>

</html>