<?php 
include 'conn.php';
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body bgcolo="#FFEFEF">
  <nav class="navbar">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <img src="img/1_7ugSMISUo8vYf9ILG6VmuQ.png" class="img">
      <div class="namajudul">ARKADEMY BOOTCAMP</div>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
      <button type="button" class="add btn btn-warning my-2 my-sm-0" data-toggle="modal" data-target="#myModal">ADD</button>
    </div>
  </nav>

  <!-- Modal add -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><img src="img/close.png"></a></button>
          <h4 class="modal-title">Add Data</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="name" placeholder="name">
          </div>
          <div class="form-group">
            <select class="form-control" id="work">
              <?php 
              $sql = "SELECT * FROM work";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  ?>
                  <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                <?php }
              } ?>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" id="salary">
              <?php 
              $sql = "SELECT * FROM salary";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  ?>
                  <option value="<?php echo $row["id"] ?>"><?php echo $row["salary"] ?></option>
                <?php }
              } ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" href="javascript:void(0)" onclick="addRecord()" class="btn btn-warning">Add</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal delete -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><img src="img/close.png"></a></button>
        </div>
        <div class="modal-body">
          <center>
            <img src="img/checked.png">
            <h2>Data telah berhasil dihapus</h2>
          </center>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal edit -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><img src="img/close.png"></a></button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
          <input type="text" class="form-control" id="name" placeholder="name">
          </div>
          <div class="form-group">
          <select class="form-control" id="work">
                            <?php 
                            $sql = "SELECT * FROM work";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                <?php }
                            } ?>
                        </select>
          </div>
          <div class="form-group">
          <select class="form-control" id="salary">
                              <?php 
                                $sql = "SELECT * FROM salary";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row["id"] ?>"><?php echo $row["salary"] ?></option>
                                    <?php }
                                } ?>
                            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button href="javascript:void(0)" onclick="updateRecord()" type="button" class="btn btn-warning" id="update">Edit</button>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-sm">
        <br>
        <br>
        <br>
        <div id="viewdata"></div>
      </div>
    </div>
  </div>
</body>
</html>
<script>
  $(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
    $("#update").hide();
  });
    // READ records
    function readRecords() {
      $.get("getData.php", {}, function (data, status) {
        $("#viewdata").html(data);
      });
    }

    function addRecord() {
        // get values
        var name = $("#name").val();
        var work = $("#work").val();
        var salary = $("#salary").val();

        // Add record
        $.post("addRecord.php", {
          name: name,
          work: work,
          salary: salary
        }, function (data, status) {
            // close the popup
            $("#myModal").modal("hide");
            // read records again
            readRecords();

            // clear fields from the popup
            $("#name").val("");
          });
      }
      
      function deleteUser(id) {
        var conf = confirm("Are you sure, do you really want to delete User?");
        if (conf == true) {
          $.post("deleteUser.php", {
            id: id
          },
          function (data, status) {
                // reload Users by using readRecords();
                $("#myModal2").modal("show");
            readRecords();
          });
        }
      }

    function getUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#id").val(id);
    $.post("getUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#name").val(user.name);
            $("#work").val(user.work).change();
            $("#salary").val(user.salary).change();
        }
    );
    // Open modal popup
    $("#myModal3").modal("show");
    $("#update").show();
    $("#add").hide();
    }
    function updateRecord() {
        // get values
        var id = $("#id").val();
        var name = $("#name").val();
        var work = $("#work").val();
        var salary = $("#salary").val();
        // Add record
        $.post("updateUserDetails.php", {
            id: id,
            name: name,
            work: work,
            salary: salary
        }, function (data, status) {
            // close the popup
            $("#myModal3").modal("hide");
            // read records again
            readRecords();
            // clear fields from the popup
            $("#name").val("");
        });
    }
    </script>