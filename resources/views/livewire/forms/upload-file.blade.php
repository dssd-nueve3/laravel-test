{{--
    UPLOAD COMPONENT BLADE
    require vars
    :itemName - use as id and name of the component.
    :bgDropArea - use only value in first component

 --}}


 <div     
    
    //TODO: Ignore Filepond plugin structure
    wire:ignore
    
    //TODO: var needed to use Alpine
    x-data= "{pond: null}"
    
    //TODO: instanciate Filepond Element, without overring previous instances 
    x-init=" () => {
                        FilePond.registerPlugin(FilePondPluginFileValidateType);
                        FilePond.registerPlugin(FilePondPluginFileValidateSize);
                        FilePond.registerPlugin(FilePondPluginImagePreview);
                        FilePond.registerPlugin(FilePondPluginFilePoster);
                        pond = FilePond.create($refs.input);
                        pond.setOptions({
                        labelIdle: 'Arratre sus archivos aqui',
                        server: {
                            /*url: '/upload/{{$itemName}}',*/
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            /*url:'laravel-test.test',*/
                            process: '/upload/{{$itemName}}',
                            load: {
                                url:'/load/{wire:model}',
                                options: {
                                    type: 'local',
                                    metadata: {
                                        //poster: files[collectionFiles][collectionFile].original_url,
                                    },
            
                                },
                                    
                            },
                            revert: './revert',
                            restore: './restore/',
                            fetch: './fetch/'
                        },
                        allowMultiple: true,
                    });

}"
>
    <input type="file" x-ref="input" data-idElement={{$itemName}} data-folder={{$temporaryFolder}} data-collectionName="{{$collectionName}}" id="{{$itemName}}" class="{{$itemName}}"  name="{{$itemName}}[]" accept="{{$acceptedMimes}}" {{$multiple ? 'multiple' : ''}} data-max-files="{{ $maxUploadFiles > 1 ? $maxUploadFiles : 1}}"/>
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
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
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
            /*if(getImageDirectoryByFullURL(url) == 'edit') {
                files = (filesUploaded == '') ? null : JSON.parse(filesUploaded);

            }*/

            //createFilePondElements(input, files);

            function createFilePondElements(collectionElements, files) {

                console.log("files: ");
                console.log(files);

                //files = (typeof {!! $uploadedFiles !!} !== 'undefined') ? {!! $uploadedFiles !!} : null;


                let numberCollections = !files ? 0 : Object.keys(files).length;
                let filesPoster = [];
                let elements = [];

                console.log("numero de collecciones:");
                console.log(numberCollections);

                if(numberCollections > 0){

                    filesPoster = prepareCollectionFiles(files);
                    console.log("imagenes guardadas: ");
                    console.log(filesPoster);

                }

                FilePond.create(pond, {
                                allowMultiple: true,
                                files:filesPoster[fileCollectionName],
                                filePosterMinHeight: 100,
                                filePosterMaxHeight: 150,
                                filePosterHeight: 150,
                            }
                        );

                    for (let element of collectionElements) {

                    let fileCollectionName = element.dataset.collectionname;
                    let idElement = element.dataset.idelement;
                    let collectionLength = 0;

                    if(Array.isArray(filesPoster[fileCollectionName])){

                        collectionLength = filesPoster[fileCollectionName].length;

                    }

                    if(collectionLength > 0){

                        console.log("llegue aca");
                        console.log(collectionLength);

                        FilePond.create(pond, {
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

                    //console.log(files[collectionFiles][collectionFile]);
                    //console.log(files[collectionFiles][collectionFile].original_url);

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

