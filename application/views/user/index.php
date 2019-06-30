 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
   </div>

   <div class="row">
     
     <div class="col-lg-6">
       <div class="container-fluid justify-content-center text-center">
         <!-- notify the user if they have a completed plan -->
         <div class="alert alert-success" role="alert">
           You completed a saving plan. Withdraw the money and get your dreams now.
           <a href="wishlist/view_list_details/" . $list_id>
             See details.
           </a>
         </div>

         <div class="text-center">
           <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('assets/img/svg/'); ?>undraw_savings_hjfl.svg" alt="">
         </div>
         <p>
           You currently have no on-going plans. Start saving now.
         </p>
         <a href="<?php echo base_url('wishlist/choose_plan'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus-circle"></i></a>
       </div>
       <br><br>
     </div>

     <div class="col-lg-6">
       <div class="card shadow mb-4">
         <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Recent activities</h6>
         </div>
         <div class="card-body">
             <?php $i = 0; ?>
             <?php foreach ($activities as $value) { ?>
               <div>
                 <p class="mb-1"><span class="m-0 font-weight-bold text-primary">- <?php echo $value['done_on']; ?></span> You <?php echo $value['activity']; ?>.</p>
               </div>
               <?php $i++; ?>
               <?php if ($i == 5) { ?>
                 <?php break; ?>
               <?php }; ?>
             <?php }; ?>
             <a class="dropdown-item text-center small text-gray-500" href="#">See more</a>
         </div>
       </div>


       <div class="card shadow mb-4">
         <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Something else</h6>
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