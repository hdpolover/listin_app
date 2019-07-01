 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
         <div class="card shadow">
             <a class="btn btn-primary" href="<?php echo base_url('wishlist/choose_plan'); ?>">
                 <i class="fas fa-money-check-alt fa-fw"></i>
                 Withdraw
             </a>
         </div>
     </div>
     <div class="row">
         <div class="col-lg-6">
             <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="justify-content-center">
                             <i class="fas fa-wallet fa-fw"></i>
                             <?php echo $wallet_value; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-lg-6">
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">History</h6>
                 </div>
                 <div class="card-body">
                     <div>
                         <p><span class="m-0 font-weight-bold text-primary">-</span> You .</p>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->