<?php

include("header.php");

?>


<div class="page-body">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>All Challan
                                <small>Manage your challan from here.</small>
                            </h3>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Dahsboard</li>
                                <li class="breadcrumb-item">Challan</li>
                                <li class="breadcrumb-item active">All</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    
                <!--Zero Configuration  Starts -->
                <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-1" class="display">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Challan No.</th>
                                            <th>Company Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php
                                        $query = "SELECT `id`, `challan_no`, `to_company` FROM `challan` GROUP BY `challan_no`";
                                        if ($result = $link->query($query)) {
                                            /* fetch associative array */
                                            while ($row = $result->fetch_assoc()) {
                                             echo '<tr>
                                                        <td>'.$row["id"].'</td>
                                                        <td>'.$row["challan_no"].'</td>
                                                        <td>'.$row["to_company"].'</td>
                                                        <td><a target="_blank" href="invoice.php/'.$row["challan_no"].'" class="btn btn-primary btn-sm">
                                                        <i class="fas fa-eye"></i> View
                                                      </a>
                                                      <a href="#" id="deleteinvo" data-id="'.$row["challan_no"].'" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i> Delete
                                                      </a></td>
                                                    </tr>';
                                            }
                                            /* free result set */
                                            $result->free();
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Zero Configuration  Ends -->
                    

                </div>
            </div>
        </div>
    </div>


<?php

include("footer.php");

?>


<script>
  $(document).ready(function() {
    $('#deleteinvo').click(function(e) {
      e.preventDefault();
      var id = $(this).data('id');
      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        buttons: true,
      }).then((result) => {
        if (result) {
          $.ajax({
            type: 'DELETE',
            url: 'deleteinvoice.php/' + id,
            success: function(data) {
                swal({
                title: 'Deleted!',
                text: 'Your entry has been deleted.',
                icon: 'success'
              }).then(function() {
                location.reload();
              });
            }
          });
        }
      });
    });
  });
</script>
