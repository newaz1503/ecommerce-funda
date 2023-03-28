
@extends('front.layouts.app')

@section('title', 'Wishlist')

@push('css')

@endpush

@section('content')

    <section id="wishlist">
        <div class="container-fluid">
            <h1 class="title mb-3">My Favourite List</h1>
            <div class="row pt-2">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="left_sidebar">
                        <div class="category">
                            <h3 class="wishlist_categoey_title">Product Category</h3>
                            <div class="category_items">
                                <ul>
                                    @forelse ($categories as $category)
                                    <li class="catgory_item">
                                        <a href="{{ route('category.product', $category->slug) }}">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h6>{{ $category->name ?? '' }}</h6>

                                            </div>
                                        </a>
                                    </li>
                                    @empty
                                        <div class="bg-danger p-2 text-center text-white">Product Not Found</div>
                                    @endforelse

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-9">
                    <div class="wishlist_box mt-3">
                        <table class="table ">
                            @if(App\Models\Wishlist::count() > 0)
                                <thead class="table-secondary">
                                <tr>
                                    <th>Serial No</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                                </thead>
                            @endif
                            <tbody class="table-group-divider">
                                @forelse ($wishlists as $key=>$wishlist)
                                    @if($wishlist->products)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="align-middle">
                                            <img src="{{ asset('uploads/images/product/'.$wishlist->products->productImages[0]->image) }}" alt="Product Image">
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ url('product-details'.'/'.$wishlist->products->category->slug.'/'.$wishlist->products->slug) }}"><h4 class="product_title align-middle">{{ $wishlist->products->name ?? '' }}</h4></a>
                                        </td>
                                        <td class="align-middle">&#x9F3; {{ $wishlist->products->selling_price ?? '' }}</td>
                                        <td class="align-middle">
                                            <div class="delete_icon text-center">
                                                <a href= "{{ route('product.wishlist_delete',$wishlist->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash text-danger text-white me-1"></i>Remove</a>

                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                        <div class="bg-danger p-1 text-white text-center">Empty Wishlist</div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('script')

@endpush
