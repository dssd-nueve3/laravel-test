<x-app-layout>
    <div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">
        {{-- {{dd($user)}} --}}
        <livewire:forms.header :action="'Edit'" :model="'User'" :type="'h2'"/>
        <form action="{{route('user.update', $user)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="name" :value="'Name'"/>
                <livewire:forms.input-form :itemName="'name'" :itemValue="$user->name" id="name" :itemType="'text'" name="name" :bladeAttributes="['class' => ' block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2',
                    'required' => 'required',
                    'autofocus' => 'autofocus'
                    ]"/>
            </div>
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="email" :value="'Email'"/>
                <livewire:forms.input-form :itemName="'Email'" :itemValue="$user->email" id="email" :itemType="'text'" name="email" :bladeAttributes="['class' => ' block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2',
                    'required' => 'required',
                    'autofocus' => 'autofocus'
                    ]"/>
            </div>
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="password" :value="'Password'"/>
                <livewire:forms.input-form :itemName="'password'" :itemValue="''" id="password" :itemType="'password'" :bladeAttributes="['class' => ' border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2',
                    'required' => 'required',
                    'autofocus' => 'autofocus'
                    ]"/>
            </div>
            <div class="form-item-container my-2 p-2">
                <livewire:forms.label for="password_confirmation" :value="'Password Confirmation'"/>
                <livewire:forms.input-form :itemName="'password_confirmation'" :itemValue="''" id="password_confirmation" :itemType="'password'" :bladeAttributes="['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2',
                    'required' => 'required',
                    'autofocus' => 'autofocus'
                    ]"/>
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
