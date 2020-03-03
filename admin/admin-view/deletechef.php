
<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Users

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>Id</th>
           <th>Name</th>
           <th>Email</th>
           <th>Phone</th>
           <th>Address</th>
           <th>Image</th>
           <th>Password</th>
      </tr>
    </thead>
    <tbody>
        
        <?php
        $control = new Controller();
        $control->view_chef();
        ?>


    </tbody>
</table>
</div>