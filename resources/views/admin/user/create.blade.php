<x-app-layout>
<div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">
    <livewire:forms.header :action="'Create'" :model="'User'"/>
    <form action="{{route('user.store')}}" method="post">
        @csrf
        <div class="form-item-container my-2 p-2">
            <livewire:forms.label for="name" :value="'Name'"/>
            <livewire:forms.input-form id="name" :itemType="'text'" name="name" :itemName="'name'" :itemValue="''" 
            :bladeAttributes="['class' => 'block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2',
                'required' => 'required',
                'autofocus' => 'autofocus'
                ]"/>
        </div>
        <div class="form-item-container my-2 p-2">
            <livewire:forms.label for="email" :value="'Email'"/>
            <livewire:forms.input-form id="email" :itemType="'text'" name="email" :itemName="'email'" :itemValue="''"
            :bladeAttributes="['class' => 'block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2',
                'required' => 'required',
                'autofocus' => 'autofocus'
                ]" />
        </div>
        <div class="form-item-container my-2 p-2">
            <livewire:forms.label for="password" :value="'Password'"/>
            <livewire:forms.input-form name="password" :itemName="'password'" :itemType="'password'" :itemValue="''" 
            :bladeAttributes="['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2',
                'required' => 'required',
                'autofocus' => 'autofocus'
                ]"/>
        </div>
        <div class="form-item-container my-2 p-2">
            <livewire:forms.label for="password_confirmation" :value="'Password Confirmation'"/>
            <livewire:forms.input-form :itemName="'password_confirmation'" :itemType="'password'" :itemValue="''" 
            :bladeAttributes="['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2',
                'required' => 'required',
                'autofocus' => 'autofocus'
                ]"/>
        </div>
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-paper-plane"></i> {{__('Send')}}
        </button>
    </form>

</div>
</x-app-layout>
