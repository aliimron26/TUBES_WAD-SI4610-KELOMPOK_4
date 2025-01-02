<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="user_profile.css">
    <title>User Profile</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">
                    <div class="text-center">
                        <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle">
                    </div>
                    <div class="text-center mt-3">
                        <h5 class="mt-2 mb-0">Arya Nugraha</h5>
                        <p class="mt-2 mb-1">Interest Fashion:</p>
                        <div style="display: flex; justify-content: center; flex-wrap: wrap;">
                            <?php
                            $interest = array();
                            if(isset($_COOKIE['interest-fashion'])) {
                                $interest = explode(",", $_COOKIE['interest-fashion']);
                            }
                            ?>
                            <?php foreach($interest as $i) { ?>
                                <span style="background-color: #059ea3; border-radius: 10px; padding: 5px 10px; color: white; margin-right: 5px; margin-bottom: 5px;"><?php echo $i; ?></span>
                            <?php } ?>
                        </div>
                        <div class="px-4 mt-1">
                            <p class="fonts">
                            <?php
                            if(isset($_COOKIE['bio'])) {
                                echo $_COOKIE['bio'];
                            } else {
                                echo "Saya seorang mahasiswa yang sangat tertarik dengan perkembangan fashion dan ingin terus mengikuti trend fashion terkini. Saya juga sangat menyukai musik dan film.";
                            }
                            ?>
                            </p>
                        </div>
                        <ul class="social-list">
                            <li><a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://whatsapp.com" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                            <li><a href="https://linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://instagram.com" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        <div class="a">
                            <a href="../profil/manajemen_profil_pengguna.php" class="btn btn-outline-primary px-4">Edit Profile</a>
                            <a href="../Layouts/app.php"class="btn btn-primary px-4 ms-3">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>