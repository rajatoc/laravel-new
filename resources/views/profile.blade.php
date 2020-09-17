@extends('layouts.frontend')

@section('title','Home')

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
    	<form class="profile-update-form" id="profile-update-form" action="api/auth/updateProfile">

        <div class="col-md-12 ">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label>
                    	<input type="text" name="name" id="name" class="form-control" placeholder="name" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">PhoneNumber</label><input type="text" class="form-control" placeholder="enter phone number" id="phone" name="phone" value=""></div>
                    
                    <div class="col-md-12"><label class="labels">Email ID</label><input name="email" type="text" class="form-control" placeholder="enter email id" id="email" value=""></div>

                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Father</label>
                    	<input type="text" class="form-control" placeholder="Father" id="father" name="father" value="">
                    </div>
                    <div class="col-md-6"><label class="labels">Mother</label><input type="text" class="form-control" value="" name="mother" id="mother" placeholder="mother"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Wife</label>
                    	<input type="text" class="form-control" placeholder="Wife" id="wife" name="wife" value="">
                    </div>
                    <div class="col-md-6"><label class="labels">Child</label><input type="text" class="form-control" value="" name="child" id="child" placeholder="child"></div>
                </div>
                <div class="row mt-3">
                	<div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" name="address" id="address" value=""></div>
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" name="country" id="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" name="state" id="state" placeholder="state"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Zip</label><input type="text" class="form-control" placeholder="zip" name="zip" id="zip" value=""></div>
                </div>

                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>
        </div>
    	</form>
    </div>
</div>
</div>
</div>
@section('scripts')
<script src="{{ asset('assets/js/script.js') }}"></script>
@endsection 