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
            <!--<img src="{{ asset('themes-assets/images/logo.svg') }}" style="width: 25%"/>-->
            <h3><a href="https://sevensummittreks.com/" target="blank">Seven Summit Treks</a></h3>
        </div>
    </center>
    <h3>Contact Details:</h3>
    <table>

        <tr>
            <td bgcolor="#ddd"  ><strong>Full Name</strong></td>
            <td bgcolor="#ddd" >{{ $name }} {{$surname}}</td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <td><strong>Phone </strong></td>
            <td>{{ $contact }}</td>
        </tr>
        <tr>
            <td><strong>Country</strong></td>
            <td>{{ $country }}</td>
        </tr>
        <tr>
             <td><strong>Interest</strong></td>
            <td>{{ $interest }}</td>
        </tr>
        
          <tr>
             <td><strong>Experience</strong></td>
            <td>{{ $experience }}</td>
        </tr>
        <tr>
            <td><strong>Message</strong></td>
            <td>{!! $messages  !!}</td>
        </tr>
    </table>


</div>
</body>
</html>
