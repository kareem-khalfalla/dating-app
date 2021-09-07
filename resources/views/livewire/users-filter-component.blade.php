<div>
    <style>
        body {
            padding: 20px 20px;
        }

        .results tr[visible='false'],
        .no-result {
            display: none;
        }

        .results tr[visible='true'] {
            display: table-row;
        }

        .counter {
            padding: 8px;
            color: #ccc;
        }

    </style>
    <div class="form-group pull-right" style="margin-top: 8rem;">
        <input wire:model.debounce.300ms="search" type="text" class="search form-control" placeholder="Search...">
    </div>
    <div class="form-group-select">
        <label for="">per-page</label>
        <select wire:model="perPage">
            <option>10</option>
            <option>25</option>
            <option>50</option>
        </select>
    </div>
    <div class="form-group-select">
        <label for=""></label>
        <select wire:model="orderBy">
            <option value="id">ID</option>
            <option value="name">Name</option>
            <option value="email">E-mail</option>
            <option value="created_at">Created at</option>
        </select>
    </div>
    <div class="form-group-select">
        <label for="">per-page</label>
        <select wire:model="orderAsc">
            <option value="1">Ascending</option>
            <option value="0">Descending</option>
        </select>
    </div>
    <span class="counter pull-right"></span>
    <table class="table table-hover table-bordered results">
        <thead>
            <tr>
                <th>#</th>
                <th class="col-md-5 col-xs-5">Name / Surname</th>
                <th class="col-md-4 col-xs-4">E-mail</th>
                <th class="col-md-3 col-xs-3">Since</th>
            </tr>
            <tr class="warning no-result">
                <td colspan="4"><i class="fa fa-warning"></i> No result</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->id }}</td>
                    <td class="border px-4 py-2"><a href="{{ route('profile', $user) }}">{{ $user->name }}</a></td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
    @push('scripts')
        <script>
            $(document).ready(function() {
                $(".search").keyup(function() {
                    var searchTerm = $(".search").val();
                    var listItem = $('.results tbody').children('tr');
                    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

                    $.extend($.expr[':'], {
                        'containsi': function(elem, i, match, array) {
                            return (elem.textContent || elem.innerText || '').toLowerCase().indexOf(
                                (match[3] || "").toLowerCase()) >= 0;
                        }
                    });

                    $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e) {
                        $(this).attr('visible', 'false');
                    });

                    $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e) {
                        $(this).attr('visible', 'true');
                    });

                    var jobCount = $('.results tbody tr[visible="true"]').length;
                    $('.counter').text(jobCount + ' item');

                    if (jobCount == '0') {
                        $('.no-result').show();
                    } else {
                        $('.no-result').hide();
                    }
                });
            });
        </script>
    @endpush
</div>
