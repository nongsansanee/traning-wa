@extends('layouts.app')
 
@section('title', 'Page Title')
 
@section('navbar')
    @parent
 
@endsection
 
@section('content')
    <div  >
        {{-- <h1>กรอกที่อยู่จัดส่ง</h1> --}}
            <div class="container py-2">
              <div class="row justify-content-center align-items-center h-50">
                <div class="col-12 col-lg-9 col-xl-7">
                  <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-2 p-md-5">
                      <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">กรอกที่อยู่จัดส่ง</h3>
                      <form method="POST" action="/storeaddress">
                        @csrf
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                      

                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div class="form-outline">
                              <input type="text" name="firstName" class="form-control form-control-lg" value="{{ old('firstName') }}" />
                              <label class="form-label" for="firstName">*First Name</label>
                            </div>
                            @error('firstName')
                                <label class="alert-danger">{{ $message }}</label>
                            @enderror
          
                          </div>
                          <div class="col-md-6 mb-4">
          
                            <div class="form-outline">
                              <input type="text" name="lastName" class="form-control form-control-lg" value="{{ old('lastName') }}" />
                              <label class="form-label" for="lastName">*Last Name</label>
                            </div>
                        
                            @error('lastName')
                            <label class="alert-danger">{{ $message }}</label>
                            @enderror
                          </div>
                        </div>
          
                     
          
                        <div class="row">
                          <div class="col-md-6 mb-4 pb-2">
          
                            <div class="form-outline">
                              <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" />
                              <label class="form-label" for="email">Email</label>
                            </div>
          
                          </div>
                          <div class="col-md-6 mb-4 pb-2">
          
                            <div class="form-outline">
                              <input type="number" name="phone" class="form-control form-control-lg" value="{{ old('phone') }}" />
                              <label class="form-label" for="phone">*Mobile Phone Number</label>
                            </div>
                            @error('phone')
                            <label class="alert-danger">{{ $message }}</label>
                            @enderror
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 pb-2">
            
                              <div class="form-outline">
                                <input type="email" name="address" class="form-control form-control-lg" />
                                <label class="form-label" for="address">Address</label>
                              </div>
            
                            </div>
                           
                          </div>
          
                        <div class="mt-4 pt-2">
                          <input class=" bg-blue-700 p-2 rounded-md text-white " type="submit" value="SAVE" />
                        </div>
          
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
    </div>
@endsection
<style>
    .gradient-custom {
  /* fallback for old browsers */
  background: #f093fb;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
  font-size: 1rem;
  line-height: 2.15;
  padding-left: .75em;
  padding-right: .75em;
}
.card-registration .select-arrow {
  top: 13px;
}
</style>
