<div>
    <input id="{{$itemName}}" type="file" name="{{$itemName}}" />
    {{$itemName}}
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

        <script>

            let files = 'esto: {{$fileName.' '.$fileUrl.' '.$fileSize.' '.$mimeType}}';

            console.log(typeof '{{$fileSize}}');


            console.log(files)
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.registerPlugin(FilePondPluginFilePoster);

            const input = document.querySelector('input[name="{{$itemName}}"]')

            if('{{$fileName}}'.length > 1){

                FilePond.create(input, {
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
            }

            else{

            FilePond.create(input, {
                storeAsFile: true,
                allowMultiple: false,
            });


            }

            

        </script>
    @endonce
@endpush
