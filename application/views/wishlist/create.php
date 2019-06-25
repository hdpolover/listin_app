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
         <form>
           <div class="form-group row">
             <label for="title" class="col-sm-2 col-form-label">Title</label>
             <div class="col-sm-10">
               <input type="text" name="title" class="form-control" id="title" placeholder="">
             </div>
           </div>
           <div class="form-group row">
             <label for="description" class="col-sm-2 col-form-label">Description</label>
             <div class="col-sm-10">
               <textarea name="description" class="form-control" id="description" placeholder="" rows="3"></textarea>
             </div>
           </div>
           <div class="form-group row">
             <label for="est_cost" class="col-sm-2 col-form-label">Estimated Cost</label>
             <div class="col-sm-10">
               <input type="text" name="est_cost" class="form-control" id="est_cost" placeholder="">
             </div>
           </div>
           <div class="form-group row">
             <label for="period" class="col-sm-2 col-form-label">Period</label>
             <div class="col-sm-10">
               <input type="text" name="period" class="form-control" id="period" placeholder="dd/mm/yyyy" />
             </div>
           </div>
           <div class="form-group row">
             <label for="freq" class="col-sm-2 col-form-label">Saving Frequency</label>
             <div class="col-sm-10">
               <fieldset class="form-group mb-2">
                 <div class="row">
                   <div class="col-sm-10">
                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                       <label class="form-check-label" for="gridRadios1">
                         Every day
                       </label>
                     </div>
                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                       <label class="form-check-label" for="gridRadios2">
                         Every week
                       </label>
                     </div>
                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                       <label class="form-check-label" for="gridRadios3">
                         Every month
                       </label>
                     </div>
                     <div class="form-check-inline">
                       <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="option4">
                       <span>Every</span>
                       <span>
                         <input type="number" min="2" name="freq" class="form-control" id="freq" placeholder="" style="width: 5vw" />
                       </span>
                       <span>
                         <select id="select1" class="form-control">
                           <option>days</option>
                           <option>weeks</option>
                           <option>months</option>
                         </select>
                       </span>
                     </div>
                   </div>
                 </div>
             </div>
           </div>
           <div class="form-group row">
             <div class="col-sm-10">
               <button type="submit" class="btn btn-primary">Create</button>
             </div>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->