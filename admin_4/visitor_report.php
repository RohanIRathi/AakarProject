<?php
//php_spreadsheet_export.php
include '..\phpspreadsheet\vendor\autoload.php';
include('../php-utils/db/db.variables.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$connect = new PDO("mysql:host=" . $host . ";dbname=" . $db, $username, $pass);
$query = "SELECT * FROM visitor ORDER BY id ";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$start_date_error = '';
$end_date_error = '';

if (isset($_POST["export"])) {

	$st = strtotime($_POST['start']);
	$et = strtotime($_POST['end']);
	$converted_st = date('Y-m-d', $st);
	$converted_et = date('Y-m-d', $et);
	if (empty($st)) {
		$start_date_error = '<label class="text-danger">Start Date is required</label>';
	} else if (empty($et)) {
		$end_date_error = '<label class="text-danger">End Date is required</label>';
	} else {

		$query2 = "SELECT * FROM visitor WHERE `time` BETWEEN :st AND :et; ";

		$statement2 = $connect->prepare($query2);
		$statement2->bindParam(":st", $st);
		$statement2->bindParam(":et", $et);

		$statement2->execute();
		$result2 = $statement2->fetchAll();

		$file = new Spreadsheet();

		$active_sheet = $file->getActiveSheet();

		$active_sheet->setCellValue('A1', 'Id');
		$active_sheet->setCellValue('B1', 'First Name');
		$active_sheet->setCellValue('C1', 'Last Name');
		$active_sheet->setCellValue('D1', "Email");
		$active_sheet->setCellValue('E1', "Time");
		$active_sheet->setCellValue('F1', "No of Visitors");
		$active_sheet->setCellValue('G1', "Visitee ID");
		$active_sheet->setCellValue('H1', "Start Time");
		$active_sheet->setCellValue('I1', "End Time");
		$active_sheet->setCellValue('J1', "Purpose");
		$active_sheet->setCellValue('K1', "Hostpitality");
		$active_sheet->setCellValue('L1', "Conference");
		$active_sheet->setCellValue('M1', "Conference Room No");
		$active_sheet->setCellValue('N1', "Room Purpose");
		$active_sheet->setCellValue('O1', "Date");
		$active_sheet->setCellValue('P1', "Phone No");
		$active_sheet->setCellValue('Q1', "Status");


		$count = 2;

		foreach ($result2 as $row) {
			$dt = date('Y-m-d h:i:s', $row['time']);
			$start_dt = date('F j, Y, g:i a', (int)$row["start_time"]);
			$end_dt = date('F j, Y, g:i a', (int)$row["end_time"]);
			$active_sheet->setCellValue('A' . $count, $row["id"]);
			$active_sheet->setCellValue('B' . $count, $row["first_name"]);
			$active_sheet->setCellValue('C' . $count, $row["last_name"]);
			$active_sheet->setCellValue('D' . $count, $row["email"]);
			$active_sheet->setCellValue('E' . $count, $dt);
			$active_sheet->setCellValue('F' . $count, $row["noofvisitors"]);
			$active_sheet->setCellValue('G' . $count, $row["visitee"]);
			$active_sheet->setCellValue('H' . $count, $start_dt);
			$active_sheet->setCellValue('I' . $count, $end_dt);
			$active_sheet->setCellValue('J' . $count, $row["purpose"]);
			$active_sheet->setCellValue('K' . $count, $row["hospitality"]);
			$active_sheet->setCellValue('L' . $count, $row["conference"]);
			$active_sheet->setCellValue('M' . $count, $row["conference_room"]);
			$active_sheet->setCellValue('N' . $count, $row["room_purpose"]);
			$active_sheet->setCellValue('O' . $count, $row["dateofappointment"]);
			$active_sheet->setCellValue('P' . $count, $row["phone_no"]);
			$active_sheet->setCellValue('Q' . $count, $row["status"]);

			$count = $count + 1;
		}

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);


		$file_name = "Visitors Report from " . $converted_st . " to " . $converted_et . '.' . strtolower($_POST["file_type"]);

		$writer->save($file_name);

		header('Content-Type: application/x-www-form-urlencoded');

		header('Content-Transfer-Encoding: Binary');

		header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

		readfile($file_name);

		unlink($file_name);

		// $query3 = "
		// DELETE FROM visitor 
		// WHERE time BETWEEN $st AND $et; 
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
	<h3 align="center">Visitors Report</h3>
	<br />
	<div class="panel panel-default">
		<div class="panel-heading">
			<form class="form-inline" method="post">
				<div class="input-group">
					<label class="ml-5">Start Date :</label>
					<input type="date" class="form-control rounded ml-3 mr-3" name="start">
				</div>
				<div class="input-group">
					<label>End Date :</label>
					<input type="date" class="form-control rounded ml-3 mr-3" name="end">
				</div>
				<div class="input-group">
					<select name="file_type" class="form-control input-sm">
						<option value="Csv">Csv</option>
					</select>
				</div>
				<div class="input-group">
					<input type="submit" name="export" class="ml-3 btn btn-outline-primary rounded" value="Download" />
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
						<th>Id</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Time</th>
						<th>No of Visitors</th>
						<th>Visitee ID</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Purpose</th>
						<th>Hostpitality</th>
						<th>Conference</th>
						<th>Conference Room No</th>
						<th>Room Purpose</th>
						<th>Date</th>
						<th>Phone No</th>
						<th>Status</th>
					</tr>
					<?php
					if (isset($result)) {

						foreach ($result as $row) {
							$dt = date('F j, Y, g:i a', $row['time']);
							$start_dt = date('F j, Y, g:i a', (int)$row["start_time"]);
							$end_dt = date('F j, Y, g:i a', (int)$row["end_time"]);
							echo '
      					<tr>
      					<td>' . $row["id"] . '</td>
      					<td>' . $row["first_name"] . '</td>
      					<td>' . $row["last_name"] . '</td>
      					<td>' . $row["email"] . '</td>
      					<td>' . $dt . '</td>
      					<td>' . $row["noofvisitors"] . '</td>
						  <td>' . $row["visitee"] . '</td>
      					<td>' . $start_dt . '</td>
      					<td>' . $end_dt . '</td>
						  <td>' . $row["purpose"] . '</td>
						  <td>' . $row["hospitality"] . '</td>
						  <td>' . $row["conference"] . '</td>
						  <td>' . $row["conference_room"] . '</td>
						  <td>' . $row["room_purpose"] . '</td>

						  <td>' . $row["dateofappointment"] . '</td>
						  <td>' . $row["phone_no"] . '</td>
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