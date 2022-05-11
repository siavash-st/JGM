<?php
include "../../admin/config_daily.php";
include "../../admin/database.php";
include "../../admin/function.php";

$db = new database();
    
    if(isset($_POST['submit'])){
        $amount = $_POST['amount'];
        $category = $_POST['category'];
        $sub_category = $_POST['sub_category'];
		$description = $_POST['description'];
        $time = $_POST['time'];
        $source = $_POST['source'];
        
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        

            move_uploaded_file($image_tmp,"daily/$image");
            $query = "INSERT INTO daily_expense (amount,category,sub_category,description,time,source,image) VALUES ('$amount','$category','$sub_category','$description','$time','$source','$image')";
            $run = $db->insert($query);
			
			$query_ub = "UPDATE accounts SET balance=balance-$amount WHERE title='$source'";
            $run_ub = $db->insert($query_ub);
			
            header('location: daily_expense.php');
		}
		
		if(isset($_POST['submit_slider'])){
			$title = $_POST['title'];
			$content = $_POST['content'];
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        

            move_uploaded_file($image_tmp,"img/$image");
            $query = "INSERT INTO jgm_slider (title,content,image)VALUES('$title','$content','$image')";
            $run = $db->insert($query);
            header('location: admin.php');
		}
		
		if(isset($_POST['submit_menu_edit'])){
        $title = $_POST['title'];
        $link = $_POST['link'];

			
			$query_up = "UPDATE jgm_menu SEt title='$title', link='$link' WHERE title='$title'";
            $run_up = $db->insert($query_up);
            header('location: admin.php');
		}
		
		if(isset($_POST['submit_add_menu'])){
        $title = $_POST['title'];
        $link = $_POST['link'];

			
			$query_up = "INSERT INTO jgm_menu (title,link) VALUES ('$title','$link')";
            $run_up = $db->insert($query_up);
            header('location: admin.php');
		}
    



    ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JGM Task Admin</title>
    <link href="../../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../../admin/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>


                <!-- Begin Page Content -->
                <div class="container-fluid">

	

						<!-- form row -->
						<div class="row">
						<div class="col-xl-3 col-md-3 mb-3">
						<div class="card shadow mb-4">
                                <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary"> Menu</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
								<? 
								$mi = 1;
								$result_acc = "SELECT * FROM jgm_menu;";
								$cn_acc = $db->select($result_acc);
								while($row_acc = $cn_acc->fetch_array()):
								$mi++;
								?>
								<button class="btn btn-primary btn-icon-split"style="margin-bottom:5px" data-toggle="modal" data-target="#menuModal<? echo $mi;?>">
                                        <span class="text"><? echo $row_acc['title'];?></span>
                                    </button>
									
									    <div class="modal fade" id="menuModal<? echo $mi;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
										aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Edit Menu Item</h5>
													<button class="close" type="button" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>
												<form method="post" action="" enctype="multipart/form-data" role="form">
												<div class="modal-body">
												<label>Title :</label>
												<input name="title" class="form-control" value="<? echo $row_acc['title']?>">
												<br>
												<label>Link :</label>
												<input name="link" class="form-control" value="<? echo $row_acc['link'];?>">
												</div>
												<div class="modal-footer">
													<button class="btn btn-primary" name="submit_menu_edit" type="submit">Edit</button>
												</div>
												</form>
											</div>
										</div>
									</div>
								<?endwhile;?>
								
								<button class="btn btn-secondary btn-icon-split"style="margin-bottom:5px" data-toggle="modal" data-target="#addMoney">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                        <span class="text"> New</span>
                                    </button>
									 <div class="modal fade" id="addMoney" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
										aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Add Menu Item</h5>
													<button class="close" type="button" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>
												<form method="post" action="" enctype="multipart/form-data" role="form">
												<div class="modal-body">
												<label>Title :</label>
												<input name="title" class="form-control">
												<br>
												<label>Link :</label>
												<input name="link" class="form-control">
												</div>
												<div class="modal-footer">
													<button class="btn btn-primary" name="submit_add_menu" type="submit">Add</button>
												</div>
												</form>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
						
						</div>
                        

						<div class="col-xl-3 col-md-3 mb-3">
						<div class="card shadow mb-4">
                                <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary"> Slider</h6>
                        </div>
                        <div class="card-body">
						
                            <div class="row">
                                <div class="col-lg-12">
								<form action="" enctype="multipart/form-data" method="post">
								<div class="row">
									<div class="form-group col-md-12">
									<label>Title:</label>
									<input name="title" class="form-control"/>
									</div>
									</div>
									<div class="row">
									<div class="form-group col-md-12">
									<label>Content:</label>
									<input name="content" class="form-control"/>
									</div>
									</div>
									<div class="row">
								<input type="file" name="image">
								</div>
								<div class="row mt-4">
								<button type="submit" name="submit_slider" class="btn btn-block btn-primary btn-lg">submit</button>
								</div>
								</form>
						
                                </div>
                            </div>
                        </div>
                    </div>
						
						</div>
						<div class="col-xl-6 col-md-6 mb-6">
						<div class="card shadow mb-4">
                                <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary"> Preview</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
							
                                <div class="col-lg-12">
								<iframe src="https://ilingu.ir/JGM/full-stack-role/index.php" width="100%" height="300"></iframe>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
						
						</div>
						</div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daily Expense</h6>
                        </div>
						
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
											<th>#</th>
                                        <th>title</th>
										<th>link</th>
                                        <th>content</th>
										<th>date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?
									$i=1;
									$query = "SELECT * FROM jgm_post"; 
									$run_query = $db->select($query);
									while ($row = $run_query->fetch_array()) :
									?>

                                        <tr>
								 <td><? echo $i++;?></td>
                                 <td><? echo $row['title'];?></td>
								 <td><? echo $row['link'];?></td>
								 <td>There is no content for this post. this is just test!</td>
								 <td><? echo $row['date'];?></td>
											
                                        </tr>
										<? endwhile;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

   <script src="../../admin/vendor/jquery/jquery.min.js"></script>
    <script src="../../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../admin/js/demo/datatables-demo.js"></script>