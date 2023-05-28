<div class="bg-gray-300 p-5 my-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">
        Inscribirme en esta vacante
    </h3>

    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5">
            {{session('mensaje')}}        
        </div>
    @else
        <form class="w-96 mt-5" wire:submit.prevent='postularme'>
            <div class="mb-4">
                <x-input-label class="!text-gray-800" for="cv" :value="__('Curriculum')" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full"/>
                <x-input-error :messages="$errors->get('cv')" class="mt-2 !text-red-600" />
            </div>


            <div class="my-5">
                <x-primary-button class="!bg-indigo-700 !text-gray-50">
                    Inscribirme
                </x-primary-button>
            </div>
        </form>
    @endif


</div>


