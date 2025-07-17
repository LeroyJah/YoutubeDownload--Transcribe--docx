<div class=" flex flex-col w-full">
    <div>
        <h1 class="m-1">Template Selector:</h1>
        <div class="py-10 p-1 m-1 flex border rounded">
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
                    <button class="border rounded bg-blue-400 hover:bg-blue-700 text-white px-1">Send template message</button>
                </form>
                @error('phoneNumber')
                <div class="text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div>
        <h1 class="m-1">Service Message sender:</h1>
        <div class="py-10 p-1 m-1 border rounded bg-green-100">
            <form action="{{ route('serviceMessage') }}" method="post">
                @csrf
                <input type="text" value="{{ $phoneNumber }}" name="phonenumber" class="border rounded bg-white" placeholder="+316" wire:model.live="phoneNumber">
                <input type="text" value="{{ $serviceMessage }}" name="servicemessage" class="border rounded bg-white" placeholder="Enter text here" wire:model.live="serviceMessage">
                <button class="border rounded bg-blue-400 hover:bg-blue-700 text-white px-1">Send service message</button>
            </form>
            @error('phoneNumber')
            <div class="text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <h1 class="m-1">Interactive Message sender:</h1>
    <div class="py-10 p-1 m-1 border rounded">
        <form action="{{ route('interactiveMessage') }}" method="post">
            @csrf
            <input type="text" value="{{ $phoneNumber }}" name="phonenumber" class="border rounded" placeholder="+316" wire:model.live="phoneNumber">
            <button class="border rounded bg-blue-400 hover:bg-blue-700 text-white px-1">Send interactive message</button>
        </form>
    </div>
    <h1>Webhook</h1>
    <div class="border rounded">
        {{ "app.js" }}
    </div>
</div>
