<script>
    function performRemoteSearch(options) {

        $(options.element).select2({
            allowClear: true,
            placeholder: 'Selecione',
            minimumInputLength: options.hasOwnProperty('min') ? options.min : 3,
            containerCssClass: options.hasOwnProperty('containerCssClass') ? options.containerCssClass : ':all:',
            width: 'resolve',
            ajax: {
                url: options.url,
                delay: 250,
                dataType: 'json',
                data: function (params) {

                    let data = options.hasOwnProperty('data') ? options.data : {}

                    return {
                        search: params.term,
                        ...data
                    };

                }, processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: options.textOption(item),
                                id: item.id
                            }
                        })
                    };
                }
            },
        });
    }

</script>
