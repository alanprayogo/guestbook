window.initializeDataTable = function (selector,  ajaxUrl, columns) {
    $(function () {
        const $table = $(selector);
        $(selector).DataTable({
            processing: true,
            serverSide: true,
            ajax: ajaxUrl,
            columns: columns,
            drawCallback: function () {
                const tableId = $table.attr('id');
                const $wrapper = $('#' + tableId + '_wrapper');

                // Bungkus tabel agar responsif (hanya sekali)
                if (!$table.parent().hasClass('overflow-x-auto')) {
                    $table.wrap('<div class="overflow-x-auto w-full"></div>');
                }

                // Tambahkan lebar minimum dan whitespace agar rapi
                $table.addClass('min-w-[1000px]');
                $table.find('thead th').addClass('whitespace-nowrap');
                $table.find('tbody td').addClass('whitespace-nowrap');
                $table.wrap('<div class="overflow-x-auto w-full"><div class="inline-block min-w-full align-middle"></div></div>');

                // Styling wrapper
                $wrapper.addClass('p-6 bg-white dark:bg-neutral-800 shadow rounded-lg space-y-4');

                // Tambahkan styling ke length dan filter
                const $length = $wrapper.find('.dataTables_length');
                const $filter = $wrapper.find('.dataTables_filter');

                $length.addClass('flex items-center gap-2 text-sm');
                $length.find('label').addClass('text-gray-700 dark:text-white');
                $length.find('select').addClass('border rounded-lg px-4 py-1 text-sm dark:bg-neutral-700 dark:text-white');

                $filter.addClass('flex items-center gap-2 text-sm');
                $filter.find('label').addClass('text-gray-700 dark:text-white');
                $filter.find('input').addClass('border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-700 dark:text-white');

                // Bungkus length + filter HANYA SEKALI
                if ($('#customTableTop').length === 0) {
                    $length.add($filter).wrapAll('<div id="customTableTop" class="flex justify-between items-center flex-wrap gap-4 mb-4"></div>');
                }

                // Table Head & Body
                $('#' + tableId + ' thead').addClass('bg-gray-100 dark:bg-neutral-700 text-gray-700 dark:text-white');
                $('#' + tableId + ' thead th').addClass('px-4 py-3 text-left text-sm font-medium tracking-wider');
                $('#' + tableId + ' tbody td').addClass('px-4 py-3 align-middle text-sm'); // <-- ganti py-2 ke py-3

                // Info dan pagination
                const $info = $wrapper.find('.dataTables_info');
                const $paginate = $wrapper.find('.dataTables_paginate');

                $info.addClass('text-sm text-gray-500 dark:text-gray-300');
                $paginate.addClass('flex gap-2 text-sm items-center');
                $paginate.find('a').addClass('px-3 py-1 border border-gray-300 rounded hover:bg-gray-100 dark:hover:bg-neutral-700 text-gray-700 dark:text-white');
                $paginate.find('.current').addClass('bg-blue-600 text-white border-blue-600');

                // Bungkus info + paginate HANYA SEKALI
                if ($('#customTableBottom').length === 0) {
                    $info.add($paginate).wrapAll('<div id="customTableBottom" class="flex justify-between items-center flex-wrap gap-4 mt-4"></div>');
                }
            }



        });
    });
};
