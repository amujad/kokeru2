<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>Dashboard CS</title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="<?php echo e(url('assets/css/sb-admin.css')); ?>" rel="stylesheet"/>
        <link
            href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
            rel="stylesheet"
            crossorigin="anonymous"/>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>
        <style>
            body{font-family: 'Montserrat', sans-serif;
                text-rendering : optimizeLegibility;
	            -webkit-font-smoothing : antialiased;
	            background-color: #f8f9fc;
                
            }
            .listRuang{
                background-color: #ffff;
            }
            .login .btn {
            border-radius: 40px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
            font-size: 20px;
            padding: 12px;
            background-color: #00B72E;
            }
            
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark shadow" style="background-color: #48b599">
            <div class="navbar-brand mr-auto logo">
                <a class="navbar-brand mr-auto logo" href="#" style>KoKeRu</a>
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav navbar-dark ml-auto ml-md-0">
                <a href="<?php echo e(url('logout')); ?>" style="color:white">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sign Out</span>
                </a>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light bg-white shadow-sm" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Inti</div>
                                <a class="nav-link" href="cs">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt fa-fw"></i></div>
                                    Dashboard
                                </a>
                                <a class="nav-link" href="/Tugas">
                                    <div class="sb-nav-link-icon"><i class="fa fa-file-alt fa-fw" ></i></div>
                                    Tugas
                                </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo e(Auth::user()->name); ?>

                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Bukti Kebersihan <?php echo e($ruang->nama); ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Penugasan Ruangan <?php echo e(date('d F Y')); ?></li>
                        </ol>
                        <div class="container shadow-sm rounded listRuang">
                            <div class="pt-4 row row-cols-1 row-cols-md-3">
                            <?php $__currentLoopData = json_decode(($ruang->bukti1)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $picture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <image src="<?php echo e(url('storage/'.str_replace('public/','',$picture))); ?>" style="height:120px; width:200px"/>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>     
    </body>
</html><?php /**PATH C:\xampp\htdocs\New folder\KOKERU\resources\views/Tugas/viewBukti.blade.php ENDPATH**/ ?>