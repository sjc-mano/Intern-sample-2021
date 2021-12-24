@extends('shared.layout')

@section('title', '在庫管理システム')

@section('style')
@endsection

@section('content')

<div class="dashboard page-list">
    <form method="get" action="{{ route('items.create') }}">
        <button class="sp-fixed--bottom" type="submit">＋</button>
    </form>
    <div class="item">
        <div class="item__search">
            <form id="search_form" action="{{ route('items.list') }}" method="get" autocomplete="off">
                
                <div class="item__search__flex">
                    <div class="item__search__itemnum">
                        <input id="js-search-itemnumber" type="text" name="item_id" class="item__search__itemNumber category_items" placeholder="品番"
                            value="{{ Request::query('item_id') }}" maxlength="25">
                        <div id="js-error-search-itemnumber" class="edit__format__errorMessage-list"></div>
                    </div>
                    <div>
                        <button id="itemslist_search" class="button--oval--search category_items" type="submit">検索</button>
                    </div>
                </div>
            </form>
        </div>
        <table id="items_table" class="item__list">
            <thead>
                <tr class="item__list__tr">
                    <th class="item__list__th"><span>品番</span><span></span></th>
                    <th class="stock__list__th is-right"><span>在庫</span><span></span></th>
                    <th class="is-right"><span><img class="information__th__imagealert" src="{{ asset('assets/img/Alert.svg') }}"></span><span></span></th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr class="item__list__tr" data-href="{{ url('/items/' . str_replace('/', '@', $item->item_id) . '/edit')  }}">
                    <td class="item__list__td">{{ $item->item_id }}</td>
                    <td class="stock__list__td is-right">{{ $item->stock_num }}</td>
                    <td class="information__alerttable__image is-right">
                        @if ($item->alert_flg == 1)
                        <div hidden>{{ $item->alert_update_at }}</div>
                        <img class="information__alerttable__imagealert" src="{{ asset('assets/img/Alert.svg') }}">
                        @else
                        <div hidden>2000-01-01 00:00:00</div>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align: center">取得した品番は０件です</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('javascript')

<script>
    var selectvalue_blade = ""
    // tableSorterの適用
    $(document).ready(function () {
        $('#items_table').tablesorter({
            sortList: [[0, 0]],
            headers: {
                0: {sorter:"text"},
                1: {sorter:"digit"}
            }
        });
    });

    // クリックされた品番の編集画面へ遷移
    $(function ($) {
        $("tbody .item__list__tr").css("cursor", "pointer").click(function () {
            location.href = $(this).data("href");
        });
    });
</script>

@endsection

@section('css')
    <style type="text/css">
        .button--oval--search {
            margin-left: 20px;
        }

        .information__th__imagealert{width:15px;height:15px}
    </style>
@endsection