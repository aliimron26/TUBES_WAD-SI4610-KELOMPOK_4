<?php
session_start();

include '../db.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login_user.php");
    exit;
}

// untuk mengambil data dari sesi dengan nilai default jika tidak ada
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'] ?? ""; 
$email = $_SESSION['email'] ?? "";       
$name = $_SESSION['name'] ?? "";         
$bio = $_SESSION['bio'] ?? "";           
$interest = isset($_SESSION['interest']) ? explode(",", $_SESSION['interest']) : []; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="manajemen_profil_pengguna.css">
    <script type="text/javascript" src="theme.js" defer></script>
</head>

<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <a href="../Layouts/app.php" class="btn btn-custom mb-3"><i class="fa fa-arrow-left"></i> Back</a>
        <h4 class="font-weight-bold py-3 mb-4">
            Account settings
        </h4>
        <button id="theme-switch">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z"/></svg>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Z"/></svg>
        </button>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <!-- <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a> -->
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img id="profileImage" src="https://i.imgur.com/bDLhJiP.jpg" alt class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                        <label class="btn btn-custom">
                                            Upload new photo
                                            <input type="file" class="account-settings-fileinput" name="fileToUpload" id="fileToUpload" onchange="previewImage(event)">
                                        </label> &nbsp;
                                    </form>
                                    <button class="btn btn-danger md-btn-flat mt-2" onclick="removeProfileImage()">Remove Photo</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <script>
                                function previewImage(event) {
                                    var reader = new FileReader();
                                    reader.onload = function() {
                                        var output = document.getElementById('profileImage');
                                        output.src = reader.result;
                                    }
                                    reader.readAsDataURL(event.target.files[0]);
                                }
                                
                                function removeProfileImage() {
                                    document.getElementById('profileImage').src = 'https://i.imgur.com/hUQpigu.png';
                                }
                            </script>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                    <form action="update_profile.php" method="post">
                                        <div class="form-group">
                                            <label class="form-label" style="color: var(--text-color);">Username</label>
                                            <input type="text" class="form-control mb-1" style="background-color: var(--base-variant); color: var(--text-color);" name="username" id="username" value="<?= htmlspecialchars($username ?? '') ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" style="color: var(--text-color);">Name</label>
                                            <input type="text" class="form-control" style="background-color: var(--base-variant); color: var(--text-color);" name="name" id="name" value="<?= htmlspecialchars($name ?? '') ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" style="color: var(--text-color);">E-mail</label>
                                            <input type="text" class="form-control mb-1" style="background-color: var(--base-variant); color: var(--text-color);" name="email" id="email" value="<?= htmlspecialchars($email ?? '') ?>" readonly>
                                        </div>
                                    </form>
                                </form>
                            </div>
                        </div>
                        <!--
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">Current password</label>
                                    <input type="password" class="form-control" style="background-color: var(--base-variant); color: var(--text-color);">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">New password</label>
                                    <input type="password" class="form-control" style="background-color: var(--base-variant); color: var(--text-color);">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">Repeat new password</label>
                                    <input type="password" class="form-control" style="background-color: var(--base-variant); color: var(--text-color);">
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                    <div class="form-group">
                                        <label class="form-label" style="color: var(--text-color);">Bio</label>
                                        <textarea class="form-control" style="background-color: var(--base-variant); color: var(--text-color);" rows="5" name="bio" id="bio"><?= htmlspecialchars($bio ?? '') ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="color: var(--text-color);">Interest Fashion</label>
                                        <select class="custom-select" id="interest-fashion" name="interest[]" multiple style="background-color: var(--base-variant); color: var(--text-color);">
                                            <?php
                                            $options = ["Casual", "Formal", "Sports", "Vintage", "Edgy", "Preppy"];
                                            foreach ($options as $option) {
                                                $selected = in_array($option, $interest) ? "selected" : "";
                                                echo "<option value='$option' $selected>$option</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn" style="background-color: #059ea3; color: white;" onclick="addInterest()">Add Interest</button>
                                        <div id="interest-list" style="margin-top: 1rem;">
                                            <?php
                                                if(isset($_COOKIE['interest-fashion'])) {
                                                    $interests = explode(",", $_COOKIE['interest-fashion']);
                                                    foreach($interests as $interest) {
                                                        echo '<div class="badge badge-primary mr-2 mb-2" style="background-color: #059ea3;">' . htmlspecialchars($interest ?? '') . ' <span style="cursor: pointer;" onclick="removeInterest(this)">&times;</span></div>';
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                <script>
                                    function addInterest() {
                                        var select = document.getElementById("interest-fashion");
                                        var option = select.options[select.selectedIndex];
                                        var interestList = document.getElementById("interest-list");
                                        var newDiv = document.createElement("div");
                                        newDiv.className = "badge badge-primary mr-2 mb-2";
                                        newDiv.style.backgroundColor = "#059ea3";
                                        newDiv.innerHTML = `${option.value} <span style="cursor: pointer;" onclick="removeInterest(this)">&times;</span>`;
                                        interestList.appendChild(newDiv);
                                        updateInterestCookie();
                                    }

                                    function removeInterest(element) {
                                        element.parentNode.remove();
                                        updateInterestCookie();
                                    }

                                    function updateInterestCookie() {
                                        var interests = [];
                                        var badges = document.querySelectorAll("#interest-list .badge");
                                        badges.forEach(function(badge) {
                                            interests.push(badge.textContent.trim().slice(0, -1)); 
                                        });
                                        document.cookie = "interest-fashion=" + encodeURIComponent(interests.join(",")) + "; path=/";
                                    }
                                </script>
                            </div>
                            <hr class="border-light m-0">
                        </div>
                        <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">Twitter</label>
                                    <input type="text" class="form-control" value="https://twitter.com/user" style="background-color: var(--base-variant); color: var(--text-color);">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">Facebook</label>
                                    <input type="text" class="form-control" value="https://www.facebook.com/user" style="background-color: var(--base-variant); color: var(--text-color);">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">WhatsApp</label>
                                    <input type="text" class="form-control" value="https://wa.me/user" style="background-color: var(--base-variant); color: var(--text-color);">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">LinkedIn</label>
                                    <input type="text" class="form-control" value="https://www.linkedin.com/in/user" style="background-color: var(--base-variant); color: var(--text-color);">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">Instagram</label>
                                    <input type="text" class="form-control" value="https://www.instagram.com/user" style="background-color: var(--base-variant); color: var(--text-color);">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Activity</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone comments on my article</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone answers on my forum
                                            thread</span>
                                    </label>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Application</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">News and announcements</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly product updates</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="button" class="btn btn-custom" onclick="saveChanges()">Save changes</button>&nbsp;
            <script>
                function saveChanges() {
                    // untuk menyimpan perubahan
                    alert('Changes have been saved successfully.');
                }
            </script>
            <button id="resetButton" type="button" class="btn btn-default" onclick="resetToDefault()">Reset</button>
            <script>
                // Nilai default
                const defaultSettings = {
                    username: "aryanugraha",
                    name: "Arya Nugraha",
                    email: "aryanugraha@gmail.com", 
                    bio: "Saya seorang mahasiswa yang sangat tertarik dengan perkembangan fashion dan ingin terus mengikuti trend fashion terkini. Saya juga sangat menyukai musik dan film.",
                    birthday: "May 3, 1995",
                    facebook: "https://www.facebook.com/aryanugraha",
                    instagram: "https://www.instagram.com/aryanugraha/",
                    twitter: "https://twitter.com/aryanugraha",
                };
                // Fungsi untuk mereset pengaturan
                function resetToDefault() {
                    document.getElementById('username').value = defaultSettings.username;
                    document.getElementById('name').value = defaultSettings.name;
                    document.getElementById('email').value = defaultSettings.email;
                    document.getElementById('bio').value = defaultSettings.bio;
                    document.getElementById('birthday').value = defaultSettings.birthday;
                    document.getElementById('facebook').value = defaultSettings.facebook;
                    document.getElementById('instagram').value = defaultSettings.instagram;
                    document.getElementById('twitter').value = defaultSettings.twitter;
                }
                // Event listener untuk tombol reset
                document.getElementById('resetButton').addEventListener('click', resetToDefault);
            </script>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        let darkmode = localStorage.getItem('darkmode')
        const themeSwitch = document.getElementById('theme-switch')

        const enableDarkmode = () => {
        document.body.classList.add('darkmode')
        localStorage.setItem('darkmode', 'active')
        }

        const disableDarkmode = () => {
        document.body.classList.remove('darkmode')
        localStorage.setItem('darkmode', null)
        }

        if(darkmode === "active") enableDarkmode()

        themeSwitch.addEventListener("click", () => {
        darkmode = localStorage.getItem('darkmode')
        darkmode !== "active" ? enableDarkmode() : disableDarkmode()
        })
    </script>
</body>

</html>

