<x-app-layout>
    <div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">
        {{-- {{dd($product)}} --}}
        <x-form.header :action="'Edit'" :model="'Product'"/>
        <form action="{{route('product.update', $product->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-item-container my-2 p-2">
                <x-form.label for="name" :value="'Name'"/>
                <x-form.input-form :itemName="'name'" :itemValue="$product->name" id="name" class="block w-full" type="text" name="name" required autofocus/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="description" :value="'Description'"/>
                <x-form.text-area :itemName="'description'" :itemValue="$product->description"/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="price" :value="'Price'"/>
                <x-form.input-form id="price" class="block w-full" type="number" name="price" :itemName="'price'" :itemValue="$product->price" required autocomplete="current-password" autofocus min="0" step="any"/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="brand" :value="'Brand'"/>
                <x-form.select-form :itemName="'brand'" :itemSaved="$brand" :collectionItem="$collectionItem" />
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
