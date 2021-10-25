<x-app-layout>
    <div class="max-w-6xl mx-auto p-3 mt-4">
        {{--CREATE NET ITEM--}}
        <a href="/product/create" title="Create a product" class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 my-4 rounded">
            <i class="fas fa-plus-circle"></i> {{__('New')}}
        </a>
        {{-- TABLE ITEMS LIST--}}
        <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse">
                <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        {{__('Name')}}
                    </th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        {{__('Description')}}
                    </th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        {{__('Image')}}
                    </th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        {{__('Image2')}}
                    </th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        {{__('Price')}}
                    </th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        {{__('Brand')}}
                    </th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light" colspan="2">
                    </th>
                </tr>
                </thead>
                {{--SHOW ITEMS--}}
                <tbody>
                   {{-- {{dd($products);}}  --}}
                @foreach($products as $product)
                    <tr>
                        <td class="py-4 px-6 border-b border-grey-light">
                            {{$product->name}}
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            {!!  $product->description !!}
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            @foreach($product->getMedia('product_image') as $image)
                                  <img src=" {{$image->getUrl('thumb')}}" alt="" width="80">
                            @endforeach

                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            @foreach($product->getMedia('product_gallery') as $image)
                                  <img src=" {{$image->getUrl('thumb')}}" alt="" width="80">
                            @endforeach

                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            {{'$' . $product->price}}
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            {{$product->brand->name}}
                        </td>
                        {{--CRUD ITEMS--}}
                        <td>
                            <a class="bg-green-400 hover:bg-green-600 text-white  rounded p-2 " href="/product/{{$product->id}}/edit"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold  p-2 rounded">
                                    <i class="fas fa-trash text-success"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $products->links()}}
    </div>
    @push('scripts')
    @endpush
</x-app-layout>

