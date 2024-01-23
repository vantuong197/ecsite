@include('backend.user.user.components.breadcrumb', ['title' => $config['seo']['title']])


@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
@php
    // dd($user);
    $url = ($config['method'] == 'create') ? route('user.user.store') : route('user.user.update', $user->id);
@endphp
<form action="{{$url}}" class="box" method="post">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Information</div>
                    <div class="panel-discription">User Information</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Email <span class="text-danger">(*)</span></label>
                                    <input 
                                        type="text"
                                        name="email"
                                        value="{{old('email', ($user->email) ?? '')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Name <span class="text-danger">(*)</span></label>
                                    <input 
                                        type="text"
                                        name="name"
                                        value="{{old('name', ($user->name) ?? '')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        @php 
                            $userCatalogue = [
                                '[Select user catalogue]',
                                'Admin',
                                'Collaborators'
                            ]
                        @endphp
                        <div class="row mt15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">User Catalogue <span class="text-danger">(*)</span></label>
                                    <select name="user_catalogue_id" class="form-control">
                                        @foreach($userCatalogue as $key => $item)
                                        <option {{$key == old('user_catalogue_id', isset($user->user_catalogue_id) ? $user->user_catalogue_id : '') ? 'selected' : ''}} value="{{$key}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Birthday</span></label>
                                    <input 
                                        type="date"
                                        name="birthday"
                                        value="{{old('birthday', ($user->birthday) ?? '')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        @if($config['method'] == 'create')
                        
                            <div class="row mt15">
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Password<span class="text-danger">(*)</span></label>
                                        <input 
                                            type="password"
                                            name="password"
                                            value=""
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"
                                        >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Confirm Password <span class="text-danger">(*)</span></label>
                                        <input 
                                            type="password"
                                            name="confirm_password"
                                            value=""
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"
                                        >
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row mt15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label class="control-label text-left">Avatar</label>
                                    <input 
                                        type="text"
                                        name="image"
                                        value="{{old('image', ($user->image) ?? '' )}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <hr>
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Contact Info</div>
                    <div class="panel-discription">Enter user contact information</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Province</label>
                                    <select name="province_id" id="" class="form-control selected2 location province" data-target="district">
                                        <option value="0">[Select Province]</option>
                                        @if(isset($provinces) && is_object($provinces)) 
                                            @foreach ($provinces as $province)
                                                <option @if(old('province_id') == $province->code) selected @endif value="{{$province->code}}">{{ $province->name_en }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">District</label>
                                    <select name="district_id" id="" class="form-control district selected2 location" data-target="wards">
                                        <option value="0">[Select District]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ward</label>
                                    <select name="ward_id" id="" class="form-control wards selected2">
                                        <option value="0">[Select Ward]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Address</span></label>
                                    <input 
                                        type="text"
                                        name="address"
                                        value="{{old('address', (isset($user->address)) ? $user->address : '')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row mt15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Phone</label>
                                    <input 
                                        type="text"
                                        name="phone"
                                        value="{{old('phone', ($user->phone) ?? '')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Description</label>
                                    <input 
                                        type="text"
                                        name="description"
                                        value="{{old('description',($user->description) ?? '')}}"
                                        class="form-control"
                                        placeholder=""
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mb15">
            <button type="submit" class="btn btn-primary w100">Save</button>
        </div>
    </div>
    
</form>


<script>
    var province_id = '{{(isset($user->province_id) ? $user->province_id : old('province_id'))}}'
    var district_id = '{{(isset($user->district_id) ? $user->district_id : old('district_id'))}}'
    var ward_id = '{{(isset($user->ward_id) ? $user->ward_id : old('ward_id'))}}'
</script>