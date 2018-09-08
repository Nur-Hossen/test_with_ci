<form action="<?php echo base_url("Products/").$action;?>" method="post" enctype="multipart/form-data">
    <br><br>
    <label>Name : </label><input type="text" name="name" id="name" value="<?php echo isset($row['name'])? $row['name']:''?>"><br><br>
    <label>Image : </label><input type="file" name="image" id="image" value="<?php echo isset($row['image'])? base_url('uploads/').$row['image']:''?>"><br><br>
    <img src="#" id="up_image" alt="uploaded image"><br><br>
    <button type="submit">Save</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>



    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#up_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function() { alert('hello');
        readURL(this);
    });
</script>