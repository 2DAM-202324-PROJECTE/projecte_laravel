<div>
    <form wire:submit="save">
        <label for="nom">Nom:</label>
        <input type="text" id="title" wire:model="nom">
        <button type="submit">Save</button>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @elseif (session()->has('message-danger'))
            <div class="alert alert-danger">
                {{ session('message-danger') }}
            </div>
        @endif
        <form wire:submit="{{ $isCreation ? 'save' : 'update' }}">
        </form>
    </form>
</div>

