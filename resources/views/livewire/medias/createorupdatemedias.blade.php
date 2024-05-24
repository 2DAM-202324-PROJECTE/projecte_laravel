<div class="bg-gray-200 pb-32">
    <div class="container mx-auto">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
        <div
            class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 bg-gray-50 p-4 shadow-lg max-w-2xl rounded-lg">
            <div class="heading text-center font-bold text-2xl m-5 text-gray-700">Nova Media</div>

            <form wire:submit.prevent="{{ $isCreation ? 'save' : 'update' }}" class="space-y-4">
                <div>
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 mt-4">
                        Name:</label>
                    <input type="text" id="name" wire:model="name"
                           class="text-gray-700 text-sm font-bold rounded-md title bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4"
                           spellcheck="false" placeholder="Introdueix el nom.." required title="Ompliu aquest camp.">
                </div>
                <div>
                    <label for="image_uri" class="block text-gray-700 text-sm font-bold mb-2 mt-4">
                        Image_uri:</label>
                    <input type="text" id="image_uri" wire:model="image_uri"
                           class="text-gray-700 text-sm font-bold rounded-md title bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4"
                           spellcheck="false" placeholder="Introdueix la url de la imatge.." required title="Ompliu aquest camp.">
                </div>
                <div>
                    <label for="path" class="block text-gray-700 text-sm font-bold mb-2 mt-4">
                        Path:</label>
                    <input type="text" id="path" wire:model="path"
                           class="text-gray-700 text-sm font-bold rounded-md title bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4"
                           spellcheck="false" placeholder="Introdueix la localització de la media.." required title="Ompliu aquest camp.">
                </div>
                <div>
                    <label for="description" class="text-gray-700 text-sm font-bold block mb-2">Description:</label>
                    <textarea id="description" wire:model="description"
                              class="text-gray-700 text-sm font-bold description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none w-full"
                              spellcheck="false" placeholder="Descriu la nova media..." required title="Ompliu aquest camp."></textarea>
                </div>
                <div>
                    <label for="category" class="text-gray-700 text-sm font-bold block mb-2">Category:</label>
                    <select id="category" wire:model="category_id"
                            class="text-gray-700 text-sm font-bold rounded-md title bg-gray-100 border border-gray-300 p-2 outline-none w-full mb-4" required title="Ompliu aquest camp.">
                        <option value="">Selecciona una categoria</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
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
