<x-app-layout>
    <div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">
        {{-- {{dd($collectionItem)}} --}}
        <x-form.header :action="'Create'" :model="'Product'"/>
        <form action="{{route('product.store')}}" method="POST">
            @csrf
            <div class="form-item-container my-2 p-2">
                <x-form.label for="name" :value="'Name'"/>
                <x-form.input-form id="name" class="block w-full" type="text" name="name" :itemName="'name'" :itemValue="''" :itemType="'text'" required autocomplete="current-password" autofocus/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="description" :value="'Description'"/>
                <x-form.text-area :itemId="'description'" :itemName="'description'" :itemValue="''"/>
            </div>
            <div>
                <x-form.label for="image_name" :value="'Image'"/>
                <x-form.input-form :itemType="'file'" :itemValue="''" :itemName="'image'" name="image_name" id="image_name" class="filepond block" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3" />
                
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="price" :value="'Price'"/>
                <x-form.input-form id="'price'" class="block w-full" name="price" :itemName="'price'" :itemValue="''" :itemType="'number'" required autocomplete="current-password" autofocus min="0" step="any"/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="brand" :value="'Brand'"/>
                {{-- {{dd($collectionItem)}} --}}
                <x-form.select-form :itemName="'brand'" :itemSaved="''" :collectionItem="$collectionItem"/>
            </div>

            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-paper-plane"></i> {{__('Send')}}
            </button>
        </form>

    </div>
@push('scripts')
    <!-- AQUI EST EL SCRIPT LLEGUE -->
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
                FilePond.create(
                document.querySelector('#image_name')
                );

                const pondBox = document.querySelector('.filepond--root');
                pondBox.addEventListener('FilePond:addfile', e => {
                        console.log('file added event', e.detail);
                        var fileName = e.detail.pond.getFile().filename;

                    document.querySelector('#image').value = fileName;

                    console.log(document.querySelector('#image_name'));

                    });



        </script>
    @endpush
</x-app-layout>
