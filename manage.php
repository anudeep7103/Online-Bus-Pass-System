<?php
    include("connection.php");
    if(isset($_POST['pass_id'])){
        $id = $_POST['pass_id'];
        $password = $_POST['password'];
        $abc =" select * from pass where id ='$id'"; 
        $result = mysqli_query($conn,$abc);
        $row = mysqli_fetch_array($result);
        if($row['password']!=$password)
        {
            header("Location: manage2.php");
        }
        $body="initial";
    } else {
        $id="";
        $body="none";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cloud Based Bus Pass System</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700" rel="stylesheet">
    <link href="fonts/icomoon/style.css" rel="stylesheet">
    <style>
        body {
            background-color: antiquewhite;
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #ffffff;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .site-navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .site-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .site-menu li {
            display: inline-block;
            margin-right: 20px;
        }
        .site-menu li a {
            text-decoration: none;
            color: black;
        }
        .site-blocks-cover {
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 100px 0;
        }
        .site-blocks-cover h1 {
            color: black;
            font-weight: lighter;
        }
        .btn {
            display: inline-block;
            background-color: gray;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
        }
        .site-section {
            padding: 50px 0;
        }
        .bg-light {
            background-color: #f8f9fa;
        }
        .bg-white {
            background-color: #ffffff;
        }
        .p-4 {
            padding: 1.5rem;
        }
        .mb-0 {
            margin-bottom: 0;
        }
        .mb-4 {
            margin-bottom: 1.5rem;
        }
        .font-weight-bold {
            font-weight: bold;
        }
        .site-section a {
            color: inherit;
        }
        .site-section a:hover {
            text-decoration: underline;
        }
        .pass_body {
            display: <?php echo $body; ?>;
        }
        @media print {
            .print {
                display: none;
            }
            footer {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header style="background-color:antiquewhite;">
        <div class="container">
            <div class="site-navbar">
                <h1><a href="index.html" class="text-black h2 mb-0">Bus Pass</a></h1>
                <nav>
                    <ul class="site-menu">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="manage.php">Manage Pass</a></li>
                        <li><a href="bus_details.html">Bus Details</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="site-blocks-cover inner-page-cover print" style="background-image: url(test1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-white font-weight-light" style="background-color:silver;">Manage Pass</h1>
                    <div><a href="index.html">Home</a> <span class="mx-2 text-white">&bullet;</span> <span class="text-white">Mange Pass</span></div>
                </div>
            </div>
        </div>
    </div>
    <left>
        <form class="print" action="manage.php" method="post" style="margin-top:75px; margin-left: 75px">
            ID: <input type="text" id="pass_id" style="height:35px; margin-right: 15px;" name="pass_id" value="<?php echo $id; ?>" required>
            PASSWORD: <input type="password" id="pass_id" style="height:35px;" name="password" required> <input type="submit" style="background-color:gray"class="btn btn-primary py-1 px-5 text-white" value="Search">
        </form>
    </left>
    <br/>
    <div class="pass_body">
        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-4 mb-3 bg-white">
                            <p class="mb-0 font-weight-bold" style="float: left;">Id &nbsp &nbsp</p>
                            <p class="mb-4"><?php echo $row['id']; ?></p>
                            <p class="mb-0 font-weight-bold" style="float: left;">Name &nbsp &nbsp</p>
                            <p class="mb-4"><?php echo $row['name']; ?></p>
                            <p class="mb-0 font-weight-bold" style="float: left;">Mobile &nbsp &nbsp</p>
                            <p class="mb-4"><?php echo $row['contact']; ?></p>
                            <p class="mb-0 font-weight-bold" style="float: left;">Email Address &nbsp &nbsp</p>
                            <p class="mb-0"><?php echo $row['email']; ?></p>
                            <div>
                                <p class="mb-0 font-weight-bold" style="float: left;">Valid Till &nbsp &nbsp</p>
                                <p class="mb-4"><?php echo $row['date']; ?></p>
                                <form class="print" action="renew.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="date" style="margin-right: 75px; width:200px; height:35px" min="<?php echo $row['date']; ?>" required name="new_date">
                                    <input type="submit" class="btn btn-primary py-1 px-5 text-white" style="width: 200px" value="Renew Pass">
                                </form>
                            </div>
                            <p class="mb-0 font-weight-bold" style="float: left;">From - To &nbsp &nbsp</p>
                            <p class="mb-4">VITAP University - <?php echo $row['dest']; ?></p>
                            <p class="mb-0 font-weight-bold" style="float: left;">Amount Paid &nbsp &nbsp</p>
                            <p class="mb-4"><?php echo $row['paid']; ?></p>
                            <table>
                                <tr>
                                    <td>
                                        <form class="print" action="suspend.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <input type="submit" style="width: 200px" class="btn btn-primary py-1 px-5 text-white" value="Suspend Pass">
                                        </form>
                                    </td>
                                    <td>
                                        <button class="print btn btn-primary py-1 px-5 text-white" style="width: 200px; margin-bottom:15px; margin-left: 75px;" onclick="window.print()">Print Pass</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
