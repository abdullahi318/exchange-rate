<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Rate</title>
    
    <!-- bootstrap & font awesome links -->
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/font/all.css">
    <script src="dist/font/all.js"></script>
    <script src="dist/js/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>

    <!-- embeded css style -->
    <style>
        footer {
                text-align: center;
                padding: 5px;
                /* background-color: #abbaba; */
                color: #000;
                
            }
    </style>

</head>
<body>
    <nav class="navbar navbar-dark bg-secondary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex-text-center" href="#">Exchange Rate Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Navigations</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body-dark">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 bg-secondary">
                <li class="nav-item">
                    <a class="navabdullahisalihu318@gmail.com-link active" aria-current="page" href="{{ url('/') }}"><i class="fas fa-home fa-fw" style="background:light"></i>Home</a>
                </li>
                <a class="nav-link" href="{{ url('/index') }}">Index</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('coins.index') }}">Home</a>
                    </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle bg-secondary text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                    </a>
                    <ul class="dropdown-menu dropdown-menu bg-secondary text-light">
                    <li class="bg-secondary"><a class="dropdown-item" href="#">Action</a></li>
                    <li class="bg-secondary"><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item bg-secondary" href="#">Something else here</a></li>
                    </ul>
                </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
            </div>
        </div>
    </nav><br><br><br>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                Lorem ipsum, dolor sit amet conse
                ctetur adipisicing elit. Facere, ea
                que? Odit, iure ullam sed suscipit doloribus dol
                orem a nihil culpa obcaecati sint mollitia ad cumque 
                in nisi iste ratione ea.
                col-sm-8
                Lorem ipsum, dolor sit amet conse
                ctetur adipisicing elit. Facere, ea
                que? Odit, iure ullam sed suscipit doloribus dol
                orem a nihil culpa obcaecati sint mollitia ad cumque 
                in nisi iste ratione ea.
                col-sm-8
            </div>

            <div class="col-sm-4">
                 Lorem ipsum, dolor sit amet conse
                ctetur adipisicing elit. Facere, ea
                que? Odit, iure ullam sed suscipit doloribus dol
                orem a nihil culpa obcaecati sint mollitia ad cumque 
                in nisi iste ratione ea.
                col-sm-8
                Lorem ipsum, dolor sit amet conse
                ctetur adipisicing elit. Facere, ea
                que? Odit, iure ullam sed suscipit doloribus dol
                orem a nihil culpa obcaecati sint mollitia ad cumque 
                in nisi iste ratione ea.
                col-sm-8
            </div>
        </div>
    </div>

    <footer  class="fixed-bottom footer footer-expand-lg bg-secondary text-white">
        <small>
          Copyright © 2023 Exchange Rate Managements System. All Rights Reserved.
        </small>
    </footer>
</body>
</html>