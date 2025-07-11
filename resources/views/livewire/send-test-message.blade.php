<div class=" flex flex-row">
    <div class="px-1">
        <button class="border rounded bg-blue-400 hover:bg-blue-700 text-white px-1" wire:click="setDefaultNumber">Default</button>
    </div>
    <div class="px-1">
        <form action="{{ route('sendMessage') }}" method="post">
            @csrf
            <input type="text" value="{{ $phoneNumber }}" name="phonenumber" class="border rounded" placeholder="+316" wire:model="phoneNumber">
            @error('phoneNumber')
            <div class="text-red-500">
                {{ $message }}
            </div>
            @enderror
            <button class="border rounded bg-blue-400 hover:bg-blue-700 text-white px-1">Send test message</button>
        </form>
    </div>
    {{-- Stop trying to control. --}}
</div>
