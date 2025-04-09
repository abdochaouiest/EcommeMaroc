@extends('layouts.app')
@section('title', 'Checkout')
@section('contents')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Checkout</h1>
                    <p class="mb-4">{{ auth()->user()->name }}! You’re almost done. Please review your details and proceed to payment.</p>
                    <p><a href="{{route("cart.index")}}" class="btn btn-secondary me-2">< Back To Cart</a></p>
                </div>
            </div>
            <div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="images/couch.png" class="img-fluid">
							</div>
						</div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section">

<div class="container">
    
  <div class="row">
    <div class="col-md-6 mb-5 mb-md-0">
      <h2 class="h3 mb-3 text-black">Billing Details</h2>
      <div class="p-3 p-lg-5 border bg-white">
        <form id="place-order-form" action="{{ route('paypal.create') }}" method="POST">
          @csrf
        <div class="form-group">
          <label for="country" class="text-black">Country <span class="text-danger">*</span></label>
          <select id="country" class="form-control">
            <option value="1">Select a country</option>    
            <option value="2">bangladesh</option>    
            <option value="3">Algeria</option>    
            <option value="4">Afghanistan</option>    
            <option value="5">Ghana</option>    
            <option value="6">Albania</option>    
            <option value="7">Bahrain</option>    
            <option value="8">Colombia</option>    
            <option value="9">Dominican Republic</option>  
            <option value="10">Maroc</option>    
          </select>
        </div>

        <div class="form-group row">
          <div class="col-md-12">
            <label for="address" class="text-black">Address <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Street address">
          </div>
        </div>

        <div class="form-group mt-3">
          <label for="type" class="text-black">Type <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="type" id="type" name="type" placeholder="Apartment, suite, unit etc. (optional)">
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label for="state" class="text-black">State / Country <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="state" name="state" placeholder="State">
          </div>
          <div class="col-md-6">
            <label for="zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip" >
          </div>
        </div>

        <div class="form-group row mb-5">
          <div class="col-md-6">
            <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
          </div>
          <div class="col-md-6">
            <label for="city" class="text-black">city <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="city" name="city" placeholder="City">
          </div>
        </div>
        


        <div class="form-group">
          <div class="collapse" id="ship_different_address">
            <div class="py-2">

              <div class="form-group">
                <label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
                <select id="c_diff_country" class="form-control">
                  <option value="1">Select a country</option>    
                  <option value="2">bangladesh</option>    
                  <option value="3">Algeria</option>    
                  <option value="4">Afghanistan</option>    
                  <option value="5">Ghana</option>    
                  <option value="6">Albania</option>    
                  <option value="7">Bahrain</option>    
                  <option value="8">Colombia</option>    
                  <option value="9">Dominican Republic</option>  
                   <option value="10">Maroc</option>
                     
                </select>
              </div>


              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
                </div>
                <div class="col-md-6">
                  <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
                </div>
              </div>

              <div class="form-group row  mb-3">
                <div class="col-md-12">
                  <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
                </div>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
                </div>
                <div class="col-md-6">
                  <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
                </div>
                <div class="col-md-6">
                  <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
                </div>
              </div>

            </div>

          </div>
        </div>

        <div class="form-group">
          <label for="c_order_notes" class="text-black">Order Notes</label>
          <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
        </div>

      </div>
    </div>
    <div class="col-md-6">

      <div class="row mb-5">
        <div class="col-md-12">
          <h2 class="h3 mb-3 text-black">Coupon Code</h2>
          <div class="p-3 p-lg-5 border bg-white">

            <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
            <div class="input-group w-75 couponcode-wrap">
              <input type="text" class="form-control me-2" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-black btn-sm" type="button" id="button-addon2">Apply</button>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="row mb-5">
        <div class="col-md-12">
          <h2 class="h3 mb-3 text-black">Your Order</h2>
          <div class="p-3 p-lg-5 border bg-white">
            <table class="table site-block-order-table mb-5">
              <thead>
                <th>Product ({{ $cartItems->sum('quantity') }})</th>
                <th>Total</th>
              </thead>
              <tbody>
                @foreach($cartItems as $item)
                <tr>
                  <td>{{ $item->product->name }}<strong class="mx-2">x</strong>{{ $item->quantity }}</td>
                  <td>{{ number_format($item->product->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach

                <tr>
                  <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                  <td class="text-black">${{ number_format($subtotal, 2) }}</td>
                </tr>
                <tr>
                    <td class="text-black font-weight-bold"><strong>Shipping</strong></td>
                    <td class="text-black">${{ number_format($shippingCost, 2) }}</td>
                  </tr>
                  <tr>
                    <td class="text-black font-weight-bold"><strong>Tax</strong></td>
                    <td class="text-black">${{ number_format($tax, 2) }}</td>
                  </tr>
                <tr>
                  <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                  <td class="text-black font-weight-bold"><strong>${{ number_format($total, 2) }}</strong></td>
                </tr>
              </tbody>
            </table>

            <div class="border p-3 mb-3">
                <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Stripe</a></h3>

                <div class="collapse" id="collapsecheque">
                  <div class="py-2">
                    <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                  </div>
                </div>
              </div>
            <div class="border p-3 mb-5">
              <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

              <div class="collapse" id="collapsepaypal">
                <div class="py-2">
                  <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <button class="btn btn-black btn-lg py-3 btn-block">Place Order</button>
            </div>
          </form>

          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- </form> -->
</div>
</div>
@endsection