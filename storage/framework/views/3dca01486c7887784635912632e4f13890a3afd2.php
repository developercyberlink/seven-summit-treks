<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Seven Summit Treks</title>
    <style>
        table {
            border-collapse: collapse;
            width:100%;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding:8px;
        }
    </style>
</head>
<body style="font-family: sans-serif">
<div style="margin:0 auto; max-width:700px; width:100%;">
    <center>
        <div style="background:#FFF; padding:8px 0px; margin-bottom:5px;">
            <!--<img src="<?php echo e(asset('themes-assets/images/logo.svg')); ?>" style="width: 25%"/>-->
            <h3><a href="https://sevensummittreks.com/" target="blank">Seven Summit Treks</a></h3>
        </div>
    </center>
    <h3>Booking Details:</h3>
    <table>

        <tr>
            <td bgcolor="#ddd"  ><strong>Full Name</strong></td>
            <td bgcolor="#ddd" ><?php echo e($name); ?></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><?php echo e($email); ?></td>
        </tr>
        <tr>
            <td><strong>Phone </strong></td>
            <td><?php echo e($contact); ?></td>
        </tr>
        <tr>
            <td><strong>Country</strong></td>
            <td><?php echo e($country); ?></td>
        </tr>
         <tr>
            <td><strong>Trip</strong></td>
            <td><?php echo e($trip); ?></td>
        </tr>
          <tr>
            <td><strong>Arrival Date</strong></td>
            <td><?php echo e($arrival_date); ?></td>
           </tr>  
           <tr>
            <td><strong>Departure Date</strong></td>
            <td><?php echo e($departure_date); ?></td>
        </tr>  
        <tr>
            <td><strong>Reference</strong></td>
            <td><?php echo e($reference); ?></td>
        </tr> 
        <tr>
            <td><strong>Message</strong></td>
            <td><?php echo $messages; ?></td>
        </tr>
    </table>


</div>
</body>
</html>
<?php /**PATH /home/sevensummittreks/public_html/resources/views/emails/admin-bookingmail.blade.php ENDPATH**/ ?>