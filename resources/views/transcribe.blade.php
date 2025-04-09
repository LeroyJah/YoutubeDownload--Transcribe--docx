<x-layout.layout>
<x-slot:heading>
    Transcribe your youtube videos here
</x-slot:heading>
<h1>
    Welcome to the Transcribe Page
</h1>
<div class="flex flex-row m-2 h-96 border rounded-lg">
    <div class="w-1/6 bg-white flex flex-col justify-center border rounded-l-lg">
        <div class="h-1/3 flex justify-center">
            Upload videos here:
        </div>
        <div class="h-2/3 flex justify-center overflow-scroll">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="fileUpload" id="fileUpload">
                <x-file-upload.button type="submit">Upload</x-file-upload.button>
            </form>
        </div>
    </div>
    <div class="w-4/6 flex justify-center bg-white p-2 border">
        <x-file-upload.button>Whisper</x-file-upload.button>
    </div>
    <div class="w-1/6  flex justify-center bg-white border rounded-r-lg">
        Retrieve .docx here:
    </div>
</div>
</x-layout.layout>