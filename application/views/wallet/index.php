 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
         <div class="card shadow">
             <a class="btn btn-primary" href="<?php echo base_url('wallet/withdraw'); ?>">
                 <i class="fas fa-money-check-alt fa-fw"></i>
                 Withdraw
             </a>
         </div>
     </div>
     <div class="row">
         <div class="col-lg-6">
             <div class="card border-left-primary shadow py-2">
                 <div class="card-body">
                     <div class="row no-gutters align-items-center">
                         <div class="text-center">
                             <h2 class="mb-0 font-weight-bold text-primary">
                                 <i class="fas fa-money-check-alt fa-fw"></i>
                                 Rp. <?php echo $wallet_value; ?></h2>
                         </div>
                     </div>
                     <hr>
                     <?php if ($wallet_details == false) { ?>
                         <div class="row no-gutters align-items-center">
                             <div class="container text-center">
                                 <div class="text-center">
                                     <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('assets/img/svg/'); ?>undraw_wallet_aym5.svg" alt="">
                                 </div>
                                 <p>
                                     No deposits yet. Made some now.
                                 </p>
                             </div>
                         </div>
                     <?php } else { ?>
                         <div class="row">
                             <?php foreach ($wallet_details as $value) { ?>
                                 <div class="container">
                                     <?php echo $value['title']; ?> =
                                     <?php echo $value['detail_amount']; ?>
                                 </div>
                             <?php }; ?>
                         </div>
                     <?php }; ?>
                 </div>
             </div>
         </div>
         <div class="col-lg-6">
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Wallet History</h6>
                 </div>
                 <div class="card-body">
                     <?php if (($deposit_activities == false) && ($withdraw_activities == false)) { ?>
                         <div class="row no-gutters align-items-center">
                             <div class="container text-center">
                                 <div class="text-center">
                                     <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('assets/img/svg/'); ?>undraw_empty_xct9.svg" alt="">
                                 </div>
                                 <p>
                                     No wallet activities yet.
                                 </p>
                             </div>
                         </div>
                     <?php } else { ?>
                         <?php if ($deposit_activities == false) { ?>
                             <div class="row no-gutters align-items-center">
                                 <div class="container text-center">
                                     <div class="text-center">
                                         <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('assets/img/svg/'); ?>undraw_empty_xct9.svg" alt="">
                                     </div>
                                     <p>
                                         No deposit activities yet.
                                     </p>
                                 </div>
                             </div>
                         <?php } else { ?>
                             <h6 class="ml-2 font-weight-bold text-primary">Deposit activities</h6>
                             <div class="row">
                                 <?php foreach ($deposit_activities as $value) { ?>
                                     <div class="container">
                                         <?php echo $value['done_on']; ?> =
                                         <?php echo $value['activity']; ?>
                                     </div>
                                 <?php }; ?>
                             </div>
                         <?php }; ?>
                         <hr>
                         <?php if ($withdraw_activities == false) { ?>
                             <div class="row no-gutters align-items-center">
                                 <div class="container text-center">
                                     <div class="text-center">
                                         <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('assets/img/svg/'); ?>undraw_empty_xct9.svg" alt="">
                                     </div>
                                     <p>
                                         No withdraw activities yet.
                                     </p>
                                 </div>
                             </div>
                         <?php } else { ?>
                             <h6 class="m-2 font-weight-bold text-primary">Withdraw activities</h6>
                             <div class="row">
                                 <?php foreach ($dwithdraw_activities as $value) { ?>
                                     <div class="container">
                                         <?php echo $value['done_on']; ?> =
                                         <?php echo $value['activity']; ?>
                                     </div>
                                 <?php }; ?>
                             </div>
                         <?php }; ?>
                     <?php }; ?>
                 </div>
             </div>

         </div>
     </div>
     <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->