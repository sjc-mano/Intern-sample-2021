@extends('shared.layout')

@section('title', '日啓産業')

@section('style')

@endsection

@section('content')

<div class="dashboard page-list">
    <div class="subnavi">
        <div class="subnavi__flex">
            <a id="back_button"><img src="{{ asset('assets/img/BackBt.svg') }}" alt="" width="80" height="90"></a>
            <div class="subnavi__vertical">
            </div>
        </div>
    </div>
    <button id="js-itemsave" class="sp-fixed--bottom" type="button" style="display: none;">保存</button>
    <form id="save-form" action="{{ route('items.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="edit">
            <div id="error-message" class="edit__format__errorMessage">{!! nl2br(e(session('error'))) ?? "" !!}</div>
            <div class="edit__format-itemnumber">
                <div>
                    <div class="edit__format-itemnumber__title">品番</div>
                </div>
                <div class="edit__format-itemnumber__numberflex">
                    <input id="js-itemnumber" name="item_id" type="text" maxlength="20" class="edit__format__input" value="{{ old('item_id') }}">
                </div>
                <div id="js-error-itemnumber" class="edit__format__errorMessage"></div>
            </div>
            <div class="edit__format-alertstock">
                <div>
                    <div class="edit__format__title">在庫数</div>
                </div>
                <div class="edit__format-stock">
                    <div class="edit__format__stock">
                        <input id="js-stock" name="stock_num" type="number" class="edit__format__input-alertstock edit__readonly" 
                        value="0" max="9999999" readonly>
                    </div>
                </div>
                <div id="js-error-stock" class="edit__format__errorMessage">{{ $errors->first('stock_num') }}</div>
            </div>
            <div class="edit__format">
                <div>
                    <div class="edit__format__title">客先</div>
                </div>
                <div>
                    <div class="arrow">
                        <input id="js-guest" name="company_name" type="text" maxlength="10" class="edit__format__input is-arrow"
                            value="{{ old('company_name') }}" data-options="{{ implode(',', $customers) }}">
                    </div>
                </div>
                <div id="js-error-guest" class="edit__format__errorMessage">{{ $errors->first('company_name') }}</div>
            </div>
            <div class="edit__format">
                <div class="edit__format-box">
                    <div class="edit__format-box__box">
                        <div>
                            <div class="edit__format__title">箱種</div>
                        </div>
                        <div>
                            <select id="js-box" name="box_code" class="edit__format__input">
                                <option value=""></option>
                                @forelse($box_codes as $key => $value)
                                <option value="{{ $key }}"
                                {{ $key == old('box_code') ? 'selected' : '' }}
                                >{{ $value }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="edit__format-box__number">
                        <div>
                            <div class="edit__format__title">数</div>
                        </div>
                        <div>
                            <input id="js-boxnumber" name="box_num" type="number" class="edit__format__input-boxnumber" value="{{ old('box_num') ? old('box_num') : 0 }}"
                                max="9999999">
                        </div>
                    </div>
                </div>
                <div id="js-error-box" class="edit__format__errorMessage">{{ $errors->first('box_code') }}</div>
                <div id="js-error-boxnumber" class="edit__format__errorMessage">{{ $errors->first('box_num') }}</div>
            </div>
            <div class="edit__format">
                <div class="edit__format-data">
                    <div class="edit__format-data__start">
                        <div>
                            <div class="edit__format__title">立ち上がり時期</div>
                        </div>
                        <div>
                            <input id="js-startdate" name="start_date" type="date" class="edit__format__input-data" value="{{ old('start_date') ? old('start_date') : date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="edit__format-data__finish">
                        <div>
                            <div class="edit__format__title">打ち切り時期</div>
                        </div>
                        <div>
                            <input id="js-enddate" name="end_date" type="date" class="edit__format__input-data" value="{{ old('end_date') ? old('end_date') : date('Y-m-d') }}">
                        </div>
                    </div>
                </div>
                <div id="js-error-startdate" class="edit__format__errorMessage">{{ $errors->first('start_date') }}</div>
                <div id="js-error-enddate" class="edit__format__errorMessage">{{ $errors->first('end_date') }}</div>
            </div>
            <div class="edit__format">
                <div>
                    <div class="edit__format__title">材料選択</div>
                </div>
                <div class="edit__format-itemselect">
                    <div class="edit__format__itemselect__input">
                        <input id="js-selectmaterials" name="material_id" maxlength="25" type="text" class="edit__format__input-original"
                            value="{{ old('material_id') }}" data-options="{{ implode(',', array_keys($materials)) }}">
                    </div>
                </div>
                <div id="js-error-selectmaterials" class="edit__format__errorMessage">{{ $errors->first('material_id') }}</div>
            </div>
            <div class="edit__format__itemselect">
                <div>
                    <div class="edit__format__title">子品番選択</div>
                </div>
                <div class="edit__format-itemselect">
                    <div class="edit__format__itemselect__input">
                        <input id="js-itemnumber_child" type="text" maxlength="25" class="edit__format__input-original"
                            data-options="{{ implode(',', array_diff($items_id, old('sub_item_id') ? old('sub_item_id') : array())) }}">
                    </div>
                    <button id="js-itemnumber_child_add" type="button"
                        class="button--primary edit__format__itemselect__button">追加</button>
                </div>
                <div id="js-error-itemnumber_child" class="edit__format__errorMessage"></div>
            </div>
            <div class="edit__format__selected">
                <table id="js-add_table" class="edit__format__selected__table">
                    @if(old('sub_item_id'))
                    @forelse(old('sub_item_id') as $item)
                    <tr class="edit__format__selected__tr">
                        <td class="edit__format__selected__td--text">{{ $item }}</td>
                        <td class="edit__format__selected__td">
                            <button type="submit" class="edit__format__selected__delete--itemnumber" style="color: rgb(62, 128, 241);">削除</button>
                        </td>
                        <input name="sub_item_id[]" value="{{ $item }}" style="display: none;">
                    </tr>
                    @empty
                    @endforelse
                    @endif
                </table>
            </div>
        </div>
    </form>
</div>

@endsection

@section('javascript')

<script>
    const stepArrowOn = "{{ asset('assets/img/StepArrowOn.svg') }}";
    const stepArrowOff = "{{ asset('assets/img/StepArrowOff.svg') }}";
    var purchased_items = "{{ implode(',', $purchased_items) }}";
    var selectvalue_blade = "";
    var materials = @json($materials);

    // 戻るボタン
    $("#back_button").click(function () {
        window.location.href = "{{ route('items.list') }}";
    });

    // 種別の変更
    $("#js-selecttype").on('change', function () {
        if ($("#js-selecttype").val() == 1) {
            window.location.href = "{{ route('purchased.create') }}";
        } else if ($("#js-selecttype").val() == 2) {
            window.location.href = "{{ route('materials.create') }}";
        }
    });
</script>

@endsection

@section('css')
<style>
    .ui-autocomplete {
        max-height: 100px;
        overflow-y: auto;
        overflow-x: hidden;
        padding-right: 20px;
    }

    .arrow {
        position: relative;
        display: inline-block;
    }

    .arrow::after {
        content: "";
        display: block;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 8px 5px 0 5px;
        border-color: #000 transparent transparent transparent;
        position: absolute;
        top: 50%;
        right: 14px;
        margin-top: -5px;
    }

    #error-message{
        margin-bottom: 20px;
        line-height: 1.3;
    }

    #error-message br{
        display: block;
        content: "";
        margin: 8px 0;
    }
</style>
@endsection