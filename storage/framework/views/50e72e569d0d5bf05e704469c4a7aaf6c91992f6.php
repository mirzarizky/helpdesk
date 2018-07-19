
<script type="text/javascript">
    function loadCSS(filename) {
        var file = document.createElement("link");
        file.setAttribute("rel", "stylesheet");
        file.setAttribute("type", "text/css");
        file.setAttribute("href", filename);

        if (typeof file !== "undefined"){
            document.getElementsByTagName("head")[0].appendChild(file)
        }
    }
    loadCSS(<?php echo '"'.asset('//cdn.datatables.net/v/bs4/dt-' . Kordy\Ticketit\Helpers\Cdn::DataTables . '/r-' . Kordy\Ticketit\Helpers\Cdn::DataTablesResponsive . '/datatables.min.css').'"'; ?>);
    <?php if($editor_enabled): ?>
        loadCSS(<?php echo '"'.asset('https://cdnjs.cloudflare.com/ajax/libs/summernote/' . Kordy\Ticketit\Helpers\Cdn::Summernote . '/summernote.css').'"'; ?>);
        <?php if($include_font_awesome): ?>
            loadCSS(<?php echo '"'.asset('https://netdna.bootstrapcdn.com/font-awesome/' . Kordy\Ticketit\Helpers\Cdn::FontAwesome . '/css/font-awesome.min.css').'"'; ?>);
        <?php endif; ?>
        <?php if($codemirror_enabled): ?>
            loadCSS(<?php echo '"'.asset('https://cdnjs.cloudflare.com/ajax/libs/codemirror/' . Kordy\Ticketit\Helpers\Cdn::CodeMirror . '/codemirror.min.css').'"'; ?>);
            loadCSS(<?php echo '"'.asset('https://cdnjs.cloudflare.com/ajax/libs/codemirror/' . Kordy\Ticketit\Helpers\Cdn::CodeMirror . '/theme/'.$codemirror_theme.'.min.css').'"'; ?>);
        <?php endif; ?>
    <?php endif; ?>
</script>
