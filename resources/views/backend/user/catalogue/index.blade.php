@include('backend.user.catalogue.components.breadcrumb', ['title' => $config['seo']['title']])

<div class="row mt20">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                @include('backend.user.catalogue.components.toolbox')
            </div>
            <div class="ibox-content">    
                @include('backend.user.catalogue.components.filter')
                @include('backend.user.catalogue.components.table', ['heading' => $config['seo']['tableHeading']])
            </div>
        </div>
    </div>
</div>


