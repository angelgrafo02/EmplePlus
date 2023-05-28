<div class=p-10>
    <div class="mb-5">
        <h2 class="font-bold text-3xl text-white my-3 mb-6">
            {{$vacante->titulo}}
        </h2>
        <div class="bg-gray-700 rounded-2xl p-2 ">
            <p class="font-bold text-sm uppercase text-gray-300 my-3 ml-3">Empresa:
                <span class="normal-case font-normal">{{$vacante->empresa}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-300 my-3 ml-3">Fecha límite para presentarte:
                <span class="normal-case font-normal">{{$vacante->ultimo_dia->toFormattedDateString()}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-300 my-3 ml-3">Categoria:
                <span class="normal-case font-normal">{{$vacante->categoria->categoria}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-300 my-3 ml-3">Salario:
                <span class="normal-case font-normal">{{$vacante->salario->salario}}</span>
            </p>

        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-4 ">
        <div class="md:col-span-2 ">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen ) }}"
                alt="{{'Imagen vacante' . $vacante->titulo}}">
        </div>

        <div class="md:col-span-4 text ">
            <h2 class="text-2xl font-bold mb-5 text-gray-200">Descripción del puesto</h2>
            <p class="text-gray-400">{{$vacante->descripcion}}</p>
        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-500 border border-dashed p-5 text-center rounded-md">
            <p>
                ¿Deseas inscribirte en la vacante? <a href="{{route('register')}}" class="font-bold text-indigo-600">¡Obten
                    tu cuenta y empieza a buscar empleo!</a>
            </p>
        </div>
    @endguest
    @auth
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante" />
        @endcannot
    @endauth

</div>