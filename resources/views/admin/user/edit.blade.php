<x-app-layout>
    <div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">
        {{-- {{dd($user)}} --}}
        <x-form.header :action="'Edit'" :model="'User'"/>
        <form action="{{route('user.update', $user)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-item-container my-2 p-2">
                <x-form.label for="name" :value="'Name'"/>
                <x-form.input-form :itemName="'name'" :itemValue="$user->name" id="name" class="block w-full" :itemType="'text'" name="name" required autofocus/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="email" :value="'Email'"/>
                <x-form.input-form :itemName="'Email'" :itemValue="$user->email" id="email" class="block w-full" :itemType="'text'" name="email" required autofocus/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="password" :value="'Password'"/>
                <x-form.input-form :itemName="'password'" :itemValue="''" id="password" class="block w-full" :itemType="'password'" name="password" required autofocus/>
            </div>
            <div class="form-item-container my-2 p-2">
                <x-form.label for="password_confirmation" :value="'Password Confirmation'"/>
                <x-form.input-form :itemName="'password_confirmation'" :itemValue="''" id="password_confirmation" class="block w-full" :itemType="'password'" name="password_confirmation" required autofocus/>
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
