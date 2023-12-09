<!-- Mainly scripts -->

<script src="backend/js/bootstrap.min.js"></script>
<script src="backend/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="backend/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- jQuery UI -->
<script src="backend/js/plugins/jquery-ui/jquery-ui.min.js"></script>

@if (isset($config['js']) && is_array($config['js']))
    @foreach ($config['js'] as $key => $value)
        {!! '<script src="'.$value.'"></script>' !!}
    @endforeach 
@endif