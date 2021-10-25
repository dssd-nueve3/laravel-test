<x-app-layout>
    <div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">
        <livewire:forms.header :action="'Create'" :model="'Product'" :element_type="'h6'"/>
        <form enctype="multipart/form-data" action="{{route('product.store')}}" method="POST">
            @csrf
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="name" :value="'Name'"/>
                <livewire:forms.input-form id="name" wire:model="input" :itemName="'name'" :itemValue="''" :itemType="'text'" required autocomplete="current-password" autofocus :bladeAttributes="[]" />
            </div>
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="description" :value="'Description'"/>
                <livewire:forms.text-area :itemId="'description'" :itemName="'description'" :itemValue="''"/>
            </div>
            <div class="form-item-container my-2 p-2">

                <livewire:forms.label for="image" :value="'Image'"/>

                <livewire:forms.upload-file :itemName="'image'"
                                            :model="'Product'"
                                            :collectionName="'product_image'"
                                            :acceptedFiles="'.pdf,.png,.jpg,.jpeg'"
                                            :multiple="false"
                                            :maxUploadFiles="'3'"/>
            </div>
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="image2" :value="'Image2'"/>

                <livewire:forms.upload-file :itemName="'image2'"
                                            :model="'Product'"
                                            :collectionName="'product_gallery'"
                                            :acceptedFiles="'.pdf,.png,.jpg,.jpeg'"
                                            :multiple="true"
                                            :maxUploadFiles="'3'"/>
            </div>
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="price" :value="'Price'"/>
                <livewire:forms.input-form id="'price'" :itemName="'price'" :itemValue="''" :itemType="'number'" required autocomplete="current-password" autofocus :bladeAttributes="['min' => '0','step' => '0.01',]" />
            </div>
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="brand" :value="'Brand'"/>
                <livewire:forms.select-form :itemName="'brand'" :itemSaved="''" :collectionItem="$collectionItem"/>
            </div>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-paper-plane"></i> {{__('Send')}}
            </button>
        </form>
    </div>
</x-app-layout>
