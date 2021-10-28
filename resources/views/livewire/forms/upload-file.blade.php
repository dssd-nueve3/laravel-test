{{--
    UPLOAD COMPONENT BLADE
    require vars
    :itemName - use as id and name of the component.
    :bgDropArea - use only value in first component



    TODO:

 --}}
<div wire:ignore>
    <input wire:model="{{$model}}" data-collectionName="{{$collectionName}}" id="{{$itemName}}" class="{{$itemName}}" type="file" name="{{$itemName}}[]" accept="{{$acceptedMimes}}" {{$multiple ? 'multiple' : ''}} data-max-files="{{ $maxUploadFiles > 1 ? $maxUploadFiles : 1}}"/>
    <input type="text" name="{{$itemName}}_collectionName" value="{{$collectionName}}" hidden>
    @error($itemName)
    <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>
@push('styles')
    @once
        <link rel="stylesheet" href="{{asset('/vendor/filepond/dist/filepond.css')}}">
        <link rel="stylesheet" href="{{asset('/vendor/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css')}}">
        <link rel="stylesheet" href="{{asset('/vendor/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css')}}">
    <style>
        /* the background color of the filepond drop area */
        .filepond--panel-root {
        background-color: {{$bgDropArea}};
        }
    </style>
    @endonce
@endpush

@push('scripts')
    @once
        <script src="{{asset('vendor/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js')}}">
        </script>
        <script src="{{asset('vendor/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js')}}"></script>
        <script src="{{asset('vendor/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js')}}"></script>
        <script src="{{asset('vendor/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js')}}"></script>
        <script src="{{asset('vendor/filepond/dist/filepond.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            // PLUGIN VARS
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.registerPlugin(FilePondPluginFilePoster);

            // COMPONENT VARS
            let input = $("[id^={{$itemName}}]");

            let url = window.location.href;
            let newUrl = "";
            let filesUploaded = JSON.stringify({!! $uploadedFiles !!});
            let files = '';

            // TODO: crear Poster únicamente cuando en edit;


            if(getImageDirectoryByFullURL(url) == 'edit') {
                files = (filesUploaded == '') ? null : JSON.parse(filesUploaded);

            }

            createFilePondElements(input, files);

            function createFilePondElements(collectionElements, files) {

                //files = (typeof {!! $uploadedFiles !!} !== 'undefined') ? {!! $uploadedFiles !!} : null;


                let numberFiles = !files ? 0 : Object.keys(files).length;
                let filesPoster = [];

                console.log("numero de archivos:");
                console.log(numberFiles);

                if(numberFiles > 0){

                    filesPoster = prepareCollectionFiles(files);
                    console.log(filesPoster);

                }

                    for (let element of collectionElements) {

                    let fileCollectionName = element.dataset.collectionname;
                    let collectionLength = 0;

                    if(Array.isArray(filesPoster[fileCollectionName])){

                        collectionLength = filesPoster[fileCollectionName].length;

                    }

                    if(collectionLength > 0){

                        FilePond.create(element, {
                                allowMultiple: true,
                                files:filesPoster[fileCollectionName],
                                filePosterMinHeight: 100,
                                filePosterMaxHeight: 150,
                                filePosterHeight: 150,
                            }
                        );

                        console.log("llegue");

                        document.addEventListener('FilePond:removefile', (e) => {

                            console.log("element deleted");
                            console.log(e.detail.file.filename);

                        });

                    }

                    else {

                        FilePond.create(element, {
                            storeAsFile: true,
                            allowMultiple: true,
                        });

                        document.addEventListener('FilePond:removefile', (e) => {
                            console.log("element deleted");
                            console.log(e.detail.file.filename);
                            });

                        document.addEventListener('FilePond:addfile', (e) => {
                            console.log("element added");
                            console.log(e.detail.file.filename);
                        });


                    }

                    }

                }


            function getImageDirectoryByFullURL(url){
                url = url.split('/');
                url = url.pop();
                return url;
            }

            function prepareCollectionFiles(files){

                let preparedFiles = [];

                for( let collectionFiles in files){

                for( let collectionFile in files[collectionFiles]){

                    console.log(files[collectionFiles][collectionFile]);
                    console.log(files[collectionFiles][collectionFile].original_url);

                    let file =  {options: {
                        type: 'local',
                        file: {
                            name: files[collectionFiles][collectionFile].name,
                            size: files[collectionFiles][collectionFile].size,
                            type: '.' + files[collectionFiles][collectionFile].extension,
                        },
                        metadata: {
                            poster: files[collectionFiles][collectionFile].original_url,
                        },

                    }};

                if(!Array.isArray(preparedFiles[collectionFiles])){

                    console.log("no es arreglo");
                    preparedFiles[collectionFiles] = [];
                }

                preparedFiles[collectionFiles].push(file);

                }

                }

                return preparedFiles;

            }

        </script>
    @endonce
@endpush
