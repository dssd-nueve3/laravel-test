<x-app-layout>
    <div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">
        {{-- {{dd($collectionItem)}} --}}
        {{-- <x-form.header :action="'Create'" :model="'Product'"/> --}}
        <livewire:forms.header :action="'Create'" :model="'Product'"/>
        <form enctype="multipart/form-data" action="{{route('product.store')}}" method="POST">
            @csrf
            <div class="form-item-container my-2 p-2">
                <x-form.label for="name" :value="'Name'"/>
                {{-- <x-form.input-form id="name" class="block w-full" :itemName="'name'" :itemValue="''" :itemType="'text'" required autocomplete="current-password" autofocus/> --}}
                <livewire:forms.input-form id="name" class="block w-full" :itemName="'name'" :itemValue="''" :itemType="'text'" required autocomplete="current-password" autofocus/>

            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="description" :value="'Description'"/>
                <x-form.text-area :itemId="'description'" :itemName="'description'" :itemValue="''"/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="otro" :value="'Otro'"/>
                <livewire:forms.upload-file name="image" wire:model="Product" :model="'Product'" />
                {{-- <input type="file" name="image"> --}}
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
</x-app-layout>
