<h5>{{$heading}}</h5>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="checkAll" class="input-checkbox">
            </th>
            <th style="width: 100px">Avatar</th>
            <th>Name</th>
            <th>Number of Member</th>
            <th>Description</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($users) && is_object($users))
            @foreach($users as $user)
                <tr>
                    <td>
                        <input type="checkbox" class="input-checkbox checkbox-item" value="{{$user->id}}">
                    </td>
                    <td>
                        <div class="image image-cover"><img src="https://haycafe.vn/wp-content/uploads/2021/11/Anh-avatar-dep-chat-lam-hinh-dai-dien.jpg" alt=""></div>
                    </td>
                    <td>
                        <div class="user-item name">{{$user->name}}</div>
                    </td>
                    <td>
                        <div class="user-item name">{{$user->users_count}} {{($user->users_count > 1) ? 'members' : 'member'}}</div>
                    </td>
                    <td>
                        <div class="user-item email">{{$user->description}}</div>
                    </td>
                    </td>
                    <td class="text-center">
                        <input type="checkbox" class="js-switch status" data-field="publish" data-model="UserCatalogue" data-modelId="{{$user->id}}" {{($user->publish == 1) ? 'checked': ''}} value="{{$user->publish}}"/>
                    </td>
                    <td class="text-center">
                        <a href="{{route('user.catalogue.edit', $user->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{route('user.catalogue.delete', $user->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>   
            @endforeach
        @endif
    </tbody>
</table>
{{ $users->links('pagination::bootstrap-4') }}