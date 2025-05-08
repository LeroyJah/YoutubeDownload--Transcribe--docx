<x-layout.layout>
<x-slot:heading>
    Download your Youtube videos here
</x-slot:heading>
<h1 class="ml-2">
</h1>
<div class="flex flex-row m-2 h-[70vh] border border-gray-200 rounded-lg">
    <div class="w-1/6 bg-white flex flex-col justify-center border border-gray-200 rounded-l-lg p-2">
        <div class="h-1/3 flex justify-center p-5">
            <div clas="m-2">
                <form class="border rounded-xl" action="">
                    <input class="border m-2 w-40 pl-2" type="text" placeholder="input link">
                    <livewire:radio>
                </form>
            </div>
        </div>
        <div class="h-2/3 overflow-scroll">
        </div>
    </div>
    <div class="w-4/6 flex justify-center bg-white p-2 border border-gray-200">
        <div class="overflow-auto">
        </div>
    </div>
    <div class="w-1/6 flex flex-col justify-center bg-white border border-gray-200 rounded-r-lg p-2 overflow-auto">
        <div class="h-1/6">
        </div>
        <div class="h-5/6">
        </div>
    </div>
</div>
</x-layout.layout>