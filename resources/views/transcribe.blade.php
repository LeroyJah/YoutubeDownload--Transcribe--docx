<x-layout.layout>
<x-slot:heading>
    Transcribe your youtube videos here
</x-slot:heading>
<h1>
    Welcome to the Transcribe Page
</h1>
<div class="flex flex-row m-2 h-96 border border-gray-200 rounded-lg">
    <div class="w-1/6 bg-white flex flex-col justify-center border border-gray-200 rounded-l-lg">
        <div class="h-1/3 flex justify-center">
            Upload videos here:
        </div>
        <div class="h-2/3 overflow-scroll p-2">
            <form action="/savefile" method="post" enctype="multipart/form-data">
                @csrf
                <input class="border border-gray-300 hover:bg-gray-300 p-1 rounded" type="file" name="uploadedFile" id="fileUpload">
                <x-file-upload.button class="my-2" type="submit">Upload</x-file-upload.button>
            </form>
            <div>
                @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(isset($status))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ $status }}
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="w-4/6 flex justify-center bg-white p-2 border border-gray-200">
        <div>
            <x-file-upload.button>Whisper</x-file-upload.button>
        </div>
        <div class="overflow-auto">
            @foreach($files as $file)
            <ul>
                <li>
                    <form action="/deletefile" method="post">
                        @csrf
                        {{ $file->getFilename(); }}
                        <input type="hidden" name="path" value="{{ $file->getFilename(); }}">
                        <button class="border border-red-400 rounded bg-red-300 hover:bg-red-500 text-white px-1" type="submit">Delete</button>
                    </form>
                </li>
            </ul>
            @endforeach
        </div>
    </div>
    <div class="w-1/6  flex justify-center bg-white border border-gray-200 rounded-r-lg">
        Retrieve .docx here:
    </div>
</div>
</x-layout.layout>