<x-app-layout>
    <div class="max-w-6xl mx-auto shadow p-3 mt-4 bg-white rounded">

        <form action="{{route('product.create')}}" method="POST">

            <table>

            </table>

            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-plus-circle"></i>
            </button>
        </form>

    </div>
@push('scripts')
    <!-- AQUI EST EL SCRIPT -->
        <script>
            let  salutation = 'hola';
        </script>
    @endpush
</x-app-layout>
