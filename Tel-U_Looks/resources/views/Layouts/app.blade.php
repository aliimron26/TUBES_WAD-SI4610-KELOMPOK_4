<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tel-U Looks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            color: #55565B;
        }
        .navbar {
            background-color: #B6252A;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        footer {
            background-color: #58A3FC; /* Updated background color */
            color: white;
            padding: 20px 0; /* Increased padding for better spacing */
            text-align: center;
            font-family: sans-serif; /* Added font family */
            font-weight: bold; /* Added bold font weight */
        }
        .footer-content {
            max-width: 800px; /* Max width for content */
            margin: auto; /* Center the footer content */
        }
        footer h2 {
            margin: 0; /* Remove default margin */
        }
        footer p {
            margin: 5px 0; /* Margin for paragraphs */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tel-U Looks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Recommendations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer>
        <div class="footer-content">
            <h2>Tel-U Looks</h2>
            <p>Jl. Telekomunikasi No. 1, Bandung Terusan Buahbatu - Bojongsoang, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257</p>
            <p>Tel-U Looks &copy; 2024</p> <!-- Updated copyright information -->
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>