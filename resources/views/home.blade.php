@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 rounded"
                        src="https://images.unsplash.com/photo-1498237809279-fa4690fe0d05?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                        alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 rounded"
                        src="https://images.unsplash.com/photo-1521142836214-9c7e52ec962c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                        alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 rounded"
                        src="https://images.unsplash.com/photo-1548883354-caf6b10b1e1b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80"
                        alt="Third slide">
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <h3>Jaket Terbaru</h3>
            <hr>
            <div class="row">
                <div class="col-md-2">
                    <a href="#">
                        <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=436&q=80"
                            class="w-100">
                        <div class="card border-0 rounded-0 p-4">

                            <h5>Jaket Coklat</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class=" mt-5 footer">
        <div class="card bg-dark border-0 rounded-0 p-4">
            <div class="container text-light">
                <h1>Footer</h1>

            </div>
        </div>
    </div>

@endsection
