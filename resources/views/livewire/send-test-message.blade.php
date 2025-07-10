<div>
    <button class="border rounded px-1" wire:click="setDefaultNumber">Default</button>
    <input type="text" value="" class="border rounded" placeholder="+316" wire:model.live="phoneNumber">
    <div>{{ $phoneNumber }}</div>
    {{-- Stop trying to control. --}}
</div>
