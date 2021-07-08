<?php
//php_spreadsheet_export.php
include '..\phpspreadsheet\vendor\autoload.php';
include('../php-utils/db/db.variables.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$connect = new PDO("mysql:host=" . $host . ";dbname=" . $db, $username, $pass);
$query = "SELECT * FROM emp_leave_pass ORDER BY leave_pass_id";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$start_date_error = '';
$end_date_error = '';

if (isset($_POST["download"])) {

    $st_ = strtotime($_POST['starting']);
    $et_ = strtotime($_POST['ending']);
    $reason_ = $_POST['reason_type'];

    $converted_st = date('Y-m-d', ($st_));
    $converted_et = date('Y-m-d', ($et_));
    if (empty($st_)) {
        $start_date_error = '<label class="text-danger">Start Date is required</label>';
    } else if (empty($et_)) {
        $end_date_error = '<label class="text-danger">End Date is required</label>';
    } else {

        $query2 = "SELECT * FROM emp_leave_pass  where `reason`=:reason; INTERSECT (SELECT * from emp_leave_pass where `date_of_leave` BETWEEN :start_time AND :end_time ORDER BY leave_pass_id )";
        $statement2 = $connect->prepare($query2);
        $statement2->bindParam(":reason", $reason_);
        $statement2->bindParam(":start_time", $st_);
        $statement2->bindParam(":end_time", $et_);
        $statement2->execute();
        $result2 = $statement2->fetchAll();

        $file = new Spreadsheet();

        $active_sheet = $file->getActiveSheet();

        $active_sheet->setCellValue('A1', 'Pass ID');
        $active_sheet->setCellValue('B1', 'Employee ID');
        $active_sheet->setCellValue('C1', 'Employee Name');
        $active_sheet->setCellValue('D1', "HOD Id");
        $active_sheet->setCellValue('E1', "Reason");
        $active_sheet->setCellValue('F1', "Purpose");
        $active_sheet->setCellValue('G1', "Start Time");
        $active_sheet->setCellValue('H1', "End Time");
        $active_sheet->setCellValue('I1', "Actual Start Time");
        $active_sheet->setCellValue('J1', "Actual End Time");
        $active_sheet->setCellValue('K1', "Date");
        $active_sheet->setCellValue('L1', "Status");
        //$active_sheet->setCellValue('M1', "Time Stamp");




        $count = 2;

        foreach ($result2 as $row) {
            $ast = date(' g:i a', (int)$row["actual_start_time"]);
            $aet = date(' g:i a', (int)$row["actual_start_time"]);
            $st =  date(' g:i a', (int)$row["start_time"]);
            $et =  date(' g:i a', (int)$row["end_time"]);

            $active_sheet->setCellValue('A' . $count, $row["leave_pass_id"]);
            $active_sheet->setCellValue('B' . $count, $row["employee_id"]);
            $active_sheet->setCellValue('C' . $count, $row["emp_name"]);
            $active_sheet->setCellValue('D' . $count, $row["hod_id"]);
            $active_sheet->setCellValue('E' . $count, $row["reason"]);
            $active_sheet->setCellValue('F' . $count, $row["Purpose"]);
            $active_sheet->setCellValue('G' . $count, $st);
            $active_sheet->setCellValue('H' . $count, $et);
            $active_sheet->setCellValue('I' . $count, $ast);
            $active_sheet->setCellValue('J' . $count, $aet);
            $active_sheet->setCellValue('K' . $count, $row["date_of_leave"]);
            $active_sheet->setCellValue('L' . $count, $row["status"]);
            //$active_sheet->setCellValue('M' . $count, $row["timestamp"]);

            $count = $count + 1;
        }

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, "Csv");

        $file_name = "Employee's " . $reason_ . " Leave Report from " . $converted_st . " to " . $converted_et . '.' . strtolower("Csv");

        $writer->save($file_name);

        header('Content-Type: application/x-www-form-urlencoded');

        header('Content-Transfer-Encoding: Binary');

        header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

        readfile($file_name);

        unlink($file_name);

        // $query3 = "
        // DELETE emp_leave_pass  where reason='profession'
        // ";
        // $statement3 = $connect->prepare($query3);
        // $statement3->execute();
        // $result3 = $statement3->fetchAll();

        exit;
    }
}

?>
<?php
include('header_4.php');
include('navbar_4.php');
?>
<div class="container">
    <br />
    <h3 align="center">Employees Report</h3>
    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <form method="post">
                <div class="row">

                    <div class="col-md-3" align="center">
                        Start Date <input type="date" name="starting"></div>
                    <div class="col-md-3" align="center">
                        End Date <input type="date" name="ending"></div>

                    <div class=" col-md-4" align="center">
                        <select name="reason_type" class="form-control input-sm">
                            <option value="Personal">Personal Leave</option>
                            <option value="Official">Professional Leave</option>
                        </select>
                    </div>
                    <div class="col-md-2" align="center">
                        <input type="submit" name="download" class="btn btn-primary btn-sm" value="Download" />
                    </div>
                </div>
            </form>
            <?php echo $start_date_error; ?>
            <?php echo $end_date_error; ?><br>
            *Note that after download the data will get deleted permenantly.
        </div>


        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Pass ID</th>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>HOD Id</th>
                        <th>Reason</th>
                        <th>Purpose</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Actual Start Time</th>
                        <th>Actual End Time</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    if (isset($result)) {


                        foreach ($result as $row) {

                            $ast = date(' g:i a', (int)$row["actual_start_time"]);
                            $aet = date(' g:i a', (int)$row["actual_start_time"]);
                            $st =  date(' g:i a', (int)$row["start_time"]);
                            $et =  date(' g:i a', (int)$row["end_time"]);
                            echo '
						<tr>
      					<td>' . $row["leave_pass_id"] . '</td>
      					<td>' . $row["employee_id"] . '</td>
      					<td>' . $row["emp_name"] . '</td>
      					<td>' . $row["hod_id"] . '</td>
						<td>' . $row["reason"] . '</td>
      					<td>' . $row["Purpose"] . '</td>
      					<td>' . $st . '</td>
      					<td>' . $et . '</td>
						<td>' . $ast . '</td>
						<td>' . $aet . '</td>
						<td>' . $row["date_of_leave"] . '</td>
      					<td>' . $row["status"] . '</td>
      					</tr>
      					';
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>
<br />
<br />

</body>

</html>
<?php
include('footer_4.php');
include('scripts_4.php');
?>
</div>