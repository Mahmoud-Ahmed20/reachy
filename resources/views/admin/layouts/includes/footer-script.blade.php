<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
</script>

@yield('js')

<!-- own script -->
<script src="{{ URL::asset('js/main.js') }}"></script>


{{-- <script>
    //--------------------- search engine ajax -------------------

    $(document).ready(function() {
        // Send Search Text to the server
        $("#search-eng_topbar").keyup(function() {
            let search_query = $(this).val();
            if (search_query != "") {

                var url = "{{ route('sett.pat_patient_search', ':id') }}";
                url = url.replace(':id', search_query);

                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#search-eng-show-list_topbar").show();

                        if (data !== "") {
                            var html = ''
                            $.each(data, function(key, value) {

                                var url_show =
                                    "{{ route('sett.patient.show', ':id') }}";
                                url_show = url_show.replace(':id', value.id);

                                html +=
                                    '<a href="' + url_show +
                                    '" class="search-eng-a list-group-item list-group-item-action border-1 text-gray-500" style="cursor: pointer;"><i class="fas fa-search text-gray-200 me-2"></i> ' +
                                    value.name + '</a>';
                            });
                            $('#search-eng-show-list_topbar').html(html);
                        }

                        if (data == "") {
                            $('#search-eng-show-list_topbar').html(
                                '<a class="list-group-item list-group-item-action border-0"><i class="fas fa-search text-gray-200 me-2"></i>No Record</a>'
                            );
                        }
                    },
                });
            } else {
                $("#search-eng-show-list_topbar").empty();
                $("#search-eng-show-list_topbar").hide();;
            }
        });
        // $("#search-eng_topbar_small").keyup(function() {
        //     let search_query = $(this).val();
        //     if (search_query != "") {

        //         var url = "{{ route('sett.pat_patient_search', ':id') }}";
        //         url = url.replace(':id', search_query);

        //         $.ajax({
        //             url: url,
        //             type: "GET",
        //             dataType: "json",
        //             success: function(data) {
        //                 $("#search-eng-show-list_topbar_small").show();

        //                 if (data !== "") {
        //                     var html = ''
        //                     $.each(data, function(key, value) {

        //                         var url_show =
        //                             "{{ route('sett.patient.show', ':id') }}";
        //                         url_show = url_show.replace(':id', value.id);

        //                         html +=
        //                             '<a href="' + url_show +
        //                             '" class="search-eng-a list-group-item list-group-item-action border-1 text-gray-500" style="cursor: pointer;"><i class="fas fa-search text-gray-200 me-2"></i> ' +
        //                             value.name + '</a>';
        //                     });
        //                     $('#search-eng-show-list_topbar_small').html(html);
        //                 }

        //                 if (data == "") {
        //                     $('#search-eng-show-list_topbar_small').html(
        //                         '<a class="list-group-item list-group-item-action border-0"><i class="fas fa-search text-gray-200 me-2"></i>No Record</a>'
        //                     );
        //                 }
        //             },
        //         });
        //     } else {
        //         $("#search-eng-show-list_topbar_small").empty();
        //         $("#search-eng-show-list_topbar_small").hide();;
        //     }
        // });
    });
</script> --}}
