<div>

    <input type="file" />

</div>

@push('styles')
    @once
        <link rel="stylesheet" href="{{asset('/vendor/filepond/dist/filepond.css')}}">
        <link rel="stylesheet" href="{{asset('/vendor/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css')}}">
    @endonce
@endpush

@push('scripts')
    @once
        <script src="{{asset('vendor/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js')}}"></script>
        <script src="{{asset('vendor/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js')}}"></script>
        <script src="{{asset('vendor/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js')}}"></script>
        <script src="{{asset('vendor/filepond/dist/filepond.js')}}"></script>
        <script>
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImagePreview);
        </script>
    @endonce
@endpush
