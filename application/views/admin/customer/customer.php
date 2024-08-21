<section role="main" class="content-body card-margin">
   <header class="page-header">
      <h2>Daftar Pelanggan</h2>
      <div class="right-wrapper text-end">
         <ol class="breadcrumbs">
            <li>
               <a href="index.html">
                  <i class="bx bx-home-alt"></i>
               </a>
            </li>
            <li><span>Daftar Pelanggan</span></li>            
         </ol>
         <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
      </div>
   </header>

   <div class="row">
      <div class="col">
         <section class="card">
            <header class="card-header">
               <div class="card-actions">
                  <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                  <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
               </div>
               <h2 class="card-title">Daftar Pelanggan&emsp;</h2>               
            </header>
            <div class="card-body">
               <table class="table table-bordered table-striped mb-0" id="datatable-default">
                  <thead>
                     <tr>
                        <th width="20px">No</th>
                        <th width="100px">Nama Pelanggan</th>
                        <th width="80px">Email</th>
                        <th width="80px">Telepon</th>                        
                     </tr>
                  </thead>
                  <tbody>                     
                     <?php $no = 1; ?>
                     <?php foreach ($customers as $dt) : ?>
                        <tr>
                           <td><?php echo $no ?></td>                              
                           <td><?php echo $dt->name; ?></td>                           
                           <td><?php echo $dt->email; ?></td>
                           <td><?php echo $dt->phone; ?></td>                           
                        </tr>
                        <?php $no++; ?>
                     <?php endforeach; ?>                     
                  </tbody>
               </table>
            </div>
         </section>
      </div>
   </div>
   <!-- end: page -->

</section>
			