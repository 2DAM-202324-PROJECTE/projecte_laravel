<div class="bg-gray-200 pb-32">
    <div class="container mx-auto">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
        <div
            class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 bg-gray-50 p-4 shadow-lg max-w-2xl rounded-lg">
            <div class="heading text-center font-bold text-2xl m-5 text-gray-700">Nou sala de xat</div>

            <form wire:submit.prevent="{{ $isCreation ? 'create' : 'update' }}" class="space-y-4">
                <div>
                    <label for="nom" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Nom:</label>
                    <input type="text" id="nom" wire:model="nom"
                           class="text-gray-700 text-sm font-bold rounded-md title bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4"
                           spellcheck="false" placeholder="Introdueix el nom.." required title="Ompliu aquest camp.">
                    @error('nom')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="descripcio" class="text-gray-700 text-sm font-bold block mb-2">Descripció:</label>
                    <textarea id="descripcio" wire:model="descripcio"
                              class="text-gray-700 text-sm font-bold description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none w-full"
                              spellcheck="false" placeholder="Descripcio.."></textarea>

                </div>
                <div>
                    <label for="creador" class="text-gray-700 text-sm font-bold block mb-2">Creadores:</label>
                    <select id="creador" wire:model="creador_id" class="text-gray-700 text-sm font-bold rounded-md title bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" required title="Ompliu aquest camp.">
                        <option value="">Selecciona el usuari creador</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name.$user->id.$creador_id }}
                            </option>
                        @endforeach
                    </select>
                    @error('creador') <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="media_id" class="text-gray-700 text-sm font-bold block mb-2">Media:</label>
                    <select id="media_id" wire:model="media_id" class="text-gray-700 text-sm font-bold rounded-md bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" required title="Ompliu aquest camp.">
                        <option value="">Selecciona una película</option>
                        @foreach($medias as $media)
                            <option value="{{ $media->id }}">
                                {{ $media->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('media_id') <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="privacitat" class="text-gray-700 text-sm font-bold block mb-2">Privacitat:</label>
                    <select id="privacitat" wire:model="privacitat" class="text-gray-700 text-sm font-bold rounded-md bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" required title="Ompliu aquest camp.">
                        <option value="">Selecciona una opció...</option>
                        <option value="pública">Pública</option>
                        <option value="privada">Privada</option>
                    </select>
                    @error('privacitat') <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="text-gray-700 text-sm font-bold block mb-2">Contraseña:</label>
                    <input type="password" id="password" wire:model="password" class="text-gray-700 text-sm font-bold rounded-md bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" placeholder="Contraseña del xat..." required title="Ompliu aquest camp.">
                    @error('password') <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="idioma" class="text-gray-700 text-sm font-bold block mb-2">Idioma:</label>
                    <select id="idioma" wire:model="idioma" class="text-gray-700 text-sm font-bold rounded-md bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" required title="Ompliu aquest camp.">
                        <option value="">Selecciona una opció...</option>
                        <option value="Catala">Català</option>
                        <option value="Espanol">Español</option>
                        <option value="English">English</option>
                        <!-- Añade más opciones según sea necesario -->
                    </select>
                    @error('idioma')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="buttons flex">
                    <button type="button"
                            class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto rounded-md text-sm"
                            wire:click="cancel" style="outline: none">Cancel·lar
                    </button>
                    <button type="submit"
                            class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 rounded-md ml-2 text-sm bg-indigo-500"
                            style="outline: none">{{ $isCreation ? 'Crear' : 'Guardar' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
