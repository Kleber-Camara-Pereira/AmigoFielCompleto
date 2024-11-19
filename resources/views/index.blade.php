@extends('app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Painel que envolve "Sobre Nós" e o Carrossel -->
            <div class="bg-light rounded shadow" style="background-color: #b0c4e1; padding: 20px; margin-top: 70px; margin-bottom: 50px;">
                <div class="text-center">
                    <h1>Sobre Nós</h1>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam molestias aut voluptates quibusdam, temporibus nesciunt nisi officiis, accusamus beatae repellendus minus ex sunt voluptate deserunt rem veritatis. Recusandae, illum maxime.</p>
                </div>

                <!-- Carrossel de fotos -->
                <div id="photoCarousel" class="carousel slide rounded" data-bs-ride="carousel" style="margin-top: 20px;">
                    <div class="carousel-inner">
                        @foreach ($imagens as $index => $animal)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ url('storage/' . $animal->foto ) }}" class="d-block w-100 rounded" alt="Imagem do Animal">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
