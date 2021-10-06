<x-app-layout>
<div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">
    <x-form.header :action="'Create'" :model="'User'"/>
    <form action="{{route('user.store')}}" method="post">
        @csrf
        <div class="form-item-container my-2 p-2">
            <x-form.label for="name" :value="'Name'"/>
            <x-form.input-form id="name" :itemType="'text'" class="block w-full" name="name" :itemName="'name'" :itemValue="''" required autofocus />
        </div>
        <div class="form-item-container my-2 p-2">
            <x-form.label for="email" :value="'Email'"/>
            <x-form.input-form id="email" :itemType="'text'" class="block w-full" name="email" :itemName="'email'" :itemValue="''" required autofocus />
        </div>
        <div class="form-item-container my-2 p-2">
            <x-form.label for="password" :value="'Password'"/>
            <x-form.input-form name="password" :itemName="'password'" :itemType="'password'" :itemValue="''" required autofocus/>
        </div>
        <div class="form-item-container my-2 p-2">
            <x-form.label for="password_confirmation" :value="'Password Confirmation'"/>
            <x-form.input-form name="password_confirmation" :itemName="'password_confirmation'" :itemType="'password'" :itemValue="''" required autofocus/>
        </div>
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-paper-plane"></i> {{__('Send')}}
        </button>
    </form>

</div>
</x-app-layout>
