 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
   </div>
   <div class="container-fluid">
     <div class="card shadow mb-4">
       <!-- Card Header - Dropdown -->
       <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
         <h6 class="m-0 font-weight-bold text-primary">New Saving plan</h6>
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
       <!-- Card Body -->
       <div class="card-body">

         <?php echo $this->session->flashdata('message'); ?>

         <form method="post" action="<?= base_url('wishlist/add'); ?>">
           <div class="form-group row">
             <label for="title" class="col-sm-2 col-form-label">Title</label>
             <div class="col-sm-10">
               <input type="text" name="title" class="form-control" id="title" placeholder="" value="<?= set_value('title'); ?>">
             </div>
           </div>
           <div class="form-group row">
             <label for="description" class="col-sm-2 col-form-label">Description</label>
             <div class="col-sm-10">
               <textarea name="description" class="form-control" id="description" placeholder="" value="<?= set_value('description'); ?>" rows="3"></textarea>
             </div>
           </div>
           <div class="form-group row">
             <label for="est_cost" class="col-sm-2 col-form-label">Estimated Cost</label>
             <div class="col-sm-10">
               <input type="text" name="est_cost" class="form-control" id="est_cost" placeholder="" value="<?= set_value('est_cost'); ?>">
             </div>
           </div>
           <div class="form-group row">
             <label for="goal_date" class="col-sm-2 col-form-label">Goal Date</label>
             <div class="col-sm-10">
               <input type="text" name="goal_date" class="form-control" id="goal_date" placeholder="dd-mm-yyyy" value="<?= set_value('goal_date'); ?>"/>
             </div>
           </div>
           <div class="form-group row">
             <label for="freq" class="col-sm-2 col-form-label">Saving Frequency</label>
             <div class="col-sm-10">
               <fieldset class="form-group mb-2">
                 <div class="row">
                   <div class="col-sm-10">
                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="save_freq" id="gridRadios1" value="1" checked>
                       <label class="form-check-label" for="gridRadios1">
                         Every day
                       </label>
                     </div>
                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="save_freq" id="gridRadios2" value="7">
                       <label class="form-check-label" for="gridRadios2">
                         Every week
                       </label>
                     </div>
                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="save_freq" id="gridRadios3" value="30">
                       <label class="form-check-label" for="gridRadios3">
                         Every month
                       </label>
                     </div>
                     <div class="form-check-inline">
                       <input class="form-check-input" type="radio" name="save_freq" id="gridRadios4" value="option4">
                       <span>Every</span>
                       <span>
                         <input type="number" min="2" name="freq_num" class="form-control" id="freq" placeholder="" style="width: 5vw" />
                       </span>
                       <span>
                         <select name="freq_period" class="form-control">
                           <option value="1">days</option>
                           <option value="7">weeks</option>
                           <option value="30">months</option>
                         </select>
                       </span>
                     </div>
                   </div>
                 </div>
             </div>
           </div>
           <div class="form-group row">
             <div class="col-sm-12">
               <div class="text-right">
                 <button type="submit" class="btn btn-primary" style="width: 30%;">Create</button>
               </div>
             </div>
           </div>
         </form>
       </div>
     </div>

     <div class="card shadow mb-4">
       <!-- Card Header - Accordion -->
       <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
         <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
       </a>
       <!-- Card Content - Collapse -->
       <div class="collapse show" id="collapseCardExample" style="">
         <div class="card-body">
           This is a collapsable card example using Bootstrap's built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
         </div>
       </div>
       <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
         <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
       </a>
       <!-- Card Content - Collapse -->
       <div class="collapse" id="collapseCardExample1" style="">
         <div class="card-body">
           <div class="row">

             <!-- Earnings (Monthly) Card Example -->
             <div class="col-lg-6">
               <div class="card border-left-primary shadow h-100 py-2">
                 <div class="card-body">
                   <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                       <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                     </div>
                     <div class="col-auto">
                       <i class="fas fa-calendar fa-2x text-gray-300"></i>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

             <!-- Earnings (Monthly) Card Example -->
             <div class="col-lg-6">
               <div class="card bg-primary text-white shadow h-100 py-2">
                 <div class="card-body">
                   Primary
                   <div class="text-white-50 small">#4e73df</div>
                 </div>
               </div>
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