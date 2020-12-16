<<<<<<< HEAD
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
                                <a class="nav-link" href="#">
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
                        <h1 class="mt-4">Dashboard Cleaning Service</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Penugasan Ruangan <?php echo e(date('d F Y')); ?></li>
                        </ol>
                        <div class="container shadow-sm rounded listRuang">
                            <div class="pt-4 row row-cols-1 row-cols-md-3">
                                <?php $__currentLoopData = $ruangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col mb-4" style="color:white">
                                        <?php if($ruang->status == 'Sudah'): ?>
                                        <a class="btn-primary" href="Tugas/<?php echo e($ruang->idruangan); ?>/viewBukti">
                                            <div class="card bg-success shadow-sm" id="card-room">
                                        <?php else: ?>
                                        <a class="btn-primary" href="" id="upload" data-toggle="modal" data-target="#uploadBukti" data-id="<?php echo e($ruang->idruangan); ?>">
                                            <div class="card bg-danger shadow-sm" id="card-room">
                                        <?php endif; ?>    
                                                <div class="card-body">
                                                    <h3 class="card-title">Ruang <?php echo e($ruang->nama); ?></h3>
                                                    <p>Status: <?php echo e($ruang->status); ?> </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="modal fade" id="uploadBukti" >
                        <div class="modal-dialog">
                            <form id="statusRuang" name="statusRuang" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Upload Bukti Kebersihan Ruangan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </div>
                                    <input type="hidden" id="ruangId" name="ruangId" value="" class="btn btn-default btn-id">
                                    <div class="modal-body">
                                        <div class="input-group control-group increment mb-2 d-inline-flex">
                                            <input type="file" name="filename[]" class="filename">
                                        </div>
                                        <div class="input-group-btn" id="addMore"> 
                                            <button class="btn btn-success btn-sm btn-add" type="button"><i class="fas fa-plus"></i>Tambah Bukti Lain</button>
                                        </div>
                                        <div class="clone hide">
                                            <div class="control-group input-group mb-2">
                                                <input type="file" name="filename[]"  class="filename">
                                                <button class="btn btn-danger btn-remove btn-sm" type="button"><i class="fas fa-times"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" value="Submit" id="submit" class="btn btn-primary">
                                    </div>
                                </div>
                           </form>
                        </div>
                    </div>
                    </div>
                </main>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

                $('body').on('click', '#submit', function (event) {
                    event.preventDefault()
                    var formdata = new FormData();
                    var id = $('#ruangId').val();
                    formdata.append('id',id)
                    var filename = $('.filename')
                    $('.filename').each(function (){
                        console.log($(this).prop('files')[0])
                        if ($(this).prop('files')[0] === undefined) {
                            return;
                        }
                        formdata.append('filename[]',$(this).prop('files')[0])
                    })
                    $.ajax({
                        url: 'Tugas/' + id,
                        type: "POST",
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function () {
                            $('#statusRuang').trigger("reset");
                            window.location.reload(true);
                        }
                    });
                });

                $('body').on('click', '#upload', function (event) {
                    event.preventDefault();
                    var id = $(this).data('id');
                    console.log(id)
                    $.get('Tugas/' + id + '/Uploadbukti', function (data) {
                        $('#submit').val(id);
                        $('#ruangId').val(id);
                    })
                });
            }); 
        </script>
            
        <script type="text/javascript">
            var count = 1;
            $(document).ready(function() {
                $(".btn-add").click(function(){
                if(count<4){
                    var html = $(".clone").html();
                    $(".increment").after(html);
                    count += 1;
                    if(count==4){
                        var element = document.getElementById("addMore");
                        element.classList.add("hide");
                    }
                }  
            });
            $("body").on("click",".btn-remove",function(){ 
                $(this).parents(".control-group").remove();
                if(count==4){
                        var element = document.getElementById("addMore");
                        element.classList.remove("hide");
                    }
                count-=1;
            });
            });
        </script>        
    </body>
</html>

<?php /**PATH C:\xampp\htdocs\New folder\KOKERU\resources\views/Tugas/index.blade.php ENDPATH**/ ?>