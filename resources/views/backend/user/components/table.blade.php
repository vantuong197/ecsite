<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="checkAll" class="input-checkbox">
            </th>
            <th style="width: 100px">Avatar</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @for($i = 0; $i < 100; $i++)
        <tr>
            <td>
                <input type="checkbox" value="" class="input-checkbox checkbox-item">
            </td>
            <td>
                <div class="image image-cover"><img src="https://haycafe.vn/wp-content/uploads/2021/11/Anh-avatar-dep-chat-lam-hinh-dai-dien.jpg" alt=""></div>
            </td>
            <td>
                <div class="user-item name">Join Weak</div>
            </td>
            <td>
                <div class="user-item email">abc@gmail.com</div>
            </td>
            <td>
                <div class="user-item address">Tokyo City</div>
            </td>
            <td>
                <div class="user-item address">0987654321</div>
            </td>
            <td class="text-center">
                <input type="checkbox" class="js-switch"/>
            </td>
            <td class="text-center">
                <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endfor
    </tbody>
</table>
{{-- <script>
    $(document).ready(function(){   
        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, { color: '#1AB394' });
    });
</script> --}}