<div>

    {{$imageSaved = ''}}
    {{$fileOptions = ''}}

    @if($itemSaved)

    @foreach($itemSaved->getMedia('product_image') as $image)
    {{$imageSaved = $image->getUrl()}}
    @endforeach
    @endif



    <input type="file" name="{{$itemName}}" }}" />
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
    FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImagePreview);

            const input = document.querySelector('input[name="{{$itemName}}"]')
            let imageSaved = '{{$imageSaved}}';

            if(imageSaved){

                FilePond.create(input, {
                storeAsFile: true,
                    files: [{
                    source: '{{ $imageSaved }}',
                    options: {
                        type: 'local'
                    }
                }] 
            });
            }

            else{
                
                FilePond.create(input, {
                storeAsFile: true
            });
            }

</script>
@endonce
@endpush