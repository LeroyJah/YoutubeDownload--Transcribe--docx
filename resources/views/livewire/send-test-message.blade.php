<div class=" flex flex-col w-full">
    <div class="p-1 flex">
        <div>
            <label for="templateSelector">Templates:</label>
            <select name="templateSelector" wire:model.live="templateName">
                <option disabled value="">Select a template</option>
                <option value="hello_world">hello_world</option>
                <option value="location_list">Location</option>
                <option value="FAQ">FAQ</option>
                <option value="speak_with_manager">Speak with manager</option>
            </select>
        </div>
        <div>
            <button class="border rounded bg-blue-400 hover:bg-blue-700 text-white px-1 mx-1" wire:click="setDefaultNumber">Default</button>
        </div>
        <div>
            <form action="{{ route('templateMessage') }}" method="post">
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
    <div class="p-1">
        <form action="{{ route('serviceMessage') }}" method="post">
            @csrf
            <input type="text" value="{{ $phoneNumber }}" name="phonenumber" class="border rounded" placeholder="+316" wire:model.live="phoneNumber">
            <input type="text" value="{{ $serviceMessage }}" name="servicemessage" class="border rounded" wire:model.live="serviceMessage">
            <button class="border rounded bg-blue-400 hover:bg-blue-700 text-white px-1">Send test message</button>
        </form>
        @error('phoneNumber')
        <div class="text-red-500">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
