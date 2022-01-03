<?php 
        include 'header.php';
        include 'config.php';
?>
<div id="main-content">
    <h2>Edit Record</h2>

    <?php 
        
        $contact_id = $_GET['id'];
        
        $sql = "SELECT * FROM contact WHERE contact_id = {$contact_id}"; 

        $result = mysqli_query($conn,$sql) or die("Query Failed.");
        if(mysqli_num_rows($result)>0){

            while($raw = mysqli_fetch_assoc($result))
            {
        ?>

    <form class="post-form" action="saveupdate.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <input type="hidden" name="contact_id"  class="form-control" value="<?php echo $raw['contact_id']; ?>" >
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $raw['contact_name']; ?>">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="number" value="<?php echo $raw['contact_number']; ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $raw['contact_email']; ?>">
        </div>
        <div class="form-group">
            <label>Other Notes</label>
            <input type="textarea" name="othernote" value="<?php echo $raw['contact_note']; ?>">
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="new-image">
                <img  src="upload/<?php echo $raw['contact_img'] ?>" height="150px" width="150px" >
                <input type="hidden" name="old_image" value="<?php echo $raw['contact_img'] ?>">
        </div>
        <input class="submit" type="submit" value="update"  />
    </form>

    <?php
            }
        }else{
                echo "Result Not Found";
            }
        ?>
</div>
</div>
</body>
</html>