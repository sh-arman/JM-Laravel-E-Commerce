{{--  --}}
{{-- @php $product = $category->Product->paginate(9); @endphp --}}
@foreach($product as $pro)



  <div class="col-lg-3 col-md-4 col-sm-6">

        <div class="featured__item">
          @php $i=1;  @endphp
          @foreach($pro->images as $image)
            @if($i>0)
            <div class="featured__item__pic set-bg" data-setbg="{{ asset('upload/product/'.$image->image) }}">
            @endif
            @php $i--; @endphp
          @endforeach
                <ul class="featured__item__pic__hover">
                  {{-- action="{{ route('addtocart') }}" --}}
                    <li><form action="{{ route('addtocart') }}"   method="POST" >
                          @csrf
                          <input type="hidden" name="product_id" value="{{ $pro->id }}">
                          <button type="submit"><i class="fa fa-shopping-cart" alt="Add to cart"></i></button>
                      </form>
                    </li>


                    {{-- <li><a href="#"><i class="fa fa-shopping-cart" alt="Buy now"></i></a></li> --}}
                </ul>
            </div>
            <a href="{{ route('page.product',['id' =>$pro->id]) }}">
            <div class="featured__item__text">
                <h6>{{ $pro->title }}</h6>
                <h5>{{ $pro->price }} Tk</h5>
            </div>
            </a>
        </div>
  </div>
@endforeach
{{--  --}}

@section('script')

@endsection
