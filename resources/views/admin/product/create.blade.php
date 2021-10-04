<x-app-layout>
    <div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">

        <x-form.header :action="'Create'" :model="'Product'"/>
        <form action="{{route('product.store')}}" method="POST">
            @csrf
            <div class="form-item-container my-2 p-2">
                <x-form.label for="name" :value="'Name'"/>
                <x-form.input-form id="name" class="block w-full" type="text" name="name" :itemName="'name'" required autocomplete="current-password" autofocus/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="description" :value="'Description'"/>
                <x-form.text-area name="description" :textArea="''"/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="price" :value="'Price'"/>
                <x-form.input-form id="price" class="block w-full" type="number" name="price" :itemName="'price'" required autocomplete="current-password" autofocus min="0"/>
            </div>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-paper-plane"></i> {{__('Send')}}
            </button>
        </form>

    </div>
@push('scripts')
    <!-- AQUI EST EL SCRIPT -->
        <script>

        </script>
    @endpush
</x-app-layout>
