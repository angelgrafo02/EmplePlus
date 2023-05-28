<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @if (count($vacantes) > 0)
        @foreach ($vacantes as $vacante)
        <div class="p-6 text-gray-900 dark:text-white md:flex md:justify-between">
            <div class="leading-10 space-y-3">
                <a href="{{ route('vacantes.show', $vacante->id ) }}" class="text-xl font-bold ">
                    {{$vacante -> titulo}}
                </a>
                <p class="text-sm text-gray-300 font-bold uppercase">
                    {{$vacante->empresa}}
                </p>
                <p class="text-sm text-gray-400">
                    Fecha límite: {{ $vacante->ultimo_dia->format('d/m/Y') }}
                </p>
            </div>

            <div class="flex gap-3 items-center mt-5 md:mt-0">
                <a href="{{route('candidatos.index', $vacante)}}" class="bg-slate-300 py-2 px-4 rounded-lg text-gray-900 text-xs font-bold uppercase">
                   {{ $vacante->candidatos->count() }}
                    Candidatos
                </a>
                <a href="{{ route('vacantes.edit', $vacante->id)}}"
                    class="bg-blue-500 py-2 px-4 rounded-lg text-gray-900 text-xs font-bold uppercase">
                    Editar
                </a>
                <button wire:click="$emit('mostrarAlerta', {{ $vacante->id }})"
                    class="bg-red-400 py-2 px-4 rounded-lg text-gray-900 text-xs font-bold uppercase">
                    Eliminar
                </button>
            </div>

        </div>


        <!-- Esto es para que solo aparezca el hr si hay más de una vacante, y para que no aparezca en el último-->
        @if (!$loop->last)
        <hr>
        @endif

        @endforeach

        @else
        <div class="flex items-center justify-center">
            <p class="flex items-center p-3 text-center text-xl text-gray-300 gap-3">
                Aún no existen vacantes...
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                </svg>
            </p>
        </div>

        @endif
    </div>

    <div class=" mt-10 ml-3">
        {{ $vacantes->links() }}

    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('mostrarAlerta', vacanteId => {
        Swal.fire({
        title: '¿Eliminar Vacante?',
        text: "No podras recuperar la vacante una vez la borres",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, ¡Eliminar!',
        cancelButtonText: 'Cancelar' 
    }).then((result) => {
    if (result.isConfirmed) {

        // eliminar la vacante
        Livewire.emit('eliminarVacante', vacanteId)



    Swal.fire(
      'Eliminado!',
      'La vacante ha sido eliminada.',
      'Exito'
                )
            }
        })
    })



</script>
@endpush