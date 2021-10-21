<div>
    <input id="{{$itemName}}" class="{{$itemName}}" type="file" name="{{$itemName}}" accept="{{$acceptedMimes}}"/>
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


            let files = 'esto: {{$fileName.' '.$fileUrl.' '.$fileSize.' '.$mimeType}}';

            console.log(typeof '{{$fileSize}}');


            console.log(files)

            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.registerPlugin(FilePondPluginFilePoster);

            let input = $("[id^=image]"); // get elements not element

            console.log(input.length);

            createFilePondElements(input);

            function createFilePondElements(collection) {

                for (let element of collection) {

                    if ('{{$fileName}}'.length > 1) {

                        FilePond.create(element, {
                                storeAsFile: true,
                                files: [
                                    {
                                        // the server file reference

                                        // set type to local to indicate an already uploaded file
                                        options: {
                                            type: 'local',

                                            // optional stub file information
                                            file: {
                                                name: '{{$fileName}}',
                                                size: '{{$fileSize}}',
                                                type: '{{$mimeType}}',
                                            },

                                            // pass poster property
                                            metadata: {
                                                poster: '{{$fileUrl}}',
                                            },
                                        },
                                    },
                                ],
                                filePosterMinHeight: 100,
                                filePosterMaxHeight: 150,
                                filePosterHeight: 150,
                            }
                        );
                    } else {

                        FilePond.create(element, {
                            storeAsFile: true,
                            allowMultiple: false,
                        });

                    }
                }

            }

        </script>
    @endonce
@endpush
