<?php
session_start();
include '../controls/Database.php';
$db = new Database();
$currentUser = $_SESSION['id'];
$printid = $_REQUEST['printid'];
$data = $db->invoice($printid);
foreach ($data as $value) {

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Appointment Details</title>
        
        <link rel="stylesheet" type="text/css" href="../css/invoice.css">
    </head>
    <body>
		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="../images/1.jpg" alt="Company logo" style="width: 10%; max-width: 300px" />
                                    HMS
								</td>

								<td>
                                    Invoice #: <?php echo $value['id'];?><br>
                                    Created: <?php echo date("d-m-Y");?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Hospital Management System, Inc.<br />
									12345 Sunny Road<br />
									Dhanmondi, TX 12345
								</td>

								<td>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>

					<td>Cash #</td>
				</tr>

				<tr class="details">
					<td>Cash</td>

					<td><?php echo $value['fees'];?><br></td>
				</tr>

				<tr class="heading">
					<td>Appointment Details</td>
                    <td></td>
				</tr>

				<tr class="item">
					<td>Appointment ID</td>

					<td><?php echo $value['id'];?></td>
				</tr>
                <tr class="item">
					<td>Appointment Status</td>

					<td><?php echo $value['status'];?></td>
				</tr>
				<tr class="item">
					<td>Patient name</td>

					<td><?php echo $value['username'];?></td>
				</tr>
				<tr class="item">
					<td>Patient Email</td>

					<td><?php echo $value['email'];?></td>
				</tr>
				<tr class="item">
					<td>Patient Gender</td>

					<td><?php echo $value['gender'];?></td>
				</tr>

				<tr class="item">
					<td>Appointment Date</td>

					<td><?php echo $value['date'];?></td>
				</tr>

				<tr class="item">
					<td>Appointment Day</td>

					<td><?php echo $value['day'];?></td>
				</tr>

				<tr class="item">
					<td>Appointment Time</td>

					<td><?php echo $value['stime'];?> untill <?php echo $value['etime'];?></td>
				</tr>
                <tr class="item">
                    <td>Patient Symptom</td>
                    
                    <td>
                        <?php echo $value['reason'];?> 
                    </td>
                </tr>

			</table>
            <button onclick="window.print();" class="btn-update btn-big">Print</button>
		</div>
	</body>

<?php } ?>
</html>
