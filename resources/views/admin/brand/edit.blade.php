<x-app-layout>
    <div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">
        {{-- {{dd($user)}} --}}
        <x-form.header :action="'Edit'" :model="'Brand'"/>
        <form action="{{route('brand.update', $brand)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="name" :value="'Name'"/>
                <livewire:forms.input-form id="name" :itemType="'text'" name="name" :itemName="'name'" :itemValue="$brand->name" required autofocus
                :bladeAttributes="[ 'class' => 'block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2',
                                    'required' => 'required',
                                    'autofocus' => 'autofocus']"    
                />
            </div>
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="description" :value="'Description'"/>
                <livewire:forms.text-area :itemId="'description'" :itemName="'description'" :itemValue="$brand->description"/>
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
