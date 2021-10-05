<x-app-layout>
    <div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">

        <x-form.header :action="'Create'" :model="'Product'"/>
        <form action="{{route('product.store')}}" method="POST">
            @csrf
            <div class="form-item-container my-2 p-2">
                <x-form.label for="name" :value="'Name'"/>
                <x-form.input-form id="name" class="block w-full" type="text" name="name" :itemName="'name'" :itemValue="''" required autocomplete="current-password" autofocus/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="description" :value="'Description'"/>
                <x-form.text-area :itemName="'description'" :itemValue="''"/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="price" :value="'Price'"/>
                <x-form.input-form id="price" class="block w-full" type="number" name="price" :itemName="'price'" :itemValue="''" required autocomplete="current-password" autofocus min="0" step="any"/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="brand" :value="'Brand'"/>
                <select name="brand" id="brand" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="0">{{__('Select one')}}</option>
                    @foreach(\App\Models\Brand::all() as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
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
