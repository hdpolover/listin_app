 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
     </div>
     <div class="container-fluid">
         <div class="card shadow mb-4">
             <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h5 class="m-0 font-weight-bold text-primary">
                     <?php echo $list_details['title']; ?>
                 </h5>
                 <div class="dropdown no-arrow">
                     <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                         <div class="dropdown-header">Dropdown Header:</div>
                         <a class="dropdown-item" href="#">Action</a>
                         <a class="dropdown-item" href="#">Another action</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                 </div>
             </div>
             <div class="card-body">
                 <div class="row">
                     <div class="col-lg-6">
                         <form>
                             <div class="form-group row">
                                 <label for="description" class="col-sm-4 col-form-label">Description</label>
                                 <div class="col-sm-8">
                                     <textarea name="description" class="form-control" id="description" placeholder="<?php echo $list_details['description']; ?>" rows="3" disabled></textarea>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="esti_cost" class="col-sm-4 col-form-label">Estimated Cost</label>
                                 <div class="col-sm-8">
                                     <input type="text" name="esti_cost" class="form-control" id="esti_cost" placeholder="Rp. <?php echo $list_details['est_cost']; ?>" disabled>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="goal_dat" class="col-sm-4 col-form-label">Goal Date</label>
                                 <div class="col-sm-8">
                                     <input type="text" name="goal_dat" class="form-control" id="goal_dat" placeholder="<?php echo $list_details['goal_date']; ?>" disabled>
                                 </div>
                             </div>
                         </form>
                     </div>
                     <div class="col-lg-6">
                         <form>
                             <div class="form-group row">
                                 <label for="save_freq" class="col-sm-4 col-form-label">Saving Frequency</label>
                                 <div class="col-sm-8">
                                     <input type="text" name="save_freq" class="form-control" id="save_freq" placeholder="<?php echo $list_details['save_freq']; ?>" disabled>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="sav_needed" class="col-sm-4 col-form-label">Saving Needed</label>
                                 <div class="col-sm-8">
                                     <input type="text" name="save_needed" class="form-control" id="save_needed" placeholder="<?php echo $list_details['trans_needed']; ?>" disabled>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="save_amount" class="col-sm-4 col-form-label">Saving Amount</label>
                                 <div class="col-sm-8">
                                     <input type="text" name="save_amount" class="form-control" id="save_amount" placeholder="Rp. <?php echo $list_details['save_amount']; ?>" disabled>
                                 </div>
                             </div>
                             <div class="text-align">
                                 <h6>
                                     Created on <?php echo $list_details['created_on']; ?>
                                 </h6>
                             </div>
                         </form>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-lg-3">
                     </div>
                     <div class="col-lg-6">
                         <a class="btn btn-info" href="<?php echo base_url('wishlist/save_plan/' . $list_details['list_id']); ?>" style="text-decoration: none; width: 100%;">
                             Save now </a>
                     </div>
                     <div class="col-lg-3">

                     </div>
                 </div>
             </div>
         </div>

     </div>
 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->