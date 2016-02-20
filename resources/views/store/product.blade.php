@extends('store.layout')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')

    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">

                    @if(count($product->images))
                        <img src="{{ url('uploads/'.$product->images->last()->id.'.'.$product->images->last()->extension) }}" alt=""/>
                    @else
                        <img src="/images/no-img.jpg" alt="" />
                    @endif

                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($product->images as $image)
                                <a href="#">
                                    <img src="{{ url('/uploads/'.$image->id.'.'.$image->extension) }}" alt="" width="80">
                                </a>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->

                    <h2>{{ $product->name }} :: {{ $product->category->name }}</h2>

                    <p>
                        {{ $product->description }}
                    </p>
                    <span>
                        <span>{{ $product->price }}</span>
                            <a href="{{ route('cart.add', ['id'=>$product->id]) }}" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Adicionar no Carrinho
                            </a>
                    </span>

                    <h2>Tags</h2>
                    @foreach($product->tags as $tag)
                        <a href="{{ route('tag',['id'=>$tag->id ]) }}">
                            <button class="btn btn-default">{{ $tag->name }}</button>
                        </a>
                    @endforeach

                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    </div>

@stop