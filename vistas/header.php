<?php
if (strlen(session_id()) < 1) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
        <title>ERP - Infinity</title>
        <!-- Bootstrap Core CSS -->
        <link href="../ampleadmin-minimal/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Menu CSS -->
        <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
        <!-- animation CSS -->
        <link href="../ampleadmin-minimal/css/animate.css" rel="stylesheet">
        <!--alerts CSS -->
        <link href="../plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
        <!-- toast CSS -->
        <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../ampleadmin-minimal/css/style.css" rel="stylesheet">
        <!-- color CSS -->
        <link href="../ampleadmin-minimal/css/colors/blue.css" id="theme" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



        <!-- antigo -->
        <!-- Bootstrap 3.3.5 -->
        <!--<link rel="stylesheet" href="../public/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="../public/css/font-awesome.css">
        <!-- Theme style -->
        <!--<link rel="stylesheet" href="../public/css/AdminLTE.min.css">--><!-- essa linha não deixa o centro se ajeitar quando encolhe o menu do novo -->
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../public/css/_all-skins.min.css">
        <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
        <link rel="shortcut icon" href="../public/img/favicon.ico">

        <!-- DATATABLES -->
        <!--
        <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
        <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
        <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
        -->
        <link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
        
        
        <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
        <!--  fim antigo -->




    </head>

    <body class="fix-header">
        <!-- ============================================================== -->
        <!-- Preloader -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Wrapper -->
        <!-- ============================================================== -->
        <div id="wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <nav class="navbar navbar-default navbar-static-top m-b-0">
                <div class="navbar-header">
                    <div class="top-left-part">
                        <!-- Logo -->
                        <a class="logo" href="www.infinity-group.net">
                            <!-- Logo icon image, you can use font-icon also --><b>
                                <!--This is dark logo icon--><img src="../plugins/images/logo33.jpg" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="../plugins/images/logo.jpg" alt="home" class="light-logo" />
                            </b>
                            <!-- Logo text image you can use text also --><span class="hidden-xs">
                                <!--This is dark logo text<img src="../plugins/images/texto_logo.png" alt="home" class="dark-logo" /><!--This is light logo text<img src="../plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                                <!--This is dark logo text--><span class="dark-logo">Infinity </span><!--This is light logo text-->
                            </span> </a>
                    </div>
                    <!-- /Logo -->
                    <!-- Search input and Toggle icon -->
                    <ul class="nav navbar-top-links navbar-left">
                        <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-gmail"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <ul class="dropdown-menu mailbox animated bounceInDown">
                                <li>
                                    <div class="drop-title">You have 4 new messages</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <a href="#">
                                            <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <a href="#">
                                            <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                        <a href="#">
                                            <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <a href="#">
                                            <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                            <!-- /.dropdown-messages -->
                        </li>
                        <!-- .Task dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-check-circle"></i>
                                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                            </a>
                            <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                                <li>
                                    <a href="#">
                                        <div>
                                            <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p> <strong>Task 2</strong> <span class="pull-right text-muted">20% Complete</span> </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p> <strong>Task 3</strong> <span class="pull-right text-muted">60% Complete</span> </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div>
                                            <p> <strong>Task 4</strong> <span class="pull-right text-muted">80% Complete</span> </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>
                        <!-- .Megamenu -->
                        <li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs">Mega Menu</span> <i class="icon-options-vertical"></i></a>
                            <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Escritório</li>
                                        <li><a href="#">Cadastro de contas</a></li>
                                        <li><a href="#">Cadastro de caixas</a></li>
                                        <li><a href="#">Cadastro de empresas</a></li>
                                    </ul>
                                </li>
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Produtos</li>
                                        <li><a href="#">Categorias</a></li>
                                        <li><a href="#">Sub-Categorias</a></li>
                                    </ul>
                                </li>
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Entradas</li>
                                        <li><a href="#">Compras</a></li>
                                    </ul>
                                </li>
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Saídas</li>
                                        <li> <a href="venta.php">Vendas</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- /.Megamenu -->
                    </ul>
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <li>
                            <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                                <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> 
                            </form>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../files/usuarios/<?php echo $_SESSION['imagen'] ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $_SESSION['nombre'] ?></b><span class="caret"></span> </a>
                            <ul class="dropdown-menu dropdown-user animated flipInY">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-img"><img src="../files/usuarios/<?php echo $_SESSION['imagen'] ?>" alt="user" /></div>
                                        <div class="u-text">
                                            <h4><?php echo $_SESSION['nombre'] ?></h4>
                                            <p class="text-muted">varun@gmail.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="ti-user"></i> Meu Perfil</a></li>
                                <li><a href="#"><i class="ti-wallet"></i> Minha Conta</a></li>
                                <li><a href="#"><i class="ti-email"></i> E-mail</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="ti-settings"></i> Configurações da conta</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../ajax/usuario.php?op=salir"><i class="fa fa-power-off"></i> Sair</a></li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                </div>
                <!-- /.navbar-header -->
                <!-- /.navbar-top-links -->
                <!-- /.navbar-static-side -->
            </nav>
            <!-- End Top Navigation -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav slimscrollsidebar">
                    <div class="sidebar-head">
                        <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
                    <div class="user-profile">
                        <div class="dropdown user-pro-body">
                            <div><img src="../files/usuarios/<?php echo $_SESSION['imagen'] ?>" alt="user-img" class="img-circle"></div>
                            <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre'] ?><span class="caret"></span></a>
                            <ul class="dropdown-menu animated flipInY">
                                <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="login.html"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <ul class="nav" id="side-menu">
                        <li> <a href="index.html" class="waves-effect"><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Escritório <span class="fa arrow"></span> </span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="index2.html"><i class=" fa-fw">1</i><span class="hide-menu">Usuários</span></a> </li>
                                <li> <a href="index2.html"><i class=" fa-fw">2</i><span class="hide-menu">Configurações</span></a> </li>
                            </ul>
                        </li>
                        <li> <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cart-outline fa-fw" data-icon="v"></i> <span class="hide-menu"> Produtos <span class="fa arrow"></span> </span></a>
                            <ul class="nav nav-second-level">
                                <?php
                                if ($_SESSION['almacen'] == 1) {
                                    echo '<li> <a href="articulo.php"><i class="fa-fw">P</i><span class="hide-menu">Produtos</span></a> </li>';
                                    echo '<li> <a href="deposito.php"><i class="fa-fw">P</i><span class="hide-menu">Produtos depósito</span></a> </li>';
                                    echo '<li> <a href="categoria.php"><i class="fa-fw">PO</i><span class="hide-menu">Categorias</span></a> </li>';
                                }
                                ?>
                            </ul>
                        </li>
                        <li> <a href="#" class="waves-effect"><i class="mdi mdi-format-color-fill fa-fw"></i> <span class="hide-menu">Entradas<span class="fa arrow"></span> <span class="label label-rouded label-info pull-right">20</span> </span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="panels-wells.html"><i data-icon="&#xe026;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Compras</span></a></li>
                            </ul>
                        </li>
                        <li> <a href="#" class="waves-effect active"><i class="mdi mdi-content-copy fa-fw"></i> <span class="hide-menu">Saídas<span class="fa arrow"></span><span class="label label-rouded label-warning pull-right">30</span></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="venta.php"><i class="ti-layout-width-default fa-fw"></i> <span class="hide-menu">Vendas</span></a></li>
                                <li><a href="javascript:void(0)" class="waves-effect"><i class="ti-email fa-fw"></i> <span class="hide-menu">Outras Saídas</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li> <a href="../email-templates/basic.html"><i class="fa-fw">B</i> <span class="hide-menu">Transferências</span></a></li>
                                        <li> <a href="../email-templates/alert.html"><i class="ti-alert fa-fw"></i> <span class="hide-menu">Consignação</span></a></li>
                                        <li> <a href="../email-templates/billing.html"><i class="ti-wallet fa-fw"></i> <span class="hide-menu">Orçamento</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="inbox.html" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i> <span class="hide-menu">Financeiro<span class="fa arrow"></span></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="chat.html"><i class="ti-comments-smiley fa-fw"></i><span class="hide-menu">Contas a pagar</span></a></li>
                                <li><a href="chat.html"><i class="ti-comments-smiley fa-fw"></i><span class="hide-menu">Contas a receber</span></a></li>
                                <li><a href="chat.html"><i class="ti-comments-smiley fa-fw"></i><span class="hide-menu">Contas a corrente</span></a></li>
                            </ul>
                        </li>
                        <li class="devider"></li>
                        <li> <a href="forms.html" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">CRM<span class="fa arrow"></span></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="form-basic.html"><i class="fa-fw">B</i><span class="hide-menu">Compras do cliente</span></a></li>
                            </ul>
                        </li>
                        <li> <a href="tables.html" class="waves-effect"><i class="mdi mdi-table fa-fw"></i> <span class="hide-menu">Recursos Humanos<span class="fa arrow"></span><span class="label label-rouded label-danger pull-right">9</span></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="basic-table.html"><i class="fa-fw">B</i><span class="hide-menu">Cargos</span></a></li>
                                <li><a href="table-layouts.html"><i class="fa-fw">L</i><span class="hide-menu">Funcionários</span></a></li>
                                <li><a href="data-table.html"><i class="fa-fw">D</i><span class="hide-menu">Vales</span></a></li>
                                <li><a href="bootstrap-tables.html"><i class="fa-fw">B</i><span class="hide-menu">Salários</span></a></li>
                            </ul>
                        </li>
                        <li class="devider"></li>
                        <li> <a href="map-google.html" class="waves-effect"><i class="mdi mdi-google-maps fa-fw"></i><span class="hide-menu">Google Map</span></a> </li>
                        <li> <a href="calendar.html" class="waves-effect"><i class="mdi mdi-calendar-check fa-fw"></i> <span class="hide-menu">Calendário</span></a></li>
                        <li><a href="login.html" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Sair</span></a></li>
                        <li class="devider"></li>
                        <li><a href="http://www.infinity-group.net" class="waves-effect"><i class="fa fa-circle-o text-danger"></i> <span class="hide-menu">Site</span></a></li>
                        <li><a href="http://www.infinity-group.net/pzp/loja" class="waves-effect"><i class="fa fa-circle-o text-info"></i> <span class="hide-menu">Loja Virtual</span></a></li>
                        <li><a href="faq.html" class="waves-effect"><i class="fa fa-circle-o text-success"></i> <span class="hide-menu">Mensagens</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Left Sidebar -->
            <!-- ============================================================== -->