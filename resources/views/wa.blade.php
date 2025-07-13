<x-layout.layout>
<x-slot:heading>
    Configure WhatsApp chatbot here
</x-slot:heading>
<h1 class="ml-2">
</h1>
<div class="flex flex-row m-2 h-[70vh] border border-gray-200 rounded-lg">
    <div class="w-1/6 bg-white flex flex-col justify-center border border-gray-200 rounded-l-lg p-2">
        <div class="h-1/6 flex justify-center p-5">
        </div>
        <div class="h-5/6 overflow-scroll">
            <h1 class="font-bold">Note:</h1>
            <h1>Template messages are the only type that can be sent outside of a 24h customer service window.</h1>
        </div>
    </div>
    <div class="w-4/6 flex justify-center bg-white p-2 border border-gray-200">
        <livewire:send-test-message/>
    </div>
    <div class="w-1/6 flex flex-col justify-center bg-white border border-gray-200 rounded-r-lg p-2 overflow-auto">
        <div class="h-1/6">
        </div>
        <div class="h-5/6">
            <h1 class="font-bold">Prices:</h1>
            <table class="border rounded-lg">
                <tr>
                    <th>Type</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td>Marketing</td>
                    <td>€0.1323</td>
                </tr>
                <tr>
                    <td>Utility</td>
                    <td>€0.0414</td>
                </tr>
                <tr>
                    <td>Authentication</td>
                    <td>€0.0414</td>
                </tr>
                <tr>
                    <td>Service</td>
                    <td>Free</td>
                </tr>
            </table>
        </div>
    </div>
</div>
</x-layout.layout>
