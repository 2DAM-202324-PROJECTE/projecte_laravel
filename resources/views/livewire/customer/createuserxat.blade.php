<div class="h-screen" style="background: #907761">
    <div class="container mx-auto py-20">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
        <div style="background: #553d2a" class="editor mx-auto w-10/12 flex flex-col border-gray-900 rounded-md border-4

         text-gray-800 bg-gray-50 p-4 max-w-2xl mt-20">
            <div class="heading text-center font-bold text-3xl m-5 text-gray-200">Crear Xat</div>
            <form wire:submit.prevent="create" class="space-y-4">

                <div>
                    <label for="nom" class="block text-gray-200 text-2xl font-bold mb-2 mt-4">Nom:</label>
                    <input type="text" id="nom" wire:model="nom" class="text-gray-700 text-2xl font-bold rounded-md title bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" spellcheck="false" placeholder="Introdueix el nom..." required>
                    @error('nom') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="privacitat" class="block text-gray-200 text-2xl font-bold mb-2 mt-4">Privacitat:</label>
                    <select id="privacitat" wire:model="privacitat" class="text-gray-700 text-2xl font-bold rounded-md title bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" required>
                        <option value="">Selecciona una opció...</option>
                        <option value="pública">Pública</option>
                        <option value="privada">Privada</option>
                    </select>
                    @error('privacitat') <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>


                <div>
                    <label for="idioma" class="text-gray-200 text-2xl font-bold block mb-2">Idioma:</label>
                    <select id="idioma" wire:model="idioma" class="text-gray-700 text-2xl font-bold rounded-md bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" required>
                        <option value="">Selecciona una opció...</option>
                        <option value="Catala">Català</option>
                        <option value="Espanol">Español</option>
                        <option value="English">English</option>
                    </select>
                    @error('idioma') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5">
                    <!-- botó de crear -->
                    <button type="submit"  class="text-2xl justify-center rounded-md border border-transparent shadow-sm px-8 py-2 bg-green-700
                            font-medium text-white hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto ">Crear</button>
                    <!-- botó de cancel·lar -->
                    <button  wire:click="resetForm" class="text-2xl justify-center rounded-md border border-transparent shadow-sm px-8 py-2 bg-red-800
                     font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto ">Cancel·lar</button>
                </div>

            </form>
        </div>
    </div>
</div>

