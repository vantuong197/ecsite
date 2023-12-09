<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>{{config('apps.user.title')}}</h2>
        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{route('dashboard.index')}}">Dashboard</a>
            </li>
            <li class="active"><strong>Quản lý bài viết</strong></li>
        </ol>
    </div>
</div>

<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{config('apps.user.tableHeading')}}</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">    
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="checkAll" class="input-checkbox">
                            </th>
                            <th>Avatar</th>
                            <th>User information</th>
                            <th>Adress</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox" value="" class="input-checkbox checkbox-item">
                            </td>
                            <td>
                                <div class="img-circle"><img src="https://haycafe.vn/wp-content/uploads/2021/11/Anh-avatar-dep-chat-lam-hinh-dai-dien.jpg" alt=""></div>
                            </td>
                            <td>
                                <div class="user-item name"><strong>Name: </strong>Join Weak</div>
                                <div class="user-item email"><strong>Email: </strong>abc@gmail.com</div>
                                <div class="user-item phone"><strong>Phone: </strong>0987654321</div>
                            </td>
                            <td>
                                <div class="address-item address"><strong>Address: </strong>Join Weak</div>
                                <div class="address-item ward"><strong>Ward: </strong>abc@gmail.com</div>
                                <div class="address-item district"><strong>District: </strong>0987654321</div>
                                <div class="address-item city"><strong>City: </strong>0987654321</div>
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch" checked />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){   
        // var elem = document.querySelector('.js-switch');
        // console.log(elem)
        // var switchery = new Switchery(elem, { color: '#1AB394' });
    });
</script>