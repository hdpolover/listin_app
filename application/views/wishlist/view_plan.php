 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
     <div class="card shadow">
       <a class="btn btn-primary" href="<?php echo base_url('wishlist/choose_plan'); ?>">
         <i class="fas fa-plus fa-fw"></i>
         Create a new plan
       </a>
     </div>
   </div>
   <div class="container-fluid">
     <div class="card shadow mb-4">

       <!-- Card Header - Accordion -->
       <a href="#collapseOngoing" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
         <h6 class="m-0 font-weight-bold text-primary">
           <span style="color: red; text-size: 2vw;">
             <?php
              if ($ongoing == false) {
                echo 0;
              } else {
                echo count($ongoing);
              }
              ?>
           </span> On going</h6>
       </a>
       <!-- Card Content - Collapse -->
       <div class="collapse show" id="collapseOngoing" style="">
         <div class="card-body">
           <?php foreach ($ongoing as $value) { ?>
             <div class="card bg-primary text-white shadow h-100 py-2">
               <div class="card-body">
                 <div class="row">
                   <div class="container">
                     <?php echo $value['description']; ?>
                   </div>
                 </div>
                 <br>
                 <div class="row">
                   <div class="col-lg-12">
                     <div class="text-right">
                       <a class="btn btn-info" href="<?php echo base_url('wishlist/save_plan/' . $value['list_id']); ?>" style="text-decoration: none;">
                         Save now </a>
                       <a class="btn btn-info" href="<?php echo base_url('wishlist/view_list_details/' . $value['list_id']); ?>" style="text-decoration: none;">
                         View plan details
                       </a>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <br>
           <?php }; ?>
         </div>
       </div>

       <a href="#collapseCompleted" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
         <h6 class="m-0 font-weight-bold text-primary">
           <span style="color: red; text-size: 2vw;">
             <?php
              if ($completed == false) {
                echo 0;
              } else {
                echo count($completed);
              }
              ?>
           </span> Completed</h6>
       </a>
       <!-- Card Content - Collapse -->
       <div class="collapse" id="collapseCompleted" style="">
         <div class="card-body">
           <?php foreach ($completed as $value) { ?>
             <a href="<?php echo base_url('wishlist/view_list_details/' . $value['list_id']); ?>" style="text-decoration: none;">
               <div class="card bg-success text-white shadow h-100 py-2">
                 <div class="card-body">
                   <div>
                     <?php echo $value['description']; ?>
                   </div>
                 </div>
               </div>
             </a><br>
           <?php }; ?>
         </div>
       </div>

       <a href="#collapseCancelled" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
         <h6 class="m-0 font-weight-bold text-primary">
           <span style="color: red; text-size: 2vw;">
             <?php
              if ($cancelled == false) {
                echo 0;
              } else {
                echo count($cancelled);
              }
              ?>
           </span> Cancelled</h6>
       </a>
       <!-- Card Content - Collapse -->
       <div class="collapse" id="collapseCancelled" style="">
         <div class="card-body">
           <?php if ($cancelled == false) { ?>
             <div class="align-items-center">No plans recorded yet.</div>
           <?php } else { ?>
             <?php foreach ($cancelled as $value) { ?>
               <a href="<?php echo base_url('wishlist/view_list_details/' . $value['list_id']); ?>" style="text-decoration: none;">
                 <div class="card bg-danger text-white shadow h-100 py-2">
                   <div class="card-body">
                     <div>
                       <?php echo $value['description']; ?>
                     </div>
                   </div>
                 </div>
               </a><br>
             <?php }; ?>
           <?php }; ?>
         </div>
       </div>

     </div>
   </div>
 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->