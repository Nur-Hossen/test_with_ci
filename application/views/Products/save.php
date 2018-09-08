<form action="<?php echo base_url("Products/").$action;?>" method="post" enctype="multipart/form-data">
    <br><br>
    <label>Name : </label><input type="text" name="name" id="name" value="<?php echo isset($row['name'])? $row['name']:''?>"><br><br>
    <label>Image : </label><input type="file" name="image" id="image" value="<?php echo isset($row['image'])? base_url('uploads/').$row['image']:''?>"><br><br>
    <button type="submit">Save</button>
</form>