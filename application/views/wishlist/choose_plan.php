 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
     </div>
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-6">
                 <div class="card bg-primary text-white shadow">
                     <div class="card-body">
                         <div class="text-white-900">
                             <h3>Regular Saving Plan</h3>
                         </div>
                         <hr>
                         <div class="text-white-500 medium" style="padding-bottom: .8vw;">
                             Plan your save based on how often you want to. Be organized.
                         </div>
                         <div class="text-right">
                             <a href="<?php echo base_url('wishlist/create_plan'); ?>" class="btn btn-info">Choose this plan</a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="card bg-info text-white shadow">
                     <div class="card-body">
                         <div class="text-white-900">
                             <h3>Flexible Saving Plan</h3>
                         </div>
                         <hr>
                         <div class="text-white-500 medium" style="padding-bottom: .8vw;">
                             Plan your save based on how often you want to. Be organized.
                         </div>
                         <div class="text-right">
                             <a href="<?php echo base_url('wishlist/create_plan'); ?>" class="btn btn-primary">Choose this plan</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->