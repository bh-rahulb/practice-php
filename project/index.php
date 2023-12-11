<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plants</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>

<body class='container-fluid'>
    <header id='header' class='py-2 bg-dark'>
        <nav class='container d-flex justify-content-between align-items-center'>
            <a href='#' class=''>
                <!-- <img src="../images/logo.png" alt=""> -->
                Plants
            </a>
            <div class='d-flex justify-content-between align-items-center gap-3'>
                <a class='menu-link' href="#" class='py-1'>Home</a>
                <a class='menu-link' href="#" class='py-1'>Skills</a>
                <a class='menu-link' href="#" class='py-1'>Projects</a>
                <a class='menu-link' href="#" class='py-1'>Contact</a>
                <a class='menu-link' href="#" class='py-1'>About</a>
                <form action="" class='search-form'>
                    <input class='search-input' type="search" name="" id="" placeholder='Search' />
                    <button class='search-btn' type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </nav>
    </header>
    <section>
        <form action="contact.php" method="post">
        <h1>Registration Form</h1>
        <div class='flex'>
            <label class='label' for="">1. Applicant Name :</label>
            <input class='input' type="text" name="name">
        </div>
        <span>
            <!-- <?php echo $nameerr; ?> -->
        </span>
        <div class='flex'>
            <label class='label' for="">3. Mobile No. :</label>
            <input class='input' type="text" name="mobileNo">
        </div>
        <span>
            <!-- <?php echo $mobileNoerr;?> -->
        </span>
        <textarea name="message" id="" cols="30" rows="10"></textarea>
        </form>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>