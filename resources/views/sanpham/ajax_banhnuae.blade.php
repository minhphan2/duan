@foreach($products as $product)
                    <div class="product-container" id="product-container">
                        <a href="{{ route('chitietsanpham', ['id' => $product->MaSP]) }}">
                            <p class="product-name">{{ $product->TenSP }}</p>
                            <p class="price">{{ $product->MoTa }}<br>{{ number_format($product->Gia, 0, ',', '.') }} ₫</p>
                            <img src="{{ asset('uploads/' . $product->HinhAnh) }}" alt="{{ $product->name }}">
                        </a>
                    </div>
                @endforeach
