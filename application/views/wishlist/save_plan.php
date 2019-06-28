 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
     </div>
     <div class="container-fluid">

         <?php echo $this->session->flashdata('message'); ?>

         <div class="card shadow mb-4">
             <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary"><?php echo $id; ?></h6>
             </div>
             <div class="card-body">
                 <p>Save amount: <?php echo $list_details['save_amount']; ?></p>
                 <a class="btn btn-info" href="<?php echo base_url('wishlist/pay_plan/' . $id); ?>" style="text-decoration: none;">
                     Proceed
                 </a>
             </div>
         </div>

     </div>
 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->