<?php
  include 'header.php';
?>
<script src="js/jquery.js" ></script>

<div id="main-content">
    <h2>All Records</h2> 

    <?php
      include 'config.php';

      $sql = "SELECT * FROM contact JOIN user ON contact.user = user.user_id 
              WHERE contact.user = {$_SESSION['user_id']}";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result) > 0)  {
    ?>
   
    <table cellpadding="7px" id="table-data">
        <thead>
          <th>Id</th>
          <th>Image</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Notes</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php
            while($row = mysqli_fetch_assoc($result)){
          ?>
              <tr class="mt-row-<?php echo $row['contact_id']; ?>">
                <td><?php echo $row['contact_id']; ?></td>
                <td><img src="upload/<?php echo $row['contact_img']; ?>" alt="" height="100px" width="150px" /></td>
                <td><?php echo $row['contact_name']; ?></td>
                <td><?php echo $row['contact_number']; ?></td>
                <td><?php echo $row['contact_email']; ?></td>
                <td><?php echo $row['contact_note']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['contact_id']; ?>'>Edit</a>
                    <a class="mt-delete" href="#" data-id="<?php echo $row['contact_id']; ?>" >Delete</a>
                </td>
              </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php }else{
    echo "<center><h2>No Record Found</h2></center>";
  }
  mysqli_close($conn);
  ?>
</div>
</div>
<script>
  $(document).ready(function(){

    $(".mt-delete").click(function(){ 
      
      if (confirm("Are you sure to delete?") == true) {

        var id = $(this).data('id');
        console.log(id);
        var element = this;
        // Ajax call
        
        $.ajax({
          url : "delete.php",
          type : "POST",
          data : {id : id},
          success : function(data){

            $('.mt-row-'+id).remove();
          }
        });

        console.log("Ok");

      } else {
        console.log("Cancel");
      }
    });
  });
</script>

</body>
</html>
