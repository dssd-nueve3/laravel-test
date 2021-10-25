<div>
    <input id="{{$itemName}}" class="{{$itemName}}" type="file" name="{{$itemName}}[]" accept="{{$acceptedMimes}}" {{$multiple ? 'multiple' : ''}} data-max-files="{{ $maxUploadFiles > 1 ? $maxUploadFiles : 1}}"/>
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
        
        let files = '{!!$uploadedFiles!!}'.length > 0 ? JSON.parse('{!!$uploadedFiles!!}') : false;
            //let files = 'esto: {{$fileName.' '.$fileUrl.' '.$fileSize.' '.$mimeType}}';
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.registerPlugin(FilePondPluginFilePoster);

            let input = $("[id^=image]"); // get elements not element

            createFilePondElements(input, files);

            function createFilePondElements(collectionElements, files) {

                let filesNumber = !files ? 0 : Object.keys(files).length;

                let filesPoster = [];

                for(let fileUploaded in files){

                //let collectionName = files[fileUploaded].collectionName;

                let file =  {options: {
                        type: 'local',
                        file: {
                                    name: files[fileUploaded].fileName,
                                    size: files[fileUploaded].fileSize,
                                    type: files[fileUploaded].mimeType,
                                },

                        metadata: {
                                    poster: files[fileUploaded].fileUrl,
                                },

                    }};

                    filesPoster.push(file);

                }

                for (let element of collectionElements) {

                    //console.log(element);

                    //console.log($('input[name="{{$itemName}}_collectionName"]').val());

                    if (filesNumber >= 1) {


                        FilePond.create(element, {
                                storeAsFile: true,
                                allowMultiple: true,
                                files:filesPoster,
                                filePosterMinHeight: 100,
                                filePosterMaxHeight: 150,
                                filePosterHeight: 150,
                            }
                        );
                    } else {

                        FilePond.create(element, {
                            storeAsFile: true,
                            allowMultiple: true,
                        });

                    }
                }

            }

        </script>
    @endonce
@endpush
