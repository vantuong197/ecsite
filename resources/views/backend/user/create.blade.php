@include('backend.user.components.breadcrumb', ['title' => $config['seo']['title']])


<form action="" class="box">
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
                                        value=""
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
                                        value=""
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
                                    <label for="" class="control-label text-left">User Catalogue <span class="text-danger">(*)</span></label>
                                    <select name="user_catalogue_id" class="form-control">
                                        <option value="0">[Select user catalogue]</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Collaborators</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Birthday</span></label>
                                    <input 
                                        type="text"
                                        name="birthday"
                                        value=""
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
                        <div class="row mt15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label class="control-label text-left">Avatar</label>
                                    <input 
                                        type="text"
                                        name="avatar"
                                        value=""
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
                                    <select name="province_id" id="" class="form-control selected2 province">
                                        <option value="0">[Select Province]</option>
                                        @if(isset($provinces) && is_object($provinces)) 
                                            @foreach ($provinces as $province)
                                                <option value="{{$province->code}}">{{ $province->name_en }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">District</label>
                                    <select name="district_id" id="" class="form-control district">
                                        <option value="0">[Select District]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ward</label>
                                    <select name="ward_id" id="" class="form-control">
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
                                        value=""
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
                                        value=""
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
                                        value=""
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