<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" />
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="number" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" />
        </div>
        <div class="form-group">
            <label>Other Notes</label>
            <input type="textarea" name="othernote" />
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="fileToUpload" />
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>