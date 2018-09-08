<h3 align="center">Product List</h3>
<a href="<?php echo base_url("Products/add")?>">Add Product</a><br><br>
<table style="border: 1px solid rgba(0,0,0,0.53)">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach ($products as $product){?>

            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $product['name'];?></td>
                <td><img width="250px" height="150px" src="<?php echo base_url('uploads/').$product['image'];?>"></td>
                <td><a href="<?php echo base_url('products/view/').$product['id'];?>"> View </a>&nbsp;|&nbsp;
                    <a href="<?php echo base_url('products/edit/').$product['id'];?>"> Edit </a>&nbsp;|&nbsp;
                    <a href="<?php echo base_url('products/delete/').$product['id'];?>"> Delete </a>&nbsp;&nbsp;</td>
            </tr>

        <?php $i++; }?>
    </tbody>
</table>