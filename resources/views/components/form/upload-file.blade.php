<div>
    <input id="{{$itemId}}" type="file" name="{{$itemName}}">
</div>
@push('scripts')
    <script src="{{asset('vendor/filepond/dist/filepond.js')}}"></script>
    <script src="{{asset('vendor/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js')}}"></script>
    <script src="{{asset('vendor/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js')}}"></script>
    <script src="{{asset('vendor/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js')}}"></script>
    <script src="{{asset('vendor/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js')}}"></script>

    <script>

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            FilePondPluginImageEdit
        );

        // Select the file input and use
        // create() to turn it into a pond

        let myInput{{$itemId}}  = document.querySelector('#{{$itemId}}')
        FilePond.create(
          myInput{{$itemId}}
        );

        myInput{{$itemId}}.addEventListener('FilePond:addfile', e => {
            console.log('file added event', e.detail);
            var fileName = e.detail.pond.getFile().name;
            console.log('este es mi file - ' + fileName);
        });


    </script>
@endpush
