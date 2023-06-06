<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.3/lux/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="./assets/style.css">
    <title>VTC</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">

                <a class="navbar-brand" href="<?= URL ?>accueil">VTC</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>drivers">Conducteurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>vehicules">Vehicules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>assos">Association</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <main class="container">
        <h1 class="my-4 text-center bg-secondary shadow p-2">
            <?= $title ?>
        </h1>
        <?= $content ?>
    </main>

    <footer class="bg-primary text-center text-white">
        <div class="container p-4 mb-4">
            <h4 class="text-white">Nos réseaux sociaux</h4>
            <hr>
            <a class="btn m-1" href="https://facebook.com" target="_blank" role="button"><i class="fab fa-facebook-f"></i></a>
            <a class="btn m-1" href="https://twitter.com" target="_blank" role="button"><i class="fab fa-twitter"></i></a>
            <a class="btn m-1" href="https://instagram.com" target="_blank" role="button"><i class="fab fa-instagram"></i></a>
            <a class="btn m-1" href="https://linkedin.com" target="_blank" role="button"><i class="fab fa-linkedin-in"></i></a>
            <a class="btn m-1" href="https://github.com" target="_blank" role="button"><i class="fab fa-github"></i></a>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
