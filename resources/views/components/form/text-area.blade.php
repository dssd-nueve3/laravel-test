<div>
    <textarea id="{{$itemId}}" name="{{$itemName}}" class="block w-full py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
        {!! $itemValue ? $itemValue : '' !!}
    </textarea>
    @error($itemName)
    <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>
@push('scripts')
    <!-- CKEDITOR -->
    <script src="{{asset('vendor/ckeditor5/build/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#{{$itemId}}'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
