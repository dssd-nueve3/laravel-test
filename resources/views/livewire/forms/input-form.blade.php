<div>
    <input
        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2"
        type="{{ $itemType ? $itemType : 'text'}}"
        value="{{$itemValue ? $itemValue : ''}}"
        name="{{$itemName}}" {!! $attributes !!}
    >
</div>
