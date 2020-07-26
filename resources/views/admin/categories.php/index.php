<?php 
$title ='categories';
include resource_path('views/header.php');
?> 
    <h1 class="mb-5">Categories</h1>
   
 <a class="btn btn-danger" href="<?= route('categories.create') ?>">Create Category</a>

     <table class="table table-striped table-sm">
        <thead>  
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Date</th>
            <th></th>

         </tr>
      </thead>
         <tbody>
            <tr>
<?php foreach($categories as $cat):?>
                <td><?= $cat->id ?> </td>
                <td><?= $cat->name?></td>
                <td><?= $cat->parent_id?> </td>
                <td><?= $cat->created_at?></td>
                <td>
                <a href="<?= route('categories.edit',[$cat->id])?>"><button type="Edit" class="btn btn-primary ">Edit</button></a><br>
                <form method="post" action="<?= route('categories.delete',[$cat->id])?>">
                <input type="hidden"name="_token"value="<?=csrf_token()?>">
                <input type="hidden"name="_method" value="delete">
                <button type="submit" class="btn btn-danger ">delete</button>
                </form>
                
                </td>
            </tr>
            <?php endforeach?>
         </tbody>
    </table>
    <?php include resource_path('views/footer.php');?> 
