    <?php 
    require_once('header.php');


       if(isset($_POST['submit'])){

            $book_name = $_POST['book_name'];
            $book_author_name = $_POST['book_author_name'];
            $book_publication_name = $_POST['book_publication_name'];
            $book_purchase_date = $_POST['book_purchase_date'];
            $book_price = $_POST['book_price'];
            $book_qty = $_POST['book_qty'];
            $available_qty = $_POST['available_qty'];
            $libraian_username = $_SESSION['lib_username'];

            $image = explode('.', $_FILES['book_image']['name']);
            $image_ext = end($image);
            $image = date('Ymdhis.').$image_ext;

            $insert ="INSERT INTO books(book_name,book_image,book_author_name,book_publication_name,book_purchase_date,book_price,book_qty,available_qty,libraian_username)VALUES('$book_name','$image','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$libraian_username')";
            $query = mysqli_query($con,$insert);

            if($query){
                move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/'.$image);
                $success = "Book Add Successfully!";
            }else{
                $error = "Add Book Error!";
            }

       }

    ?>

    <!-- ======================================================== -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Add Book</a></li>
        </ul>
    </div>
</div>
 <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-6 col-sm-offset-3 ">
           <?php 
                if(isset($success)){
                    ?>
                     <div class="alert alert-success" role="alert">
                            <?= $success ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
             <?php
                }
           
           ?>

           <?php 
                if(isset($error)){
                    ?>
                     <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
             <?php
                }
           
           ?>
        <div class="panel">
        <div class="panel-content">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <h5 class="mb-lg">Add Book</h5>
                        <div class="form-group">
                            <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" name="book_name" placeholder="Book Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                            <div class="col-sm-8">
                                <input type="file" required class="form-control" name="book_image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_author_name" class="col-sm-4 control-label">Book Author Name</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" name="book_author_name" placeholder="Book Author Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_publication_name" class="col-sm-4 control-label">Book Publication Name</label>
                            <div class="col-sm-8">
                                <input type="text"  required class="form-control" name="book_publication_name" placeholder="Book Publication Name">
                            </div>
                        </div>  
                         <div class="form-group">
                            <label for="book_purchase_date" class="col-sm-4 control-label">Book Purchase Date</label>
                            <div class="col-sm-8">
                                <input type="date" required class="form-control" name="book_purchase_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                            <div class="col-sm-8">
                                <input type="number" required class="form-control" name="book_price" placeholder="Book Price">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="book_qty" class="col-sm-4 control-label">Book QTY</label>
                            <div class="col-sm-8">
                                <input type="number" required class="form-control" name="book_qty" placeholder="Book qty">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="available_qty" class="col-sm-4 control-label">Available qty</label>
                            <div class="col-sm-8">
                                <input type="number" required class="form-control" name="available_qty" placeholder="Available qty">
                            </div>
                        </div>       
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
     
</div>
            <!-- RIGHT SIDEBAR -->
    <?php require_once('footer.php');?>       