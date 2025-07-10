<div class=" flex flex-row">
    <div class="px-1">
        <button class="border rounded bg-blue-400 hover:bg-blue-700 text-white px-1" wire:click="setDefaultNumber">Default</button>
    </div>
    <div class="px-1">
        <input type="text" value="" class="border rounded" placeholder="+316" wire:model="phoneNumber">
    </div>
    <div class="px-1">
        <button wire:click="sendMessage" class="border rounded bg-blue-400 hover:bg-blue-700 text-white px-1">Send test message</button>
    </div>
    {{-- Stop trying to control. --}}
</div>
