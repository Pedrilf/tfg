<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Reservar - Casa Javi</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link href="../css/styles_custom.css" rel="stylesheet"/>
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top" style="background-color:rgb(171, 204, 237);">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="height:75px;background-color:white;">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../index.html" style="color: black;">Casa Javi</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0 menu">
                        <li class="nav-item"><a class="nav-link" href="reservas.php" style="color: black;">Administrar Reservas</a></li>
                        <li class="nav-item"><a class="nav-link" href="menus.php" style="color: black;">Añadir Menu</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- FILTROS -->
        <div style="margin:auto;margin-top:100px;width:90%;">
            <form>
                <div style="width: 98%;overflow: auto;">
                    <div style="float: left;width: 49%;height: 100%;border-right: 3px solid black;padding: 30px;">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha" placeholder="DD/MM/YYYY">
                        <br><br>
                        <label for="NPersonas">Nº Personas</label>
                        <input type="number" class="form-control" id="NPersonas" placeholder="Numero de personas">
                        <br>
                    </div>
                    <div style="float: left;width: 49%;padding: 30px;height: 100%;">
                        <label for="inputEmail4">Numero de Telefono</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        <br>
                        <label for="inputEmail4">Correo</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        <br>
                        <label for="inputEmail4">Nombre</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                </div>
                
                <div style="text-align: center;">
                    <br>
                    <button class="btn btn-primary" type="submit">Reservar</button>
                </div>
            </form>
        </div>
        <br><br>
        <div style="height: 800px;width: 90%;background-color: rgb(224, 224, 235);margin: auto;">

        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
