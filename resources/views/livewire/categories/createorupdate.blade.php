<div>
    <form wire:submit="{{ $isCreation ? 'create' : 'update' }}">
        <label for="name">Name:</label>
        <input type="text" id="title" wire:model="name">
        <button type="submit">Save</button>
    </form>
</div>
