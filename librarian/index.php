    <?php require_once('header.php');?>

                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                       <div class="row">
                    <!--BOX Style 2-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-2 bg-darker-1">
                            <a href="manage-book.php">
                                <div class="panel-content">
                                    <div class="row">
                                        <?php 

                                             $books = mysqli_query($con, "SELECT * FROM `books`");

                                            $total_books = mysqli_num_rows($books);

                                            $books_qty = mysqli_query($con, "SELECT SUM(`book_qty`) as total FROM `books` ");

                                            $qty = mysqli_fetch_assoc($books_qty);

                                             $books_aqty = mysqli_query($con, "SELECT SUM(`available_qty`) as total FROM `books` ");

                                            $aqty = mysqli_fetch_assoc($books_aqty);



                                        ?>
                                        <div class="col-xs-4">
                                            <span class="icon fa fa-book color-lighter-1"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h4 class="subtitle color-lighter-1">Total Books</h4>
                                            <h1 class="title color-light"><?= $total_books .'('. $qty['total'] .'-'. $aqty['total'].')' ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--BOX Style 2-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                            <a href="#">
                                <div class="panel-content">
                                    <div class="row">
                                        <?php 

                                             $librarian = mysqli_query($con, "SELECT * FROM `librarian`");

                                            $total_librarian = mysqli_num_rows($librarian);


                                        ?>
                                        <div class="col-xs-4">
                                            <span class="icon fa fa-users color-lighter-1"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h4 class="subtitle color-lighter-1">Total Librarian</h4>
                                            <h1 class="title color-light"><?= $total_librarian ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--BOX Style 2-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-2 bg-lighter-2 color-light">
                            <a href="students.php">
                                <div class="panel-content">
                                    <div class="row">
                                        <?php 

                                             $students = mysqli_query($con, "SELECT * FROM `students`");

                                            $total_std = mysqli_num_rows($students);


                                        ?>
                                        <div class="col-xs-4">
                                            <span class="icon fa fa-users color-darker-2"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h4 class="subtitle color-darker-2">Total Students</h4>
                                            <h1 class="title color-w"> <?= $total_std; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--BOX Style 2-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-2 bg-light color-darker-2">
                            <a href="#">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="icon fa fa-dollar color-darker-2"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h4 class="subtitle">Total</h4>
                                            <h1 class="title"> 14.550,00</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                  
        </div>
            <!-- RIGHT SIDEBAR -->
    <?php require_once('footer.php');?>       