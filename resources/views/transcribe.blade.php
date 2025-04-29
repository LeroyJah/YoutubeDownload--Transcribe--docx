<x-layout.layout>
<x-slot:heading>
    Transcribe your youtube videos here
</x-slot:heading>
<h1 class="ml-2">
    Max file upload size 20mb:
</h1>
<div class="flex flex-row m-2 h-[70vh] border border-gray-200 rounded-lg">
    <div class="w-1/6 bg-white flex flex-col justify-center border border-gray-200 rounded-l-lg p-2">
        <div class="h-1/3 flex justify-center">
            Upload videos here:
        </div>
        <div class="h-2/3 overflow-scroll">
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
        <div class="overflow-auto">
            @foreach($files as $file)
            <ul>
                <li class="flex flex-row p-2">
                <livewire:loading :$file :key="{{ $file->getFilename(); }}">
                    <form action="/deletefile" method="post">
                        @csrf
                        {{ $file->getFilename(); }}
                        <input type="hidden" name="path" value="{{ 'files/'.$file->getFilename(); }}">
                        <button class="border border-red-400 rounded bg-red-300 hover:bg-red-500 text-white px-1">Delete</button>
                    </form>
                </li>
            </ul>
            @endforeach
        </div>
    </div>
    <div class="w-1/6 flex flex-col justify-center bg-white border border-gray-200 rounded-r-lg p-2 overflow-auto">
        <div class="h-1/3">
            <h1>Retrieve .docx here:</h1>
        </div>
        <div class="h-2/3">
        @foreach($docs as $doc)
        <ul>
            <li>
                <form action="/download" method="post">
                    @csrf
                    {{ $doc->getFilename(); }}
                    <input type="hidden" name="path" value="{{ $doc->getFilename(); }}">
                    <button class="border border-green-400 rounded bg-green-400 hover:bg-green-600 text-white px-1 w-1/2">Download</button>
                </form>
                <form action="/deletefile" method="post">
                        @csrf
                        <input type="hidden" name="path" value="{{ 'transcript/'.$doc->getFilename(); }}">
                        <button class="border border-red-400 rounded bg-red-300 hover:bg-red-500 text-white px-1 w-1/2">Delete</button>
                    </form>
            </li>
        </ul>
        @endforeach
        </div>
    </div>
</div>
@if(isset($transcribe))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ $transcribe }}
    </div>
@endif
</x-layout.layout>