<div>
    @props(['disabled' => false])
    <input type="{{ $itemType ? $itemType : 'text'}}" value="{{$itemValue ? $itemValue : ''}}"  {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-2']) !!}>
    @error($itemName)
    <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>
