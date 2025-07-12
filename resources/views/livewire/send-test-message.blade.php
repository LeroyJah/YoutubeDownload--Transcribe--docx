<div class=" flex flex-row">
    <div class="px-1">
        <label for="templateSelector">Templates:</label>
        <select name="templateSelector" wire:model.live="templateName">
            <option disabled value="">Select a template</option>
            <option value="hello_world">hello_world</option>
            <option value="FAQ">FAQ</option>
            <option value="speak_with_manager">Speak with manager</option>
        </select>
    </div>
    <div class="px-1 flex flex-col">
        <button class="border rounded bg-blue-400 hover:bg-blue-700 text-white px-1" wire:click="setDefaultNumber">Default</button>
    </div>
    <div class="px-1">
        <form action="{{ route('sendMessage') }}" method="post">
            @csrf
            <input type="text" value="{{ $phoneNumber }}" name="phonenumber" class="border rounded" placeholder="+316" wire:model.live="phoneNumber">
            <input type="hidden" value="{{ $templateName }}" name="templatename">
            <button class="border rounded bg-blue-400 hover:bg-blue-700 text-white px-1">Send test message</button>
        </form>
        @error('phoneNumber')
        <div class="text-red-500">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
