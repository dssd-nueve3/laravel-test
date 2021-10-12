<div>
    <select name="{{$itemName}}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
        <option value="0">Select one</option>
    @foreach ($collectionItem as $itemOption)
       <option value="{{$itemOption->id}}" @if($itemOption->id == ($itemSaved ? $itemSaved->id : 0)) selected @endif>{{$itemOption->name}}</option>
    @endforeach
    </select>
    @error($itemName)
    <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>
