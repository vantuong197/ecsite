@include('backend.user.components.breadcrumb', ['title' => $config['seo']['title']])

<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                @include('backend.user.components.toolbox')
            </div>
            <div class="ibox-content">    
                @include('backend.user.components.filter')
                @include('backend.user.components.table', ['heading' => $config['seo']['tableHeading']])
            </div>
        </div>
    </div>
</div>


