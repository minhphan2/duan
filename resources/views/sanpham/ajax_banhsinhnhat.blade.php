@foreach($products as $product)
                    <div class="product-container" id="product-container">
                        <a href="{{ route('chitietsanpham', ['id' => $product->MaSP]) }}">
                            <p class="product-name">{{ $product->TenSP }}</p>
                                        <p class="price">
    {{ $product->MoTa }}<br>
    @if(isset($product->giam_gia) && $product->giam_gia > 0)
        <span style="color: red; font-weight: bold;">
            {{ number_format($product->Gia * (1 - $product->giam_gia / 100), 0, ',', '.') }} ₫
        </span>
        <span style="text-decoration: line-through; color: gray;">
            {{ number_format($product->Gia, 0, ',', '.') }} ₫
        </span>
        <span style="color: green;">-{{ $product->giam_gia }}%</span>
    @else
        {{ number_format($product->Gia, 0, ',', '.') }} ₫
    @endif
</p>
                            <img src="{{ asset('uploads/' . $product->HinhAnh) }}" alt="{{ $product->name }}">
                        </a>
                    </div>
                @endforeach
