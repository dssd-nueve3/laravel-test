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
    @endonce
@endpush

@push('scripts')
    @once
        <script src="{{asset('vendor/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js')}}">
        </script>
        <script src="{{asset('vendor/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js')}}"></script>
        <script src="{{asset('vendor/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js')}}">
        </script>
        <script src="{{asset('vendor/filepond/dist/filepond.js')}}"></script>

        <script>

            let files = 'esto: {{$fileName.' '.$fileUrl}}';


            console.log(files)
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImagePreview);

            const input = document.querySelector('input[name="{{$itemName}}"]')

            FilePond.create(input, {
                storeAsFile: true,
                allowMultiple: false,
            });




        </script>
    @endonce
@endpush
