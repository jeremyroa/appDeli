
@extends('layouts.app')

@section('content')
  <!--CARRUSEL-->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 img-fluid" src="img/HVR_Chicken_Crust_Pepperoni_Pizza_Recipe.jpg" alt="First slide">
        <div class="carousel-caption d-none d-lg-block">
          <h2>Nuestras pizzas</h2>
          <p>Siempre están basadas en nuestra propia masa y la podrás combinar con una gran variedad de ingredientes
            frescos como tomate, mozzarella ,champiñones, bacón, alcachofas, huevos, alcaparras, jamón serrano,
            almejas, gambas…</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="img/final2337.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-lg-block">
          <h2>¡9 AÑOS DISFRUTANDO!</h2>
          <p>Con casi una decada de historia a la espalda, <b>Trastevere</b> es un restaurante familiar, con unos
            sólidos cimientos de cocina tradicional italiana, las recetas de la nonna que, con el paso de los años, han
            superado las barreras generacionales y han hecho disfrutar a miles de clientes a lo largo del tiempo.
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="img/e0fd545344eabc22925b493eb4ed097d.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-lg-block">
          <h2>Acercamos la comida a tu mesa</h2>
          <p>Lo mejor de este divertido espacio es que cuentan con servicio a domicilio. Si tienes un día de esos en
            los que no te apetece salir de casa, Restaurante Aldo te acerca la comida hasta tu puerta.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!--CARRUSEL-->

  <!--Section 1-->
  <section class="container my-5">
    <br>
    <h2 class="display-4 text-center mt-4"><img class="img-fluid" src="img/restaurant-ponferrada.png" alt=""></h2>
    <p class="lead my-4 text-center font-italic font-weight-bold">"El gusto por la cocina tradicional napolitana, el
      mismo del producto y la necesidad de explorar y arriesgar son nuestras señas de identidad, nuestro motor".</p>
    <p class="my-5"> <br> </p>
    <!--CARDS-->
    <div class="card-deck">
      <div class="row">
        <div class="mt-4 col-md-6 col-lg-4">
          <div class="card">
            <img class="card-img-top" src="img/Vicia-2-1024x780.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">Sobre Nosotros</h5>
              <p class="card-text text-justify">El Ristorante Pizzeria Trastevere abrió en <span class="font-weight-bold">Mérida</span>
                en 2009 para ofrecer comida italiana de alta calidad. Próximamente nueva apertura en <span class="font-weight-bold">Caracas</span>.</p>
              <p class="card-text"><button class="btn btn-danger">Más información</button></p>

            </div>
          </div>
        </div>
        <div class="mt-4 col-md-6 col-lg-4">
          <div class="card">
            <img class="card-img-top" src="img/lardo-1024x780.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">Servicio a domicilio</h5>
              <p class="card-text text-justify">Contamos con un sistema de pedidos a domicilio, <span class="font-weight-bold">único
                  en el mundo</span>, rapido y seguro, lo mejor consigue las mejores <span class="font-weight-bold">ofertas</span>.
                <span class="font-weight-bold">¡Una locura!</span></p>
              <p class="card-text"><button class="btn btn-danger">Más información</button></p>
            </div>
          </div>
        </div>
        <div class="mt-4 col-md-12 col-lg-4">
          <div class="card">
            <img class="card-img-top" src="img/Spaghetti-Chicken-Cacciatore-3-BEST-1024x780.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">Cocina italiana tradicional</h5>
              <p class="card-text text-justify">Nuestra cocina es <span class="font-weight-bold">sencilla</span> y
                combinamos los mejores ingredientes frescos de <span class="font-weight-bold">Mucuchies</span> con la
                pasión de <span class="font-weight-bold">nuestras recetas 100% italianas</span>.</p>
              <p class="card-text"><button class="btn btn-danger">Más información</button></p>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!--CARDS-->
  </section>
  <!--Section 1-->

  <!--Jumbotron-->
  <div class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8">
          <h2 class="display-4">Sabores Únicos</h2>
          <p class="lead">Trabajamos día a día con los <span class="font-weight-bold">mejores ingredientes</span> para
            ofrecerte el mejor servicio al mejor precio.</p>
          <hr class="my-4">
          <p>Te puedes trasladar a <span class="font-weight-bold">Italia</span> a través de los sabores de nuestra
            pasta, carpaccio, crostini y como no, nuestras pizzas. Pizzería en <span class="font-weight-bold">Mérida</span>
            de referencia a tu alcance.</p>
        </div>
        <div class="col-lg-4">
          <img class="border rounded img-fluid" src="img/vino.png" alt="">
        </div>
      </div>
    </div>
  </div>
  <!--Jumbotron-->
@endsection