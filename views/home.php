<?php
    if(!isset($_SESSION['usuario'])){
        header("location:login");
        exit();
    }
?>

<div class="container mt-5">
    <div class="row justify-content-center p-4 rounded shadow-lg" style="background-color: rgba(255, 255, 255, 0.5);">
        
        <!-- Carrusel de imágenes de dulces -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://tiendadelarosa.com/cdn/shop/collections/DeLaRosa_BannerChocolates-03_1512x.png?v=1607198978" class="d-block w-100" alt="Dulce 1">
                </div>
                <div class="carousel-item">
                    <img src="https://tiendadelarosa.com/cdn/shop/collections/DeLaRosa_BannerGomitas-03_1512x.png?v=1607199217" class="d-block w-100" alt="Dulce 2">
                </div>
                <div class="carousel-item">
                    <img src="https://tiendadelarosa.com/cdn/shop/collections/MundoDLR_BannerPaletas-03_1512x.png?v=1612991876" class="d-block w-100" alt="Dulce 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="col-12 text-center mt-4 mb-4">
            <h2>Bienvenid@ a la mejor dulceria</h2>
        </div>
    </div>
</div>

<!-- Agrega los links de Bootstrap JS al final de tu archivo -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>






