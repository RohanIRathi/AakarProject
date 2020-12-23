<?php
session_start();
include('header_4.php'); 
include('navbar_4.php'); 
?>
<main style="margin-top: 30px;">
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Upcoming Appointments
                        <button type="button" class="ml-3 btn btn-primary text-left" data-toggle="modal" data-target="#addadminprofile" href="new_visitor_4.php">Add</button>
                    </h6>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Username </th>
                                <th> Email </th>
                                <th> No.of Visitors </th>
                                <th> Date </th>
                                <th> Time </th>
                                <th> Room Name </th>
                                <th> Con Time </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</main>

<?php
include('footer_4.php'); 
include('scripts_4.php'); 
?>