<?php
    session_start();
    include('header_4.php'); 
    include('navbar_4.php'); 
    
    
?>
<?php

//php_spreadsheet_export.php

include 'C:\wamp64\www\AakarProject\phpspreadsheet\vendor\autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$connect = new PDO("mysql:host=localhost;dbname=aakar", "root", "1234");


$query = "SELECT * FROM visitor ORDER BY id ";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

if(isset($_POST["export"]))
{
  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setCellValue('A1', 'Id');
  $active_sheet->setCellValue('B1', 'First Name');
  $active_sheet->setCellValue('C1', 'Last Name');
  $active_sheet->setCellValue('D1', "Email");
  $active_sheet->setCellValue('E1', "Time");
  $active_sheet->setCellValue('F1', "No of Visitors");
  $active_sheet->setCellValue('G1', "Start Time");
  $active_sheet->setCellValue('H1', "End Time");
  $active_sheet->setCellValue('I1', "Employee Id");

  $count = 2;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["id"]);
    $active_sheet->setCellValue('B' . $count, $row["first_name"]);
    $active_sheet->setCellValue('C' . $count, $row["last_name"]);
    $active_sheet->setCellValue('D' . $count, $row["email"]);
    $active_sheet->setCellValue('E' . $count, $row["time"]);
    $active_sheet->setCellValue('F' . $count, $row["noofvisitors"]);
    $active_sheet->setCellValue('G' . $count, $row["start_time"]);
    $active_sheet->setCellValue('H' . $count, $row["end_time"]);
    $active_sheet->setCellValue('I' . $count, $row["employee_id"]);

    $count = $count + 1;
  }

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);

  $file_name = time() . '.' . strtolower($_POST["file_type"]);

  $writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($file_name);

  unlink($file_name);

  exit;

}

?>
<!DOCTYPE html>
<html>
   <head>
     <!--<title>Export Data From Mysql to Excel using PHPSpreadsheet</title>-->
     <title> Visitors Report </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   </head>
   <body>
     <div class="container">
      <br />
      <h3 align="center">Visitors Report</h3>
      <br />
        <div class="panel panel-default">
          <div class="panel-heading">
            <form method="post">
              <div class="row">
                <div class="col-md-6">User Data</div>
                <div class="col-md-4">
                  <select name="file_type" class="form-control input-sm">
                    <option value="Xlsx">Xlsx</option>
                    <option value="Xls">Xls</option>
                    <option value="Csv">Csv</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <input type="submit" name="export" class="btn btn-primary btn-sm" value="Download" />
                </div>
              </div>
            </form>
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
					<th>Start Time</th>
					<th>End Time</th>
					<th>Employee Id</th>
                </tr>
                <?php

                foreach($result as $row)
                {
                  echo '
                  <tr>
                    <td>'.$row["id"].'</td>
                    <td>'.$row["first_name"].'</td>
                    <td>'.$row["last_name"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["time"].'</td>
                    <td>'.$row["noofvisitors"].'</td>
                    <td>'.$row["start_time"].'</td>
                    <td>'.$row["end_time"].'</td>
                    <td>'.$row["employee_id"].'</td>

                  </tr>
                  ';
                }
                ?>

              </table>
          </div>
          </div>
        </div>
     </div>
      <br />
      <br />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>

<?php
include('footer_4.php'); 
include('scripts_4.php'); 
?>