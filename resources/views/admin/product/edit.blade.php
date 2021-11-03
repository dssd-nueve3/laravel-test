<x-app-layout>
    <div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">
        {{-- {{dd($product)}} --}}
        <livewire:forms.header :action="'Edit'" :model="'Product'" :element_type="'h2'"/>
        <form enctype="multipart/form-data" action="{{route('product.update', $product)}}" method="POST" >
            @csrf
            @method('PUT')
            {{--INPUT--}}
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="name" :value="'Name'"/>
                <livewire:forms.input-form :itemName="'name'" :itemValue="$product->name" id="name" class="block w-full" :itemType="'text'" name="name" required autofocus :bladeAttributes="[
                'class' => 'block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2'
                ]" />
            </div>
            {{--TEXAREA--}}
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="description-{{$product->id}}" :value="'Description'"/>
                <livewire:forms.text-area
                    :itemId="'description-'.$product->id"
                    :itemName="'description'"
                    :itemValue="$product->description"/>
            </div>
            {{-- UPLOAD FILE image --}}
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="image" :value="'Image'"/>
                <livewire:forms.upload-file
                    :itemName="'image'"
                    :collectionName="'product_image'"
                    :acceptedFiles="'image/jpeg,image/jpeg,application/pdf,image/png'"
                    :multiple="true"
                    :maxUploadFiles="'1'"
                     wire:model="product"
                    :bgDropArea="'rgba(0,0,0,0.6)'"/>
            </div>
            {{-- UPLOAD FILE pdf --}}
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="image2" :value="'Image2'"/>
                <livewire:forms.upload-file
                    :itemName="'image2'"
                    :collectionName="'product_gallery'"
                    :acceptedFiles="'image/jpeg,image/jpeg,application/pdf,image/png'"
                    :multiple="true"
                    :maxUploadFiles="'3'"
                    wire:model="product"
                    :bgDropArea="'red'"
                />

            </div>
            {{--INPUT--}}
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="price" :value="'Price'"/>
                <livewire:forms.input-form id="price"
                                           name="price"
                                           :itemName="'price'"
                                           :itemValue="$product->price"
                                           :itemType="'number'"
                                           required autocomplete="current-password"
                                           autofocus
                                           :bladeAttributes="[
                    'class' => 'block w-full
                    border-gray-300
                    focus:border-indigo-300
                    focus:ring
                    focus:ring-indigo-200
                    focus:ring-opacity-50
                    rounded-md
                    shadow-sm
                    my-2',
                    'min' => '0',
                    'step' => '0.01'
                    ]" />
            </div>
            {{--SELECT--}}
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="brand" :value="'Brand'"/>
                <livewire:forms.select-form :itemName="'brand'" :itemSaved="$product->brand" :collectionItem="$collectionItem" />
            </div>

            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-paper-plane"></i> {{__('Update')}}
            </button>
        </form>

    </div>
@push('scripts')
    <!-- AQUI EST EL SCRIPT -->
        <script>

        </script>
    @endpush
</x-app-layout>
