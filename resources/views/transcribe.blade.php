<x-layout.layout>
<x-slot:heading>
    Transcribe your youtube videos here
</x-slot:heading>
<h1>
    Welcome to the Transcribe Page
</h1>
<div class="flex flex-row m-2 h-96">
    <div class="w-1/6 border bg-white">Upload videos here:
        <div>
            {{"hello world"}}
        </div>
    </div>
    <div class="w-4/6 flex justify-center bg-white rounded p-2 border">
        <x-file-upload.button>Whisper</x-file-upload.button>
    </div>
    <div class="w-1/6 bg-white border">
        Retrieve .docx here:
    </div>
</div>
</x-layout.layout>