
<!--Website: wwww.codingdung.com-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Profil Pengguna</title>
    <link rel="stylesheet" href="manajemen_profil_pengguna.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="theme.js" defer></script>
</head>

<body>
    <div class="container light-style flex-grow-1 container-p-y">
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
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#add-account">Add Account</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="cute cat.jpg" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">Username</label>
                                    <input type="text" class="form-control mb-1" value="aryanugraha" style="background-color: var(--base-variant); color: var(--text-color);">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">Name</label>
                                    <input type="text" class="form-control" value="Arya Nugraha" style="background-color: var(--base-variant); color: var(--text-color);">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">E-mail</label>
                                    <input type="text" class="form-control mb-1" value="aryanugraha@mail.com" style="background-color: var(--base-variant); color: var(--text-color);">
                                    <div class="alert alert-warning mt-3" style="background-color: var(--base-variant); color: var(--text-color);">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)" style="color: var(--link-color);">Resend confirmation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">Bio</label>
                                    <textarea class="form-control" style="background-color: var(--base-variant); color: var(--text-color);"
                                        rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">Birthday</label>
                                    <input type="text" class="form-control" style="background-color: var(--base-variant); color: var(--text-color);" value="May 3, 1995">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">Interest Fashion</label>
                                    <select class="custom-select" style="background-color: var(--base-variant); color: var(--text-color);">
                                        <option>Casual</option>
                                        <option selected>Formal</option>
                                        <option>Sports</option>
                                        <option>Vintage</option>
                                        <option>Edgy</option>
                                        <option>Preppy</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4" style="color: var(--text-color);">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">Phone</label>
                                    <input type="text" class="form-control" style="background-color: var(--base-variant); color: var(--text-color);" value="+0 (123) 456 7891">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" style="color: var(--text-color);">Website</label>
                                    <input type="text" class="form-control" style="background-color: var(--base-variant); color: var(--text-color);" value>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control" value="https://twitter.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" value="https://www.facebook.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Google+</label>
                                    <input type="text" class="form-control" value>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" value>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" value="https://www.instagram.com/user">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="add-account">
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="color: var(--text-color);">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="background-color: var(--base-variant); color: var(--text-color);">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" style="color: var(--text-color);">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style="background-color: var(--base-variant); color: var(--text-color);">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Account</button>
                                </form>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <h5 class="mb-2">
                                    List of Accounts
                                </h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <i class="ion ion-logo-google text-google"></i>
                                        <span class="ml-2">dummyaccount@gmail.com</span>
                                        <button type="button" class="btn btn-danger btn-sm ml-auto">Delete</button>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <i class="ion ion-logo-facebook text-facebook"></i>
                                        <span class="ml-2">dummyaccount2@gmail.com</span>
                                        <button type="button" class="btn btn-danger btn-sm ml-auto">Delete</button>
                                    </li>
                                </ul>
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
            <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
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