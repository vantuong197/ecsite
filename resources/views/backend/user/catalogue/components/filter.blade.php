<form action="{{ route('user.catalogue.index') }}">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="perpage">
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    @php
                        $perpage = (request('perpage') ?? old('perpage'));   
                    @endphp
                    <select name="perpage" class="form-control input-sm perpage filter mr10">
                        @for ($i = 20; $i <= 200; $i+= 20)
                            <option value="{{ $i }}" {{($i == $perpage) ? 'selected' : ''}}>{{ $i }} record</option>
                        @endfor
                    </select>
                    
                </div>
            </div>
            <div class="action">
                <div class="uk-flex uk-flex-middle">
                    @php
                        $publishArr = ['Unpublish', 'Publish'];
                        $publish = (request('publish') ?? old('publish'));
                        if($publish == null){
                            $publish = -1;
                        }
                    @endphp
                    <select name="publish" class="form-control mr10">
                        <option value="-1" selected>Select Status</option>
                        @foreach($publishArr as $key => $val)
                            <option value="{{$key}}" {{($key == $publish) ? 'selected' : ''}}>{{ $val }}</option>
                        @endforeach
                    </select>
                   <div class="uk-search uk-flex uk-flex-middle mr10">
                       <div class="input-group">
                           <input 
                               type="text"
                               name="keyword"
                               value="{{(request('keyword')) ?? old('keyword')}}"
                               placeholder="Enter your search keyword..." 
                               class="form-control"
                           >
                           <span class="input-group-btn">
                               <button class="btn btn-primary mb0 btn-sm btn-search">Search</button>
                           </span>
                       </div>
                   </div>
                   <a href="{{route('user.catalogue.create')}}" class="btn btn-danger"><i class="fa fa-plus mr5"></i>Add new user catalogue</a>
                </div>
           </div>
        </div>
    </div>
</form>